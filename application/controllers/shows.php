<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shows extends CI_Controller {

	public function index()
	{	
		$band_id = $this->uri->segment(3);
		$this->load->model("Bands_model");
		$band["band_info"] = $this->Bands_model->get_band($band_id);
		$this->session->set_userdata("band_info", $band);

		$this->load->model("Shows_model");
		$band["shows"] = $this->Shows_model->get_shows();

		$this->load->view('shows', $band);
	}

	public function add_show()
	{
		$this->load->model("Shows_model");

		$band_info = $this->session->userdata("band_info");

		$band_id = $band_info["band_info"][0]->id;
		$show_info = array(
				"band_id" => $band_id,
				"date" => date("Y-m-d", strtotime($this->input->post("date"))),
				"time" => $this->input->post("time"),
				"description" => $this->input->post("description"),
				"address" => $this->input->post("address"),
				"created_at" => date("Y-m-d H:i:s"),
				"updated_at" => date("Y-m-d H:i:s")
			);

		$this->Shows_model->add_show($show_info);
		redirect(base_url('/shows/index/' . $band_id));
	}

	public function update_show()
	{
		//database crap
	}
	
}
//end of file