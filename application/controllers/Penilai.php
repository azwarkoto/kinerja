<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_penilai');
        $this->load->library('form_validation');
        $this->load->model('M_guru');
        $this->load->model('CodeGenerator');
    }
     public function _rule() 
    {
	$this->form_validation->set_rules('kodepenilai', 'kodepenilai', 'trim|required');
	$this->form_validation->set_rules('kodeguru', 'kodeguru', 'trim|required');
	$this->form_validation->set_rules('nomorsk', 'nomorsk', 'trim|required');
	$this->form_validation->set_rules('tanggalsk', 'tanggalsk', 'trim|required');
	$this->form_validation->set_rules('berlaku', 'berlaku', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
    }

    public function index()
    {
         $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'penilai/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'penilai/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'penilai/index.html';
            $config['first_url'] = base_url() . 'penilai/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_penilai->total_rows($cari);
        $penilai = $this->M_penilai->get_limit_data($config['per_page'], $start, $cari);

        
        $this->pagination->initialize($config);

        $data = array(
            'penilai_data' => $penilai,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'listguru'=>$this->M_guru->selectByAll(),
        );
        $this->load->view('penilai/v_penilai', $data);
         $this->load->view('foot');
    }

    public function view($id) 
    {
        $this->load->view('nav');
        $row = $this->M_penilai->selectById($id);
        if ($row) {
            $data = array(
		'kodepenilai' => $row->kodepenilai,
		'kodeguru' => $row->kodeguru,
		'nomorsk' => $row->nomorsk,
		'tanggalsk' => $row->tanggalsk,
		'berlaku' => $row->berlaku,
		'keterangan' => $row->keterangan,
		'username' => $row->username,
		'password' => $row->password,
        'listguru'=>$this->M_guru->selectByAll(),
	    );
            $this->load->view('penilai/v_penilailihat', $data);
        } 
        $this->load->view('foot');
    }

    public function datainsert() 
    {
        $this->load->view('nav');
        $data = array(
           
	    'kodepenilai' => set_value('kodepenilai',$this->CodeGenerator->buatkode('penilai','kodepenilai','10','PNL')),
	    'kodeguru' => set_value('kodeguru'),
	    'nomorsk' => set_value('nomorsk'),
	    'tanggalsk' => set_value('tanggalsk'),
	    'berlaku' => set_value('berlaku'),
	    'keterangan' => set_value('keterangan'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
        'listguru'=>$this->M_guru->selectByAll(),
	);
        $this->load->view('penilai/v_penilaiform', $data);
        $this->load->view('foot');
    }
    
    public function insert() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->datainsert();
        } else {
            $data = array(
		'kodepenilai' => $this->input->post('kodepenilai'),
		'kodeguru' => $this->input->post('kodeguru'),
		'nomorsk' => $this->input->post('nomorsk'),
		'tanggalsk' => $this->input->post('tanggalsk'),
		'berlaku' => $this->input->post('berlaku'),
		'keterangan' => $this->input->post('keterangan'),
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password'),
	    );

            $this->M_penilai->insert($data);
            redirect(site_url('penilai'));
        }
    }
    
    public function dataupdate($id) 
    {
        $this->load->view('nav');
        $row = $this->M_penilai->selectById($id);

        if ($row) {
            $data = array(
                
		'kodepenilai' => set_value('kodepenilai', $row->kodepenilai),
		'kodeguru' => set_value('kodeguru', $row->kodeguru),
		'nomorsk' => set_value('nomorsk', $row->nomorsk),
		'tanggalsk' => set_value('tanggalsk', $row->tanggalsk),
		'berlaku' => set_value('berlaku', $row->berlaku),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
        'listguru'=>$this->M_guru->selectByAll(),
	    );
            $this->load->view('penilai/v_penilaiform', $data);
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
		'kodepenilai' => $this->input->post('kodepenilai'),
		'kodeguru' => $this->input->post('kodeguru'),
		'nomorsk' => $this->input->post('nomorsk'),
		'tanggalsk' => $this->input->post('tanggalsk'),
		'berlaku' => $this->input->post('berlaku'),
		'keterangan' => $this->input->post('keterangan'),
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password'),
	    );

            $this->M_penilai->update($this->uri->segment(3), $data);
            
            redirect(site_url('penilai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_penilai->selectById($id);

        if ($row) {
            $this->M_penilai->delete($id);
            
            redirect(site_url('penilai'));
        }
    }

}

/* End of file Penilai.php */
/* Location: ./application/controllers/Penilai.php */
/*  2016-06-18 02:43:51 */
/* Computer : Maruf */