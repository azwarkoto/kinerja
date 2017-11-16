<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kompetensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kompetensi');
        $this->load->model('M_kategori');
        $this->load->library('form_validation');
        $this->load->model('CodeGenerator');
    }
     public function _rule() 
    {
	$this->form_validation->set_rules('kodekompetensi', 'kodekompetensi', 'trim|required');
	$this->form_validation->set_rules('kodekategori', 'kodekategori', 'trim|required');
	$this->form_validation->set_rules('namakompetensi', 'namakompetensi', 'trim|required');
    }

    public function index()
    {
         $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'kompetensi/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'kompetensi/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'kompetensi/index.html';
            $config['first_url'] = base_url() . 'kompetensi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_kompetensi->total_rows($cari);
        $kompetensi = $this->M_kompetensi->get_limit_data($config['per_page'], $start, $cari);

        
        $this->pagination->initialize($config);

        $data = array(
            'kompetensi_data' => $kompetensi,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'listkategori' => $this->M_kategori->selectByAll(),
        );
        $this->load->view('kompetensi/v_kompetensi', $data);
         $this->load->view('foot');
    }

    public function view($id) 
    {
        $this->load->view('nav');
        $row = $this->M_kompetensi->selectById($id);
        if ($row) {
            $data = array(
		'kodekompetensi' => $row->kodekompetensi,
		'kodekategori' => $row->kodekategori,
		'namakompetensi' => $row->namakompetensi,
        'listkategori' => $data = $this->M_kategori->selectByAll(),
	    );

            $this->load->view('kompetensi/v_kompetensilihat', $data);
        } 
        $this->load->view('foot');
    }

    public function datainsert() 
    {
        $this->load->view('nav');
         
        $data = array(
           
    	    'kodekompetensi' => set_value('kodekompetensi',$this->CodeGenerator->buatkode('kompetensi','kodekompetensi','10','KMP')),
    	    'kodekategori' => set_value('kodekategori'),
    	    'namakompetensi' => set_value('namakompetensi'),
            'listkategori' =>$data = $this->M_kategori->selectByAll(),
	   );
        // var_dump($data);
        $this->load->view('kompetensi/v_kompetensiform', $data);
        $this->load->view('foot');
    }
    
    public function insert() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->datainsert();
        } else {
            $data = array(
		'kodekompetensi' => $this->input->post('kodekompetensi'),
		'kodekategori' => $this->input->post('kodekategori'),
		'namakompetensi' => $this->input->post('namakompetensi'),
	    );

            $this->M_kompetensi->insert($data);
            redirect(site_url('kompetensi'));
        }
    }
    
    public function dataupdate($id) 
    {
        $this->load->view('nav');
        $row = $this->M_kompetensi->selectById($id);

        if ($row) {
            $data = array(
                
		'kodekompetensi' => set_value('kodekompetensi', $row->kodekompetensi),
		'kodekategori' => set_value('kodekategori', $row->kodekategori),
		'namakompetensi' => set_value('namakompetensi', $row->namakompetensi),
        'listkategori' => $data = $this->M_kategori->selectByAll(),
	    );
            $this->load->view('kompetensi/v_kompetensiform', $data);
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
		'kodekompetensi' => $this->input->post('kodekompetensi'),
		'kodekategori' => $this->input->post('kodekategori'),
		'namakompetensi' => $this->input->post('namakompetensi'),
	    );

            $this->M_kompetensi->update($this->uri->segment(3), $data);
            
            redirect(site_url('kompetensi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_kompetensi->selectById($id);

        if ($row) {
            $this->M_kompetensi->delete($id);
            
            redirect(site_url('kompetensi'));
        }
    }

}

/* End of file Kompetensi.php */
/* Location: ./application/controllers/Kompetensi.php */
/*  2016-06-17 19:06:46 */
/* Computer : Maruf */