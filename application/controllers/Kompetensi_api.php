<?php

require APPPATH . '/libraries/REST_Controller.php';

class Kompetensi_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data mahasiswa
    function index_get() {
        $id = $this->get('id');

        if ($id == '') {
            // $this->db->join('penilai', 'penilai.kodepenilai = nilai.kodepenilaian', 'left');
            // $this->db->join('guru', 'guru.kodeguru = nilai.kodeguru', 'left');

            $data['kompetensi'] = $this->db->get('kompetensi')->result();
            $data['jumlah'] = $this->db->count_all_results();
            // $data = array("status"=>"0");

        } else {
            $this->db->where('kodekompetensi', $id);
            // $this->db->join('penilai', 'penilai.kodepenilai = nilai.kodepenilaian', 'left');
            // $this->db->join('guru', 'guru.kodeguru = nilai.kodeguru', 'left');

            $data['kompetensi'] = $this->db->get('kompetensi')->result();
              $data['jumlah'] = $this->db->count_all_results();

        }



        $this->response($data, 200);
    }

}
