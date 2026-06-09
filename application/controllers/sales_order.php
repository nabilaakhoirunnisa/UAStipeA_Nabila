<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function index()
    {
        if($this->session->userdata('role') == 'sales'){

            $this->db->where(
                'id_sales',
                $this->session->userdata('id_users')
            );
        }

        $this->db->select('sales_order.*, pelanggan.nama_pelanggan');
        $this->db->from('sales_order');
        $this->db->join(
            'pelanggan',
            'pelanggan.id_pelanggan = sales_order.id_pelanggan'
        );

        $data['order'] = $this->db->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales_order/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['pelanggan'] = $this->db->get('pelanggan')->result();

        if($this->input->post()){

            $insert = [
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'id_sales'     => $this->session->userdata('id_users'),
                'tanggal'      => date('Y-m-d'),
                'total_harga'  => 0,
                'status'       => 'draft'
            ];

            $this->db->insert('sales_order', $insert);

            $id_order = $this->db->insert_id();

            redirect('sales_order/detail/'.$id_order);
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales_order/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        echo "Detail Order : ".$id;
    }
}