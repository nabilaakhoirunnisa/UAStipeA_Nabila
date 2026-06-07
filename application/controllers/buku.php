<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
    }
    public function index()
    {
        $data['buku'] = $this->Buku_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');

    }
    public function tambah()
    {
        $data['kategori'] = $this->Buku_model->get_kategori();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/tambah', $data);
        $this->load->view('templates/footer');
    }
    public function simpan()
    {
       $data = [
                'kode_buku' => $this->input->post('kode_buku'),
                'judul_buku' => $this->input->post('judul_buku'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'tahun' => $this->input->post('tahun'),
                'id_kategori' => $this->input->post('kategori'),
                'stok' => $this->input->post('stok')
            ];
        $this->Buku_model->insert($data);
        redirect('buku');
    }
    public function hapus($id)
    {
        // if($this->Buku_model->is_used($id)){
            // $this->session->set_flashdata('error', 'Kategori tidak bisa dihapus karna masih digunakan');
            // } else{
                $this->Buku_model->delete($id);
                $this->session->set_flashdata('success','Data berhasil dihapus');
            // }
            redirect('buku');
    }
    public function edit($id)
    {
     $data['buku']= $this->Buku_model->get_by_id($id);
     $data['kategori'] = $this->Buku_model->get_kategori();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/edit', $data);
        $this->load->view('templates/footer');   
    }
    public function update($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul_buku','Judul Buku','required');
        if($this->form_validation->run()==FALSE){

        }else {
            $data = [
                    'kode_buku' => $this->input->post('kode_buku'),
                    'judul_buku' => $this->input->post('judul_buku'),
                    'penulis' => $this->input->post('penulis'),
                    'penerbit' => $this->input->post('penerbit'),
                    'tahun' => $this->input->post('tahun'),
                    'id_kategori' => $this->input->post('kategori'),
                    'stok' => $this->input->post('stok')
                    ];
            $this->Buku_model->update($id,$data);
            $this->session->set_flashdata('success','Data Berhasil diupdate');
            redirect('buku');
        }
    }
}