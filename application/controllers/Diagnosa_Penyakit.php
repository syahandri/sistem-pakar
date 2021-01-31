<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa_Penyakit extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('Diagnosa_penyakit_Model');
    }

    public function index() {

        $data['judul'] = 'Diagnosis Penyakit';

        $data['gejala'] = $this->Diagnosa_penyakit_Model->index();

        $this->load->view('_templates/header_user', $data);
        $this->load->view('diagnosa_penyakit/index');
        $this->load->view('_templates/footer_user');
    }

    public function diagnosis() {
        $data = $this->Diagnosa_penyakit_Model->diagnosis($this->input->post('id_gejala'),$this->input->post('nilai_cf'));
        echo json_encode($data);

        $this->Diagnosa_penyakit_Model->simpan_riwayat($data['nama_penyakit'], $data['nilai_cf'], $data['solusi']);
    }
}