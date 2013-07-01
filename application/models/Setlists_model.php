<?php

class Setlists_model extends CI_Model {

    public function get_songs($band_id)
    {
        $query = "SELECT * FROM songs
                WHERE band_id = ?
                ORDER BY title ASC";
        $songs = $this->db->query($query, array($band_id))->result();

        return $songs;
    }

    public function get_show_description($show_id)
    {
        $query = "SELECT description FROM shows
                WHERE id = ?";
        $description = $this->db->query($query, array($show_id))->result();
        
        return $description;
    }

    //add show to db
    public function insert_song($song_info)
    {
        $query = "INSERT INTO songs
            (band_id, title, created_at, updated_at)
            VALUES (?, ?, ?, ?)";
        $this->db->query($query, array($song_info["band_id"], $song_info["title"], $song_info["created_at"], $song_info["updated_at"]));
    }

    public function get_setlist($show_id)
    {
        $query = "SELECT songs FROM setlists
                WHERE show_id = ?";
        $setlist = $this->db->query($query, array($show_id))->result_array  ();

        return $setlist;
    }

    public function update_setlist($show_id, $setlist)
    {
        $query = 'UPDATE setlists
                SET songs = "?"
                WHERE show_id = ?';
        $this->db->query($query, array($setlist, $show_id));
    }
}

//eof









