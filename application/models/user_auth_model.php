<?php 

class user_auth_model extends CI_Model {

    public function check_username_exists($username)
    {
       $q = $this->db->where('email',$username)->get('user_auth');
       return $q->num_rows() > 0;

    }

    public function get_user_by_email($email)
    {
       $query =  $this->db->where('email',$email)->get('user_auth');
       return $query->row_array();
    }

}