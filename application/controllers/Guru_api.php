<?php

require APPPATH . '/libraries/REST_Controller.php';

class Guru_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data mahasiswa
    function index_get() {
        $id = $this->get('id');

       if ($id == '') {
//            $this->db->join('penilaian', 'penilaian.kodepenilaian = nilai.kodepenilaian', 'left');
//            $this->db->join('guru', 'guru.kodeguru = nilai.kodeguru', 'left');
            $data['guru'] = $this->db->get('guru')->result();
            $data['jumlah'] = $this->db->count_all_results();
            // $data = array("status"=>"0");

       } else {
//            $this->db->join('penilaian', 'penilaian.kodepenilaian = nilai.kodepenilaian', 'left');
//            $this->db->join('guru', 'guru.kodeguru = nilai.kodeguru', 'left');
            $this->db->where('kodeguru', $id);
           $data['guru'] = $this->db->get('guru')->result();
           $data['jumlah'] = $this->db->count_all_results();

//            $data = $this->db->get('nilai')->result();
       }

        $this->response($data, 200);
    }

    // insert new data to guru
    function index_post() {
      if($this->input->post('action')=="PUT"){

        $kodeguru = $this->input->post('kodeguru');
        $data = array(
            'kodeguru' => $this->input->post('kodeguru'),
            // 'nip' => $this->input->post('nip'),
            // 'nuptk' => $this->input->post('nuptk'),
            // 'nrg' => $this->input->post('nrg'),
            'nama' => $this->input->post('nama')
            // 'tempatlahir' => $this->input->post('tempatlahir'),
            // 'tanggallahir' => $this->input->post('tanggallahir'),
            // 'kodepangkat' => $this->input->post('kodepangkat'),
            // 'kodejabatan' => $this->input->post('kodejabatan'),
            // 'kodegolongan' => $this->input->post('kodegolongan'),
            // 'tmtguru' => $this->input->post('tmtguru'),
            // 'jeniskelamin' => $this->input->post('jeniskelamin'),
            // 'pendidikan' => $this->input->post('pendidikan'),
            // 'program' => $this->input->post('program'),
            // 'jam' => $this->input->post('jam'),
            // 'masakerja' => $this->input->post('masakerja'),
            // 'jenisguru' => $this->input->post('jenisguru')
        );
        $this->db->where('kodeguru', $kodeguru);
        $update = $this->db->update('guru', $data);
        $this->db->where('kodeguru', $kodeguru);
        $data = $this->db->get('guru')->result();
        if ($update) {
            $this->response(array('guru'=>$data, 'jumlah'=>'1'));
        } else {
            $this->response(array('guru'=>$data, 'jumlah'=>'0'));
        }

      }else if($this->input->post('action')=="POST"){
        $data = array(
            'kodeguru' => $this->input->post('kodeguru'),
            'nip' => $this->input->post('nip'),
            'nuptk' => $this->input->post('nuptk'),
            'nrg' => $this->input->post('nrg'),
            'nama' => $this->input->post('nama'),
            'tempatlahir' => $this->input->post('tempatlahir'),
            'tanggallahir' => $this->input->post('tanggallahir'),
            'kodepangkat' => $this->input->post('kodepangkat'),
            'kodejabatan' => $this->input->post('kodejabatan'),
            'kodegolongan' => $this->input->post('kodegolongan'),
            'tmtguru' => $this->input->post('tmtguru'),
            'jeniskelamin' => $this->input->post('jeniskelamin'),
            'pendidikan' => $this->input->post('pendidikan'),
            'program' => $this->input->post('program'),
            'jam' => $this->input->post('jam'),
            'masakerja' => $this->input->post('masakerja'),
            'jenisguru' => $this->input->post('jenisguru')
        );
        $insert = $this->db->insert('guru', $data);
        if ($insert) {
            $this->response(array('guru'=>$data, 'jumlah'=>'1'));
        } else {
            $this->response(array('guru'=>$data, 'jumlah'=>'0'));
        }
      }
    }

    // update data guru
    function index_put() {

    }

    // delete guru
    function index_delete() {
        $kodeguru = $this->delete('kodeguru');
        $this->db->where('kodeguru', $kodeguru);
        $delete = $this->db->delete('guru');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
