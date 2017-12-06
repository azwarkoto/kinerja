<?php

require APPPATH . '/libraries/REST_Controller.php';

class Nilai_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data mahasiswa
    function index_get() {
        $id = $this->get('id');

        if ($id == '') {
            $this->db->join('penilai', 'penilai.kodepenilai = nilai.kodepenilaian', 'left');
            $this->db->join('guru', 'guru.kodeguru = nilai.kodeguru', 'left');
            // $data['jumlah'] = $this->db->count_all_results();
            $data['nilai'] = $this->db->get('nilai')->result();
            // $data = array("status"=>"0");

        } else {
            $this->db->where('nilai.kodeguru', $id);
            $this->db->join('penilai', 'penilai.kodepenilai = nilai.kodepenilaian', 'left');
            $this->db->join('guru', 'guru.kodeguru = nilai.kodeguru', 'left');
            // $data['jumlah'] = $this->db->count_all_results();
            $data['nilai'] = $this->db->get('nilai')->result();

        }



        $this->response($data, 200);
    }

    // insert new data to mahasiswa
    function index_post() {
        $data = array(
            'kodepenilaian' => $this->input->post('kodepenilaian'),
            'kodeguru' => $this->input->post('kodeguru'),
            'kodeindikator' => $this->input->post('kodeindikator'),
            'nilai' => $this->input->post('nilai')
            );
        $insert = $this->db->insert('nilai', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data mahasiswa
    function index_put() {
        $kodepenilaian = $this->put('kodepenilaian');
        $data = array(
            'kodepenilaian' => $this->input->post('kodepenilaian'),
            'kodeguru' => $this->input->post('kodeguru'),
            'kodeindikator' => $this->input->post('kodeindikator'),
            'nilai' => $this->input->post('nilai')
            );
        $this->db->where('kodepenilaian', $kodepenilaian);
        $update = $this->db->update('nilai', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete mahasiswa
    function index_delete() {
        $kodepenilaian = $this->delete('kodepenilaian');
        $this->db->where('kodepenilaian', $kodepenilaian);
        $delete = $this->db->delete('nilai');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
