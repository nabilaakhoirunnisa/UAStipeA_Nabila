<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Cek login berdasarkan username & password
     * Struktur tabel users: id, nama, username, password, role
     */
    public function cek_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password); // ganti md5() jika password di-hash
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return $query->row();
        }
        return false;
    }
}