<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function index()
    {
        $role = $this->session->userdata('role');

        if($role == 'admin'){

            $data['total_produk']    = $this->db->count_all('produk');
            $data['total_pelanggan'] = $this->db->count_all('pelanggan');
            $data['total_order']     = $this->db->count_all('sales_order');
            $data['total_user']      = $this->db->count_all('users');

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('dashboard/admin', $data);
            $this->load->view('templates/footer');

        }elseif($role == 'sales'){

            $id_sales = $this->session->userdata('id_users');

            $data['order_saya'] = $this->db
                ->where('id_sales', $id_sales)
                ->count_all_results('sales_order');

            $data['total_produk'] = $this->db->count_all('produk');

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('dashboard/sales', $data);
            $this->load->view('templates/footer');

        }elseif($role == 'manager'){

            $data['total_order']     = $this->db->count_all('sales_order');
            $data['total_produk']    = $this->db->count_all('produk');
            $data['total_pelanggan'] = $this->db->count_all('pelanggan');

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('dashboard/manager', $data);
            $this->load->view('templates/footer');

        }else{
            redirect('login');
        }
    }
}