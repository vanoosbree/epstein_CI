<?php

class Bands_model extends CI_Model {

    //add band to db
    public function create_band($band_info)
    {
        $query = "INSERT INTO bands (band_name, created_at, updated_at) VALUES (?, ?, ?)";
        $this->db->query($query, array($band_info["band_name"], $band_info["created_at"], $band_info["updated_at"]));

        $this->get_band_id($band_info);
    }

    public function get_band($band_id)
    {
        $query = "SELECT id, band_name FROM bands
                WHERE id = ?";
        $band = $this->db->query($query, array($band_id))->result();

        return $band;
    }

     //getting band id
    public function get_band_id($band_info)
    {       
        $query = "SELECT id FROM bands
                WHERE band_name = ?";
        $band_id = $this->db->query($query, array($band_info["band_name"]))->result();
        $band_id = $band_id[0]->id;

        $this->assign_band($band_id);
    }
        
    // assigning band to account as admin
    public function assign_band($band_id)
    {
        $user_level = 1;
        $user_info = $this->session->userdata("user_info");
        $query = "INSERT INTO users_has_bands (user_id, band_id, user_level_id) 
            VALUES (?, ?, ?)";
        $this->db->query($query, array($user_info->id, $band_id, $user_level));
    }

    public function get_users_bands($id)
    {
        $query = "SELECT bands.id, band_name 
            FROM epstein.bands
            JOIN users_has_bands ON bands.id = users_has_bands.band_id
            JOIN users ON users.id = users_has_bands.user_id
            WHERE users.id = ?";

        $bands = $this->db->query($query, array($id))->result();

        return $bands;
    }

    public function get_all_bands()
    {
        $this->db->select('id, band_name');
        $this->db->order_by("band_name", "asc");
        $query = $this->db->get('bands')->result();
        return $query;
    }
}

//eof









