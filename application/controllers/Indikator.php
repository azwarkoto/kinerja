<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Indikator extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_indikator');
        $this->load->library('form_validation');
        $this->load->model('M_kompetensi');
        $this->load->model('CodeGenerator');
    }
     public function _rule() 
    {
	$this->form_validation->set_rules('kodeindikator', 'kodeindikator', 'trim|required');
	$this->form_validation->set_rules('kodekompetensi', 'kodekompetensi', 'trim|required');
	$this->form_validation->set_rules('isiindikator', 'isiindikator', 'trim|required');
    }

    public function index()
    {
         $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'indikator/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'indikator/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'indikator/index.html';
            $config['first_url'] = base_url() . 'indikator/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_indikator->total_rows($cari);
        $indikator = $this->M_indikator->get_limit_data($config['per_page'], $start, $cari);

        
        $this->pagination->initialize($config);

        $data = array(
            'indikator_data' => $indikator,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'listkompetensi'=>$this->M_kompetensi->selectByAll(),
        );
        $this->load->view('indikator/v_indikator', $data);
         $this->load->view('foot');
    }

    public function view($id) 
    {
        $this->load->view('nav');
        $row = $this->M_indikator->selectById($id);
        if ($row) {
            $data = array(
		'kodeindikator' => $row->kodeindikator,
		'kodekompetensi' => $row->kodekompetensi,
		'isiindikator' => $row->isiindikator,
        'listkompetensi'=>$this->M_kompetensi->selectByAll(),
	    );
            $this->load->view('indikator/v_indikatorlihat', $data);
        } 
        $this->load->view('foot');
    }

    public function datainsert() 
    {
        $this->load->view('nav');
        $data = array(
           
	    'kodeindikator' => set_value('kodeindikator',$this->CodeGenerator->buatkode('indikator','kodeindikator','10','IDK')),
	    'kodekompetensi' => set_value('kodekompetensi'),
	    'isiindikator' => set_value('isiindikator'),
        'listkompetensi'=>$this->M_kompetensi->selectByAll(),
	);
        $this->load->view('indikator/v_indikatorform', $data);
        $this->load->view('foot');
    }
    
    public function insert() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->datainsert();
        } else {
            $data = array(
		'kodeindikator' => $this->input->post('kodeindikator'),
		'kodekompetensi' => $this->input->post('kodekompetensi'),
		'isiindikator' => $this->input->post('isiindikator'),
	    );

            $this->M_indikator->insert($data);
            redirect(site_url('indikator'));
        }
    }
    
    public function dataupdate($id) 
    {
        $this->load->view('nav');
        $row = $this->M_indikator->selectById($id);

        if ($row) {
            $data = array(
                
		'kodeindikator' => set_value('kodeindikator', $row->kodeindikator),
		'kodekompetensi' => set_value('kodekompetensi', $row->kodekompetensi),
		'isiindikator' => set_value('isiindikator', $row->isiindikator),
        'listkompetensi'=>$this->M_kompetensi->selectByAll(),
	    );
            $this->load->view('indikator/v_indikatorform', $data);
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
		'kodeindikator' => $this->input->post('kodeindikator'),
		'kodekompetensi' => $this->input->post('kodekompetensi'),
		'isiindikator' => $this->input->post('isiindikator'),
	    );

            $this->M_indikator->update($this->uri->segment(3), $data);
            
            redirect(site_url('indikator'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_indikator->selectById($id);

        if ($row) {
            $this->M_indikator->delete($id);
            
            redirect(site_url('indikator'));
        }
    }

}

/* End of file Indikator.php */
/* Location: ./application/controllers/Indikator.php */
/*  2016-06-17 19:05:37 */
/* Computer : Maruf */