<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_guru extends CI_Model
{

    public $table = 'guru';
    public $primary = 'kodeguru';
 
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
        // $this->db->where($this->primary, $id);
        // return $this->db->get($this->table)->row();
        return $this->db->query("select guru.*,golongan.* from guru join golongan on guru.kodegolongan=golongan.kodegolongan where kodeguru='$id'")->row();
    }
    
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_limit_data($limit, $start = 0, $cari = NULL) {
        $this->db->like('kodeguru', $cari);
	$this->db->or_like('nip', $cari);
	$this->db->or_like('nuptk', $cari);
	$this->db->or_like('nrg', $cari);
	$this->db->or_like('nama', $cari);
	$this->db->or_like('tempatlahir', $cari);
	$this->db->or_like('tanggallahir', $cari);
	$this->db->or_like('kodepangkat', $cari);
	$this->db->or_like('kodejabatan', $cari);
	$this->db->or_like('kodegolongan', $cari);
	$this->db->or_like('tmtguru', $cari);
	$this->db->or_like('jeniskelamin', $cari);
	$this->db->or_like('pendidikan', $cari);
	$this->db->or_like('program', $cari);
	$this->db->or_like('jam', $cari);
	$this->db->or_like('masakerja', $cari);
	$this->db->or_like('jenisguru', $cari);
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

/* End of file M_guru.php */
/* Location: ./application/models/M_guru.php */
/*  2016-06-17 20:18:31 */
/* Computer : Maruf */