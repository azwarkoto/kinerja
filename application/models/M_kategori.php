<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_kategori extends CI_Model
{

    public $table = 'kategori';
    public $primary = 'kodekategori';
 
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
        $this->db->like('kodekategori', $cari);
	$this->db->or_like('namakategori', $cari);
	$this->db->or_like('kodejenis', $cari);
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

/* End of file M_kategori.php */
/* Location: ./application/models/M_kategori.php */
/*  2016-06-17 19:07:45 */
/* Computer : Maruf */