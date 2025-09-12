<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update extends CI_Model{

    public function update_data($tabel, $param1, $param2, $data)
    {
        $this->db->set($data);
        $this->db->where($param1,$param2);
        return $this->db->update($tabel);
    }
}