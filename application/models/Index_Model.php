<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index_Model extends CI_Model {

    public function dataIndex() {
        return $data = ['Tes Index', 'Halaman Beranda'];
    }
}