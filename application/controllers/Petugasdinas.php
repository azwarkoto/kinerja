<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Petugasdinas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_petugasdinas');
        $this->load->library('form_validation');
        $this->load->model('CodeGenerator');
    }
     public function _rule() 
    {
	$this->form_validation->set_rules('kodedinas', 'kodedinas', 'trim|required');
	$this->form_validation->set_rules('nama_petugas', 'nama petugas', 'trim|required');
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    }

    public function index()
    {
         $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'petugasdinas/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'petugasdinas/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'petugasdinas/index.html';
            $config['first_url'] = base_url() . 'petugasdinas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_petugasdinas->total_rows($cari);
        $petugasdinas = $this->M_petugasdinas->get_limit_data($config['per_page'], $start, $cari);

        
        $this->pagination->initialize($config);

        $data = array(
            'petugasdinas_data' => $petugasdinas,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('petugasdinas/v_petugasdinas', $data);
         $this->load->view('foot');
    }

    public function view($id) 
    {
        $this->load->view('nav');
        $row = $this->M_petugasdinas->selectById($id);
        if ($row) {
            $data = array(
		'kodedinas' => $row->kodedinas,
		'nama_petugas' => $row->nama_petugas,
		'nip' => $row->nip,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('petugasdinas/v_petugasdinaslihat', $data);
        } 
        $this->load->view('foot');
    }

    public function datainsert() 
    {
        $this->load->view('nav');
        $data = array(
           
	    'kodedinas' => set_value('kodedinas',$this->CodeGenerator->buatkode('petugasdinas','kodedinas','10','PGD')),
	    'nama_petugas' => set_value('nama_petugas'),
	    'nip' => set_value('nip'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('petugasdinas/v_petugasdinasform', $data);
        $this->load->view('foot');
    }
    
    public function insert() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->datainsert();
        } else {
            $data = array(
		'kodedinas' => $this->input->post('kodedinas'),
		'nama_petugas' => $this->input->post('nama_petugas'),
		'nip' => $this->input->post('nip'),
		'keterangan' => $this->input->post('keterangan'),
	    );

            $this->M_petugasdinas->insert($data);
            redirect(site_url('petugasdinas'));
        }
    }
    
    public function dataupdate($id) 
    {
        $this->load->view('nav');
        $row = $this->M_petugasdinas->selectById($id);

        if ($row) {
            $data = array(
                
		'kodedinas' => set_value('kodedinas', $row->kodedinas),
		'nama_petugas' => set_value('nama_petugas', $row->nama_petugas),
		'nip' => set_value('nip', $row->nip),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('petugasdinas/v_petugasdinasform', $data);
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
		'kodedinas' => $this->input->post('kodedinas'),
		'nama_petugas' => $this->input->post('nama_petugas'),
		'nip' => $this->input->post('nip'),
		'keterangan' => $this->input->post('keterangan'),
	    );

            $this->M_petugasdinas->update($this->uri->segment(3), $data);
            
            redirect(site_url('petugasdinas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_petugasdinas->selectById($id);

        if ($row) {
            $this->M_petugasdinas->delete($id);
            
            redirect(site_url('petugasdinas'));
        }
    }

}

/* End of file Petugasdinas.php */
/* Location: ./application/controllers/Petugasdinas.php */
/*  2016-06-17 20:05:26 */
/* Computer : Maruf */