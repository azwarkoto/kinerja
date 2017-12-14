<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pangkat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pangkat');
        $this->load->library('form_validation');
        $this->load->model('CodeGenerator');
    }
     public function _rule() 
    {
	$this->form_validation->set_rules('kodepangkat', 'kodepangkat', 'trim|required');
	$this->form_validation->set_rules('namapangkat', 'namapangkat', 'trim|required');
    }

    public function index()
    {
         $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'pangkat/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'pangkat/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'pangkat/index.html';
            $config['first_url'] = base_url() . 'pangkat/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_pangkat->total_rows($cari);
        $pangkat = $this->M_pangkat->get_limit_data($config['per_page'], $start, $cari);

        
        $this->pagination->initialize($config);

        $data = array(
            'pangkat_data' => $pangkat,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pangkat/v_pangkat', $data);
         $this->load->view('foot');
    }

    public function view($id) 
    {
        $this->load->view('nav');
        $row = $this->M_pangkat->selectById($id);
        if ($row) {
            $data = array(
		'kodepangkat' => $row->kodepangkat,
		'namapangkat' => $row->namapangkat,
	    );
            $this->load->view('pangkat/v_pangkatlihat', $data);
        } 
        $this->load->view('foot');
    }

    public function datainsert() 
    {
        $this->load->view('nav');
        $data = array(
           
	    'kodepangkat' => set_value('kodepangkat',$this->CodeGenerator->buatkode('pangkat','kodepangkat','10','PKT')),
	    'namapangkat' => set_value('namapangkat'),
	);
        $this->load->view('pangkat/v_pangkatform', $data);
        $this->load->view('foot');
    }
    
    public function insert() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->datainsert();
        } else {
            $data = array(
		'kodepangkat' => $this->input->post('kodepangkat'),
		'namapangkat' => $this->input->post('namapangkat'),
	    );

            $this->M_pangkat->insert($data);
            redirect(site_url('pangkat'));
        }
    }
    
    public function dataupdate($id) 
    {
        $this->load->view('nav');
        $row = $this->M_pangkat->selectById($id);

        if ($row) {
            $data = array(
                
		'kodepangkat' => set_value('kodepangkat', $row->kodepangkat),
		'namapangkat' => set_value('namapangkat', $row->namapangkat),
	    );
            $this->load->view('pangkat/v_pangkatform', $data);
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
		'kodepangkat' => $this->input->post('kodepangkat'),
		'namapangkat' => $this->input->post('namapangkat'),
	    );

            $this->M_pangkat->update($this->uri->segment(3), $data);
            
            redirect(site_url('pangkat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_pangkat->selectById($id);

        if ($row) {
            $this->M_pangkat->delete($id);
            
            redirect(site_url('pangkat'));
        }
    }

}

/* End of file Pangkat.php */
/* Location: ./application/controllers/Pangkat.php */
/*  2016-06-17 18:46:59 */
/* Computer : Maruf */