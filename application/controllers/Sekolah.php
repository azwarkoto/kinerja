<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_sekolah');
        $this->load->library('form_validation');
        $this->load->model('M_guru');
        $this->load->model('CodeGenerator');
    }
     public function _rule() 
    {
	$this->form_validation->set_rules('kode_sekolah', 'kode sekolah', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('telp', 'telp', 'trim|required');
	$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('idguru', 'idguru', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
    }

    public function index()
    {
         $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'sekolah/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'sekolah/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'sekolah/index.html';
            $config['first_url'] = base_url() . 'sekolah/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_sekolah->total_rows($cari);
        $sekolah = $this->M_sekolah->get_limit_data($config['per_page'], $start, $cari);

        
        $this->pagination->initialize($config);

        $data = array(
            'sekolah_data' => $sekolah,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'listguru'=>$this->M_guru->selectByAll(),
        );
        $this->load->view('sekolah/v_sekolah', $data);
         $this->load->view('foot');
    }

    public function view($id) 
    {
        $this->load->view('nav');
        $row = $this->M_sekolah->selectById($id);
        if ($row) {
            $data = array(
		'kode_sekolah' => $row->kode_sekolah,
		'nama' => $row->nama,
		'telp' => $row->telp,
		'kelurahan' => $row->kelurahan,
		'kecamatan' => $row->kecamatan,
		'kabupaten' => $row->kabupaten,
		'provinsi' => $row->provinsi,
		'alamat' => $row->alamat,
		'idguru' => $row->idguru,
		'status' => $row->status,
        'listguru'=>$this->M_guru->selectByAll(),
	    );
            $this->load->view('sekolah/v_sekolahlihat', $data);
        } 
        $this->load->view('foot');
    }

    public function datainsert() 
    {
        $this->load->view('nav');
        $data = array(
           
	    'kode_sekolah' => set_value('kode_sekolah',$this->CodeGenerator->buatkode('sekolah','kode_sekolah','10','SKL')),
	    'nama' => set_value('nama'),
	    'telp' => set_value('telp'),
	    'kelurahan' => set_value('kelurahan'),
	    'kecamatan' => set_value('kecamatan'),
	    'kabupaten' => set_value('kabupaten'),
	    'provinsi' => set_value('provinsi'),
	    'alamat' => set_value('alamat'),
	    'idguru' => set_value('idguru'),
	    'status' => set_value('status'),
        'listguru'=>$this->M_guru->selectByAll(),
	);
        $this->load->view('sekolah/v_sekolahform', $data);
        $this->load->view('foot');
    }
    
    public function insert() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->datainsert();
        } else {
            $data = array(
		'kode_sekolah' => $this->input->post('kode_sekolah'),
		'nama' => $this->input->post('nama'),
		'telp' => $this->input->post('telp'),
		'kelurahan' => $this->input->post('kelurahan'),
		'kecamatan' => $this->input->post('kecamatan'),
		'kabupaten' => $this->input->post('kabupaten'),
		'provinsi' => $this->input->post('provinsi'),
		'alamat' => $this->input->post('alamat'),
		'idguru' => $this->input->post('idguru'),
		'status' => $this->input->post('status'),
	    );

            $this->M_sekolah->insert($data);
            redirect(site_url('sekolah'));
        }
    }
    
    public function dataupdate($id) 
    {
        $this->load->view('nav');
        $row = $this->M_sekolah->selectById($id);

        if ($row) {
            $data = array(
                
		'kode_sekolah' => set_value('kode_sekolah', $row->kode_sekolah),
		'nama' => set_value('nama', $row->nama),
		'telp' => set_value('telp', $row->telp),
		'kelurahan' => set_value('kelurahan', $row->kelurahan),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
		'kabupaten' => set_value('kabupaten', $row->kabupaten),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'alamat' => set_value('alamat', $row->alamat),
		'idguru' => set_value('idguru', $row->idguru),
		'status' => set_value('status', $row->status),
        'listguru'=>$this->M_guru->selectByAll(),
	    );
            $this->load->view('sekolah/v_sekolahform', $data);
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
		'kode_sekolah' => $this->input->post('kode_sekolah'),
		'nama' => $this->input->post('nama'),
		'telp' => $this->input->post('telp'),
		'kelurahan' => $this->input->post('kelurahan'),
		'kecamatan' => $this->input->post('kecamatan'),
		'kabupaten' => $this->input->post('kabupaten'),
		'provinsi' => $this->input->post('provinsi'),
		'alamat' => $this->input->post('alamat'),
		'idguru' => $this->input->post('idguru'),
		'status' => $this->input->post('status'),
	    );

            $this->M_sekolah->update($this->uri->segment(3), $data);
            
            redirect(site_url('sekolah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_sekolah->selectById($id);

        if ($row) {
            $this->M_sekolah->delete($id);
            
            redirect(site_url('sekolah'));
        }
    }

}

/* End of file Sekolah.php */
/* Location: ./application/controllers/Sekolah.php */
/*  2016-06-17 20:15:04 */
/* Computer : Maruf */