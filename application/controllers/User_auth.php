<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_auth extends CI_Controller {

    public function __construct()
	{
            parent::__construct();
            $this->load->database();
            $this->load->model('user_auth_model');
            $this->config->load('validation', TRUE);
	}

	public function login_form()
	{
		$this->load->view('admin/login_page');
	}

    public function check_user()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/login_page');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $user = $this->UserModel->get_user_by_email($email);

            if ($user && password_verify($password, $user['password'])) {
                // Set user session and redirect to dashboard or desired page
                $this->session->set_userdata('user_id', $user['id']);
                redirect('index.php/admin/dashboard');
            } else {
                $data['login_error'] = 'Invalid email or password';
                $this->load->view('admin/login_page', $data);
            }
        }

    }


    // public function userRagistration()
    // {
    //     $this->form_validation->set_rules('name', 'name', 'trim|required|is_unique[user_auth.name]');
    //     $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[user_auth.email]');
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

    //     $validation_rules = $this->config->item('registration', 'validation'); // Get the 'registration' rules
        
    //     $this->form_validation->set_rules($validation_rules); // Set the rules

    //         if ($this->form_validation->run() === FALSE) {
    //             $data['validation_errors'] = $this->form_validation->error_array();
    //             $this->load->view('admin/components/header');
    //             $this->load->view('admin/registration',$data);
    //         } else {
    //             $data = array(
    //                 'name' => $this->input->post('name'),
    //                 'email' => $this->input->post('email'),
    //                 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
    //             );
    //             $this->UserModel->create_user($data);
    //             redirect('index.php/admin/login');
    //         }
        

    // }

    // user controler 
    public function userRagistration()
    {
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $user_exists = $this->user_auth_model->check_username_exists($data['email']);

        $response ="";
        if($user_exists)
        {
            $response = array(
                 'status'=>'error',
                  'message'=>'user already exist...!'
                );       
        }
        else
        {

            $query = $this->db->insert('user_auth',$data);
            $response = array('status'=>'success','message'=>'Acount Created Successful...!'); 

        }

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
      
    }

    public function user_login()
    {
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        $response = "";

        $user = $this->user_auth_model->get_user_by_email($data['email']);

        echo "<pre>";
        print_r($user);
        exit();
        
        if($user)
        {
            $response = array('status'=>'error','messae'=>'valid User id');
        }
        else
        {
            $response = array('status'=>'error','messae'=>'in valid User id');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));

    }

    
}