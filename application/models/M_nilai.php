<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model {
	public $table = 'nilai';
    public $primary = 'kodepenilai';
 
    function __construct()
    {
        parent::__construct();
    }

    function cek($kode){
        $da=$this->db->query("select * from nilai where kodeguru='$kode'")->row();
        if($da<>NULL){
            return true;
        }else{
            return false;
        }
    }
    function selectByAll()
    {
        return $this->db->get($this->table)->result();
    }
    function selectByGuru($kode){
        $this->db->where(array('kodeguru'=> $kode));
        return $this->db->get($this->table)->result();
    }
    function selectByGuru1($kode){
        $this->db->where(array('kodeguru'=> $kode));
        return $this->db->get($this->table)->row();
    }
    function selectsum2($kode){
        return $this->db->query("select sum(nilai)/(count(*)*2)*100 as jumlah from nilai where kodeguru='$kode' group by kodeguru")->result();

    }
    // function selectsum($kodeindikator,$kodekompetensi){
    //    return  $this->db->query("select * from indikator join nilai on indikator.kodeindikator=nilai.kodeindikator where kodeguru='$kode' group by kodeguru, kodekompetensi")->result();
    // }
    // function selectById($id)
    // {
    //     $this->db->where($this->primary, $id);
    //     return $this->db->get($this->table)->row();
    // }
    
    // function total_rows() {
    //     $this->db->from($this->table);
    //     return $this->db->count_all_results();
    // }

  //   function get_limit_data($limit, $start = 0, $cari = NULL) {
  //       $this->db->like('kodepenilai', $cari);
		// $this->db->or_like('kodeguru', $cari);
		// $this->db->or_like('nomorsk', $cari);
		// $this->db->or_like('tanggalsk', $cari);
		// $this->db->or_like('berlaku', $cari);
		// $this->db->or_like('keterangan', $cari);
		// $this->db->or_like('username', $cari);
		// $this->db->or_like('password', $cari);
		// $this->db->limit($limit, $start);
  //       return $this->db->get($this->table)->result();
  //   }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($kodepenilaian, $kodeguru,$kodeindikator, $data)
    {
        $this->db->where(array('kodepenilaian'=> $kodepenilaian, 'kodeguru'=>$kodeguru, 'kodeindikator'=>$kodeindikator));
        $this->db->update($this->table, $data);
    }

    // function delete($id)
    // {
    //     $this->db->where($this->primary, $id);
    //     $this->db->delete($this->table);
    // }
    function nilaiperkompetensi($kodeguru){
        return $this->db->query("select * from nilai left join indikator on nilai.kodeindikator=indikator.kodeindikator where  nilai.kodeguru='".$kodeguru."'")->result();
    }
    function convert($npkg){
        if(strval($npkg)<=50){ $sebut="KURANG"; $per="25";  echo "$sebut";
        }elseif(strval($npkg)>50 and strval($npkg)<=60){ $sebut="SEDANG"; $per="50"; echo  "$sebut";
        }elseif(strval($npkg)>60 and strval($npkg)<=75){ $sebut="CUKUP"; $per="75"; echo  "$sebut";
        }elseif(strval($npkg)>75 and strval($npkg)<=90){ $sebut="BAIK"; $per="100"; echo  "$sebut";
        }elseif(strval($npkg)>90){ $sebut="SANGAT BAIK"; $per="125"; echo  "$sebut"; }
    }
    function pembagi($npkg){
        if(strval($npkg)<=50){  $per="25";  
        }elseif(strval($npkg)>50 and strval($npkg)<=60){  $per="50"; 
        }elseif(strval($npkg)>60 and strval($npkg)<=75){  $per="75"; 
        }elseif(strval($npkg)>75 and strval($npkg)<=90){  $per="100"; 
        }elseif(strval($npkg)>90){  $per="125";  }
        return $per;
    }
	

}

/* End of file M_nilai.php */
/* Location: ./application/models/M_nilai.php */