<?php 

class User_model extends CI_Model {

    public function getUserById($id)
    {
       $query =  $this->db->where('id',$id)->get('tbl_user')->row_array();
       return $query;
    }

    public function save_user_info($data)
    {
        return $this->db->insert('tbl_user', $data); // Replace 'users' with your table name
    }

    public function get_user($id = null)
    {
        if(isset($id) && $id != null)
        {
           $this->db->where('id',$id);
           $query = $this->db->get('tbl_user')->row_array();
           return $query;
        }
        $query = $this->db->get('tbl_user')->result();
        return $query;

    }
}