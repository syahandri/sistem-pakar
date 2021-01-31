<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Diagnosa_penyakit_Model extends CI_Model {

    public function index() {
        return $this->db->get('tblgejala')->result_array();
    }

    public function diagnosis($id_gejala, $nilai_cf) {

        // untuk menampung jika penyakit tidak ditemukan
        $kosong = [
            'nama_penyakit' => 'Tidak Ditemukan!',
            'solusi' => '-',
            'nilai_cf' => '-'
        ];

        // untuk menyimpan hasil diagnosa
        $hasil = [];

        // untuk menyimpan hasil cf kombinasi
        $cf_kombinasi = [];

        // untuk menyimpan nilai cf sementara
        $cf_old = 0;

        // jumlah gejala
        $jml_gejala = count($id_gejala);
        
        // cari semua data dari aturan dari gejala yang dipilih
        $query = "SELECT * FROM tblaturan WHERE id_gejala IN (";
        for ($i = 0; $i < $jml_gejala; $i++) {
            $query .= "'".$id_gejala[$i]."', ";
        }

        $query = rtrim($query, ', ');
        $query = $query.")";

        // cari data penyakit dan solusi dari tabel berdasarkan gejala yang dipilih kemudian bandingkan jumlah gejala yang dipilih dengan jumlah gejala yang ada pada penyakitnya
        $tampil = $this->db->query("SELECT a.id_penyakit, a.nama_penyakit,a.solusi, COUNT(a.id_gejala) as gejalaA FROM (SELECT a.id_penyakit, a.id_gejala, b.nama_penyakit, b.solusi FROM tblaturan a LEFT JOIN tblpenyakit b ON a.id_penyakit = b.id_penyakit) a LEFT JOIN ($query) b ON a.id_penyakit = b.id_penyakit and a.id_gejala = b.id_gejala GROUP BY a.id_penyakit, a.nama_penyakit HAVING COUNT(a.id_gejala) = COUNT(b.id_gejala)");

        $result = $tampil->result_array();
        $num_rows = $tampil->num_rows();

        // menghitung nilai cf
        if ($num_rows > 0) {
            $jgejala = $result[0]['gejalaA'];

            $this->db->select('cf_rule')
                    ->from('tblgejala')
                    ->where_in('id_gejala', $id_gejala);
            $data = $this->db->get()->result_array();

            for ($i = 0; $i < count($data); $i++) {
                array_push($cf_kombinasi, $data[$i]['cf_rule'] * $nilai_cf[$i]);
            }

            if (count($cf_kombinasi) == 1) {

                $cf_old = $cf_kombinasi[0] + $cf_kombinasi[0] - ($cf_kombinasi[0] * $cf_kombinasi[0]);

            } else {

                for ($j = 0; $j < count($cf_kombinasi)-1; $j++){

                    if ($j == 0) {
                        $cf_old = $cf_kombinasi[$j] + $cf_kombinasi[$j+1] - ($cf_kombinasi[$j] * $cf_kombinasi[$j+1]);
                    } else {
                        $cf_old = $cf_old + $cf_kombinasi[$j+1] - ($cf_old * $cf_kombinasi[$j+1]);
                    }
                }
            }

            $nilai_kepastian = round(($cf_old * 100), 3);
            foreach ($result as $val_result) {
                $hasil = [
                    'nama_penyakit' => $val_result['nama_penyakit'],
                    'solusi' => $val_result['solusi'],
                    'nilai_cf' => $nilai_kepastian
                ];
            }

            if ($num_rows==0 or $i!=$jgejala){
                return $kosong;
            } else {
                return $hasil;
            }
            
        } else {
            return $kosong;
        }
        
    }

    public function simpan_riwayat($nama_penyakit, $nilai_cf, $solusi) {
        $tanggal = date("Y-m-d");

        $data = [
            'tanggal' => $tanggal,
            'nama_penyakit' => $nama_penyakit,
            'solusi' => $solusi,
            'faktor_kepastian' => $nilai_cf 
        ];

        $this->db->insert('tblriwayat', $data);
        
    }
}