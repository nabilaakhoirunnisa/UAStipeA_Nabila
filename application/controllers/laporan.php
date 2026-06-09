<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('login');
        }

        if($this->session->userdata('role') != 'manager'){
            redirect('dashboard');
        }
    }

    public function penjualan()
    {
        $tanggal_awal  = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        $this->db->select('sales_order.*, pelanggan.nama_pelanggan');
        $this->db->from('sales_order');
        $this->db->join(
            'pelanggan',
            'pelanggan.id_pelanggan = sales_order.id_pelanggan'
        );

        if(!empty($tanggal_awal) && !empty($tanggal_akhir)){
            $this->db->where('sales_order.tanggal >=', $tanggal_awal);
            $this->db->where('sales_order.tanggal <=', $tanggal_akhir);
        }

        $data['laporan'] = $this->db->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/penjualan', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_penjualan()
    {
        $tanggal_awal  = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        $this->db->select('sales_order.*, pelanggan.nama_pelanggan');
        $this->db->from('sales_order');
        $this->db->join(
            'pelanggan',
            'pelanggan.id_pelanggan = sales_order.id_pelanggan'
        );

        if(!empty($tanggal_awal) && !empty($tanggal_akhir)){
            $this->db->where('sales_order.tanggal >=', $tanggal_awal);
            $this->db->where('sales_order.tanggal <=', $tanggal_akhir);
        }

        $data['laporan'] = $this->db->get()->result();

        $this->load->view('laporan/cetak_penjualan', $data);
    }
    public function produk()
{
    $this->db->select('
        produk.nama_produk,
        SUM(sales_order_detail.qty) as total_qty,
        SUM(sales_order_detail.subtotal) as total_penjualan
    ');

    $this->db->from('sales_order_detail');

    $this->db->join(
        'produk',
        'produk.id_produk = sales_order_detail.id_produk'
    );

    $this->db->group_by('produk.id_produk');

    $data['laporan'] = $this->db->get()->result();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('laporan/produk', $data);
    $this->load->view('templates/footer');
}

public function sales()
{
    $this->db->select('
        users.nama,
        COUNT(sales_order.id_order) as jumlah_order,
        SUM(sales_order.total_harga) as total_penjualan
    ');

    $this->db->from('sales_order');

    $this->db->join(
        'users',
        'users.id = sales_order.id_sales'
    );

    $this->db->group_by('sales_order.id_sales');

    $data['laporan'] = $this->db->get()->result();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('laporan/sales', $data);
    $this->load->view('templates/footer');
}

public function cetak_produk()
{
    $this->db->select('
        produk.nama_produk,
        SUM(sales_order_detail.qty) as total_qty,
        SUM(sales_order_detail.subtotal) as total_penjualan
    ');

    $this->db->from('sales_order_detail');

    $this->db->join(
        'produk',
        'produk.id_produk = sales_order_detail.id_produk'
    );

    $this->db->group_by('produk.id_produk');

    $data['laporan'] = $this->db->get()->result();

    $this->load->view('laporan/cetak_produk', $data);
}

public function cetak_sales()
{
    $this->db->select('
        users.nama,
        COUNT(sales_order.id_order) as jumlah_order,
        SUM(sales_order.total_harga) as total_penjualan
    ');

    $this->db->from('sales_order');

    $this->db->join(
        'users',
        'users.id = sales_order.id_sales'
    );

    $this->db->group_by('sales_order.id_sales');

    $data['laporan'] = $this->db->get()->result();

    $this->load->view('laporan/cetak_sales', $data);
}
    }