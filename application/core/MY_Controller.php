

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class MY_Controller extends CI_Controller 
{

    public function __construct() {
        parent::__construct();
        
         $this->jwt_key = 'your_super_secret_key_123';  // Change to something secure
        // ✅ CORS Headers
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, Accept, X-API-KEY');

        // ✅ Handle OPTIONS (Preflight) Requests
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            header('HTTP/1.1 200 OK');
            exit();
        }
    }

    


  protected function generate_token($user_id) {
        $payload = [
            "iss" => base_url(),       // Issuer
            "iat" => time(),           // Issued at
            "exp" => time() + 86400,   // Expire in 24 hours
            "user_id" => $user_id
        ];

        return JWT::encode($payload, $this->jwt_key, 'HS256');
    }

    /**
     * ✅ Verify JWT Token
     */
    protected  function verify_token() {
        $headers = apache_request_headers();
        if (!isset($headers['Authorization'])) return false;

        $auth = str_replace('Bearer ', '', $headers['Authorization']);

        try {
            $decoded = JWT::decode($auth, new Key($this->jwt_key, 'HS256'));
            return (array)$decoded; // return decoded payload
        } catch (Exception $e) {
            return false;
        }
    }

}