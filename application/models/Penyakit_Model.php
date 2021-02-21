<?php

class Penyakit_Model extends CI_Model {

    // variabel pagination datatables
    var $column_order = [null, 'id_penyakit', 'nama_penyakit', 'solusi', null];
    var $column_search = ['id_penyakit', 'nama_penyakit', 'solusi'];
    var $order = ['id_penyakit' => 'asc'];

    // datatables
    private function _get_datatables_query() {
        $this->db->from('tblpenyakit');

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
        $this->db->from('tblpenyakit');
        return $this->db->count_all_results();
    }

    public function idOtomatis () {
        $this->db->select_max('id_penyakit');
        return $this->db->get('tblpenyakit')->row_array();
    }

    public function penyakitById ($id_penyakit) {
        $this->db->from('tblpenyakit');
        $this->db->where('id_penyakit', $id_penyakit);
        return $this->db->get()->row();
    }

    public function tambahPenyakit($id_penyakit, $nama_penyakit, $solusi) {
        $data = [
            'id_penyakit' => $id_penyakit,
            'nama_penyakit' => $nama_penyakit,
            'solusi' => $solusi
        ];

        $this->db->insert('tblpenyakit', $data);
    }

    public function ubahPenyakit($id_penyakit, $nama_penyakit, $solusi) {
        $data = [
            'nama_penyakit' => $nama_penyakit,
            'solusi' => $solusi
        ];

        $this->db->where('id_penyakit', $id_penyakit);
        $this->db->update('tblpenyakit', $data);
    }

    public function hapusPenyakit($id_penyakit) {
        $this->db->delete('tblpenyakit', ['id_penyakit' => $id_penyakit]);
    }

    public function check_penyakit ($id_penyakit = '', $nama_penyakit) {
        $this->db->where('nama_penyakit', $nama_penyakit);
        if ($id_penyakit) {
            $this->db->where_not_in('id_penyakit', $id_penyakit);
        }
        return $this->db->get('tblpenyakit')->num_rows();
    }

    public function detailPenyakit($id_penyakit) {
        $this->db->select('*');
        $this->db->where('id_penyakit', $id_penyakit);
        return $this->db->get('tblpenyakit')->result_array();
    }
}