<?php

class Relasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            redirect(base_url('Auth'));
        }
        $this->load->model('Relasi_Model');
    }

    public function index()
    {
        $data['judul'] = 'Data Aturan';

        $this->load->view('_templates/header_admin', $data);
        $this->load->view('relasi/index', $data);
        $this->load->view('_templates/footer_admin');
    }

    public function getAturan()
    {
        $list = $this->Relasi_Model->getDataTables();
        $data = [];
        $no   = $this->input->post('start');

        foreach ($list as $aturan) {

            $row = [];
            $row[] = ++$no;
            $row[] = $aturan->id_penyakit;
            $row[] = $aturan->nama_penyakit;
            $row[] = $aturan->id_gejala;
            $row[] = $aturan->nama_gejala;

            //add action in table
            $row[] = '      
            <button type  = "button" id = "' . $aturan->id_penyakit . '" data = "'.$aturan->id_gejala.'" class = "btn btn-sm update-aturan">
            <i class = "fas fa-pen" style = "color:blue"></i> Edit
            </button>
            </div>

            <button type  = "button" id = "' . $aturan->id_penyakit . '" data = "'.$aturan->id_gejala.'" class = "btn btn-sm delete-aturan">
            <i class = "fas fa-trash" style = "color:red"></i> Hapus
            </button>
            </div>
            ';

            $data[] = $row;
        }

        $output = [
            "draw"            => $this->input->post('draw'),
            "recordsTotal"    => $this->Relasi_Model->countAll(),
            "recordsFiltered" => $this->Relasi_Model->countFiltered(),
            "data"            => $data,
        ];

        echo json_encode($output);
    }

    public function getPenyakit() {
        $data = $this->Relasi_Model->getPenyakit();

        $index = 0;
        $array[] = [
            "id_penyakit" => "0",
            "nama_penyakit" => "--- Pilih Salah Satu ---"
        ];

        array_splice($data, $index, 0 , $array);
        echo json_encode($data);
    }

    public function getGejala() {
        $data = $this->Relasi_Model->getGejala();

        $index = 0;
        $array[] = [
            "id_gejala" => "0",
            "nama_gejala" => "--- Pilih Salah Satu ---"
        ];

        array_splice($data, $index, 0 , $array);
        echo json_encode($data);
    }

    public function aturanById() {
        $data = $this->Relasi_Model->aturanById($this->input->post('id_penyakit'), $this->input->post('id_gejala'));
        echo json_encode($data);
    }

    public function tambahAturan() {
        $check_data = $this->Relasi_Model->checkData($this->input->post('select-penyakit'), $this->input->post('select-gejala'));
        if ($check_data > 0) {
            echo json_encode($data = ['msg' => 'error']);
        } else {
            $this->Relasi_Model->tambahAturan($this->input->post('select-penyakit'), $this->input->post('select-gejala'));
            echo json_encode($data = ['msg' => 'Data berhasil ditambahkan.']);
        }
    }

    public function ubahAturan() {
        $check_data = $this->Relasi_Model->checkData($this->input->post('select-penyakit'), $this->input->post('select-gejala'));
        if ($check_data > 0) {
            echo json_encode($data = ['msg' => 'error']);
        } else {
            $this->Relasi_Model->ubahAturan($this->input->post('id-aturan'), $this->input->post('select-penyakit'), $this->input->post('select-gejala'));
            echo json_encode($data = ['msg' => 'Data berhasil diubah.']);
        }
    }

    public function hapusAturan() {
        $this->Relasi_Model->hapusAturan($this->input->post('id_penyakit'), $this->input->post('id_gejala'));
        echo json_encode($data = ['msg' => 'Data berhasil dihapus.']);
    }
}