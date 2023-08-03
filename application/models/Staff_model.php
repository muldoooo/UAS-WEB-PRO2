<?php

class Staff_model extends CI_Model
{   
    public function daftar_staff(){
        $datastaff = $this->db->get('user');
        return $datastaff->result();
    }
}