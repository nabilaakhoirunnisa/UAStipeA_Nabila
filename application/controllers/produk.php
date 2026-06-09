<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')){
            redirect('login');
        }

        // Hanya admin yang boleh mengelola produk
        if($this->session->userdata('role') != 'admin'){
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['produk'] = $this->db->get('produk')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        if($this->input->post()){

            $data = [
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok')
            ];

            $this->db->insert('produk', $data);

            $this->session->set_flashdata(
                'success',
                'Data produk berhasil ditambahkan'
            );

            redirect('produk');
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/tambah');
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['produk'] = $this->db
            ->get_where('produk', ['id_produk' => $id])
            ->row();

        if($this->input->post()){

            $update = [
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok')
            ];

            $this->db->where('id_produk', $id);
            $this->db->update('produk', $update);

            $this->session->set_flashdata(
                'success',
                'Data produk berhasil diubah'
            );

            redirect('produk');
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/edit', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');

        $this->session->set_flashdata(
            'success',
            'Data produk berhasil dihapus'
        );

        redirect('produk');
    }
}