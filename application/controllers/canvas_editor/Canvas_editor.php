<?php

defined('BASEPATH') OR exit('No direct script access allowed');

 class Canvas_editor extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('canvas_template_model');
    }


    public function Index()
    {
        $this->load->model('Category_model');
        $data['categories'] = $this->Category_model->get_categories();
        $this->load->view('canvas_editor/canvas_editor',$data);    
    }


    public function get_template()
    {
        $data['templates'] = $this->canvas_template_model->get_template();
        $this->load->view('Admin/Templates/Template_list',$data);
    }

    public function view_template($id)
    {
        $this->load->model('Category_model'); 
        $data['categories'] = $this->Category_model->get_categories();
        $data['template'] = $this->canvas_template_model->get_template($id);
        $this->load->view('canvas_editor/canvas_editor',$data);
    }

    public function save_template() 
    {
        // Get the JSON input
        $inputData = json_decode(file_get_contents('php://input'), true);

        if (isset($inputData['canvasData'], $inputData['name'], $inputData['category'])) {
            $canvasData = $inputData['canvasData'];
            $templateName = $inputData['name'];
            $category = $inputData['category'];
            $language = $inputData['language'];
            $templateThubmail = $inputData['thumbnail'];
            
           
            // Insert data into the database
            $data = [
                'template_name' => $templateName,
                'category' => $category,
                'language' => $language,
                'template_json' => $canvasData,
                'template_thumbnail' => $templateThubmail,
            ];
            

            $query = $this->canvas_template_model->add_template($data);
            if($query)
            {
                echo json_encode(["status"=>"success","message"=>"Template Save"]);
            }
            else
            {
                echo json_encode(["status" => "error", "message" => "Invalid input data"]);
            }
            
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid input data"]);
        }
        
    }
    public function update_template($id)
    {

        $inputData = json_decode(file_get_contents('php://input'), true);

        if (isset($inputData['canvasData'], $inputData['name'], $inputData['category'])) {
            $canvasData = $inputData['canvasData'];
            $templateName = $inputData['name'];
            $category = $inputData['category'];
            $language = $inputData['language'];
            $templateThubmail = $inputData['thumbnail'];
           
            // Insert data into the database
            $data = [
                'template_name' => $templateName,
                'category' => $category,
                'template_json' => $canvasData,
                'language' => $language,
                'template_thumbnail' => $templateThubmail,
            ];
            

            $query = $this->canvas_template_model->update_template($id,$data);
            if($query)
            {
                echo json_encode(["status"=>"success","message"=>"Template updated"]);
            }
            else
            {
                echo json_encode(["status" => "error", "message" => "Invalid input data"]);
            }
            
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid input data"]);
        }
             
    }

    public function delete_template($id)
    {
        $result = $this->canvas_template_model->delete_template($id);
        if($result)
        {
            echo json_encode(["status" =>"success","message" => "Template Deleted Successfully..." ]);
        }
        else
        {
            echo json_encode(["status"=>"failed","message"=>"Failed To Delete Template...!"]);
        }

    }
    
 }
?>