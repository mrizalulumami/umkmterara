<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_delete extends CI_Model{
    public function hapus($table, $param1, $param2){
        $this->db->where($param1,$param2);
        return $this->db->delete($table);
    }
}