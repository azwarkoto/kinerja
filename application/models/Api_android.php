<?php

defined('BASEPATH') or exit('No direct script access allwed');

class Api_android extends CI_Model
{
	
    function kirim_komplain($kodeguru, $kodepenilai, $gambar, $status){
        $data = array(
            'kodeguru'      =>$kodeguru,
            'kodepenilai'   =>$kodepenilai,
            'gambar'        =>$gambar,
            'status'        =>$status
        );
        $this->db->insert('komplain', $data);
    }
}