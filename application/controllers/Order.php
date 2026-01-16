<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model(['Menu_model','Order_model']);
    }


    
    public function index()
    {
        $data['menu'] = $this->Menu_model->get_all();
        $this->load->view('user/order', $data);
    }

    public function add_cart()
    {
        $id = $this->input->post('id');
        $menu = $this->Menu_model->get_by_id($id);
        $cart = $this->session->userdata('cart') ?? [];

        if(isset($cart[$id])){
            if($cart[$id]['qty'] < $menu->stok){
                $cart[$id]['qty']++;
            }
        } else {
            $cart[$id] = [
                'id'=>$menu->id,
                'nama'=>$menu->nama_menu,
                'harga'=>$menu->harga,
                'qty'=>1
            ];
        }

        $this->session->set_userdata('cart',$cart);
        echo json_encode($cart);
    }

    public function clear_cart()
    {
    $this->session->unset_userdata('cart');
    echo json_encode(['status' => 'ok']);
    }

    public function minus_cart()
    {
        $id = $this->input->post('id');
        $cart = $this->session->userdata('cart');

        if(isset($cart[$id])){
            $cart[$id]['qty']--;
            if($cart[$id]['qty'] <= 0){
                unset($cart[$id]);
            }
        }

        $this->session->set_userdata('cart',$cart);
        echo json_encode($cart);
    }

    public function get_cart()
    {
        echo json_encode($this->session->userdata('cart'));
    }

    // ================= PEMBAYARAN =================

    public function bayar_qris()
    {
        $this->proses_bayar('QRIS');
        redirect('order/qris');
    }

    public function bayar_tunai()
    {
        $this->proses_bayar('TUNAI');
        redirect('order/success');
    }

private function proses_bayar($metode)
{
    // AMBIL CART DARI SESSION
    $cart = $this->session->userdata('cart');

    if (empty($cart)) {
        redirect('order');
    }

    $subtotal = 0;
    foreach ($cart as $c) {
        $subtotal += $c['harga'] * $c['qty'];
    }

    $pajak = $subtotal * 0.1;
    $grand = $subtotal + $pajak;

    // SIMPAN TRANSAKSI
    $transaksi_id = $this->Order_model->simpan_transaksi([
        'total' => $subtotal,
        'pajak' => $pajak,
        'grand_total' => $grand,
        'metode_pembayaran' => $metode,
        'created_at' => date('Y-m-d H:i:s')
    ]);

    // VALIDASI INSERT
    if (!$transaksi_id) {
        show_error('Gagal menyimpan transaksi');
    }

    // SIMPAN DETAIL + KURANGI STOK
    foreach ($cart as $c) {
        $this->Order_model->simpan_detail([
            'transaksi_id' => $transaksi_id,
            'menu_id' => $c['id'],
            'harga' => $c['harga'],
            'qty' => $c['qty']
        ]);

        $this->Menu_model->update_stok($c['id'], $c['qty']);
    }

    // HAPUS CART
    $this->session->unset_userdata('cart');
}


    public function qris()
    {
        $this->load->view('user/qris');
    }

    public function success()
    {
        $this->load->view('user/success');
    }
}
