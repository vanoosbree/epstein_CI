<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}

	public function about()
	{
		$this->load->view('about');
	}

	public function login()
	{
		$this->form_validation->set_rules('login_email', 'Email', 'required|isset|max_length[255]|valid_email');
		$this->form_validation->set_rules('login_password', 'Password', 'required|isset|min_length[6]|max_length[255]|alpha_numeric');

	    if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("/home");
		}
		else
		{
			$this->load->model('Register_model');
		    $this->load->library('encrypt');

		    $user = array(
					"email" => $this->input->post('login_email'),
					"password" => $this->input->post('login_password')
	        	);

		    $user = $this->Register_model->get_user($user);

		    $password = $this->encrypt->decode($user->password);

		    if (!($this->input->post('login_password') == $password))
		    {
		    	//error message, return to login	
		    	$data['error'] = "That email and password combo does not match.";

		    	$this->session->set_userdata($data);

		    	$this->load->view("/home");
		    }
		    else
		    {
		    	$this->session->set_userdata("user_info", $user);
		    	$this->session->set_userdata("logged_in", TRUE);
		    	redirect(base_url("/bands"));
		    }
	    }	
	}

	public function register()
	{
		
		$this->output->enable_profiler(TRUE);

		//registration validation
		$this->form_validation->set_rules('name', 'name', 'required|isset|max_length[255]|min_length[3]');
		$this->form_validation->set_rules('email', 'email', 'required|isset|max_length[255]|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required|isset|min_length[6]|max_length[255]|alpha_numeric');
		$this->form_validation->set_rules('confirm_password', 'password confirmation', 'required|isset|matches[password]|min_length[6]|max_length[255]|alpha_numeric');

		//form validation, database insertion etc.
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("home");
		}
		else
		{
			$this->load->model("Register_model");
		    $this->load->library('encrypt');

			//prepare array of user info
			$user = array(
					"name" => $this->input->post("name"),
					"email" => $this->input->post("email"),
					"password" => $this->encrypt->encode($this->input->post("password")),
					"created_at" => date("Y-m-d H:i:s"),
					"updated_at" => date("Y-m-d H:i:s")
				);

			// var_dump($user);

			//insert to database
			$this->Register_model->insert_user($user);

			//immediately retrieve record to get user id
			$user = $this->Register_model->get_user($user);

			//send user to band select/create page
			$this->session->set_userdata("user_info", $user);
		    $this->session->set_userdata("logged_in", TRUE);
		    redirect(base_url('/bands'));
		}
	}

	public function log_out()
	{
		$this->session->sess_destroy();
		redirect(base_url("home"));
		//logout
	}
}
//end of file