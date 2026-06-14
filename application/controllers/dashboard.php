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

    // Total penjualan hanya dari order yang sudah selesai
    $row = $this->db
        ->select_sum('total_harga')
        ->where('status', 'selesai')
        ->get('sales_order')
        ->row();
    $data['total_penjualan_selesai'] = $row->total_harga ?? 0;

    // Data grafik penjualan 7 hari terakhir
    $grafik = $this->db->query("
        SELECT DATE(tanggal) as tgl, SUM(total_harga) as total
        FROM sales_order
        WHERE tanggal >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
          AND status != 'dibatalkan'
        GROUP BY DATE(tanggal)
        ORDER BY tgl ASC
    ")->result();

    // Buat array 7 hari lengkap, isi 0 kalau tidak ada data
    $map = [];
    foreach ($grafik as $g) {
        $map[$g->tgl] = $g->total;
    }
    $grafik_labels = [];
    $grafik_data   = [];
    for ($i = 6; $i >= 0; $i--) {
        $tgl = date('Y-m-d', strtotime("-$i days"));
        $grafik_labels[] = date('d M', strtotime($tgl));
        $grafik_data[]   = $map[$tgl] ?? 0;
    }
    $data['grafik_labels'] = json_encode($grafik_labels);
    $data['grafik_data']   = json_encode($grafik_data);

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

            $data['selesai'] = $this->db
                ->where('id_sales', $id_sales)
                ->where('status', 'selesai')
                ->count_all_results('sales_order');

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('dashboard/sales', $data);
            $this->load->view('templates/footer');

        }elseif($role == 'manager'){

            $data['total_order']     = $this->db->count_all('sales_order');
            $data['total_produk']    = $this->db->count_all('produk');
            $data['total_pelanggan'] = $this->db->count_all('pelanggan');
            $data['total_user']      = $this->db->count_all('users');

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