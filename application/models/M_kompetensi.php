<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_kompetensi extends CI_Model
{

    public $table = 'kompetensi';
    public $primary = 'kodekompetensi';
 
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
        $this->db->like('kodekompetensi', $cari);
	$this->db->or_like('kodekategori', $cari);
	$this->db->or_like('namakompetensi', $cari);
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

/* End of file M_kompetensi.php */
/* Location: ./application/models/M_kompetensi.php */
/*  2016-06-17 19:06:46 */
/* Computer : Maruf */