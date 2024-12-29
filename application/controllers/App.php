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
        $this->load->model('Canvas_template_model');
		$this->load->model('User_model');
		$this->load->model('Category_model');

        $this->load->library('form_validation');
		$this->load->library('CorsMiddleware');
        $this->corsmiddleware->handle();
    }
	public function index()
	{
		// $data['templates'] = $this->Canvas_template_model->get_template();
		$data['grouped_data'] =  $this->Category_model->category_group();
        $this->load->view('Users/Pages/Home',$data);
	}
	public function landing_screen()
	{
          $this->load->view('user_panel/landing_page');
	}
	public function view_poster($id)
	{
		$data['template'] =  $this->Canvas_template_model->get_template($id);
		$data['user_roll'] = "user";
        if($data['template'])
        {
           $this->load->view('canvas_editor/Canvas_editor',$data);
        }
        else
        {
            echo "404 Page";
        }
	}

	public function profile() 
	{
		$this->load->view('Users/Pages/Profile');
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

	public function save_user_profile()
    {
         // Get POST data
        $data = array(
            'username' => $this->input->post('name'),
            'b_name' => $this->input->post('business_name'),
            'mobile' => $this->input->post('mobile_no'),
            'address' => $this->input->post('address')
        );

        // Insert data into the database
        $result = $this->User_model->save_user_info($data);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Data saved successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to save data.']);
        }
        }


	// error page 
	public function page_not_found()
	{
		$this->load->view('user_panel/404_page');
	}

}
