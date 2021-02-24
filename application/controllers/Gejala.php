<?php

class Gejala extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            redirect(base_url('Auth'));
        }
        $this->load->model('Gejala_Model');
    }

    public function index()
    {
        $data['judul'] = 'Data Gejala';

        $this->load->view('_templates/header_admin', $data);
        $this->load->view('gejala/index', $data);
        $this->load->view('_templates/footer_admin');
    }

    public function getGejala()
    {
        $list = $this->Gejala_Model->getDataTables();
        $data = [];
        $no   = $this->input->post('start');

        foreach ($list as $gejala) {
            $row = [];
            $row[] = ++$no;
            $row[] = $gejala->id_gejala;
            $row[] = $gejala->nama_gejala;
            $row[] = $gejala->cf_rule;

            //add action in table
            $row[] = '      
            <button type  = "button" id = "' . $gejala->id_gejala . '"class = "btn btn-sm update-gejala">
            <i class = "fas fa-pen" style = "color:blue"></i> Edit
            </button>
            </div>

            <button type  = "button" id = "' . $gejala->id_gejala . '"class = "btn btn-sm delete-gejala">
            <i class = "fas fa-trash" style = "color:red"></i> Hapus
            </button>
            </div>
            ';

            $data[] = $row;
        }

        $output = [
            "draw"            => $this->input->post('draw'),
            "recordsTotal"    => $this->Gejala_Model->countAll(),
            "recordsFiltered" => $this->Gejala_Model->countFiltered(),
            "data"            => $data,
        ];

        echo json_encode($output);
    }

    public function idOtomatis()
    {
        $data = $this->Gejala_Model->idOtomatis();

        $data['id'] = $data['id_gejala'];

        $urutan = (int) substr($data['id'], 1);
        $urutan++;

        $huruf = 'G';

        $data['id'] = $huruf . sprintf($urutan);
        echo json_encode($data);
    }

    public function gejalaById()
    {
        $data = $this->Gejala_Model->gejalaById($this->input->post('id_gejala'));
        echo json_encode($data);
    }

    public function tambahGejala() {
        $rules = [
            [
                'field' => 'gejala',
                'label' => 'Gejala',
                'rules' => 'is_unique[tblgejala.nama_gejala]'
            ]
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'msg' => 'error',
                'gejala' => form_error('gejala')
            ];

            echo json_encode($data);

        } else {

            $this->Gejala_Model->tambahGejala($this->input->post('id-gejala'), $this->input->post('gejala'), $this->input->post('cf'));
            echo json_encode($data = ['msg' => 'Data berhasil ditambahkan']);
        }
        
    }

    function check_gejala($gejala) {
        if ($this->input->post('id-gejala')) {
            $id_gejala = $this->input->post('id-gejala');
        } else {
            $id_gejala = '';
        }

        $result = $this->Gejala_Model->check_gejala($id_gejala, $gejala);
        if ($result == 0) {
            $response = true;
        } else {
            $this->form_validation->set_message('check_gejala', '{field} ini sudah ada.');
            $response = false;
        }
        return $response;
    }
    
    public function ubahGejala() {
        $rules = [
            [
                'field' => 'gejala',
                'label' => 'Gejala',
                'rules' => 'callback_check_gejala'
            ]
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'msg' => 'error',
                'gejala' => form_error('gejala')
            ];

            echo json_encode($data);

        } else {

            $this->Gejala_Model->ubahGejala($this->input->post('id-gejala'), $this->input->post('gejala'), $this->input->post('cf'));
            echo json_encode($data = ['msg' => 'Data berhasil diubah.']);
        }
    }

    public function hapusGejala() {
        $this->Gejala_Model->hapusRelasi($this->input->post('id_gejala'));
        $this->Gejala_Model->hapusGejala($this->input->post('id_gejala'));
        echo json_encode($data = ['msg' => 'Data berhasil dihapus.']);

    }
}