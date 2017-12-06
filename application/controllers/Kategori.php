<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori');
        $this->load->library('form_validation');
        $this->load->model('M_jenispenilaian');
        $this->load->model('CodeGenerator');
    }
     public function _rule() 
    {
	$this->form_validation->set_rules('kodekategori', 'kodekategori', 'trim|required');
	$this->form_validation->set_rules('namakategori', 'namakategori', 'trim|required');
	$this->form_validation->set_rules('kodejenis', 'kodejenis', 'trim|required');
    }

    public function index()
    {
         $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'kategori/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'kategori/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'kategori/index.html';
            $config['first_url'] = base_url() . 'kategori/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_kategori->total_rows($cari);
        $kategori = $this->M_kategori->get_limit_data($config['per_page'], $start, $cari);

        
        $this->pagination->initialize($config);

        $data = array(
            'kategori_data' => $kategori,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'listjenispenilaian' => $this->M_jenispenilaian->selectByAll(),
        );
        $this->load->view('kategori/v_kategori', $data);
         $this->load->view('foot');
    }

    public function view($id) 
    {
        $this->load->view('nav');
        $row = $this->M_kategori->selectById($id);
        if ($row) {
            $data = array(
		'kodekategori' => $row->kodekategori,
		'namakategori' => $row->namakategori,
		'kodejenis' => $row->kodejenis,
        'listjenispenilaian' => $this->M_jenispenilaian->selectByAll(),
	    );
            $this->load->view('kategori/v_kategorilihat', $data);
        } 
        $this->load->view('foot');
    }

    public function datainsert() 
    {
        $this->load->view('nav');
        $data = array(
           
	    'kodekategori' => set_value('kodekategori',$this->CodeGenerator->buatkode('kategori','kodekategori','10','KTG')),
	    'namakategori' => set_value('namakategori'),
	    'kodejenis' => set_value('kodejenis'),
         'listjenispenilaian' => $this->M_jenispenilaian->selectByAll(),
	);
        $this->load->view('kategori/v_kategoriform', $data);
        $this->load->view('foot');
    }
    
    public function insert() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->datainsert();
        } else {
            $data = array(
		'kodekategori' => $this->input->post('kodekategori'),
		'namakategori' => $this->input->post('namakategori'),
		'kodejenis' => $this->input->post('kodejenis'),
	    );

            $this->M_kategori->insert($data);
            redirect(site_url('kategori'));
        }
    }
    
    public function dataupdate($id) 
    {
        $this->load->view('nav');
        $row = $this->M_kategori->selectById($id);

        if ($row) {
            $data = array(
                
		'kodekategori' => set_value('kodekategori', $row->kodekategori),
		'namakategori' => set_value('namakategori', $row->namakategori),
		'kodejenis' => set_value('kodejenis', $row->kodejenis),
         'listjenispenilaian' => $this->M_jenispenilaian->selectByAll(),
	    );
            $this->load->view('kategori/v_kategoriform', $data);
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
		'kodekategori' => $this->input->post('kodekategori'),
		'namakategori' => $this->input->post('namakategori'),
		'kodejenis' => $this->input->post('kodejenis'),
	    );

            $this->M_kategori->update($this->uri->segment(3), $data);
            
            redirect(site_url('kategori'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_kategori->selectById($id);

        if ($row) {
            $this->M_kategori->delete($id);
            
            redirect(site_url('kategori'));
        }
    }

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/*  2016-06-17 19:07:44 */
/* Computer : Maruf */