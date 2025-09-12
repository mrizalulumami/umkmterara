<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Format angka ke Rupiah
 */
if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        return "Rp " . number_format($angka, 0, ',', '.');
    }
}

/**
 * Ambil nama file gambar desain berdasarkan id_desain
 */
if (!function_exists('getGambarDesain')) {
    function getGambarDesain($id_desain)
    {
        $CI =& get_instance(); // ambil instance CI
        $CI->load->database();

        $query = $CI->db->select('gambar')
                        ->from('tb_gambar')
                        ->where('id_desain', $id_desain)
                        ->limit(1)
                        ->get();

        if ($query->num_rows() > 0) {
            return $query->row()->gambar;
        }
	}
}
		/**
 * Format tanggal + jam
 * Contoh: 2025-09-12 14:30:00 -> 12 September 2025, 14:30
 */
if (!function_exists('format_tanggal_jam')) {
    function format_tanggal_jam($datetime)
    {
        if (!$datetime || $datetime == '0000-00-00 00:00:00') return '-';

        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $pecah = explode(' ', $datetime);
        $tanggal = explode('-', $pecah[0]);

        return $tanggal[2] . ' ' . $bulan[(int)$tanggal[1]] . ' ' . $tanggal[0] . ', ' . substr($pecah[1], 0, 5);
    }
}

if (!function_exists('limit_text')) {
    function limit_text($text, $limit = 30)
    {
        $text = strip_tags($text); // hapus tag HTML biar aman
        if (strlen($text) > $limit) {
            return substr($text, 0, $limit) . '...';
        }
        return $text;
    }
}

/**
 * Format tanggal ke format Indonesia
 * Contoh: 2025-09-12 -> 12 September 2025
 */
if (!function_exists('format_tanggal')) {
    function format_tanggal($tanggal)
    {
        if (!$tanggal || $tanggal == '0000-00-00') return '-';

        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $pecah = explode('-', $tanggal);
        return $pecah[2] . ' ' . $bulan[(int)$pecah[1]] . ' ' . $pecah[0];
    }
}

/**
 * Format hari + tanggal ke format Indonesia
 * Contoh: 2025-09-12 -> Jumat, 12 September 2025
 */
if (!function_exists('format_hari_tanggal')) {
    function format_hari_tanggal($tanggal)
    {
        if (!$tanggal || $tanggal == '0000-00-00') return '-';

        $hari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $timestamp = strtotime($tanggal);
        $nama_hari = $hari[date('l', $timestamp)];

        $pecah = explode('-', date('Y-m-d', $timestamp));
        $tgl_format = $pecah[2] . ' ' . $bulan[(int)$pecah[1]] . ' ' . $pecah[0];

        return $nama_hari . ', ' . $tgl_format;
    }
}
