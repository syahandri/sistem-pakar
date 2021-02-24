<?php

class Gejala_Model extends CI_Model {
    // variabel pagination datatables
    var $column_order = [null, 'id_gejala', 'nama_gejala', 'cf_rule', null];
    var $column_search = ['id_gejala', 'nama_gejala', 'cf_rule',];
    var $order = ['id_gejala' => 'asc'];

    // datatables
    private function _get_datatables_query() {
        $this->db->from('tblgejala');

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
        $this->db->from('tblgejala');
        return $this->db->count_all_results();
    }

    public function idOtomatis () {
        $this->db->select_max('id_gejala');
        return $this->db->get('tblgejala')->row_array();
    }

    public function gejalaById ($id_gejala) {
        $this->db->from('tblgejala');
        $this->db->where('id_gejala', $id_gejala);
        return $this->db->get()->row();
    }

    public function tambahGejala($id_gejala, $nama_gejala, $cf_rule) {
        $data = [
            'id_gejala' => $id_gejala,
            'nama_gejala' => $nama_gejala,
            'cf_rule' => $cf_rule
        ];

        $this->db->insert('tblgejala', $data);
    }

    public function ubahGejala($id_gejala, $nama_gejala, $cf_rule) {
        $data = [
            'nama_gejala' => $nama_gejala,
            'cf_rule' => $cf_rule
        ];

        $this->db->where('id_gejala', $id_gejala);
        $this->db->update('tblgejala', $data);
    }

    function hapusGejala($id_gejala) {
        $this->db->delete('tblgejala', ['id_gejala' => $id_gejala]);
    }

    function hapusRelasi($id_gejala) {
        $this->db->delete('tblaturan', ['id_gejala' => $id_gejala]);
    }

    function check_gejala ($id_gejala = '', $gejala) {
        $this->db->where('nama_gejala', $gejala);
        if ($id_gejala) {
            $this->db->where_not_in('id_gejala', $id_gejala);
        }
        return $this->db->get('tblgejala')->num_rows();
    }
}