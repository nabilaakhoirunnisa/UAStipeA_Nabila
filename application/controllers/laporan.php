<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function peminjaman()
    {
        $bulan= $this->input->get('bulan');
        
        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.nomor_anggota = peminjaman.anggota_id');

        if($bulan){
            $this->db->where('DATE_FORMAT(tanggal_pinjam,"%Y-%m")=', $bulan);
        }
        $data['data']= $this->db->get()->result();
        $data['bulan']= $bulan;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/peminjaman', $data);
        $this->load->view('templates/footer'); 
    }


public function buku()
{
    $keyword = $this->input->get('keyword');

    $this->db->from('buku');

    if($keyword){
        $this->db->like('judul_buku', $keyword);
    }

    $data['buku'] = $this->db->get()->result();
    $data['keyword'] = $keyword;
    $data['title'] = 'laporan buku';

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('laporan/buku', $data);
    $this->load->view('templates/footer');
}

public function cetak_buku()
{
    $data['buku'] = $this->db->get('buku')->result();

    $this->load->view('laporan/cetak_buku', $data);
}

public function anggota()
{
    $keyword = $this->input->get('keyword');

    $this->db->from('anggota');

    if($keyword){
        $this->db->like('nama', $keyword);
    }

    $this->db->order_by('nomor_anggota', 'DESC');

    $data['anggota'] = $this->db->get()->result();
    $data['keyword'] = $keyword;
    $data['title'] = 'laporan anggota';

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('laporan/anggota', $data);
    $this->load->view('templates/footer');
}

public function cetak_anggota()
{
    $data['anggota'] = $this->db->get('anggota')->result();

    $this->load->view('laporan/cetak_anggota', $data);
}
}