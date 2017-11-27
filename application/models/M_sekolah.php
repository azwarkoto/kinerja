<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_sekolah extends CI_Model
{

    public $table = 'sekolah';
    public $primary = 'kode_sekolah';
 
    function __construct()
    {
        parent::__construct();
    }

   
    function selectByAll()
    {
        return $this->db->get($this->table)->result();
    }
    function sekolahaktif()
    {
        $this->db->where('status', "Aktif");
        return $this->db->get($this->table)->row();
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
        $this->db->like('kode_sekolah', $cari);
	$this->db->or_like('nama', $cari);
	$this->db->or_like('telp', $cari);
	$this->db->or_like('kelurahan', $cari);
	$this->db->or_like('kecamatan', $cari);
	$this->db->or_like('kabupaten', $cari);
	$this->db->or_like('provinsi', $cari);
	$this->db->or_like('alamat', $cari);
	$this->db->or_like('idguru', $cari);
	$this->db->or_like('status', $cari);
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

/* End of file M_sekolah.php */
/* Location: ./application/models/M_sekolah.php */
/*  2016-06-17 20:15:04 */
/* Computer : Maruf */