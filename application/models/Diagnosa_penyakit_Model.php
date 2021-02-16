<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Diagnosa_penyakit_Model extends CI_Model {

    public function index() {
        return $this->db->get('tblgejala')->result_array();
    }

    // public function diagnosis($id_gejala, $nilai_cf) {

    //     // untuk menampung jika penyakit tidak ditemukan
    //     $kosong = [
    //         'nama_penyakit' => 'Tidak Ditemukan!',
    //         'solusi' => '-',
    //         'nilai_cf' => '-'
    //     ];

    //     // untuk menyimpan hasil diagnosa
    //     $hasil = [];

    //     // untuk menyimpan hasil cf kombinasi
    //     $cf_kombinasi = [];

    //     // untuk menyimpan nilai cf sementara
    //     $cf_old = 0;

    //     // jumlah gejala
    //     $jml_gejala = count($id_gejala);
        
    //     // cari semua data dari aturan dari gejala yang dipilih
    //     $query = "SELECT * FROM tblaturan WHERE id_gejala IN (";
    //     for ($i = 0; $i < $jml_gejala; $i++) {
    //         $query .= "'".$id_gejala[$i]."', ";
    //     }

    //     $query = rtrim($query, ', ');
    //     $query = $query.")";

    //     // cari data penyakit dan solusi dari tabel berdasarkan gejala yang dipilih kemudian bandingkan jumlah gejala yang dipilih dengan jumlah gejala yang ada pada penyakitnya
    //     $tampil = $this->db->query("SELECT a.id_penyakit, a.nama_penyakit,a.solusi, COUNT(a.id_gejala) as gejalaA FROM (SELECT a.id_penyakit, a.id_gejala, b.nama_penyakit, b.solusi FROM tblaturan a LEFT JOIN tblpenyakit b ON a.id_penyakit = b.id_penyakit) a LEFT JOIN ($query) b ON a.id_penyakit = b.id_penyakit and a.id_gejala = b.id_gejala GROUP BY a.id_penyakit, a.nama_penyakit HAVING COUNT(a.id_gejala) = COUNT(b.id_gejala)");

    //     $result = $tampil->result_array();
    //     $num_rows = $tampil->num_rows();

    //     // menghitung nilai cf
    //     if ($num_rows > 0) {
    //         $jgejala = $result[0]['gejalaA'];

    //         $this->db->select('cf_rule')
    //                 ->from('tblgejala')
    //                 ->where_in('id_gejala', $id_gejala);
    //         $data = $this->db->get()->result_array();

    //         for ($i = 0; $i < count($data); $i++) {
    //             array_push($cf_kombinasi, $data[$i]['cf_rule'] * $nilai_cf[$i]);
    //         }

    //         if (count($cf_kombinasi) == 1) {

    //             $cf_old = $cf_kombinasi[0] + $cf_kombinasi[0] - ($cf_kombinasi[0] * $cf_kombinasi[0]);

    //         } else {

    //             for ($j = 0; $j < count($cf_kombinasi)-1; $j++){

    //                 if ($j == 0) {
    //                     $cf_old = $cf_kombinasi[$j] + $cf_kombinasi[$j+1] - ($cf_kombinasi[$j] * $cf_kombinasi[$j+1]);
    //                 } else {
    //                     $cf_old = $cf_old + $cf_kombinasi[$j+1] - ($cf_old * $cf_kombinasi[$j+1]);
    //                 }
    //             }
    //         }

    //         $nilai_kepastian = round(($cf_old * 100), 3);
    //         foreach ($result as $val_result) {
    //             $hasil = [
    //                 'nama_penyakit' => $val_result['nama_penyakit'],
    //                 'solusi' => $val_result['solusi'],
    //                 'nilai_cf' => $nilai_kepastian
    //             ];
    //         }

    //         if ($num_rows==0 or $i!=$jgejala){
    //             return $kosong;
    //         } else {
    //             return $hasil;
    //         }
            
    //     } else {
    //         return $kosong;
    //     }
        
    // }

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

    public function diagnosis($gejala, $cf_user) {
        // $gejala = ['G10','G20','G22','G25'];
        // $cf_user = [0.6, 0.8, 0.8, 0.2];

        // variabel id_penyakit
        $id_penyakit;

        // cari data penyakit berdasarkan gejala yang dipilih
        $this->db->select('id_penyakit');
        $this->db->where_in('id_gejala', $gejala);
        $this->db->group_by('id_penyakit');
        $penyakit = $this->db->get('tblaturan')->result_array();

        // hapus semua data dari tabel temporary
        $this->db->empty_table('temppenyakit');
        $this->db->empty_table('tempgejala');
        $this->db->empty_table('temphasil');

        // cari penyakit, gejala, dan nilai cf rule
        // berdasarkan gejala yang dipilih dan penyakit yang didapatkan dari proses sebelumnya
        foreach($penyakit as $val) {
            $id_penyakit = $val['id_penyakit'];

            $this->db->select('tblaturan.id_penyakit, tblaturan.id_gejala, tblgejala.cf_rule');
            $this->db->from('tblaturan');
            $this->db->join('tblgejala', 'tblaturan.id_gejala = tblgejala.id_gejala');
            $this->db->where_in('tblaturan.id_gejala', $gejala);
            $this->db->where('tblaturan.id_penyakit', $id_penyakit);
            $query = $this->db->get();

            $jml = $query->num_rows();
            $query = $query->result_array();

            foreach($query as $q) {
                $p = $q['id_penyakit'];
                $g = $q['id_gejala'];
                $c = $q['cf_rule'];

                // simpan hasilnya ke tabel temp penyakit
                $this->db->query("INSERT INTO temppenyakit VALUES ('$p', '$g', '$c')");
            }
        }

        // simpan gejala dan nilai cf dari pengguna ke tabel temp gejala
        for($i = 0; $i < count($gejala); $i++) {
            $data = [
                'id_gejala' => $gejala[$i],
                'nilai_cf' => $cf_user[$i]
            ];

            $this->db->insert('tempgejala', $data);
        }

        // proses hitung cf kombinasi
        foreach($penyakit as $val_p) {
            // hitung jumlah penyakit yang didapatkan
            // berdasarkan dari tiap-tiap penyakit
            $this->db->select("COUNT(id_penyakit) AS jml_penyakit");
            $this->db->where('id_penyakit', $val_p['id_penyakit']);
            $jml_p =  $this->db->get('vcfkombinasi')->result_array();

            foreach($jml_p as $jp) {
                foreach($jp as $val_jp) {
                    // jika jumlah penyakit = 1
                    // hitung nilai cf-nya sekali saja
                    if ($val_jp == 1) {
                        $this->db->select('id_penyakit, cf_kombinasi');
                        $this->db->where('id_penyakit', $val_p['id_penyakit']);
                        $a = $this->db->get('vcfkombinasi')->result_array();

                        for($i = 0; $i < count($a); $i++) {
                            $nilai_cf = $a[$i]['cf_kombinasi'] + $a[$i]['cf_kombinasi'] - ($a[$i]['cf_kombinasi'] * $a[$i]['cf_kombinasi']);
                        }
                    } else {
                        // jika jumlah penyakit > 1
                        // hitung tiap-tiap nilai cf-nya
                        // sesuai jumlah penyakitnya
                        $this->db->select('id_penyakit,cf_kombinasi');
                        $this->db->where('id_penyakit', $val_p['id_penyakit']);
                        $a = $this->db->get('vcfkombinasi')->result_array();

                        for($j = 0; $j < count($a) - 1; $j++) {
                            if ($j == 0) {
                                $nilai_cf = $a[$j]['cf_kombinasi'] + $a[$j+1]['cf_kombinasi'] - ($a[$j]['cf_kombinasi'] * $a[$j+1]['cf_kombinasi']);
                            } else {
                                $nilai_cf = $nilai_cf + $a[$j+1]['cf_kombinasi'] - ($nilai_cf * $a[$j+1]['cf_kombinasi']);
                            }
                        }
                    }

                    // bulatkan nilai cf dan kalikan dengan 100
                    // simpan hasilnya ke tabel temp hasil
                    $nilai_cf = round(($nilai_cf * 100), 2);
                    $data_temp = [
                        'id_penyakit' => $a[0]['id_penyakit'],
                        'nilai_cf' => $nilai_cf
                    ];

                    $this->db->insert('temphasil', $data_temp);
                }
            }
        }

        // cari data penyakit, solusi, dan nilai cf yang telah dihitung sebelumnya
        // berdasarkan nilai cf tertinggi
        return $this->db->query('SELECT
        `temphasil`.`id_penyakit`,
        `tblpenyakit`.`nama_penyakit`,
        `tblpenyakit`.`solusi`,
        `temphasil`.`nilai_cf`
            FROM
                `temphasil`
            JOIN `tblpenyakit` ON `temphasil`.`id_penyakit` = `tblpenyakit`.`id_penyakit`
            WHERE
                `temphasil`.`nilai_cf` = (SELECT MAX(nilai_cf) from temphasil)
       ')->result_array();
    }  
}