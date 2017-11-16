<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_petugasdinas extends CI_Model
{

    public $table = 'petugasdinas';
    public $primary = 'kodedinas';
 
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
        $this->db->like('kodedinas', $cari);
	$this->db->or_like('nama_petugas', $cari);
	$this->db->or_like('nip', $cari);
	$this->db->or_like('keterangan', $cari);
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

/* End of file M_petugasdinas.php */
/* Location: ./application/models/M_petugasdinas.php */
/*  2016-06-17 20:05:26 */
/* Computer : Maruf */