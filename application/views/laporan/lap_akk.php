<script language="JavaScript">
  function loadprint(){
  window.print();


} </script>
 
<style type="text/css">
<!--
.style3 {font-size: 16}
.style4 {font-size: 12px}
.style6 {font-size: 16px; font-family: Arial, Helvetica, sans-serif;}
.style43 {font-family: Geneva, Arial, Helvetica, sans-serif}
.style55 {font-size: 14; font-family: Geneva, Arial, Helvetica, sans-serif; }
.style56 {font-size: 14}
.style80 {font-size: 14px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.style81 {font-size: 14px; font-family: Arial, Helvetica, sans-serif; }
.style82 {font-size: 14px}
.style83 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 14px; }
-->
</style>
<body onLoad="loadprint();">

<div align="left">
 
 <style type="text/css">
<!--
.style3 {font-size: 16}
.style4 {font-size: 12px}
.style6 {font-size: 16px; font-family: Arial, Helvetica, sans-serif;}
.style43 {font-family: Geneva, Arial, Helvetica, sans-serif}
.style55 {font-size: 14; font-family: Geneva, Arial, Helvetica, sans-serif; }
.style82 {font-size: 14px}
.style83 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 14px; }
-->
</style>
<style type="text/css">
<!--
table[border="1"] {
  border-collapse:collapse;
  background-color:white;
  padding-left:5px;
}


