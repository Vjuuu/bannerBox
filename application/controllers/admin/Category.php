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
        $this->load->view('Admin/Category',$data);
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

    public function delete_category()
    {
        $id =  $this->input->post('id');
        $result = $this->category_model->delete_category($id);
        if($result)
        {
            echo json_encode(['status'=>'success','message' => 'Category has been deleted...!']);
        }
        else
        {
            echo json_encode(['status'=>'failed','message'=>'Failed to detele...!']);
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

    public function banner_by_category($id)
    {
        if(!$this->session->userdata('logged_in'))
        {
            redirect('admin/login');
        }

        $data['banners'] =  $this->category_model->banner_by_category($id);
        $this->load->view('admin/banner_by_category',$data);
    }
    public function category_group()
    {
        if(!$this->session->userdata('logged_in'))
        {
            redirect('admin/login');
        }

        $data['grouped_data'] =  $this->category_model->category_group();
    
        // var_dump($data['grouped_data']);
        // die();

        $this->load->view('admin/category_group',$data);
    }

    public function setCategotuOrder()
    {
        $input = json_decode(file_get_contents('php://input'), true);

    if(empty($input) && !is_array($input))
    {
        $response = [
            'status'=>'error',
            'message' => 'invalid input data'
        ];

        echo json_encode($response);
        return;
    }
    foreach($input as $category)
    {
        $this->category_model->set_category_order($category['categoryId'], $category['order']);
        
    }
    $response = [
        'status'=>'success',
        'message'=>'Category Order index Update',
    ];

    echo json_encode($response);
    }
   
   
 }
?>