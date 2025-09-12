<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_add extends CI_Model{

    public function input_data($tabel, $data)
    {
        return $this->db->insert($tabel, $data);
    }
}