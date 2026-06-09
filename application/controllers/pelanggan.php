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
        $data['pelanggan'] = $this->db->get('pelanggan')->result();

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

        if($this->input->post()){

            $update = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'alamat'         => $this->input->post('alamat'),
                'telepon'        => $this->input->post('telepon')
            ];

            $this->db->where('id_pelanggan', $id);
            $this->db->update('pelanggan', $update);

            $this->session->set_flashdata(
                'success',
                'Data pelanggan berhasil diubah'
            );

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