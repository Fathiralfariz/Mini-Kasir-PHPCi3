<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Proteksi: Jika belum login, tendang ke halaman login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        // Load Model & Library yang dibutuhkan
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    // 1. TAMPILKAN SEMUA USER
public function index()
{
    $data['title'] = "Dashboard User";

    // Ambil data user yang sedang login dari session
    $data['user'] = [
        'username'   => $this->session->userdata('username'),
        'email'      => $this->session->userdata('email'),
        'role'       => $this->session->userdata('role'),
        'created_at' => $this->session->userdata('created_at')
    ];

        $this->load->view('templates/sidenav', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/profile', $data);
        $this->load->view('templates/footer', $data);
}


    // 2. TAMBAH USER
    public function add() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah User Baru";
            $this->load->view('user/add', $data);
        } else {
            $insert_data = [
                'username' => $this->input->post('username'),
                'email'    => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role'     => $this->input->post('role')
            ];
            $this->User_model->insert_user($insert_data);
            $this->session->set_flashdata('success', 'User berhasil ditambahkan!');
            redirect('user');
        }
    }

    // 3. EDIT USER
    public function edit($id) {
        $data['user_to_edit'] = $this->User_model->get_user_by_id($id);
        
        // Jika ID tidak ditemukan
        if (!$data['user_to_edit']) {
            show_404();
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Edit User";
            $this->load->view('user/edit', $data);
        } else {
            $update_data = [
                'username' => $this->input->post('username'),
                'email'    => $this->input->post('email'),
                'role'     => $this->input->post('role')
            ];
            
            // Update password hanya jika diisi
            if ($this->input->post('password')) {
                $update_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $this->User_model->update_user($id, $update_data);
            $this->session->set_flashdata('success', 'Data user berhasil diperbarui!');
            redirect('user');
        }
    }

    // 4. HAPUS USER
    public function delete($id) {
        // Mencegah menghapus diri sendiri yang sedang login
        if ($id == $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Anda tidak bisa menghapus akun sendiri!');
        } else {
            $this->User_model->delete_user($id);
            $this->session->set_flashdata('success', 'User berhasil dihapus!');
        }
        redirect('user');
    }
}