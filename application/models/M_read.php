<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_read extends CI_Model{
	
	public function baca_by_param($tabel, $param1, $param2)
    {
        $query = $this->db->query("SELECT * FROM $tabel WHERE $param1 = '$param2'");

        return $query;
    }
    public function baca_by_param_false($tabel, $param1, $param2)
    {
        $query = $this->db->query("SELECT * FROM $tabel WHERE $param1 != '$param2'");

        return $query;
    }
    public function baca_data($tabel)
    {
        $query = $this->db->query("SELECT * FROM $tabel");

        return $query;
    }
	public function get_latest_desain_with_gambar($limit = 6) {
        $this->db->select('tb_desain.id_desain, nama_desain, harga, tb_gambar_desain.gambar_desain');
        $this->db->from('tb_desain');
        $this->db->join('tb_gambar_desain', 'tb_desain.id_desain = tb_gambar_desain.id_desain', 'left');
        $this->db->group_by('tb_desain.id_desain');
        $this->db->limit($limit);
        return $this->db->get()->result_array();
    }
	public function get_desain_by_pemilik_prefix($limit = 6) {
        $this->db->select('tb_desain.id_desain, tb_desain.nama_desain, tb_desain.harga, tb_gambar_desain.gambar_desain');
        $this->db->from('tb_desain');
        $this->db->join('tb_gambar_desain', 'tb_desain.id_desain = tb_gambar_desain.id_desain', 'left');
        $this->db->where("LEFT(tb_desain.pemilik, 2) = 'AD'"); // ✅ Fix here
        $this->db->group_by('tb_desain.id_desain');
        $this->db->limit($limit);
        return $this->db->get()->result_array();
    }
	public function get_cetak_limited($limit = 6) {
        return $this->db->limit($limit)->get('tb_cetak')->result_array();
    }
	public function get_random_jobs_with_user_and_image($limit = 6) {
        $this->db->select('tb_jobs.*, tb_user.nama_user, tb_gambar_jobs.gambar_jobs');
        $this->db->from('tb_jobs');
        $this->db->join('tb_user', 'tb_jobs.id_user = tb_user.id_user');
        $this->db->join('(SELECT id_jobs, gambar_jobs FROM tb_gambar_jobs GROUP BY id_jobs) as tb_gambar_jobs', 'tb_jobs.id_jobs = tb_gambar_jobs.id_jobs', 'left');
        $this->db->where('tb_jobs.status', '1');
        $this->db->order_by('RAND()');
        $this->db->limit($limit);

        return $this->db->get()->result_array();
    }
	public function get_published_artikel_with_meta($limit = 6) {
        $this->db->select('tb_artikel.*, tb_kategori.nama_kategori');
        $this->db->from('tb_artikel');
        $this->db->join('tb_kategori', 'tb_artikel.id_kategori = tb_kategori.id_kategori');
        $this->db->where('publish', '1');
        $this->db->order_by('RAND()');
        $this->db->limit($limit);
        $result = $this->db->get()->result_array();

        // Enrich result with gambar + penulis + gambar path
        foreach ($result as &$artikel) {
            // Gambar
            $gambar = $this->db->select('gambar_artikel')
                               ->from('tb_gambar_artikel')
                               ->where('id_artikel', $artikel['id_artikel'])
                               ->limit(1)
                               ->get()
                               ->row_array();

            $artikel['gambar_artikel'] = $gambar['gambar_artikel'] ?? 'default.jpg';

            // Penulis
            $prefix = substr($artikel['id_user'], 0, 2);
            if ($prefix === 'US') {
                $user = $this->db->select('nama_user')->from('tb_user')->where('id_user', $artikel['id_user'])->get()->row_array();
                $artikel['nama_penulis'] = $user['nama_user'] ?? 'User';
                $artikel['gambar_path'] = 'user/assets/images/artikel/' . $artikel['gambar_artikel'];
            } elseif ($prefix === 'AD') {
                $admin = $this->db->select('nama_admin')->from('tb_admin')->where('id_admin', $artikel['id_user'])->get()->row_array();
                $artikel['nama_penulis'] = $admin['nama_admin'] ?? 'Admin';
                $artikel['gambar_path'] = 'admin/assets/images/artikel/' . $artikel['gambar_artikel'];
            } else {
                $artikel['nama_penulis'] = 'Tidak Diketahui';
                $artikel['gambar_path'] = 'default.jpg';
            }
        }

        return $result;
    }
	 public function get_visit_with_image($limit = 6) {
        $this->db->limit($limit);
        $visits = $this->db->get('tb_visit')->result_array();

        foreach ($visits as &$visit) {
            $gambar = $this->db
                ->select('gambar_visit')
                ->from('tb_gambar_visit')
                ->where('id_visit', $visit['id_visit'])
                ->limit(1)
                ->get()
                ->row_array();

            $visit['gambar_visit'] = $gambar['gambar_visit'] ?? 'default.jpg';
        }

        return $visits;
    }
	public function get_all_clients() {
        return $this->db->select('nama_client')->get('tb_client')->result_array();
    }
}
