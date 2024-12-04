<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	 public function __construct() {
        parent::__construct();
        $this->load->model('Template_model');
		$this->load->model('User_model');
        $this->load->library('form_validation');
		$this->load->library('CorsMiddleware');
        $this->corsmiddleware->handle();
    }
	public function index()
	{
        $data['templates'] = $this->Template_model->get_all_templates();
		$data['user_data'] = $this->User_model->getUserById(1);
		$this->load->view('components/header',$data);
		$this->load->view('home_page',$data);
	}
	public function landing_screen()
	{
          $this->load->view('user_panel/landing_page');
	}
	public function view_poster($id)
	{
		$data['result'] =  $this->Template_model->get_template_by_id($id);
        if($data['result'])
        {
           $this->load->view('view_poster',$data);
        }
        else
        {
            echo "404 Page";
        }
	}

	public function signup()
	{
		$this->load->view('signup_page');
	}
	public function login()
	{
		$this->load->view('signin_page');
	}
	

	public function add_business_details()
	{
		$id = $_POST['user_id'];
		$data['b_name'] = $_POST['b_name'];
		$data['email'] = $_POST['email'];
		$data['mobile'] = $_POST['mobile_no'];
		$data['address'] = $_POST['address'];

		$this->load->model('business_model');
		$query = $this->business_model->UpdateBusinessData($id,$data);
		if($query)
		{
			$result = array('status'=>200,'massage'=>'business Details is added...');

			echo json_encode($result);
		}
		else
		{
			echo "Business Data Is added";

		}
	}


	// error page 
	public function page_not_found()
	{
		$this->load->view('user_panel/404_page');
	}

}
