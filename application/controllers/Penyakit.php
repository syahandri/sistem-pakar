<?php

class Penyakit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            redirect(base_url('Auth'));
        }
        $this->load->model('Penyakit_Model');
    }

    public function index()
    {
        $data['judul'] = 'Data Penyakit';

        $this->load->view('_templates/header_admin', $data);
        $this->load->view('penyakit/index', $data);
        $this->load->view('_templates/footer_admin');
    }

    public function getPenyakit()
    {
        $list = $this->Penyakit_Model->getDataTables();
        $data = [];
        $no   = $this->input->post('start');

        foreach ($list as $penyakit) {

            // $solusi = substr($penyakit->solusi, 0, 51);

            $row = [];
            $row[] = ++$no;
            $row[] = $penyakit->id_penyakit;
            $row[] = $penyakit->nama_penyakit;
            $row[] = $penyakit->solusi;

            //add action in table
            $row[] = '
            <button type  = "button" id = "' . $penyakit->id_penyakit . '"class = "btn btn-sm update-penyakit">
            <i class = "fas fa-pen" style = "color:blue"></i> Edit
            </button>
            </div>
            <hr>
            <button type  = "button" id = "' . $penyakit->id_penyakit . '"class = "btn btn-sm delete-penyakit">
            <i class = "fas fa-trash" style = "color:red"></i> Hapus
            </button>
            </div>
            ';

            $data[] = $row;
        }

        $output = [
            "draw"            => $this->input->post('draw'),
            "recordsTotal"    => $this->Penyakit_Model->countAll(),
            "recordsFiltered" => $this->Penyakit_Model->countFiltered(),
            "data"            => $data,
        ];

        echo json_encode($output);
    }

    public function idOtomatis()
    {
        $data = $this->Penyakit_Model->idOtomatis();

        $data['id'] = $data['id_penyakit'];

        $urutan = (int) substr($data['id'], 1);
        $urutan++;

        $huruf = 'P';

        $data['id'] = $huruf . sprintf($urutan);
        echo json_encode($data);
    }

    public function penyakitById()
    {
        $data = $this->Penyakit_Model->penyakitById($this->input->post('id_penyakit'));
        echo json_encode($data);
    }

    public function tambahPenyakit() {
        $rules = [
            [
                'field' => 'nama-penyakit',
                'label' => 'Penyakit',
                'rules' => 'is_unique[tblpenyakit.nama_penyakit]'
            ]
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'msg' => 'error',
                'penyakit' => form_error('nama-penyakit')
            ];

            echo json_encode($data);

        } else {

            $this->Penyakit_Model->tambahPenyakit($this->input->post('id-penyakit'), $this->input->post('nama-penyakit'), $this->input->post('solusi'));
            echo json_encode($data = ['msg' => 'Data berhasil ditambahkan.']);
        }
        
    }

    function check_penyakit($nama_penyakit) {
        if ($this->input->post('id-penyakit')) {
            $id_penyakit = $this->input->post('id-penyakit');
        } else {
            $id_penyakit = '';
        }

        $result = $this->Penyakit_Model->check_penyakit($id_penyakit, $nama_penyakit);
        if ($result == 0) {
            $response = true;
        } else {
            $this->form_validation->set_message('check_penyakit', '{field} ini sudah ada.');
            $response = false;
        }
        return $response;
    }
    
    public function ubahPenyakit() {
        $rules = [
            [
                'field' => 'nama-penyakit',
                'label' => 'Penyakit',
                'rules' => 'callback_check_penyakit'
            ]
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'msg' => 'error',
                'penyakit' => form_error('nama-penyakit')
            ];

            echo json_encode($data);

        } else {

            $this->Penyakit_Model->ubahPenyakit($this->input->post('id-penyakit'), $this->input->post('nama-penyakit'), $this->input->post('solusi'));
            echo json_encode($data = ['msg' => 'Data berhasil diubah.']);
        }
    }

    public function hapusPenyakit() {
        $this->Penyakit_Model->hapusPenyakit($this->input->post('id_penyakit'));
        echo json_encode($data = ['msg' => 'Data berhasil dihapus.']);

    }

    public function detailPenyakit() {
        $data = $this->Penyakit_Model->detailPenyakit($this->input->post('id_penyakit'));
        echo json_encode($data);
    }
}