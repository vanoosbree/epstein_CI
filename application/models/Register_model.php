<?php

class Register_model extends CI_Model {

    function get_user($user)
    {
        return $this->db->where('email', $user['email'])
                        ->get('users')
                        ->row();
    }

    function insert_user($user)
    {
        return $this->db->insert('users', $user);
    }
}

//eof