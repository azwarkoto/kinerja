<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komplain extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_komplain');
        $this->load->library('form_validation');
        $this->load->model('M_guru');
        $this->load->model('M_penilai');
        $this->load->model('CodeGenerator');
    }
     public function _rule()
    {
		$this->form_validation->set_rules('kodeguru', 'kodeguru', 'trim|required');
		$this->form_validation->set_rules('kodepenilai', 'kodepenilai', 'trim|required');
		$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
    }

    public function index()
    {
        $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));

        if ($cari <> '') {
            $config['base_url'] = base_url() . 'komplain/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'komplain/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'komplain/index.html';
            $config['first_url'] = base_url() . 'komplain/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_komplain->total_rows($cari);
        $komplain = $this->M_komplain->get_limit_data($config['per_page'], $start, $cari);


        $this->pagination->initialize($config);

        $data = array(
            'komplain_data' => $komplain,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start
            // 'listpangkat'=>$this->M_pangkat->selectByAll(),
            // 'listjabatan'=>$this->M_jabatan->selectByAll(),
        );
        $this->load->view('komplain/v_komplain', $data);
         $this->load->view('foot');
    }

    public function view($id)
    {
        $this->load->view('nav');
        $row = $this->M_guru->selectById($id);
        if ($row) {
            $data = array(
				'kodeguru' => $row->kodeguru,
				'kodepenilai' => $row->kodepenilai,
				'gambar' => $row->gambar,
				'status' => $row->status
				// 'nama' => $row->nama,
				// 'tempatlahir' => $row->tempatlahir,
				// 'tanggallahir' => $row->tanggallahir,
				// 'kodepangkat' => $row->kodepangkat,
				// 'kodejabatan' => $row->kodejabatan,
				// 'kodegolongan' => $row->kodegolongan,
				// 'tmtguru' => $row->tmtguru,
				// 'jeniskelamin' => $row->jeniskelamin,
				// 'pendidikan' => $row->pendidikan,
				// 'program' => $row->program,
				// 'jam' => $row->jam,
				// 'masakerja' => $row->masakerja,
				// 'jenisguru' => $row->jenisguru,
				// 'listpangkat'=>$this->M_pangkat->selectByAll(),
	      //       'listjabatan'=>$this->M_jabatan->selectByAll(),
	      //       'listgolongan'=>$this->M_golongan->selectByAll(),
	    );
            $this->load->view('komplain/v_komplainlihat', $data);
        }
        $this->load->view('foot');
    }

  //   public function datainsert()
  //   {
  //       $this->load->view('nav');
  //       $data = array(
	// 	    'kodeguru' => set_value('kodeguru',$this->CodeGenerator->buatkode('guru','kodeguru','10','GRU')),
	// 	    'nip' => set_value('nip'),
	// 	    'nuptk' => set_value('nuptk'),
	// 	    'nrg' => set_value('nrg'),
	// 	    'nama' => set_value('nama'),
	// 	    'tempatlahir' => set_value('tempatlahir'),
	// 	    'tanggallahir' => set_value('tanggallahir'),
	// 	    'kodepangkat' => set_value('kodepangkat'),
	// 	    'kodejabatan' => set_value('kodejabatan'),
	// 	    'kodegolongan' => set_value('kodegolongan'),
	// 	    'tmtguru' => set_value('tmtguru'),
	// 	    'jeniskelamin' => set_value('jeniskelamin'),
	// 	    'pendidikan' => set_value('pendidikan'),
	// 	    'program' => set_value('program'),
	// 	    'jam' => set_value('jam'),
	// 	    'masakerja' => set_value('masakerja'),
	// 	    'jenisguru' => set_value('jenisguru'),
	// 	    'listpangkat'=>$this->M_pangkat->selectByAll(),
	//         'listjabatan'=>$this->M_jabatan->selectByAll(),
	//         'listgolongan'=>$this->M_golongan->selectByAll(),
	// );
  //       $this->load->view('guru/v_guruform', $data);
  //       $this->load->view('foot');
  //   }
  //
  //   public function insert()
  //   {
  //       $this->_rule();
  //
  //       if ($this->form_validation->run() == FALSE) {
  //           $this->datainsert();
  //       } else {
  //           $data = array(
	// 			'kodeguru' => $this->input->post('kodeguru'),
	// 			'nip' => $this->input->post('nip'),
	// 			'nuptk' => $this->input->post('nuptk'),
	// 			'nrg' => $this->input->post('nrg'),
	// 			'nama' => $this->input->post('nama'),
	// 			'tempatlahir' => $this->input->post('tempatlahir'),
	// 			'tanggallahir' => $this->input->post('tanggallahir'),
	// 			'kodepangkat' => $this->input->post('kodepangkat'),
	// 			'kodejabatan' => $this->input->post('kodejabatan'),
	// 			'kodegolongan' => $this->input->post('kodegolongan'),
	// 			'tmtguru' => $this->input->post('tmtguru'),
	// 			'jeniskelamin' => $this->input->post('jeniskelamin'),
	// 			'pendidikan' => $this->input->post('pendidikan'),
	// 			'program' => $this->input->post('program'),
	// 			'jam' => $this->input->post('jam'),
	// 			'masakerja' => $this->input->post('masakerja'),
	// 			'jenisguru' => $this->input->post('jenisguru'),
  //
	//     );
  //
  //           $this->M_guru->insert($data);
  //           redirect(site_url('guru'));
  //       }
  //   }

    public function dataupdate($id)
    {
        $this->load->view('nav');
        $row = $this->M_komplain->selectById($id);

        if ($row) {
            $data = array(

				'kodeguru' => set_value('kodeguru', $row->kodeguru),
				'kodepenilai' => set_value('kodepenilai', $row->kodepenilai),
				'gambar' => set_value('gambar', $row->gambar),
				'status' => set_value('status', $row->status)
				// 'nama' => set_value('nama', $row->nama),
				// 'tempatlahir' => set_value('tempatlahir', $row->tempatlahir),
				// 'tanggallahir' => set_value('tanggallahir', $row->tanggallahir),
				// 'kodepangkat' => set_value('kodepangkat', $row->kodepangkat),
				// 'kodejabatan' => set_value('kodejabatan', $row->kodejabatan),
				// 'kodegolongan' => set_value('kodegolongan', $row->kodegolongan),
				// 'tmtguru' => set_value('tmtguru', $row->tmtguru),
				// 'jeniskelamin' => set_value('jeniskelamin', $row->jeniskelamin),
				// 'pendidikan' => set_value('pendidikan', $row->pendidikan),
				// 'program' => set_value('program', $row->program),
				// 'jam' => set_value('jam', $row->jam),
				// 'masakerja' => set_value('masakerja', $row->masakerja),
				// 'jenisguru' => set_value('jenisguru', $row->jenisguru),
				// 'listpangkat'=>$this->M_pangkat->selectByAll(),
	      //       'listjabatan'=>$this->M_jabatan->selectByAll(),
	      //       'listgolongan'=>$this->M_golongan->selectByAll(),
	    );
            $this->load->view('komplain/v_komplainform', $data);
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
				'kodepenilai' => $this->input->post('kodepenilai'),
				'gambar' => $this->input->post('gambar'),
				'status' => $this->input->post('status')
				// 'nama' => $this->input->post('nama'),
				// 'tempatlahir' => $this->input->post('tempatlahir'),
				// 'tanggallahir' => $this->input->post('tanggallahir'),
				// 'kodepangkat' => $this->input->post('kodepangkat'),
				// 'kodejabatan' => $this->input->post('kodejabatan'),
				// 'kodegolongan' => $this->input->post('kodegolongan'),
				// 'tmtguru' => $this->input->post('tmtguru'),
				// 'jeniskelamin' => $this->input->post('jeniskelamin'),
				// 'pendidikan' => $this->input->post('pendidikan'),
				// 'program' => $this->input->post('program'),
				// 'jam' => $this->input->post('jam'),
				// 'masakerja' => $this->input->post('masakerja'),
				// 'jenisguru' => $this->input->post('jenisguru'),
	    );

            $this->M_komplain->update($this->uri->segment(3), $data);

            redirect(site_url('komplain'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_komplain->selectById($id);

        if ($row) {
            $this->M_komplain->delete($id);

            redirect(site_url('komplain'));
        }
    }

}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */
/*  2016-06-17 20:18:31 */
/* Computer : Maruf */
