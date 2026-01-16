<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // proteksi login (opsional tapi disarankan)
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

public function index()
{
    $data['title'] = 'History Transaksi';

    $this->load->model('Order_model');

    // ambil data transaksi dari database
    $data['transaksi'] = $this->Order_model->get_all_transaksi();

    $this->load->view('templates/sidenav', $data);
    $this->load->view('templates/header', $data);
    $this->load->view('dashboard/history', $data);
    $this->load->view('templates/footer');

}
}