<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function about()
	{
		$this->load->view('about');
	}

	public function log_out()
	{
		$this->session->sess_destroy();
		redirect(base_url("home"));
		//logout
	}
}
//end of file