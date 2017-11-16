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
            $this->db->join('penilaian', 'penilaian.kodepenilaian = nilai.kodepenilaian', 'left');
            $this->db->join('kodeguru', 'guru.kodeguru = nilai.kodeguru', 'left');
            $data = $this->db->get('nilai')->result();
            // $data = array("status"=>"0");

        } else {
            $this->db->join('penilaian', 'penilaian.kodepenilaian = nilai.kodepenilaian', 'left');
            $this->db->join('kodeguru', 'guru.kodeguru = nilai.kodeguru', 'left');
            $data = $this->db->get('nilai')->result();
            $this->db->where('kodeguru', $id);
            $data = $this->db->get('nilai')->result();
        }



        $this->response($data, 200);
    }

    // insert new data to mahasiswa
    function index_post() {
        $data = array(
            'no_customer' => $this->input->post('no_customer'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'date_created' => date("d-m-Y"),
            'date_edited' => date("d-m-Y"),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
            );
        $insert = $this->db->insert('mahasiswa', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data mahasiswa
    function index_put() {
        $nim = $this->put('nim');
        $data = array(
                    'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'agama' => $this->input->post('agama'),
        'tempat_lahir' => $this->input->post('tempat_lahir'),
        'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        'id_prodi' => $this->input->post('id_prodi'),
        'alamat' => $this->input->post('alamat'),
        'nama_ayah' => $this->input->post('nama_ayah'),
        'nama_ibu' => $this->input->post('nama_ibu'),
        'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
        'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
        'alamat_ortu' => $this->input->post('alamat_ortu'),
        'total_penghasilan' => $this->input->post('total_penghasilan'),
        'nohp' => $this->input->post('nohp'),
        'tahun_masuk' => $this->input->post('tahun_masuk'),
        'foto' => $this->input->post('foto'),
        'password' => $this->input->post('password'),
        'nama_sekolah' => $this->input->post('nama_sekolah'),
        'telp_sekolah' => $this->input->post('telp_sekolah'),
        'alamat_sekola' => $this->input->post('alamat_sekola'),
        'jurusan_sekolah' => $this->input->post('jurusan_sekolah'),
        'tahun_lulus' => $this->input->post('tahun_lulus'),
        'nama_kampus' => $this->input->post('nama_kampus'),
        'telp_kampus' => $this->input->post('telp_kampus'),
        'alamat_kampus' => $this->input->post('alamat_kampus'),
        'jurusan_kampus' => $this->input->post('jurusan_kampus'),
        'tahun_lulusdiploma' => $this->input->post('tahun_lulusdiploma'),
        'diploma' => $this->input->post('diploma'));
        $this->db->where('nim', $nim);
        $update = $this->db->update('mahasiswa', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete mahasiswa
    function index_delete() {
        $nim = $this->delete('nim');
        $this->db->where('nim', $nim);
        $delete = $this->db->delete('mahasiswa');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
