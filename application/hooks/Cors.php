<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cors {
    public function allow() {
        header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, x-api-key");

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit();
        }
    }
}
