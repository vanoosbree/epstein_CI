<?php

class Shows_model extends CI_Model {

    public function get_shows()
    {
        $band_info = $this->session->userdata("band_info");
        $band_id = $band_info["band_info"][0]->id;

        $query = "SELECT * FROM shows
                WHERE band_id = ?
                ORDER BY date ASC";
        $shows = $this->db->query($query, array($band_id))->result();

        return $shows;
    }

    //add show to db
    public function add_show($show_info)
    {
        $query = "INSERT INTO shows
            (band_id, date, time, description, address, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($query, array($show_info["band_id"], $show_info["date"], $show_info["time"], $show_info["description"], $show_info["address"], $show_info["created_at"], $show_info["updated_at"]));

        //get id of just created show
        $show_info["show_id"] = $this->db->insert_id();

        //create unique setlist id for this show
        $this->create_setlist($show_info);
    }

    public function create_setlist($show_info)
    {
        $query = "INSERT INTO setlists (show_id, created_at, updated_at)
                VALUES (?, ?, ?)";
        $this->db->query($query, array($show_info["show_id"], $show_info["created_at"], $show_info["updated_at"]));
    }
    
}

//eof









