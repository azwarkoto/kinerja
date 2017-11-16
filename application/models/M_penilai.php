<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_penilai extends CI_Model
{

    public $table = 'penilai';
    public $primary = 'kodepenilai';
 
    function __construct()
    {
        parent::__construct();
    }

   
    function selectByAll()
    {
        return $this->db->get($this->table)->result();
    }

    function selectById($id)
    {
        $this->db->where($this->primary, $id);
        return $this->db->get($this->table)->row();
    }
    
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_limit_data($limit, $start = 0, $cari = NULL) {
        $this->db->like('kodepenilai', $cari);
	$this->db->or_like('kodeguru', $cari);
	$this->db->or_like('nomorsk', $cari);
	$this->db->or_like('tanggalsk', $cari);
	$this->db->or_like('berlaku', $cari);
	$this->db->or_like('keterangan', $cari);
	$this->db->or_like('username', $cari);
	$this->db->or_like('password', $cari);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($id, $data)
    {
        $this->db->where($this->primary, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where($this->primary, $id);
        $this->db->delete($this->table);
    }

}

/* End of file M_penilai.php */
/* Location: ./application/models/M_penilai.php */
/*  2016-06-18 02:43:51 */
/* Computer : Maruf */