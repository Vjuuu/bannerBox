<?php 

class Auth_model extends CI_Model {
    public function do_login($data) {

        var_dump($data);
        die;
        $this->db->select('*');
        $this->db->where('email',$data['email']);
        $this->db->where('password',$data['password']);
        $this->db->from('user_auth');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            return $query->rows();
        }
        else
        {
            return false;
        } 
      
    }

    public function get_user_by_username($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('admin');
        return $query->row_array();
    }
    public function get_user_by_id($user_id)
    {
        $this->db->where('id',$user_id);
        $query =   $this->db->get('admin');
        return $query->row();
    }

    public function edit_user($user_id,$data)
    {
        $this->db->where('id',$user_id);
        return   $this->db->update('admin',$data);
    }
}


?>