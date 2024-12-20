<?php

defined('BASEPATH') OR exit('No direct script access allowed');

 class Category extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('category_model');
    }

    public function Index()
    {
        if(!$this->session->userdata('logged_in'))
        {
            redirect('admin/login');
        }

        $result = $this->category_model->get_categories();
        $data['categories'] = $result;
        $this->load->view('admin/category',$data);
    }
    public function add_category()
    {
       $id = $this->input->post('id');
       $category_name = $this->input->post('name');
       $parent_id = $this->input->post('parent_category');

        $data = array(
            'category_name' => $category_name,
            'parent_id' => $parent_id
           );
    
           if(!empty($id))
           {
             $result = $this->category_model->update_category($data,$id);
             $message = 'Category update';
           }
           else
           {
             $result = $this->category_model->add_category($data);
             $message = 'Added New Category';

           }
           
           if($result)
           {
            echo json_encode(['status' => 'success', 'message' => $message]);
           }
           else 
           {
            echo json_encode(['status' => 'failed', 'message' => 'Failed to add new category']);
           }

       
       
    }

    public function get_category($id)
    {
        $result = $this->category_model->get_categories($id);
        if($result)
        {
            echo  json_encode(['status'=>'success','data'=>$result]);
        }
        else
        {
            echo json_decode(['status'=>'failed','message'=>'category not found...!']);
        }
    }
   
 }
?>