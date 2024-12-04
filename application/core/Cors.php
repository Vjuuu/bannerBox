<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cors {
    public function __construct() {
        $this->allowCrossDomainRequests();
    }

    private function allowCrossDomainRequests() {
        header("Access-Control-Allow-Origin: *"); // Allow your frontend URL
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE"); // Specify allowed methods
        header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Specify allowed headers

        // Handle preflight requests
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit();
        }
    }
}
