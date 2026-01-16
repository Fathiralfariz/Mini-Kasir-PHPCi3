<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard';

        $user_id = $this->session->userdata('user_id');

        $data['user'] = $this->db
            ->get_where('users', ['id' => $user_id])
            ->row_array();

        $data['title'] = "Dashboard";

        $this->load->view('templates/sidenav', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function menu() {
        $data['title'] = 'Daftar Menu';

        $user_id = $this->session->userdata('user_id');

        $data['user'] = $this->db
            ->get_where('users', ['id' => $user_id])
            ->row_array();

        $data['menu'] = $this->db->get('menu')->result_array();

        $this->load->view('templates/sidenav', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/menu', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_menu() {
        $nama_menu = $this->input->post('nama_menu');
        $harga     = $this->input->post('harga');
        $stok      = $this->input->post('stok');

        if ($nama_menu == '' || $harga == '') {
            redirect('dashboard/menu');
        }

        $this->db->insert('menu', [
            'nama_menu' => $nama_menu,
            'harga'     => $harga,
            'stok'      => $stok
        ]);

        redirect('dashboard/menu');
    }

    public function edit_menu($id) {
        $data['title'] = 'Edit Menu';
        $data['menu']  = $this->db->get_where('menu', ['id' => $id])->row_array();

        $this->load->view('templates/sidenav', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/edit_menu', $data);
        $this->load->view('templates/footer');
    }

    public function update_menu() {
        $id = $this->input->post('id');

        $data = [
            'nama_menu' => $this->input->post('nama_menu'),
            'harga'     => $this->input->post('harga'),
            'stok'      => $this->input->post('stok')
        ];

        $this->db->where('id', $id);
        $this->db->update('menu', $data);

        redirect('dashboard/menu');
    }

    // ================= HAPUS MENU =================
    public function delete_menu($id) {
        $this->db->delete('menu', ['id' => $id]);
        redirect('dashboard/menu');
    }
}