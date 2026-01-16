<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    // =========================
    // SIMPAN TRANSAKSI
    // =========================
    public function simpan_transaksi($data)
    {
        $this->db->insert('transaksi', $data);
                // DEBUG PENTING
        if ($this->db->affected_rows() == 0) {
            log_message('error', 'GAGAL INSERT TRANSAKSI');
            log_message('error', $this->db->last_query());
            return false;
        }
        return $this->db->insert_id();
    }

    // =========================
    // SIMPAN DETAIL TRANSAKSI
    // =========================
    public function simpan_detail($data)
    {
        return $this->db->insert('transaksi_detail', $data);
    }

    // =========================
    // AMBIL SEMUA TRANSAKSI (UNTUK HISTORY ADMIN)
    // =========================
    public function get_all_transaksi()
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('transaksi')->result_array();
    }

    // =========================
    // AMBIL DETAIL TRANSAKSI
    // =========================
    public function get_detail_transaksi($transaksi_id)
    {
        $this->db->select('transaksi_detail.*, menu.nama_menu');
        $this->db->from('transaksi_detail');
        $this->db->join('menu', 'menu.id = transaksi_detail.menu_id');
        $this->db->where('transaksi_id', $transaksi_id);
        return $this->db->get()->result_array();
    }
}
