<?php 

class Template_model extends CI_Model
{
    
    public function add_template($data)
    {
       $query =  $this->db->insert('templates',$data);
       return $query;
    }

    public function get_all_templates()
    {
        $this->db->where('status',1);
        $query = $this->db->get('templates');
        return $query->result();
    }
    public function get_template_by_id($id)
    {
         $this->db->where('id',$id);
         $this->db->where('status',1);
         $query =  $this->db->get('templates');
         return $query->row();


    }
    public function edit_template($id,$data)
    {
        $this->db->where('id',$id);
        return $this->db->update('templates', $data);
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