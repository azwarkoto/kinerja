<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_guru');
		$this->load->model('M_pangkat');
        $this->load->model('M_jabatan');
        $this->load->model('M_golongan');
        $this->load->model('M_nilai');
        $this->load->model('M_kategori');
        $this->load->model('M_kompetensi');
        $this->load->model('M_indikator');
        $this->load->model('M_jenispenilaian');
        $this->load->model('M_penilaian');
        $this->load->model('M_penilai');
        $this->load->model('M_sekolah');
	}
    public function cek($kode){
        $status=$this->M_nilai->cek($kode);
        if($status==false){
            echo "<script>alert('Guru belum dinilai')</script>";
            redirect('laporan/index','refresh');
        }
    }
	public function index()
	{
		$data['listguru']=$this->M_guru->selectByAll();
		$this->load->view('nav');
        $this->load->library('pagination');
        $cari = urldecode($this->input->get('cari'));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'laporan/index.html?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'laporan/index.html?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'laporan/index.html';
            $config['first_url'] = base_url() . 'laporan/index.html';
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
        $this->load->view('laporan/lguru', $data);
         $this->load->view('foot');
	}

	public function detail($kode,$jenislaporan=null){
		$data['listguru']=$this->M_guru->selectById($kode);

		$data['listpangkat']=$this->M_pangkat->selectByAll();
		$data['listjabatan']=$this->M_jabatan->selectByAll();
		$data['listgolongan']=$this->M_golongan->selectByAll();

		$this->load->view('nav');
		$this->load->view('laporan/lgurudetail', $data);
		$this->load->view('foot');

		if ($jenislaporan==1) {
			$this->load->view('laporan/', $data, FALSE);
		}
	}
    public function rekap($kode,$jenis){
        $this->cek($kode);
        if($jenis=="matpel"){$hjenis="Guru Matpel";}else{$hjenis="Guru BK";}
        $data['listnilai']=$this->M_nilai->selectByGuru1($kode);
        $data['listpenilaian']=$this->M_penilaian->selectByAll();
        $data['listgolongan']=$this->M_golongan->selectByAll();
        $data['listsekolah']=$this->M_sekolah->sekolahaktif();
        $data['listpangkat']=$this->M_pangkat->selectByAll();
        $data['listjabatan']=$this->M_jabatan->selectByAll();
        $data['listpenilai']=$this->M_penilai->selectByAll();
        $data['listguru']=$this->M_guru->selectById($kode);
        $data['listguruall']=$this->M_guru->selectByAll();
        $isinya=$this->M_jenispenilaian->selectByAll();
            $isikategori=$this->M_kategori->selectByAll();
            $isikompetensi=$this->M_kompetensi->selectByAll();
            $isiindikator=$this->M_indikator->selectByAll();
            $isinilai=$this->M_nilai->selectByAll();
        $data['tindikator']=$this->M_nilai->nilaiperkompetensi($this->uri->segment(3));
            $index=0;
            foreach ($isinya as $key) {
                if ($key->nama==$hjenis) {
                    foreach ($isikategori as $isik) {
                        if($key->kodejenis==$isik->kodejenis){
                            $data['jenis'][$index] = $isik;
                            foreach ($isikompetensi as $isikomp) {
                                if ($isik->kodekategori==$isikomp->kodekategori) {
                                    $data['kompetensi'][$index] = $isikomp;
                                     
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
            //var_dump($data);
            $this->load->view('laporan/laprekap',$data);
            
    }
    public function lap_akk($kode,$jenis){
        $this->cek($kode);
        if($jenis=="matpel"){$hjenis="Guru Matpel";}else{$hjenis="Guru BK";}
        $data['tindikator']=$this->M_nilai->nilaiperkompetensi($kode);
        //$data['listkompetensi']=$this->M_kompetensi->selectByAll()
        $data['listnilai']=$this->M_nilai->selectByGuru1($kode);
        //$data['listtotal']=$this->M_nilai->selectsum($kode);
        $data['listpenilaian']=$this->M_penilaian->selectByAll();
        $data['listgolongan']=$this->M_golongan->selectByAll();
        $data['listsekolah']=$this->M_sekolah->sekolahaktif();
        $data['listpangkat']=$this->M_pangkat->selectByAll();
        $data['listjabatan']=$this->M_jabatan->selectByAll();
        $data['listpenilai']=$this->M_penilai->selectByAll();
        $data['listguru']=$this->M_guru->selectById($kode);
        $data['listguruall']=$this->M_guru->selectByAll();
        $isinya=$this->M_jenispenilaian->selectByAll();
            $isikategori=$this->M_kategori->selectByAll();
            $isikompetensi=$this->M_kompetensi->selectByAll();
            $isiindikator=$this->M_indikator->selectByAll();
            $isinilai=$this->M_nilai->selectByAll();
        
            $index=0;
            foreach ($isinya as $key) {
                if ($key->nama==$hjenis) {
                    foreach ($isikategori as $isik) {
                        if($key->kodejenis==$isik->kodejenis){
                            $data['jenis'][$index] = $isik;
                            foreach ($isikompetensi as $isikomp) {
                                if ($isik->kodekategori==$isikomp->kodekategori) {
                                    $data['kompetensi'][$index] = $isikomp;
                                     
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
            //var_dump($data);
            $this->load->view('laporan/lap_akk',$data);
    }

    public function laporanindentitas($kode){
        $this->cek($kode);
        $data['listnilai']=$this->M_nilai->selectByGuru1($kode);
        $data['listpenilaian']=$this->M_penilaian->selectByAll();
        $data['listpenilai']=$this->M_penilai->selectByAll();
        $data['listsekolah']=$this->M_sekolah->sekolahaktif();
        $data['listguruall']=$this->M_guru->selectByAll();
        $data['listguruid']=$this->M_guru->selectById($kode);
        $data['listpangkat']=$this->M_pangkat->selectByAll();
        $data['listgolongan']=$this->M_golongan->selectByAll();
        $data['listjabatan']=$this->M_jabatan->selectByAll();
        $this->load->view('laporan/lap_identitas',$data);
    }
    public function laporanevaluasi($kode){
        $this->cek($kode);
         $data['listnilai']=$this->M_nilai->selectByGuru1($kode);
        $data['listpenilaian']=$this->M_penilaian->selectByAll();
        $data['listpenilai']=$this->M_penilai->selectByAll();
        $data['listsekolah']=$this->M_sekolah->sekolahaktif();
        $data['listguruall']=$this->M_guru->selectByAll();
        $data['listguruid']=$this->M_guru->selectById($kode);
        $data['listpangkat']=$this->M_pangkat->selectByAll();
        $data['listgolongan']=$this->M_golongan->selectByAll();
        $data['listjabatan']=$this->M_jabatan->selectByAll();

        $this->load->view('laporan/lap_evaluasi',$data);
    }
	public function laporankompetensi($kode=null,$jenis=null ){
        $this->cek($kode);
        if($jenis=="matpel"){$hjenis="Guru Matpel";}else{$hjenis="Guru BK";}
       // $data['listnilai']=$this->M_nilai->selectByGuru($kode);
        //var_dump($listguru);
        // $listkompetensi=$this->M_kompetensi->selectByAll();
        // $listindikator=$this->M_indikator->selectByAll();
        // $listjenispenilaian=$this->M_jenispenilaian->selectByAll();
        // if($jenis=='matpel'){
        //     $jenis="Guru Matpel";
        // }else{
        //     $jenis="Guru BK";
        // }
        // //var_dump($jenis);
        // foreach ($listjenispenilaian as $lsjp) {
        //     if($lsjp->nama==$jenis){
        //         $kodejenis=$lsjp->kodejenis;
        //     }
        // }
        // $listkategori=$this->M_kategori->selectByAll();
        $isinya=$this->M_jenispenilaian->selectByAll();
            $isikategori=$this->M_kategori->selectByAll();
            $isikompetensi=$this->M_kompetensi->selectByAll();
            $isiindikator=$this->M_indikator->selectByAll();
            $isinilai=$this->M_nilai->selectByAll();
        $index=0;
            foreach ($isinya as $key) {
                if ($key->nama==$hjenis) {
                    foreach ($isikategori as $isik) {
                        if($key->kodejenis==$isik->kodejenis){
                            $data['jenis'][$index] = $isik;
                            foreach ($isikompetensi as $isikomp) {
                                if ($isik->kodekategori==$isikomp->kodekategori) {
                                    $data['kompetensi'][$index] = $isikomp;
                                    
                                        foreach ($isiindikator as $isiin) {
                                            if ($isikomp->kodekompetensi==$isiin->kodekompetensi) {
                                                $data['isiindikator'][$index]=$isiin;
                                            }$index++;  
                                        }
                                    
                                    $index++;                       
                                }
                            }
                            // $data['kompetensi']=$isikomp;
                        }
                    }
                }
            }
            $data['isinilai']=$isinilai;
        // $index=0;
        // foreach ($listkategori as $kategori) {
        //     if ($kodejenis==$kategori->kodejenis) {
        //         $data['kategori'][$index]=$kategori;
        //         foreach ($listkompetensi as $kompetensi) {
        //             if($kategori->kodekategori==$kompetensi->kodekategori){
        //                 $data['kompetensi'][$index]=$listkompetensi;
        //                 foreach ($listindikator as $indikator) {
        //                     if ($kompetensi->kodekompetensi==$indikator->kodekompetensi) {
        //                         $data['listindikator'][$index]=$indikator;
        //                     }
        //                      $index++;
        //                 }
                       
        //             }
        //         }
        //     }
        // }
        //var_dump($data);
        
        $this->load->view('laporan/lapkompetensi',$data);
       
    }

}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */