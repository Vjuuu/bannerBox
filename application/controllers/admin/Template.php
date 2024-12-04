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
        
        $this->load->view('admin/add_template');
    
    }
    public function do_add_template()
    {

        $this->form_validation->set_rules('title','template title','required');
        if($this->form_validation->run() == FALSE)
        {
            
            $this->load->view('admin/add_template');
            
        }
        else
        {
            
            $config['upload_path'] = './assets/templates/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
           
        
            if (!$this->upload->do_upload('template_img')) {

                $data['error'] = $this->upload->display_errors();

                $this->load->view('admin/add_template',$data);
                
            } else {
                $result = $this->upload->data();
                $data['title'] = $this->input->post('title');
                $data['category'] = $this->input->post('category');
                $data['template_img'] = $result['file_name'];

                $query = $this->Template_model->add_template($data);

                if($query)
                {
                echo "<script>alert('Template Is Added ...! ');</script>"; 
                redirect(base_url('admin/all-templates'));
                   

                }
                else
                {
                    echo "failed....!";
                }
                
              
            }

        }
        
        
        
    }

    public function all_template()
    {
        $data['templates'] = $this->Template_model->get_all_templates();
      
        $this->load->view('admin/all_templates',$data);
    }

    public function view_template($id)
    {
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
            $id = $this->input->post('id');
            $data['title'] = $this->input->post('title');
            $data['category'] = $this->input->post('category');

            $config['upload_path'] = './assets/templates/'; // Set your upload path
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Define allowed image types
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('template_img')) {
                $template = $this->upload->data();
                $image_path = $template['file_name'];

            } else {
                // File upload failed or no new image was provided
                $image_path = $this->input->post('existing_image'); // Assuming you store the existing image path in a hidden field
            }

            $data['template_img'] = $image_path;

            $update_success = $this->Template_model->edit_template($id,$data);

            if ($update_success) {
                // Display a success message using SweetAlert
                $data['result'] =  $this->Template_model->get_template_by_id($id);
                $this->load->view('admin/view_template',$data);
            
                echo '<script>alert("Post updated successfully.") ;  window.location.href = "'.base_url().'admin/view-template/'.$id.'";</script>';
            } else {
                // Display an error message using SweetAlert
                echo "error";
                echo '<script>swal("Error!", "An error occurred while updating the post.", "error");</script>';
            }


    }

    public function delete_template($id)
    {
        echo $id;
        $data['status'] = 0;
        
        $query = $this->Template_model->edit_template($id,$data);

        if($query)
        {
            echo '<script>alert("Post updated successfully.") ;  window.location.href = "'.base_url().'admin/all-templates";</script>';

        }

    }


}

?>