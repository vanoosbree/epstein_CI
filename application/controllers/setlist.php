<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setlist extends CI_Controller {

	public function index()
	{
		//get show id
		$show_id = $this->uri->segment(3);
		$this->session->set_userdata("show_id", $show_id);
		$this->load->model("Setlists_model");
		$songs["description"] = $this->Setlists_model->get_show_description($show_id);
		$this->session->set_userdata("description", $songs["description"]);

		//get all the band's songs
		$band = $this->session->userdata("band_info"); 
		$band_id = $band["band_info"][0]->id;
		$songs["titles"] = $this->Setlists_model->get_songs($band_id);

		//fetch existing (if available) setlist... pretty messy
		//manipulating the reutrning serlized string vv
		$songs["setlist"] = $this->Setlists_model->get_setlist($show_id);
		if ($songs["setlist"])
		{
			$songs["setlist"] = substr($songs["setlist"][0]["songs"], 1, -1);
			$songs["setlist"] = unserialize($songs["setlist"]);	
		}		

		$this->load->view('setlist', $songs);
	}

	public function add_song()
	{
		$band = $this->session->userdata("band_info");
		$band_id = $band["band_info"][0]->id;
		$song_info = array(
				"band_id" => $band_id,
				"title" => $this->input->post("title"),
				"created_at" => date("Y-m-d H:i:s"),
				"updated_at" => date("Y-m-d H:i:s")
			);

		$this->load->model("Setlists_model");
		$this->Setlists_model->insert_song($song_info);

		redirect(base_url('/setlist/index/' . $this->session->userdata("show_id")));
	}

	public function update_setlist()
	{
		$show_id = $this->session->userdata("show_id");
		$setlist = serialize($this->input->post());

		$this->load->model("Setlists_model");
		$this->Setlists_model->update_setlist($show_id, $setlist);

		redirect(base_url("/setlist/index/". $show_id));
	}
	
	
}
//end of file