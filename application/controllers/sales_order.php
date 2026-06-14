<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')){
            redirect('login');
        }

        // Manager tidak punya akses ke sales order
        if($this->session->userdata('role') == 'manager'){
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->db->select('sales_order.*, pelanggan.nama_pelanggan, users.nama as nama_sales');
        $this->db->from('sales_order');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sales_order.id_pelanggan');
        $this->db->join('users', 'users.id = sales_order.id_sales');

        // Sales hanya lihat order miliknya
        if($this->session->userdata('role') == 'sales'){
            $this->db->where('sales_order.id_sales', $this->session->userdata('id_users'));
        }

        $this->db->order_by('sales_order.id_order', 'DESC');
        $data['order'] = $this->db->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales_order/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // Hanya sales yang bisa buat order
        if($this->session->userdata('role') != 'sales'){
            redirect('sales_order');
        }

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
        $this->db->select('sales_order.*, pelanggan.nama_pelanggan, users.nama as nama_sales');
        $this->db->from('sales_order');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sales_order.id_pelanggan');
        $this->db->join('users', 'users.id = sales_order.id_sales');
        $this->db->where('sales_order.id_order', $id);

        // Sales hanya bisa lihat order miliknya
        if($this->session->userdata('role') == 'sales'){
            $this->db->where('sales_order.id_sales', $this->session->userdata('id_users'));
        }

        $data['order'] = $this->db->get()->row();

        if(!$data['order']){
            show_404();
        }

        $data['produk'] = $this->db->get('produk')->result();

        $this->db->select('sales_order_detail.*, produk.nama_produk');
        $this->db->from('sales_order_detail');
        $this->db->join('produk', 'produk.id_produk = sales_order_detail.id_produk');
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
        // Hanya sales yang bisa tambah produk, dan hanya order miliknya
        if($this->session->userdata('role') != 'sales'){
            redirect('sales_order/detail/'.$id_order);
        }

        // Cek order masih draft dan milik sales ini
        $order = $this->db->get_where('sales_order', [
            'id_order'  => $id_order,
            'id_sales'  => $this->session->userdata('id_users'),
            'status'    => 'draft'
        ])->row();

        if(!$order){
            redirect('sales_order/detail/'.$id_order);
        }

        $produk = $this->db->get_where('produk', [
            'id_produk' => $this->input->post('id_produk')
        ])->row();

        $qty      = $this->input->post('qty');
        $subtotal = $produk->harga * $qty;

        $this->db->insert('sales_order_detail', [
            'id_order'  => $id_order,
            'id_produk' => $produk->id_produk,
            'qty'       => $qty,
            'harga'     => $produk->harga,
            'subtotal'  => $subtotal
        ]);

        // Recalculate total
        $total = $this->db->select_sum('subtotal')
            ->where('id_order', $id_order)
            ->get('sales_order_detail')
            ->row()->subtotal;

        $this->db->where('id_order', $id_order);
        $this->db->update('sales_order', ['total_harga' => $total]);

        redirect('sales_order/detail/'.$id_order);
    }

    public function hapus_produk($id_detail)
    {
        // Hanya sales yang bisa hapus produk
        if($this->session->userdata('role') != 'sales'){
            redirect('sales_order');
        }

        $detail = $this->db->get_where('sales_order_detail', [
            'id_detail' => $id_detail
        ])->row();

        if(!$detail){
            redirect('sales_order');
        }

        $id_order = $detail->id_order;

        // Pastikan order masih draft dan milik sales ini
        $order = $this->db->get_where('sales_order', [
            'id_order'  => $id_order,
            'id_sales'  => $this->session->userdata('id_users'),
            'status'    => 'draft'
        ])->row();

        if(!$order){
            redirect('sales_order/detail/'.$id_order);
        }

        $this->db->delete('sales_order_detail', ['id_detail' => $id_detail]);

        // Recalculate total
        $total = $this->db->select_sum('subtotal')
            ->where('id_order', $id_order)
            ->get('sales_order_detail')
            ->row()->subtotal;

        $this->db->where('id_order', $id_order);
        $this->db->update('sales_order', ['total_harga' => $total ? $total : 0]);

        redirect('sales_order/detail/'.$id_order);
    }

    public function kirim($id_order)
    {
        // Hanya sales yang bisa kirim, dan hanya order miliknya yang masih draft
        if($this->session->userdata('role') != 'sales'){
            redirect('sales_order/detail/'.$id_order);
        }

        $order = $this->db->get_where('sales_order', [
            'id_order'  => $id_order,
            'id_sales'  => $this->session->userdata('id_users'),
            'status'    => 'draft'
        ])->row();

        if(!$order){
            redirect('sales_order/detail/'.$id_order);
        }

        // Pastikan ada produk sebelum dikirim
        $jumlah_produk = $this->db->where('id_order', $id_order)
            ->count_all_results('sales_order_detail');

        if($jumlah_produk == 0){
            $this->session->set_flashdata('error', 'Tidak bisa mengirim order kosong, tambahkan produk terlebih dahulu');
            redirect('sales_order/detail/'.$id_order);
        }

        $this->db->where('id_order', $id_order);
        $this->db->update('sales_order', ['status' => 'dikirim']);

        $this->session->set_flashdata('success', 'Order berhasil dikirim');
        redirect('sales_order/detail/'.$id_order);
    }

    public function batalkan($id_order)
    {
    $role = $this->session->userdata('role');

    // Hanya sales yang bisa batalkan, dan hanya order miliknya yang masih draft
    if($role == 'sales'){
        $order = $this->db->get_where('sales_order', [
            'id_order'  => $id_order,
            'id_sales'  => $this->session->userdata('id_users'),
            'status'    => 'draft'
        ])->row();
    } elseif($role == 'admin'){
        // Admin pun hanya bisa batalkan yang masih draft
        $order = $this->db->get_where('sales_order', [
            'id_order' => $id_order,
            'status'   => 'draft'
        ])->row();
    } else {
        redirect('sales_order');
    }

    if(!$order){
        $this->session->set_flashdata('error', 'Order tidak dapat dibatalkan');
        redirect('sales_order/detail/'.$id_order);
    }

    $this->db->where('id_order', $id_order);
    $this->db->update('sales_order', ['status' => 'dibatalkan']);

    $this->session->set_flashdata('success', 'Order berhasil dibatalkan');
    redirect('sales_order/detail/'.$id_order);
    }

    public function selesaikan($id_order)
    {
    // Hanya admin yang bisa selesaikan order
    if($this->session->userdata('role') != 'admin'){
        redirect('sales_order/detail/'.$id_order);
    }

    $order = $this->db->get_where('sales_order', [
        'id_order' => $id_order,
        'status'   => 'dikirim'
    ])->row();

    if(!$order){
        redirect('sales_order/detail/'.$id_order);
    }

    // Ambil semua produk di order ini
    $detail = $this->db->get_where('sales_order_detail', [
        'id_order' => $id_order
    ])->result();

    // Kurangi stok tiap produk
    foreach($detail as $d){
        $this->db->query(
            "UPDATE produk SET stok = stok - ? WHERE id_produk = ?",
            [$d->qty, $d->id_produk]
        );
    }

    // Update status order jadi selesai
    $this->db->where('id_order', $id_order);
    $this->db->update('sales_order', ['status' => 'selesai']);

    $this->session->set_flashdata('success', 'Order berhasil diselesaikan dan stok produk telah diperbarui');
    redirect('sales_order/detail/'.$id_order);
    }

    public function hapus($id_order)
    {
        // Hanya admin yang bisa hapus order
        if($this->session->userdata('role') != 'admin'){
            redirect('sales_order');
        }

        $this->db->delete('sales_order_detail', ['id_order' => $id_order]);
        $this->db->delete('sales_order', ['id_order' => $id_order]);

        $this->session->set_flashdata('success', 'Sales order berhasil dihapus');
        redirect('sales_order');
    }
}