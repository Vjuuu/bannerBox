<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CorsMiddleware {

    public function __construct() {
        // Constructor logic if needed
    }

    public function handle() {
        header('Access-Control-Allow-Origin: *'); // You can specify your allowed origins here
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');

        // Handle preflight requests
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            header('HTTP/1.1 200 OK');
            exit();
        }
    }
}
