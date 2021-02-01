<?php

class Relasi_Model extends CI_Model {

    // variabel pagination datatables
    var $column_order = [null, 'id_penyakit', 'nama_penyakit', 'id_gejala','nama_gejala', null];
    var $column_search = ['id_penyakit', 'nama_penyakit', 'id_gejala','nama_gejala'];
    var $order = ['id_penyakit' => 'asc'];

    // datatables
    private function _get_datatables_query() {
        $this->db->from('vdetailaturan');

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
        $this->db->from('vdetailaturan');
        return $this->db->count_all_results();
    }

    public function getPenyakit() {
        $this->db->select('id_penyakit, nama_penyakit')
                 ->from('tblpenyakit');
        return $this->db->get()->result_array();
    }

    public function getGejala() {
        $this->db->select('id_gejala, nama_gejala')
                 ->from('tblgejala');
        return $this->db->get()->result_array();
    }
}