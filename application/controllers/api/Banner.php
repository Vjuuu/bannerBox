<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;

require_once(APPPATH . 'libraries/Format.php');

class Banner extends RestController 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('template_model');
        
    }
    public function index_get() 
    {
     
        $data =  $this->template_model->get_template();
        if($data)
        {
            $this->response($data,200);
        }
        else
        {
            $this->response(['message'=>'No Template Found...!'],404);  
        }
    }
    public function show_get($id) 
    {
     
        $data =  $this->template_model->get_template($id);
        if($data)
        {
            $this->response($data,200);
        }
        else
        {
            $this->response(['message'=>'No Template Found...!'],404);  
        }
    }
    

    
}
?>
