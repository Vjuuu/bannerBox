<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    /**
     * ✅ Get user by Google ID
     */
    public function get_user_by_google_id($google_id) {
        return $this->db->where('google_id', $google_id)
                        ->get('users')
                        ->row_array();
    }

    /**
     * ✅ Get user by ID
     */
    public function get_user_by_id($user_id) {
        return $this->db->where('id', $user_id)
                        ->get('users')
                        ->row_array();
    }

    /**
     * ✅ Insert new user
     */
    public function insert_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    /**
     * ✅ Update user by ID
     */
    public function update_user($user_id, $data) {
        return $this->db->where('id', $user_id)
                        ->update('users', $data);
    }

    /**
     * ✅ Optional: Check if email exists
     */
    public function get_user_by_email($email) {
        return $this->db->where('google_email', $email)
                        ->get('users')
                        ->row_array();
    }
}
