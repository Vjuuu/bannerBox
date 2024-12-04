<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;

require_once(APPPATH . 'libraries/Format.php');

class Canvas_template extends RestController 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('canvas_template_model');
        
    }
    public function index_get() 
    {
        $data =  $this->canvas_template_model->get_templates();
        if($data)
        {
            $this->response($data,200);
        }
        else
        {
            $this->response(['message'=>'No Template Found...!'],404);  
        }
    }

    public function add_template_post() 
    {
       
        $headers = $this->input->request_headers();
        if (!isset($headers['X-API-KEY']) || $headers['X-API-KEY'] !== 'api-status-247-get-data') {
            $this->output->set_status_header(403);
            echo json_encode(["status" => "error", "message" => "Unauthorized access"]);
            return;
        }

        // Get the JSON input
        $inputData = json_decode(file_get_contents('php://input'), true);

        if (isset($inputData['canvasData'], $inputData['name'], $inputData['category'])) {
            $canvasData = $inputData['canvasData'];
            $templateName = $inputData['name'];
            $category = $inputData['category'];

            // Insert data into the database
            $data = [
                'template_name' => $templateName,
                'category' => $category,
                'template_json' => $canvasData
            ];

            if ($this->db->insert('canvas_templates', $data)) {
                echo json_encode(["status" => "success", "message" => "Template saved successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to save the template"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid input data"]);
        }

        
       
        
    }

    
}
?>