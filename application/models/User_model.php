<?php 

class User_model extends CI_Model {

    public function getUserById($id)
    {
       $query =  $this->db->where('id',$id)->get('tbl_user')->row_array();
       return $query;
    }
}