<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dasboard_Model');
        
        if ($this->session->userdata('masuk') !== TRUE) {            
            redirect(base_url('Auth'));
        }
    }

    public function index() {
        
        $data['judul'] = 'Beranda';

        $this->load->view('_templates/header_admin', $data);
        $this->load->view('beranda_admin/index');
        $this->load->view('_templates/footer_admin');

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

            <br>

            <button type  = "button" id = "' . $riwayat->id_riwayat . '"class = "btn btn-sm deleteRiwayat">
            <i class = "fas fa-trash" style = "color:red"></i> Hapus
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

    public function hitungGejala()
    {
        $data = $this->Dasboard_Model->hitungGejala();
        echo json_encode($data);
    }

    public function hitungPenyakit()
    {
        $data = $this->Dasboard_Model->hitungPenyakit();
        echo json_encode($data);
    }

    public function hitungRelasi()
    {
        $data = $this->Dasboard_Model->hitungRelasi();
        echo json_encode($data);
    }

    public function hapusRiwayat() {
        $this->Dasboard_Model->hapusRiwayat($this->input->post('id_riwayat'));
        echo json_encode(array("status" => TRUE));
    }

    public function detailRiwayat() {
        $data = $this->Dasboard_Model->detailRiwayat($this->input->post('id_riwayat'));
        echo json_encode($data);
    }
}