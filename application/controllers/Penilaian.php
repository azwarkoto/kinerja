<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_penilaian');
        $this->load->library('form_validation');
        $this->load->model('M_petugasdinas');
        $this->load->model('M_penilai');
        $this->load->model('M_guru');
        $this->load->model('CodeGenerator');
    }
     public function _rule() 
    {
	$this->form_validation->set_rules('kodepenilaian', 'kodepenilaian', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('periode', 'periode', 'trim|required');
	$this->form_validation->set_rules('kodedinas', 'kodedinas', 'trim|required');
	$this->form_validation->set_rules('kodepenilai', 'kodepenilai', 'trim|required');
	$this->form_validation->set_rules('tipe', 'tipe', 'trim|required');
    }

    public function index()
    {
         $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'penilaian/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'penilaian/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'penilaian/index.html';
            $config['first_url'] = base_url() . 'penilaian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_penilaian->total_rows($cari);
        $penilaian = $this->M_penilaian->get_limit_data($config['per_page'], $start, $cari);

        
        $this->pagination->initialize($config);

        $data = array(
            'penilaian_data' => $penilaian,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'listpetugasdinas'=>$this->M_petugasdinas->selectByAll(),
            'listpenilai'=>$this->M_penilai->selectByAll(),
            'listguru'=>$this->M_guru->selectByAll(),
        );
        $this->load->view('penilaian/v_penilaian', $data);
         $this->load->view('foot');
    }

    public function view($id) 
    {
        $this->load->view('nav');
        $row = $this->M_penilaian->selectById($id);
        if ($row) {
            $data = array(
		'kodepenilaian' => $row->kodepenilaian,
		'tanggal' => $row->tanggal,
		'periode' => $row->periode,
		'kodedinas' => $row->kodedinas,
		'kodepenilai' => $row->kodepenilai,
		'tipe' => $row->tipe,
        'listpetugasdinas'=>$this->M_petugasdinas->selectByAll(),
            'listpenilai'=>$this->M_penilai->selectByAll(),
            'listguru'=>$this->M_guru->selectByAll(),
	    );
            $this->load->view('penilaian/v_penilaianlihat', $data);
        } 
        $this->load->view('foot');
    }

    public function datainsert() 
    {
        $this->load->view('nav');
        $data = array(
           
	    'kodepenilaian' => set_value('kodepenilaian',$this->CodeGenerator->buatkode('penilaian','kodepenilaian','10','PLN')),
	    'tanggal' => set_value('tanggal'),
	    'periode' => set_value('periode'),
	    'kodedinas' => set_value('kodedinas'),
	    'kodepenilai' => set_value('kodepenilai'),
	    'tipe' => set_value('tipe'),
        'listpetugasdinas'=>$this->M_petugasdinas->selectByAll(),
            'listpenilai'=>$this->M_penilai->selectByAll(),
            'listguru'=>$this->M_guru->selectByAll(),
	);
        $this->load->view('penilaian/v_penilaianform', $data);
        $this->load->view('foot');
    }
    
    public function insert() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->datainsert();
        } else {
            $data = array(
		'kodepenilaian' => $this->input->post('kodepenilaian'),
		'tanggal' => $this->input->post('tanggal'),
		'periode' => $this->input->post('periode'),
		'kodedinas' => $this->input->post('kodedinas'),
		'kodepenilai' => $this->input->post('kodepenilai'),
		'tipe' => $this->input->post('tipe'),
	    );

            $this->M_penilaian->insert($data);
            redirect(site_url('penilaian'));
        }
    }
    
    public function dataupdate($id) 
    {
        $this->load->view('nav');
        $row = $this->M_penilaian->selectById($id);

        if ($row) {
            $data = array(
                
		'kodepenilaian' => set_value('kodepenilaian', $row->kodepenilaian),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'periode' => set_value('periode', $row->periode),
		'kodedinas' => set_value('kodedinas', $row->kodedinas),
		'kodepenilai' => set_value('kodepenilai', $row->kodepenilai),
		'tipe' => set_value('tipe', $row->tipe),
        'listpetugasdinas'=>$this->M_petugasdinas->selectByAll(),
            'listpenilai'=>$this->M_penilai->selectByAll(),
            'listguru'=>$this->M_guru->selectByAll(),
	    );
            $this->load->view('penilaian/v_penilaianform', $data);
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
		'kodepenilaian' => $this->input->post('kodepenilaian'),
		'tanggal' => $this->input->post('tanggal'),
		'periode' => $this->input->post('periode'),
		'kodedinas' => $this->input->post('kodedinas'),
		'kodepenilai' => $this->input->post('kodepenilai'),
		'tipe' => $this->input->post('tipe'),
	    );

            $this->M_penilaian->update($this->uri->segment(3), $data);
            
            redirect(site_url('penilaian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_penilaian->selectById($id);

        if ($row) {
            $this->M_penilaian->delete($id);
            
            redirect(site_url('penilaian'));
        }
    }

}

/* End of file Penilaian.php */
/* Location: ./application/controllers/Penilaian.php */
/*  2016-06-18 02:43:30 */
/* Computer : Maruf */