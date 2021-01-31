<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('Index_Model');
    }

    public function index() {

        $data['judul'] = 'Beranda';

        $this->load->view('_templates/header_user', $data);
        $this->load->view('beranda_user/index');
        $this->load->view('_templates/footer_user');
    }
}