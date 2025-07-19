<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;

require_once(APPPATH . 'libraries/Format.php');

class Poster_templates extends RestController 
{
    private $valid_api_key = 'api-status-247-get-data'; // ✅ your API key
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Poster_template_model','poster_template_model');

        // ✅ Validate API key for all requests
        $headers = $this->input->request_headers();
        if (!isset($headers['X-API-KEY']) || $headers['X-API-KEY'] !== $this->valid_api_key) {
            $this->response([
                "status"  => "error",
                "message" => "Unauthorized access - Invalid API Key"
            ], 403);
            exit; // stop further execution
        }
    }
    
    /**
     * GET all poster templates OR single by ID
     */
    public function index_get() 
    {
        $id       = $this->get('id');       // ?id=5
        $category = $this->get('category'); // ?category=Wedding

        if (!empty($id)) {
            $data = $this->poster_template_model->get_template_by_id($id);
        } elseif (!empty($category)) {
            $data = $this->poster_template_model->get_templates_by_category($category);
        } else {
            $data = $this->poster_template_model->get_all_templates();
        }

        if ($data) {
            $this->response([
                "status"  => "success",
                "message" => "Data fetched successfully",
                "data"    => $data
            ], 200);
        } else {
            $this->response([
                "status"  => "error",
                "message" => "No template found"
            ], 404);
        }
    }

    
}
?>