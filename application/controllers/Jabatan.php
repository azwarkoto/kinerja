<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_jabatan');
        $this->load->library('form_validation');
        $this->load->model('CodeGenerator');
    }
     public function _rule() 
    {
	$this->form_validation->set_rules('kodejabatan', 'kodejabatan', 'trim|required');
	$this->form_validation->set_rules('namajabatan', 'namajabatan', 'trim|required');
    }

    public function index()
    {
         $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'jabatan/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'jabatan/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'jabatan/index.html';
            $config['first_url'] = base_url() . 'jabatan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_jabatan->total_rows($cari);
        $jabatan = $this->M_jabatan->get_limit_data($config['per_page'], $start, $cari);

        
        $this->pagination->initialize($config);

        $data = array(
            'jabatan_data' => $jabatan,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jabatan/v_jabatan', $data);
         $this->load->view('foot');
    }

    public function view($id) 
    {
        $this->load->view('nav');
        $row = $this->M_jabatan->selectById($id);
        if ($row) {
            $data = array(
		'kodejabatan' => $row->kodejabatan,
		'namajabatan' => $row->namajabatan,
	    );
            $this->load->view('jabatan/v_jabatanlihat', $data);
        } 
        $this->load->view('foot');
    }

    public function datainsert() 
    {
        $this->load->view('nav');
        $data = array(
           
	    'kodejabatan' => set_value('kodejabatan',$this->CodeGenerator->buatkode('jabatan','kodejabatan','10','JBT')),
	    'namajabatan' => set_value('namajabatan'),
	);
        $this->load->view('jabatan/v_jabatanform', $data);
        $this->load->view('foot');
    }
    
    public function insert() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->datainsert();
        } else {
            $data = array(
		'kodejabatan' => $this->input->post('kodejabatan'),
		'namajabatan' => $this->input->post('namajabatan'),
	    );

            $this->M_jabatan->insert($data);
            redirect(site_url('jabatan'));
        }
    }
    
    public function dataupdate($id) 
    {
        $this->load->view('nav');
        $row = $this->M_jabatan->selectById($id);

        if ($row) {
            $data = array(
                
		'kodejabatan' => set_value('kodejabatan', $row->kodejabatan),
		'namajabatan' => set_value('namajabatan', $row->namajabatan),
	    );
            $this->load->view('jabatan/v_jabatanform', $data);
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
		'kodejabatan' => $this->input->post('kodejabatan'),
		'namajabatan' => $this->input->post('namajabatan'),
	    );

            $this->M_jabatan->update($this->uri->segment(3), $data);
            
            redirect(site_url('jabatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_jabatan->selectById($id);

        if ($row) {
            $this->M_jabatan->delete($id);
            
            redirect(site_url('jabatan'));
        }
    }

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */
/*  2016-06-17 18:47:14 */
/* Computer : Maruf */