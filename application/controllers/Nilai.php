<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
 	function __construct()
    {
        parent::__construct();
        $this->load->model('M_guru');
        $this->load->library('form_validation');
        $this->load->model('M_pangkat');
        $this->load->model('M_jabatan');
        $this->load->model('M_golongan');

        $this->load->model('M_jenispenilaian');
        $this->load->model('M_kategori');
        $this->load->model('M_kompetensi');
        $this->load->model('M_indikator');
        $this->load->model('M_nilai');
    }
    
	
	public function index()
    {
        $this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'nilai/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'nilai/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'nilai/index.html';
            $config['first_url'] = base_url() . 'nilai/index.html';
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
        $this->load->view('nilai/nilai', $data);
         $this->load->view('foot');
    }
    public function cek($kodepenilaian,$kodeguru,$kodeindikator){
        $isinilai=$this->M_nilai->selectByAll();
        $status=false;
        foreach($isinilai as $key) {
            if($kodepenilaian==$key->kodepenilaian and $kodeguru==$key->kodeguru and $kodeindikator==$key->kodeindikator){
                $status=true;
            }
        }
        //var_dump($status);
        return $status;
    }
    public function mapel($kode,$loh=NULL){
            $isinya=$this->M_jenispenilaian->selectByAll();
            $isikategori=$this->M_kategori->selectByAll();
            $isikompetensi=$this->M_kompetensi->selectByAll();
            $isiindikator=$this->M_indikator->selectByAll();
            $isinilai=$this->M_nilai->selectByAll();
            //var_dump($isinilai);
    	if($this->input->post('submit')<>""){
            //var_dump($this->input->post());
            $indikator['isi']=$this->input->post();
            $index=1;
            //var_dump($indikator);
            for($i=1;$i<count($indikator['isi']);$i++){
                //var_dump($indikator['isi']['i'.$i]);
                $data=array(
                    'kodepenilaian' => $this->session->userdata('kodepenilai'),
                    'kodeguru'=>$this->uri->segment(3),
                    'kodeindikator' => substr($indikator['isi']['i'.$i], 0, 10),
                    'nilai' => substr($indikator['isi']['i'.$i], 11, 1),
                    );
                foreach ($isinilai as $listnilai) {
                    //var_dump($listnilai);
                    if($this->cek($this->session->userdata('kodepenilai'), $this->uri->segment(3), substr($indikator['isi']['i'.$i], 0, 10))==TRUE){
                         $this->M_nilai->update($listnilai->kodepenilaian,$this->uri->segment(3),substr($indikator['isi']['i'.$i], 0, 10), $data);
                    }else{
                         $this->M_nilai->insert($data);
                    }
                }
               

                $index++;
            }
            //var_dump($data);
            redirect(base_url().$this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3));
            //var_dump(count($data['isi']));
            //$this->M_nilai->insert();
        }else{
            $this->load->view('nav');
            $data['tindikator']=$this->M_nilai->nilaiperkompetensi($this->uri->segment(3));
            $index=0;
            foreach ($isinya as $key) {
                if ($key->nama=="Guru Matpel") {
                    foreach ($isikategori as $isik) {
                        if($key->kodejenis==$isik->kodejenis){
                            $data['jenis'][$index] = $isik;
                            foreach ($isikompetensi as $isikomp) {
                                if ($isik->kodekategori==$isikomp->kodekategori) {
                                    $data['kompetensi'][$index] = $isikomp;
                                    if($loh<>""){
                                        foreach ($isiindikator as $isiin) {
                                            if ($isikomp->kodekompetensi==$isiin->kodekompetensi and $isiin->kodekompetensi==$loh) {
                                                $data['isiindikator'][$index]=$isiin;
                                            }$index++;  
                                        }
                                    } 
                                    $index++;                       
                                }
                            }
                            // $data['kompetensi']=$isikomp;
                        }
                    }
                }
            }
            //var_dump($data);
            $data['isinilai']=$isinilai;
            if($loh<>""){
                //var_dump($data);
                $this->load->view('nilai/indikator', $data);
            }else{
                $this->load->view('nilai/kompetensi',$data);
            }
            
            $this->load->view('foot');
    
        }
        
    }

    public function bk($kode,$loh=NULL){
    $isinya=$this->M_jenispenilaian->selectByAll();
            $isikategori=$this->M_kategori->selectByAll();
            $isikompetensi=$this->M_kompetensi->selectByAll();
            $isiindikator=$this->M_indikator->selectByAll();
            $isinilai=$this->M_nilai->selectByAll();
            //var_dump($isinilai);
        if($this->input->post('submit')<>""){
            //var_dump($this->input->post());
            $indikator['isi']=$this->input->post();
            $index=1;
            //var_dump($indikator);
            for($i=1;$i<count($indikator['isi']);$i++){
                //var_dump($indikator['isi']['i'.$i]);
                $data=array(
                    'kodepenilaian' => $this->session->userdata('kodepenilai'),
                    'kodeguru'=>$this->uri->segment(3),
                    'kodeindikator' => substr($indikator['isi']['i'.$i], 0, 10),
                    'nilai' => substr($indikator['isi']['i'.$i], 11, 1),
                    );
                foreach ($isinilai as $listnilai) {
                    //var_dump($listnilai);
                    if($this->cek($this->session->userdata('kodepenilai'), $this->uri->segment(3), substr($indikator['isi']['i'.$i], 0, 10))==TRUE){
                         $this->M_nilai->update($listnilai->kodepenilaian,$this->uri->segment(3),substr($indikator['isi']['i'.$i], 0, 10), $data);
                    }else{
                         $this->M_nilai->insert($data);
                    }
                }
               

                $index++;
            }
            //var_dump($data);
            redirect(base_url().$this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3));
            //var_dump(count($data['isi']));
            //$this->M_nilai->insert();
        }else{
            $this->load->view('nav');
            $data['tindikator']=$this->M_nilai->nilaiperkompetensi($this->uri->segment(3));
            $index=0;
            foreach ($isinya as $key) {
                if ($key->nama=="Guru BK") {
                    foreach ($isikategori as $isik) {
                        if($key->kodejenis==$isik->kodejenis){
                            $data['jenis'][$index] = $isik;
                            foreach ($isikompetensi as $isikomp) {
                                if ($isik->kodekategori==$isikomp->kodekategori) {
                                    $data['kompetensi'][$index] = $isikomp;
                                    if($loh<>""){
                                        foreach ($isiindikator as $isiin) {
                                            if ($isikomp->kodekompetensi==$isiin->kodekompetensi and $isiin->kodekompetensi==$loh) {
                                                $data['isiindikator'][$index]=$isiin;
                                            }$index++;  
                                        }
                                    } 
                                    $index++;                       
                                }
                            }
                            // $data['kompetensi']=$isikomp;
                        }
                    }
                }
            }
            //var_dump($data);
            $data['isinilai']=$isinilai;
            if($loh<>""){
                //var_dump($data);
                $this->load->view('nilai/indikator', $data);
            }else{
                $this->load->view('nilai/kompetensi',$data);
            }
            
            $this->load->view('foot');
    
        }
        
    }
}

/* End of file nilai.php */
/* Location: ./application/controllers/nilai.php */