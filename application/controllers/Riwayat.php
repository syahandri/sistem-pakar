<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('Dasboard_Model');
    }

    public function index() {

        $data['judul'] = 'Riwayat Diagnosis Penyakit';

        $this->load->view('_templates/header_user', $data);
        $this->load->view('riwayat/index');
        $this->load->view('_templates/footer_user');
    }

    public function getRiwayat()
    {
        $list = $this->Dasboard_Model->getDataTables();
        $data = [];
        $no   = $this->input->post('start');

        foreach ($list as $riwayat) {
            $row = [];
            $row[] = ++$no;
            $row[] = $riwayat->tanggal;
            $row[] = $riwayat->nama_penyakit;
            $row[] = $riwayat->faktor_kepastian;

            //add action in table
            $row[] = '      
            <button type  = "button" id = "' . $riwayat->id_riwayat . '"class = "btn btn-sm detailRiwayat">
            <i class = "fas fa-info-circle" style = "color:blue"></i> Detail
            </button>
            </div>
            ';

            $data[] = $row;
        }

        $output = [
            "draw"            => $this->input->post('draw'),
            "recordsTotal"    => $this->Dasboard_Model->countAll(),
            "recordsFiltered" => $this->Dasboard_Model->countFiltered(),
            "data"            => $data,
        ];

        echo json_encode($output);
    }

    public function detailRiwayat() {
        $data = $this->Dasboard_Model->detailRiwayat($this->input->post('id_riwayat'));
        echo json_encode($data);
    }
}