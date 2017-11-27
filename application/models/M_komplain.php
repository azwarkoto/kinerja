<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_guru extends CI_Model
{

    public $table = 'komplain';
    public $primary = 'id';

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
        return $this->db->query("select komplain.id, guru.kodeguru, penilai.kodepenilai, komplain.gambar, komplain.status from komplain join guru on komplain.kodeguru=guru.kodeguru join penilai on komplain.kodepenilai=penilai.kodepenilai where id='$id'")->row();
    }

    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_limit_data($limit, $start = 0, $cari = NULL) {
        $this->db->like('id', $cari);
	$this->db->or_like('kodeguru', $cari);
	$this->db->or_like('kodepenilai', $cari);
	$this->db->or_like('gambar', $cari);
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

/* End of file M_guru.php */
/* Location: ./application/models/M_guru.php */
/*  2016-06-17 20:18:31 */
/* Computer : Maruf */
