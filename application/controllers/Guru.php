<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_guru');
        $this->load->library('form_validation');
        $this->load->model('M_pangkat');
        $this->load->model('M_jabatan');
        $this->load->model('M_golongan');
        $this->load->model('CodeGenerator');
    }
     public function _rule() 
    {
		$this->form_validation->set_rules('kodeguru', 'kodeguru', 'trim|required');
		$this->form_validation->set_rules('nip', 'nip', 'trim|required');
		$this->form_validation->set_rules('nuptk', 'nuptk', 'trim|required');
		$this->form_validation->set_rules('nrg', 'nrg', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('tempatlahir', 'tempatlahir', 'trim|required');
		$this->form_validation->set_rules('tanggallahir', 'tanggallahir', 'trim|required');
		$this->form_validation->set_rules('kodepangkat', 'kodepangkat', 'trim|required');
		$this->form_validation->set_rules('kodejabatan', 'kodejabatan', 'trim|required');
		$this->form_validation->set_rules('kodegolongan', 'kodegolongan', 'trim|required');
		$this->form_validation->set_rules('tmtguru', 'tmtguru', 'trim|required');
		$this->form_validation->set_rules('jeniskelamin', 'jeniskelamin', 'trim|required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
		$this->form_validation->set_rules('program', 'program', 'trim|required');
		$this->form_validation->set_rules('jam', 'jam', 'trim|required');
		$this->form_validation->set_rules('masakerja', 'masakerja', 'trim|required');
		$this->form_validation->set_rules('jenisguru', 'jenisguru', 'trim|required');
    }

    public function index()
    {
        $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'guru/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'guru/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'guru/index.html';
            $config['first_url'] = base_url() . 'guru/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_guru->total_rows($cari);
        $guru = $this->M_guru->get_limit_data($config['per_page'], $start, $cari);

        
        $this->pagination->initialize($config);

        $data = array(
            'guru_data' => $guru,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'listpangkat'=>$this->M_pangkat->selectByAll(),
            'listjabatan'=>$this->M_jabatan->selectByAll(),
            'listgolongan'=>$this->M_golongan->selectByAll(),
        );
        $this->load->view('guru/v_guru', $data);
         $this->load->view('foot');
    }

    public function view($id) 
    {
        $this->load->view('nav');
        $row = $this->M_guru->selectById($id);
        if ($row) {
            $data = array(
				'kodeguru' => $row->kodeguru,
				'nip' => $row->nip,
				'nuptk' => $row->nuptk,
				'nrg' => $row->nrg,
				'nama' => $row->nama,
				'tempatlahir' => $row->tempatlahir,
				'tanggallahir' => $row->tanggallahir,
				'kodepangkat' => $row->kodepangkat,
				'kodejabatan' => $row->kodejabatan,
				'kodegolongan' => $row->kodegolongan,
				'tmtguru' => $row->tmtguru,
				'jeniskelamin' => $row->jeniskelamin,
				'pendidikan' => $row->pendidikan,
				'program' => $row->program,
				'jam' => $row->jam,
				'masakerja' => $row->masakerja,
				'jenisguru' => $row->jenisguru,
				'listpangkat'=>$this->M_pangkat->selectByAll(),
	            'listjabatan'=>$this->M_jabatan->selectByAll(),
	            'listgolongan'=>$this->M_golongan->selectByAll(),
	    );
            $this->load->view('guru/v_gurulihat', $data);
        } 
        $this->load->view('foot');
    }

    public function datainsert() 
    {
        $this->load->view('nav');
        $data = array(
		    'kodeguru' => set_value('kodeguru',$this->CodeGenerator->buatkode('guru','kodeguru','10','GRU')),
		    'nip' => set_value('nip'),
		    'nuptk' => set_value('nuptk'),
		    'nrg' => set_value('nrg'),
		    'nama' => set_value('nama'),
		    'tempatlahir' => set_value('tempatlahir'),
		    'tanggallahir' => set_value('tanggallahir'),
		    'kodepangkat' => set_value('kodepangkat'),
		    'kodejabatan' => set_value('kodejabatan'),
		    'kodegolongan' => set_value('kodegolongan'),
		    'tmtguru' => set_value('tmtguru'),
		    'jeniskelamin' => set_value('jeniskelamin'),
		    'pendidikan' => set_value('pendidikan'),
		    'program' => set_value('program'),
		    'jam' => set_value('jam'),
		    'masakerja' => set_value('masakerja'),
		    'jenisguru' => set_value('jenisguru'),
		    'listpangkat'=>$this->M_pangkat->selectByAll(),
	        'listjabatan'=>$this->M_jabatan->selectByAll(),
	        'listgolongan'=>$this->M_golongan->selectByAll(),
	);
        $this->load->view('guru/v_guruform', $data);
        $this->load->view('foot');
    }
    
    public function insert() 
    {
        $this->_rule();

        if ($this->form_validation->run() == FALSE) {
            $this->datainsert();
        } else {
            $data = array(
				'kodeguru' => $this->input->post('kodeguru'),
				'nip' => $this->input->post('nip'),
				'nuptk' => $this->input->post('nuptk'),
				'nrg' => $this->input->post('nrg'),
				'nama' => $this->input->post('nama'),
				'tempatlahir' => $this->input->post('tempatlahir'),
				'tanggallahir' => $this->input->post('tanggallahir'),
				'kodepangkat' => $this->input->post('kodepangkat'),
				'kodejabatan' => $this->input->post('kodejabatan'),
				'kodegolongan' => $this->input->post('kodegolongan'),
				'tmtguru' => $this->input->post('tmtguru'),
				'jeniskelamin' => $this->input->post('jeniskelamin'),
				'pendidikan' => $this->input->post('pendidikan'),
				'program' => $this->input->post('program'),
				'jam' => $this->input->post('jam'),
				'masakerja' => $this->input->post('masakerja'),
				'jenisguru' => $this->input->post('jenisguru'),

	    );

            $this->M_guru->insert($data);
            redirect(site_url('guru'));
        }
    }
    
    public function dataupdate($id) 
    {
        $this->load->view('nav');
        $row = $this->M_guru->selectById($id);

        if ($row) {
            $data = array(
                
				'kodeguru' => set_value('kodeguru', $row->kodeguru),
				'nip' => set_value('nip', $row->nip),
				'nuptk' => set_value('nuptk', $row->nuptk),
				'nrg' => set_value('nrg', $row->nrg),
				'nama' => set_value('nama', $row->nama),
				'tempatlahir' => set_value('tempatlahir', $row->tempatlahir),
				'tanggallahir' => set_value('tanggallahir', $row->tanggallahir),
				'kodepangkat' => set_value('kodepangkat', $row->kodepangkat),
				'kodejabatan' => set_value('kodejabatan', $row->kodejabatan),
				'kodegolongan' => set_value('kodegolongan', $row->kodegolongan),
				'tmtguru' => set_value('tmtguru', $row->tmtguru),
				'jeniskelamin' => set_value('jeniskelamin', $row->jeniskelamin),
				'pendidikan' => set_value('pendidikan', $row->pendidikan),
				'program' => set_value('program', $row->program),
				'jam' => set_value('jam', $row->jam),
				'masakerja' => set_value('masakerja', $row->masakerja),
				'jenisguru' => set_value('jenisguru', $row->jenisguru),
				'listpangkat'=>$this->M_pangkat->selectByAll(),
	            'listjabatan'=>$this->M_jabatan->selectByAll(),
	            'listgolongan'=>$this->M_golongan->selectByAll(),
	    );
            $this->load->view('guru/v_guruform', $data);
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
				'kodeguru' => $this->input->post('kodeguru'),
				'nip' => $this->input->post('nip'),
				'nuptk' => $this->input->post('nuptk'),
				'nrg' => $this->input->post('nrg'),
				'nama' => $this->input->post('nama'),
				'tempatlahir' => $this->input->post('tempatlahir'),
				'tanggallahir' => $this->input->post('tanggallahir'),
				'kodepangkat' => $this->input->post('kodepangkat'),
				'kodejabatan' => $this->input->post('kodejabatan'),
				'kodegolongan' => $this->input->post('kodegolongan'),
				'tmtguru' => $this->input->post('tmtguru'),
				'jeniskelamin' => $this->input->post('jeniskelamin'),
				'pendidikan' => $this->input->post('pendidikan'),
				'program' => $this->input->post('program'),
				'jam' => $this->input->post('jam'),
				'masakerja' => $this->input->post('masakerja'),
				'jenisguru' => $this->input->post('jenisguru'),
	    );

            $this->M_guru->update($this->uri->segment(3), $data);
            
            redirect(site_url('guru'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_guru->selectById($id);

        if ($row) {
            $this->M_guru->delete($id);
            
            redirect(site_url('guru'));
        }
    }

}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */
/*  2016-06-17 20:18:31 */
/* Computer : Maruf */