<?php

defined('BASEPATH') OR exit('No direct script access allowed');

 class  Admin extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function Index()
    {
        $this->load->view('Admin/Components/Header');
        $this->load->view('Admin/Components/Sidebar');
        $this->load->view('Admin/Dashboard');
        $this->load->view('Admin/Components/Footer');    
    }
    public function login()
    {
        $this->load->view('Admin/Login_Page');
    }
    public function do_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->Auth_model->get_user_by_username($email);
        if ($user && password_verify($password, $user['password'])) {
            $user_data = array(
                'id' => $user['id'],
                'email' => $user['email'],
                'f_name' => $user['f_name'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($user_data);
            redirect('admin/dashboard'); // Redirect to dashboard or desired page
        } else {
            // Invalid login
            $this->session->set_flashdata('error', 'Invalid username or password.');
            redirect('admin/login');
        }

    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    public function profile($user_id)
    {
    
        $data   ['user_id'] = $user_id;
       $data['result'] = $this->Auth_model->get_user_by_id($user_id);
    
       $this->load->view('admin/profile',$data);
    }
    public function edit_user($user_id)
    {
        $data['f_name'] = $this->input->post('f_name');
        $data['l_name'] = $this->input->post('l_name');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');

       

        $config['upload_path'] = './assets/user-pic/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profile_pic')) {
            // File uploaded successfully
            $result = $this->upload->data();
            $image_path = $result['file_name'];
        } else {
            // File upload failed or no new image was provided
            $image_path = $this->input->post('existing_image'); // Assuming you store the existing image path in a hidden field
        }

       
        $data['profile_pic'] = $image_path;

      

        $update_success = $this->Auth_model->edit_user($user_id,$data);
        print_r($update_success);
        if ($update_success) {
            // Display a success message using SweetAlert
            echo '<script>alert("Profile Is Updated ");  window.location.href = "'.base_url().'index.php/admin/profile/'.$user_id.'"</script>';
           
        } else {
            echo '<script>alert("Profile updatetion failed ");  window.location.href = "'.base_url().'index.php/admin/profile/'.$user_id.'"</script>';

        } 
 }
 }
?>