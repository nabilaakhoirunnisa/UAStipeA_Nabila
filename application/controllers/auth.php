<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        // Jika sudah login, langsung ke dashboard
        if ($this->session->userdata('login')) {
            redirect('dashboard');
        }
        $this->load->view('auth/login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Auth_model->cek_login($username, $password);

        if ($user) {
            // Kolom PK tabel users adalah "id"
            $data = [
                'id_users' => $user->id,
                'nama'     => $user->nama,
                'username' => $user->username,
                'role'     => $user->role,
                'login'    => TRUE
            ];

            $this->session->set_userdata($data);
            redirect('dashboard');

        } else {
            $this->session->set_flashdata('error', 'Username atau Password Salah!');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}