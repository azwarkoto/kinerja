<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenispenilaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_jenispenilaian');
        $this->load->library('form_validation');
        $this->load->model('CodeGenerator');
    }
     public function _rule() 
    {
	$this->form_validation->set_rules('kodejenis', 'kodejenis', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    }

    public function index()
    {
         $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'jenispenilaian/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'jenispenilaian/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'jenispenilaian/index.html';
            $config['first_url'] = base_url() . 'jenispenilaian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_jenispenilaian->total_rows($cari);
        $jenispenilaian = $this->M_jenispenilaian->get_limit_data($config['per_page'], $start, $cari);

        
        $this->pagination->initialize($config);

        $data = array(
            'jenispenilaian_data' => $jenispenilaian,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jenispenilaian/v_jenispenilaian', $data);
         $this->load->view('foot');
    }

    public function view($id) 
    {
        $this->load->view('nav');
        $row = $this->M_jenispenilaian->selectById($id);
        if ($row) {
            $data = array(
		'kodejenis' => $row->kodejenis,
		'nama' => $row->nama,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('jenispenilaian/v_jenispenilaianlihat', $data);
        } 
        $this->load->view('foot');
    }

    public function datainsert() 
    {
        $this->load->view('nav');
        $data = array(
           
	    'kodejenis' => set_value('kodejenis',$this->CodeGenerator->buatkode('jenispenilaian','kodejenis','10','JNP')),
	    'nama' => set_value('nama'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('jenispenilaian/v_jenispenilaianform', $data);
        $this->load->view('foot');
    }
    
    public function insert() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->datainsert();
        } else {
            $data = array(
		'kodejenis' => $this->input->post('kodejenis'),
		'nama' => $this->input->post('nama'),
		'keterangan' => $this->input->post('keterangan'),
	    );

            $this->M_jenispenilaian->insert($data);
            redirect(site_url('jenispenilaian'));
        }
    }
    
    public function dataupdate($id) 
    {
        $this->load->view('nav');
        $row = $this->M_jenispenilaian->selectById($id);

        if ($row) {
            $data = array(
                
		'kodejenis' => set_value('kodejenis', $row->kodejenis),
		'nama' => set_value('nama', $row->nama),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('jenispenilaian/v_jenispenilaianform', $data);
        }
        $this->load->view('foot');
    }
    
    public function update() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->dataupdate($this->uri->segment(3));
        } else {
            $data = array(
		'kodejenis' => $this->input->post('kodejenis'),
		'nama' => $this->input->post('nama'),
		'keterangan' => $this->input->post('keterangan'),
	    );

            $this->M_jenispenilaian->update($this->uri->segment(3), $data);
            
            redirect(site_url('jenispenilaian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_jenispenilaian->selectById($id);

        if ($row) {
            $this->M_jenispenilaian->delete($id);
            
            redirect(site_url('jenispenilaian'));
        }
    }

}

/* End of file Jenispenilaian.php */
/* Location: ./application/controllers/Jenispenilaian.php */
/*  2016-06-17 19:08:51 */
/* Computer : Maruf */