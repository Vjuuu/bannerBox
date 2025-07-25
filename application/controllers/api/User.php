<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class User extends MY_Controller {

   

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        header('Content-Type: application/json');
    }

   
    /**
     * ✅ Google Login - Returns JWT token
     */
    public function google_login() {
        $input = json_decode(file_get_contents('php://input'), true);
        $google_id    = $input['google_id'];
        $google_email = $input['email'];
        $google_name  = $input['name'];
        $google_avatar= $input['avatar'];

        // Check if user exists
        $user = $this->User_model->get_user_by_google_id($google_id);

        if (!$user) {
            // Create new user
            $new_user = [
                'google_id'    => $google_id,
                'google_email' => $google_email,
                'google_name'  => $google_name,
                'google_avatar'=> $google_avatar
            ];
            $user_id = $this->User_model->insert_user($new_user);
            $user = $this->User_model->get_user_by_id($user_id);
        }

        // Generate JWT token for this user
        $token = $this->generate_token($user['id']);

        echo json_encode([
            'status' => true,
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ]);
    }

    /**
     * ✅ Protected API: Update Profile
     */
    public function update_profile() {
        $decoded = $this->verify_token();
        if (!$decoded) {
            echo json_encode(['status' => false, 'message' => 'Unauthorized']);
            return;
        }

        $user_id = $decoded['user_id'];

        $business_name = $this->input->post('business_name');
        $address = $this->input->post('address');
        $business_email = $this->input->post('business_email');
        $mobile_no = $this->input->post('mobile_no');

        $data = [
            'business_name' => $business_name,
            'address' => $address,
            'business_email' => $business_email,
            'mobile_no' => $mobile_no
        ];

        // ✅ Upload Business Logo
        if (!empty($_FILES['business_logo']['name'])) {
            $config['upload_path'] = './uploaded_files/user_logo/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = time() . '_' . $_FILES['business_logo']['name'];
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('business_logo')) {
                $uploadData = $this->upload->data();
                $data['business_logo'] = $uploadData['file_name'];
            }
        }

        $this->User_model->update_user($user_id, $data);
        $updated_user = $this->User_model->get_user_by_id($user_id);

        echo json_encode([
            'status' => true,
            'message' => 'Profile updated',
            'user' => $updated_user
        ]);
    }

    /**
     * ✅ Protected API: Get Profile
     */
    public function profile() {
        $decoded = $this->verify_token();
        if (!$decoded) {
            echo json_encode(['status' => false, 'message' => 'Unauthorized']);
            return;
        }

        $user_id = $decoded['user_id'];
        $user = $this->User_model->get_user_by_id($user_id);

        echo json_encode([
            'status' => true,
            'user' => $user
        ]);
    }

    public function login()
{
    echo json_encode(['status' => 'working']);
}
}