table[border="1"] td {
  border:1px solid black;
  padding-left:5px;
  
}
.style3 {
	font-size: 16px;
	font-weight: bold;
	color: #000000;
}
.style4 {color: #000000}
.style56 {font-size: 14}
-->
</style>
<table width="718" border="0" style="margin-top:-10px;" >
 
  <tr>
    <td height="42" colspan="3"><div align="center" class="style3">
      <div align="center" class="style6">
        <p class="style55">FORMAT PERHITUNGAN ANGKA KREDIT PK GURU KELAS/MATA PELAJARAN </p>
        </div>
    </div></td>
  </tr>

  <tr>
    <td colspan="3">
    <table width="707" border="1" align="center" class="table">
                <tr>
                    <td class="td" width="225"><span class="style55">Nama</span></td>
                    <td class="td" width="8"><span class="style56 style43">:</span></td>
                    <td class="td" width="437"><span class="style56 style43"><?php echo $listguru->nama; ?></span></td>
                </tr>
                <tr>
                    <td class="td"><span class="style55">NIP</span></td>
                    <td class="td"><span class="style56 style43">:</span></td>
                    <td class="td"><span class="style56 style43"><?php echo $listguru->nip; ?></span></td>
                </tr>
                <tr>
                    <td class="td"><span class="style55">Tempat/Tanggal Lahir </span></td>
                    <td class="td"><span class="style56 style43">:</span></td>
                    <td class="td"><span
                            class="style56 style43"><?php echo $listguru->tempatlahir . "/" . $listguru->tanggallahir;; ?></span>
                    </td>
                </tr>
                <tr>
                    <td class="td"><span class="style55">Pangkat/Jabatan/Golongan</span></td>
                    <td class="td"><span class="style56 style43">:</span></td>
                    <td class="td"><span class="style56 style43"><?php
                            foreach ($listpangkat as $pangkat) {
                                if ($listguru->kodepangkat == $pangkat->kodepangkat) {
                                    echo $pangkat->namapangkat . "/";
                                }
                            }
                            foreach ($listjabatan as $jabatan) {
                                if ($listguru->kodejabatan == $jabatan->kodejabatan) {
                                    echo $jabatan->namajabatan . "/";
                                }
                            }
                            foreach ($listgolongan as $golongan) {
                                if ($listguru->kodegolongan == $golongan->kodegolongan) {
                                    echo $golongan->namagolongan;
                                }
                            } ?></span></td>
                </tr>
                <tr>
                    <td class="td"><span class="style55">TMT sebagai guru </span></td>
                    <td class="td"><span class="style56 style43">:</span></td>
                    <td class="td"><span class="style56 style43"><?php echo $listguru->tmtguru; ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Masa Kerja </span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listguru->masakerja; ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Jenis Kelamin </span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43">
          <?php echo $listguru->jeniskelamin ?>
        </span></td>
                </tr>
                <tr>
                    <td><span class="style55">Pendidikan Terakhir/Spesialisasi</span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listguru->pendidikan ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Progam Keahlian yang diampu </span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listguru->program ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55"><label></label></span></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><span class="style55">Nama Instansi / Sekolah </span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43">
          <?php echo $listsekolah->nama; ?>
        </span></td>
                </tr>
                <tr>
                    <td><span class="style55">Telp / Fax </span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listsekolah->telp; ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Kelurahan</span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listsekolah->kelurahan; ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Kecamatan</span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listsekolah->kecamatan; ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Kabupaten / Kota </span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listsekolah->kabupaten; ?></span></td>
                </tr>
                <tr>
                    <td><span class="style55">Provinsi</span></td>
                    <td><span class="style56 style43">:</span></td>
                    <td><span class="style56 style43"><?php echo $listsekolah->provinsi; ?></span></td>
                </tr>

            </table>  <div class="style4" style="margin-top:10;" >

	<div >
      <?php

      if ($this->uri->segment(4)=='matpel') {
      	$pembagi=54;
      }else{
      	$pembagi=68;
      }
	?>
      <table width="707" border="1" align="center">

        <tr>
          <td width="610"><span class="style43 style56">Nilai PK Guru </span></td>
          <td width="81"><div align="center" class="style43 style56"><?php 
              $total_asli=0;
              foreach ($kompetensi as $listkompetensi) {
               $nilai=0;
              $totalindi=0;
                foreach ($tindikator as $key) {
                if($listkompetensi->kodekompetensi==$key->kodekompetensi){
                  $nilai+=$key->nilai;
                  $totalindi+=2;
                }

              } 
              if($totalindi<>0){
                $persen=((int)$nilai/(int)$totalindi)*100;
                if($nilai>=0 and $persen<=25){
                  $hasil=1;
                }elseif($persen>25 and $persen<=50){
                  $hasil=2;
                }elseif($persen>50 and $persen<=75){
                  $hasil=3;
                }else{
                  $hasil=4;
                }

              }else{
                $hasil=0;
              }  $total_asli+=$hasil." ";
            }
                echo "<center>".$total_asli."</center>" ?></div></td>
        </tr>

        <tr>
          <td><p class="style43 style56">Konversi nilai PK GURU ke dalam skala 0-100 sesuai Permenneg PAN &amp; RB No. 16 Tahun 2009 (*) = <?php echo $total_asli; ?> : $pembagi x 100 = 
            <?php $npkg=(strval($total_asli)/$pembagi)*100; echo substr(trim($npkg),0,5) ?>
          </p>              </td>
          <td><div align="center"><span class="style"><span class="style43 style56">
            <?php $npkg=(strval($total_asli)/56)*100; echo substr(trim($npkg),0,5) ?>
          </span></span></div></td>
        </tr>

        <tr>
          <td><span class="style43 style56">Berdasarkan hasil konversi ke dalam skala nilai sesuai dengan peraturan tersebut, selanjutnya ditetapkan sebutan dan presentase angka kreditnya </span></td>
          <td><div align="center"><span class="style43 style56">
            <?php 

    $this->M_nilai->convert($npkg);?>            
          </span> </div>            <p align="center" class="style43 style56"><?php $per=$this->M_nilai->pembagi($npkg); echo "$per%"; ?></p>            </td>
        </tr>
        

        <tr>
          <td><p class="style43 style56">Perolehan angka kredit satu tahun (**) </p>
              <p class="style43 style56">( <?php echo $listguru->nilaiakk; ?> - <?php echo $listguru->nilaiakpkb ?> - <?php echo $listguru->nilaiakp ?> ) x ( <?php echo $listguru->jam ?> : <?php echo $listguru->jwm ?> ) x ( <?php echo $per ?> ) : 4</p></td>
          <td><div align="center" class="style43 style56">
              <?php $nak=(($listguru->nilaiakk-$listguru->nilaiakpkb-$listguru->nilaiakp)*($listguru->jam/$listguru->jwm)*strval($per)/100)/4;  echo substr(trim($nak),0,4); ?>
          </div></td>
        </tr>
      </table>
	  </div>
	<hr style="border:none" />
    </div></td>
  </tr>
  <tr>
    <td width="16"><div align="center" class="style4"></div></td>
    <td width="486">&nbsp;</td>
    <td width="206"><div align="left"><span class="style43 style82"><p align="right">Malang,
      <?php echo date('d-m-Y'); ?></p>
    </span></div></td>
  </tr>
  
  <tr>
    <td colspan="3">
    <table width="717" border="0" align="center" style="margin-top:-12px;">
                
                <tr>
                    <td colspan="3" class="style4">
              
                        <table width="707"  align="center" >
                            <tr>
                            
                                <td width="235">
                                    <div ><span class="style83">Guru</span></div>
                                </td>
                                <td width="235">
                                    <div ><span class="style83">Penilai</span></div>
                                </td>
                                <td width="235">
                                    <div ><span class="style83"> Kepala Sekolah
            </span></div>
                                </td>
                            </tr>
                            <tr>
                                <td><br><br><br></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
            
                                <td><span class="style83"><?php echo strtoupper($listguru->nama); ?></span></td>
                                <td><span class="style83"><?php foreach ($listpenilai as $key) {
                                  if($listnilai->kodepenilaian==$key->kodepenilai){
                                    foreach ($listguruall as $key1) {
                                      if($key->kodeguru==$key1->kodeguru){
                                        echo strtoupper($key1->nama);
                                      }
                                    }
                                  }
                                } ?></span></td>
                                <td><span class="style83"><?php foreach ($listguruall as $key3) {
                                  if ($listsekolah->idguru==$key3->kodeguru) {
                                      echo strtoupper($key3->nama);
                                  }
                                } ?></span></td>
                            </tr>
                            <tr>
                                <td><span class="style83"><?php echo "NIP. ".$listguru->nip; ?></span></td>
                                <td><span class="style83"><?php echo "NIP. " ?><?php foreach ($listpenilai as $key) {
                                  if($listnilai->kodepenilaian==$key->kodepenilai){
                                    foreach ($listguruall as $key1) {
                                      if($key->kodeguru==$key1->kodeguru){
                                        echo $key1->nip;
                                      }
                                    }
                                  }
                                } ?></span></td>
                                <td><span class="style83"><?php foreach ($listguruall as $key3) {
                                  if ($listsekolah->idguru==$key3->kodeguru) {
                                      echo 'NIP. '.$key3->nip;
                                  }
                                } ?></span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="style4">&nbsp;</td>
                    <td class="style4">&nbsp;</td>
                    <td class="style4">&nbsp;</td>
                </tr>
                <tr>
                    <td class="style4">&nbsp;</td>
                    <td class="style4">&nbsp;</td>
                    <td class="style4">&nbsp;</td>
                </tr>
                <tr>
                    <td height="20" class="style4">&nbsp;</td>
                    <td class="style4">&nbsp;</td>
                    <td class="style4">&nbsp;</td>
                </tr>
            </table></td>
  </tr>
</table>
</body>