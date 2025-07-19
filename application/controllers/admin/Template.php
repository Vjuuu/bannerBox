<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Template_model');
        $this->load->library('form_validation');
    }

    public function add_template()
    {
        $this->load->model('Category_model');
        $data['categories'] = $this->Category_model->get_categories();
        $this->load->view('admin/add_template',$data); 
    
    }
    // public function do_add_template()
    // {

    //     $this->form_validation->set_rules('title','template title','required');
    //     if($this->form_validation->run() == FALSE)
    //     {
            
    //         $this->load->view('admin/add_template');
            
    //     }
    //     else
    //     {
            
    //         $config['upload_path'] = './assets/templates/';
    //         $config['allowed_types'] = 'gif|jpg|png';
    //         $config['encrypt_name'] = TRUE;

    //         $this->load->library('upload', $config);
           
        
    //         if (!$this->upload->do_upload('template_img')) {

    //             $data['error'] = $this->upload->display_errors();

    //             $this->load->view('admin/add_template',$data);
                
    //         } else {
    //             $result = $this->upload->data();
    //             $data['title'] = $this->input->post('title');
    //             $data['category'] = $this->input->post('category');
    //             $data['template_img'] = $result['file_name'];

    //             $query = $this->Template_model->add_template($data);

    //             if($query)
    //             {
    //             echo "<script>alert('Template Is Added ...! ');</script>"; 
    //             redirect(base_url('admin/all-templates'));
                   

    //             }
    //             else
    //             {
    //                 echo "failed....!";
    //             }
                
              
    //         }

    //     }
        
        
        
    // }

    public function do_add_template()
    {
        // AJAX JSON Response
        $response = ['status' => 'error', 'errors' => []];

        // Server-side validation
        $this->form_validation->set_rules('title', 'Template Title', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Return validation errors as JSON
            $response['errors'] = [
                'title'    => form_error('title'),
                'category' => form_error('category')
            ];
            echo json_encode($response);
            return;
        }

        // File upload config
        $config['upload_path']   = './assets/templates/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('template_img')) {
            $response['errors']['template_img'] = $this->upload->display_errors('', '');
            echo json_encode($response);
            return;
        }

        // Uploaded file details
        $uploadData = $this->upload->data();
        $originalImage = $uploadData['file_name'];
        $thumbnailImage = 'thumb_' . $originalImage;

        // Create thumbnail (compressed)
        $this->load->library('image_lib');

        $thumbConfig['image_library']  = 'gd2';
        $thumbConfig['source_image']   = $uploadData['full_path'];
        $thumbConfig['new_image']      = './assets/templates/thumbs/' . $thumbnailImage;
        $thumbConfig['maintain_ratio'] = TRUE;
        $thumbConfig['width']          = 300;  // Thumbnail width
        $thumbConfig['height']         = 300;  // Thumbnail height

        $this->image_lib->initialize($thumbConfig);

        if (!$this->image_lib->resize()) {
            $response['errors']['template_img'] = $this->image_lib->display_errors('', '');
            echo json_encode($response);
            return;
        }

        // Save data into DB
        $data = [
            'template_name'        => $this->input->post('title'),
            'category'     => $this->input->post('category'),
            'template_url' => $originalImage,
            'template_thumbnail'    => $thumbnailImage
        ];

        $query = $this->Template_model->add_template($data);

        if ($query) {
            $response['status']  = 'success';
            $response['message'] = 'Template added successfully!';
        } else {
            $response['errors']['db'] = 'Database insert failed!';
        }

        echo json_encode($response);
    }

    public function all_template()
    {
        $data['templates'] = $this->Template_model->get_all_templates();
        $this->load->view('admin/all_templates',$data);
    }

    public function view_template($id)
    {
        $this->load->model('Category_model');
        $data['categories'] = $this->Category_model->get_categories();

        $data['result'] =  $this->Template_model->get_template_by_id($id);
        if($data['result'])
        {
        $this->load->view('admin/view_template',$data);
        }
        else
        {
            echo "404 Page";
        }
    }

   public function edit_template()
{
    $response = ['status' => 'error', 'errors' => []];

    $id = $this->input->post('id');
    $title = $this->input->post('title');
    $category = $this->input->post('category');
    $existing_image = $this->input->post('existing_image');

    // Validation
    $this->form_validation->set_rules('title', 'Template Title', 'required');
    $this->form_validation->set_rules('category', 'Category', 'required');

    if ($this->form_validation->run() == FALSE) {
        $response['errors'] = [
            'title'    => form_error('title'),
            'category' => form_error('category')
        ];
        echo json_encode($response);
        return;
    }

    $upload_path = './assets/templates/';
    $thumb_path = './assets/templates/thumbs/';

    $config['upload_path']   = $upload_path;
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    // If new image is uploaded
    if (!empty($_FILES['template_img']['name']) && $this->upload->do_upload('template_img')) {
        $uploadData = $this->upload->data();
        $new_image = $uploadData['file_name'];

        // Generate Thumbnail
        $this->load->library('image_lib');
        $thumb_config['image_library']  = 'gd2';
        $thumb_config['source_image']   = $uploadData['full_path'];
        $thumb_config['new_image']      = $thumb_path . 'thumb_' . $new_image;
        $thumb_config['maintain_ratio'] = TRUE;
        $thumb_config['width']          = 300;
        $thumb_config['height']         = 300;

        $this->image_lib->initialize($thumb_config);
        if (!$this->image_lib->resize()) {
            $response['errors']['template_img'] = $this->image_lib->display_errors('', '');
            echo json_encode($response);
            return;
        }

        $final_image = $new_image;
        $final_thumb = 'thumb_' . $new_image;

    } else {
        // Keep old image if no new upload
        $final_image = $existing_image;
        $final_thumb = 'thumb_' . $existing_image;
    }

    // Prepare update data
    $data = [
        'template_name' => $title,
        'category'      => $category,
        'template_url'  => $final_image,
        'template_thumbnail' => $final_thumb
    ];

    // Update DB
    $update_success = $this->Template_model->edit_template($id, $data);

    if ($update_success) {
        $response['status']   = 'success';
        $response['message']  = 'Template updated successfully!';
        $response['redirect'] = base_url('admin/all-templates');
    } else {
        $response['errors']['db'] = 'Database update failed!';
    }

    echo json_encode($response);
}


    public function delete_template($id)
    {
        
        die();
        $query = $this->Template_model->delete_template($id,);
        if($query)
        {
            echo '<script>alert("Post updated successfully.") ;  window.location.href = "'.base_url().'admin/all-templates";</script>';
        }
    }

    

}

?>