<?php

class Dasboard_Model extends CI_Model {

    // variabel pagination datatables
    var $column_order = [null, 'tanggal', 'nama_penyakit', 'faktor_kepastian', null];
    var $column_search = ['tanggal', 'nama_penyakit', 'faktor_kepastian',];
    var $order = ['tanggal' => 'desc'];

    // datatables
    private function _get_datatables_query() {
        $this->db->select("id_riwayat, DATE_FORMAT(tanggal, '%d-%m-%Y') AS tanggal, nama_penyakit, faktor_kepastian")
                 ->from('tblriwayat');

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->input->post('search')['value']) {
                if ($i == 0) {
                    $this->db->group_start();
                    $this->db->like($item, $this->input->post('search')['value']);
                } else {
                    $this->db->or_like($item, $this->input->post('search')['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }

            $i++;
        }

        if ($this->input->post('order')) {
            $this->db->order_by($this->column_order[$this->input->post('order')[0]['column']], $this->input->post('order')[0]['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function getDataTables() {
        $this->_get_datatables_query();
        if ($this->input->post('length') != 1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            return $this->db->get()->result();
        }
    }

    public function countFiltered() {
        $this->_get_datatables_query();
        return $this->db->get()->num_rows();
    }

    public function countAll() {
        $this->db->from('tblriwayat');
        return $this->db->count_all_results();
    }

    public function hitungGejala() {
        return $this->db->count_all_results('tblgejala');
    }

    public function hitungPenyakit() {
        return $this->db->count_all_results('tblpenyakit');
    }

    public function hitungRelasi() {
        return $this->db->count_all_results('tblaturan');
    }

    public function hapusRiwayat($id) {
        $this->db->delete('tblriwayat', ['id_riwayat' => $id]);
    }

    public function detailRiwayat($id) {
        $this->db->select("DATE_FORMAT(tanggal, '%d-%m-%Y') AS tanggal, nama_penyakit, solusi, faktor_kepastian")
                 ->from('tblriwayat')
                 ->where('id_riwayat', $id);
        return $this->db->get()->result_array();
    }
}