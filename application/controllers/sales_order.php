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
        $this->db->select('sales_order.*, pelanggan.nama_pelanggan');
        $this->db->from('sales_order');
        $this->db->join(
            'pelanggan',
            'pelanggan.id_pelanggan = sales_order.id_pelanggan'
        );
        $this->db->where('sales_order.id_order', $id);

        if($this->session->userdata('role') == 'sales'){
            $this->db->where(
                'sales_order.id_sales',
                $this->session->userdata('id_users')
            );
        }

        $data['order'] = $this->db->get()->row();

if(!$data['order']){
    show_404();
}

$data['produk'] = $this->db->get('produk')->result();

$this->db->select('sales_order_detail.*, produk.nama_produk');
$this->db->from('sales_order_detail');
$this->db->join(
    'produk',
    'produk.id_produk = sales_order_detail.id_produk'
);
$this->db->where('id_order', $id);

$data['detail_produk'] = $this->db->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales_order/detail', $data);
        $this->load->view('templates/footer');
    }

public function tambah_produk($id_order)
{
    $produk = $this->db->get_where(
        'produk',
        ['id_produk' => $this->input->post('id_produk')]
    )->row();

    $qty = $this->input->post('qty');
    $subtotal = $produk->harga * $qty;

    $data = [
        'id_order'  => $id_order,
        'id_produk' => $produk->id_produk,
        'qty'       => $qty,
        'harga'     => $produk->harga,
        'subtotal'  => $subtotal
    ];

    $this->db->insert('sales_order_detail', $data);

    $this->db->select_sum('subtotal');
    $this->db->where('id_order', $id_order);
    $total = $this->db->get('sales_order_detail')->row()->subtotal;

    $this->db->where('id_order', $id_order);
    $this->db->update('sales_order', [
        'total_harga' => $total
    ]);

    redirect('sales_order/detail/'.$id_order);
}

public function hapus_produk($id_detail)
{
    $detail = $this->db->get_where(
        'sales_order_detail',
        ['id_detail' => $id_detail]
    )->row();

    $id_order = $detail->id_order;

    $this->db->delete(
        'sales_order_detail',
        ['id_detail' => $id_detail]
    );

    $this->db->select_sum('subtotal');
    $this->db->where('id_order', $id_order);
    $total = $this->db->get('sales_order_detail')->row()->subtotal;

    $this->db->where('id_order', $id_order);
    $this->db->update('sales_order', [
        'total_harga' => $total ? $total : 0
    ]);

    redirect('sales_order/detail/'.$id_order);
}
    public function ubah_status($id_order)
{
    $status = $this->input->post('status');

    $this->db->where('id_order', $id_order);
    $this->db->update('sales_order', [
        'status' => $status
    ]);

    redirect('sales_order/detail/'.$id_order);
}
}