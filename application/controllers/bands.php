<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bands extends CI_Controller {

	public function index()
	{	
		$band_names["names"] = $this->users_bands();
		$band_names["all_names"] = $this->all_bands();

		$this->load->view('bands', $band_names);
		
	}

	public function users_bands()
	{
		//user's id
		$id = $this->session->userdata("user_info")->id;

		$this->load->model("Bands_model");
		$bands = $this->Bands_model->get_users_bands($id);

		$band_names = array();
		if (count($bands) > 0)
		{
			$band_names["names"] = $this->print_bands($bands);
		}
		else
		{
			$band_names["names"] = "<p>You don't have a band yet</p>";
		}
		return $band_names;
	}

	public function all_bands()
	{
		$this->load->model("Bands_model");
		$bands = $this->Bands_model->get_all_bands();
		return $bands;
	}

	public function print_bands($bands)
	{
		foreach ($bands as $band_name)
		{
			$band_names[] = "<li><a href='/shows/index/". $band_name->id ."'>". $band_name->band_name ."</a></li>";
		}
		return $band_names;
	}

	public function add_band()
	{
		$this->load->model("Bands_model");
		$band_name = $this->input->post("band_name");

		$band_info = array(
				"band_name" => $band_name,
				"created_at" => date("Y-m-d H:i:s"),
				"updated_at" => date("Y-m-d H:i:s")
			);

		$this->Bands_model->create_band($band_info);
		redirect(base_url('/bands'));
	}
}
//end of file