<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setlist extends CI_Controller {

	public function index()
	{
		$this->load->view('setlist');
	}

	public function update_setlist()
	{
		var_dump($this->input->post());
	}
	
	
}
//end of file