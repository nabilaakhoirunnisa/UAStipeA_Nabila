<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class whatsapp extends CI_Controller {

    public function kirim_notifikasi($id)
    {
        // ambil data peminjaman + anggota
        $this->db->select('
            peminjaman.*,
            anggota.nama,
            anggota.telepon
        ');

        $this->db->from('peminjaman');

        $this->db->join(
            'anggota',
            'anggota.nomor_anggota = peminjaman.anggota_id'
        );

        // berdasarkan id peminjaman
        $this->db->where('peminjaman.id', $id);

        $d = $this->db->get()->row();

        // jika data tidak ada
        if(!$d){
            show_404();
        }

        // tanggal hari ini
        $today = date('Y-m-d');

        // hitung keterlambatan
        $selisih = strtotime($today) - strtotime($d->tanggal_jatuh_tempo);

        $terlambat = $selisih > 0
            ? floor($selisih / 86400)
            : 0;

        // hanya kirim jika terlambat
        if($terlambat > 0){

            $pesan =
                "Halo ".$d->nama.", ".
                "Anda terlambat mengembalikan buku selama ".
                $terlambat." hari. ".
                "Mohon segera mengembalikan buku ke perpustakaan. Terima kasih.";

            // kirim WA
            $this->kirim_wa(
                $d->telepon,
                $pesan
            );

            $this->session->set_flashdata(
                'success',
                'Notifikasi WhatsApp berhasil dikirim'
            );

        } else {

            $this->session->set_flashdata(
                'error',
                'Anggota belum terlambat mengembalikan buku'
            );
        }

        redirect('peminjaman');
    }

    // ==================================
    // FUNCTION KIRIM WHATSAPP
    // ==================================
    private function kirim_wa($target, $message)
    {
        $token = "VDHaahKfEgAkNHmaNjHv";

        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => 'https://api.fonnte.com/send',

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_POST => true,

            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $message,
            ),

            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}