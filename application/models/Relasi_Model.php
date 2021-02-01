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

    public function checkData($id_penyakit, $id_gejala) {
        $this->db->select('id_penyakit, id_gejala')
                 ->from('tblaturan')
                 ->where('id_penyakit', $id_penyakit)
                 ->where('id_gejala', $id_gejala);
        return $this->db->get()->num_rows();
    }

    public function aturanById($id_penyakit, $id_gejala) {
        $this->db->from('tblaturan')
                 ->where('id_penyakit', $id_penyakit)
                 ->where('id_gejala', $id_gejala);
        return $this->db->get()->row();
    }

    public function tambahAturan($id_penyakit, $id_gejala) {
        $data = [
            'id_penyakit' => $id_penyakit,
            'id_gejala' => $id_gejala,
        ];

        $this->db->insert('tblaturan', $data);
    }

    public function ubahAturan($id_aturan, $id_penyakit, $id_gejala) {
        $data = [
            'id_penyakit' => $id_penyakit,
            'id_gejala' => $id_gejala
        ];

        $this->db->where('id_aturan', $id_aturan);
        $this->db->update('tblaturan', $data);
    } 

    public function hapusAturan($id_penyakit, $id_gejala) {
        $this->db->where('id_penyakit', $id_penyakit);
        $this->db->where('id_gejala', $id_gejala);
        $this->db->delete('tblaturan');
    }
}