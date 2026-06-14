<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')){
            redirect('login');
        }

        // Hanya admin yang boleh mengelola pelanggan
        if($this->session->userdata('role') != 'admin'){
            redirect('dashboard');
        }
    }

    public function index()
    {
    $data['pelanggan'] = $this->db
        ->select('p.*, COALESCE(SUM(so.total_harga),0) as total_pembelian, COUNT(so.id_order) as jumlah_order')
        ->from('pelanggan p')
        ->join('sales_order so', 'so.id_pelanggan = p.id_pelanggan AND so.status != \'dibatalkan\'', 'left')
        ->group_by('p.id_pelanggan')
        ->get()
        ->result();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('pelanggan/index', $data);
    $this->load->view('templates/footer');
    }

    public function tambah()
    {
        if($this->input->post()){

            $data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'alamat'         => $this->input->post('alamat'),
                'telepon'        => $this->input->post('telepon')
            ];

            $this->db->insert('pelanggan', $data);

            $this->session->set_flashdata(
                'success',
                'Data pelanggan berhasil ditambahkan'
            );

            redirect('pelanggan');
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pelanggan/tambah');
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
    $data['pelanggan'] = $this->db
        ->get_where('pelanggan', ['id_pelanggan' => $id])
        ->row();

    // Ambil riwayat order pelanggan ini
    $data['riwayat_order'] = $this->db
        ->select('so.id_order, so.tanggal, so.total_harga, so.status')
        ->from('sales_order so')
        ->where('so.id_pelanggan', $id)
        ->order_by('so.tanggal', 'DESC')
        ->get()
        ->result();

    // Hitung total pembelian (exclude dibatalkan)
    $row = $this->db
        ->select_sum('total_harga')
        ->where('id_pelanggan', $id)
        ->where('status !=', 'dibatalkan')
        ->get('sales_order')
        ->row();
    $data['total_pembelian'] = $row->total_harga ?? 0;

    if($this->input->post()){
        $update = [
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'alamat'         => $this->input->post('alamat'),
            'telepon'        => $this->input->post('telepon')
        ];

        $this->db->where('id_pelanggan', $id);
        $this->db->update('pelanggan', $update);

        $this->session->set_flashdata('success', 'Data pelanggan berhasil diubah');
        redirect('pelanggan');
    }

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('pelanggan/edit', $data);
    $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->db->where('id_pelanggan', $id);
        $this->db->delete('pelanggan');

        $this->session->set_flashdata(
            'success',
            'Data pelanggan berhasil dihapus'
        );

        redirect('pelanggan');
    }
}