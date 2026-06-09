<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')){
            redirect('login');
        }

        if($this->session->userdata('role') != 'admin'){
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['users'] = $this->db->get('users')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('manajemen_users/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        if($this->input->post()){

            $data = [
                'nama'     => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'role'     => $this->input->post('role')
            ];

            $this->db->insert('users', $data);

            $this->session->set_flashdata(
                'success',
                'Data user berhasil ditambahkan'
            );

            redirect('manajemen_users');
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('manajemen_users/tambah');
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['user'] = $this->db
            ->get_where('users', ['id' => $id])
            ->row();

        if($this->input->post()){

            $update = [
                'nama'     => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'role'     => $this->input->post('role')
            ];

            $this->db->where('id', $id);
            $this->db->update('users', $update);

            $this->session->set_flashdata(
                'success',
                'Data user berhasil diubah'
            );

            redirect('manajemen_users');
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('manajemen_users/edit', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');

        $this->session->set_flashdata(
            'success',
            'Data user berhasil dihapus'
        );

        redirect('manajemen_users');
    }
}