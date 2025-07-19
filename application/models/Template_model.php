<?php 

class Template_model extends CI_Model
{
    
    // public function add_template($data)
    // {
    //    $query =  $this->db->insert('templates',$data);
    //    return $query;
    // }

    public function add_template($data)
    {
       $query =  $this->db->insert('poster_template',$data);
       return $query;
    }

    public function get_all_templates()
    {
        // $this->db->where('status',1);
        $this->db->select('template_thumbnail');
        $this->db->select('id');
        $query = $this->db->get('poster_template');
        return $query->result();
    }
    public function get_template_by_id($id)
    {
         $this->db->where('id',$id);
         $query =  $this->db->get('poster_template');
         return $query->row();
    }
    public function edit_template($id,$data)
    {
        $this->db->where('id',$id);
        return $this->db->update('poster_template', $data);
    }

    public function delete_template($id)
{
    // Fetch existing template to know file names
    $template = $this->Template_model->get_template_by_id($id);

    var_dump($template);
    die();

    if ($template) {
        // Paths
        $imagePath = './assets/templates/' . $template->template_url;
        $thumbPath = './assets/templates/thumbs/' . $template->template_thumbnail;

        // Delete DB record
        if ($this->Template_model->delete_template($id)) {

            // Delete files safely
            if (!empty($template->template_url) && file_exists($imagePath)) {
                unlink($imagePath);
            }

            if (!empty($template->template_thumbnail) && file_exists($thumbPath)) {
                unlink($thumbPath);
            }

            // Redirect or JSON response
            $this->session->set_flashdata('success', 'Template deleted successfully!');
            redirect(base_url('admin/all-templates'));

        } else {
            $this->session->set_flashdata('error', 'Failed to delete template from database.');
            redirect(base_url('admin/all-templates'));
        }

    } else {
        $this->session->set_flashdata('error', 'Template not found.');
        redirect(base_url('admin/all-templates'));
    }
}

    public function get_template($id = false)
    {
        if($id)
        {
            $this->db->where('status',1);
            $this->db->where('id',$id);
            $query = $this->db->get('templates');
        }
        else
        {
            $this->db->where('status',1);
            $query = $this->db->get('templates');
        }
       
        return $query->result();
    }



   
}

?>