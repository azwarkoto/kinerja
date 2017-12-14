<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Golongan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_golongan');
        $this->load->library('form_validation');
        $this->load->model('CodeGenerator');
    }
     public function _rule() 
    {
	$this->form_validation->set_rules('kodegolongan', 'kodegolongan', 'trim|required');
	$this->form_validation->set_rules('namagolongan', 'namagolongan', 'trim|required');
	$this->form_validation->set_rules('nilaiakk', 'nilaiakk', 'trim|required');
	$this->form_validation->set_rules('nilaiakpkb', 'nilaiakpkb', 'trim|required');
	$this->form_validation->set_rules('nilaiakp', 'nilaiakp', 'trim|required');
	$this->form_validation->set_rules('jwm', 'jwm', 'trim|required');
    }

    public function index()
    {
         $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'golongan/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'golongan/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'golongan/index.html';
            $config['first_url'] = base_url() . 'golongan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_golongan->total_rows($cari);
        $golongan = $this->M_golongan->get_limit_data($config['per_page'], $start, $cari);

        
        $this->pagination->initialize($config);

        $data = array(
            'golongan_data' => $golongan,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('golongan/v_golongan', $data);
         $this->load->view('foot');
    }

    public function view($id) 
    {
        $this->load->view('nav');
        $row = $this->M_golongan->selectById($id);
        if ($row) {
            $data = array(
		'kodegolongan' => $row->kodegolongan,
		'namagolongan' => $row->namagolongan,
		'nilaiakk' => $row->nilaiakk,
		'nilaiakpkb' => $row->nilaiakpkb,
		'nilaiakp' => $row->nilaiakp,
		'jwm' => $row->jwm,
	    );
            $this->load->view('golongan/v_golonganlihat', $data);
        } 
        $this->load->view('foot');
    }

    public function datainsert() 
    {
        $this->load->view('nav');
        $data = array(
           
	    'kodegolongan' => set_value('kodegolongan',$this->CodeGenerator->buatkode('golongan','kodegolongan','10','GLN')),
	    'namagolongan' => set_value('namagolongan'),
	    'nilaiakk' => set_value('nilaiakk'),
	    'nilaiakpkb' => set_value('nilaiakpkb'),
	    'nilaiakp' => set_value('nilaiakp'),
	    'jwm' => set_value('jwm'),
	);
        $this->load->view('golongan/v_golonganform', $data);
        $this->load->view('foot');
    }
    
    public function insert() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->datainsert();
        } else {
            $data = array(
		'kodegolongan' => $this->input->post('kodegolongan'),
		'namagolongan' => $this->input->post('namagolongan'),
		'nilaiakk' => $this->input->post('nilaiakk'),
		'nilaiakpkb' => $this->input->post('nilaiakpkb'),
		'nilaiakp' => $this->input->post('nilaiakp'),
		'jwm' => $this->input->post('jwm'),
	    );

            $this->M_golongan->insert($data);
            redirect(site_url('golongan'));
        }
    }
    
    public function dataupdate($id) 
    {
        $this->load->view('nav');
        $row = $this->M_golongan->selectById($id);

        if ($row) {
            $data = array(
                
		'kodegolongan' => set_value('kodegolongan', $row->kodegolongan),
		'namagolongan' => set_value('namagolongan', $row->namagolongan),
		'nilaiakk' => set_value('nilaiakk', $row->nilaiakk),
		'nilaiakpkb' => set_value('nilaiakpkb', $row->nilaiakpkb),
		'nilaiakp' => set_value('nilaiakp', $row->nilaiakp),
		'jwm' => set_value('jwm', $row->jwm),
	    );
            $this->load->view('golongan/v_golonganform', $data);
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
		'kodegolongan' => $this->input->post('kodegolongan'),
		'namagolongan' => $this->input->post('namagolongan'),
		'nilaiakk' => $this->input->post('nilaiakk'),
		'nilaiakpkb' => $this->input->post('nilaiakpkb'),
		'nilaiakp' => $this->input->post('nilaiakp'),
		'jwm' => $this->input->post('jwm'),
	    );

            $this->M_golongan->update($this->uri->segment(3), $data);
            
            redirect(site_url('golongan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_golongan->selectById($id);

        if ($row) {
            $this->M_golongan->delete($id);
            
            redirect(site_url('golongan'));
        }
    }

}

/* End of file Golongan.php */
/* Location: ./application/controllers/Golongan.php */
/*  2016-06-17 18:48:14 */
/* Computer : Maruf */