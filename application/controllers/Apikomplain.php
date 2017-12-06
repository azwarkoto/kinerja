<?php

defined('BASEPATH')or exit('no direct script access allowed');
class Apikomplain extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Api_android');
    }
    function kirim_komplain(){
        $this->load->library('upload');
        $kodeguru = $_POST['kodeguru'];
        $kodepenilai = $_POST['kodepenilai'];
        $status = $_POST['status'];
        $nama_file = "file_".time();
        $config['upload_path'] = './assets/image/.';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '3072';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nama_file;

        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')){
            $gbr = $this->upload->data();
            $this->Api_android->kirim_komplain($kodeguru, $kodepenilai, $gbr['file_name'], $status);
            $response = array(
                "kode"  =>"1",
                "pesan" =>"berhasil"
            );
        }else
        {
            $response = array(
                'kode'  =>"0",
                "pesan" =>"terjadi masalah saat berkomunikasi dengan server"
            );
        }
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit();
    }
}