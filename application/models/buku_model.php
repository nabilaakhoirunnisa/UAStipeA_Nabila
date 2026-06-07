<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    private $table = 'buku';

    public function get_all()
    {
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.id_kategori');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['kode_buku'=>$id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['kode_buku'=>$id]);
    }

    public function update($id, $data)
    {
        $this->db->where('kode_buku',$id);
        return $this->db->update($this->table, $data);
    }

    public function get_kategori()
    {
        return $this->db->get('kategori')->result();
    }
}