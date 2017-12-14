<script language="JavaScript">
  function loadprint(){
  window.print();


} </script>
 
<style type="text/css">
<!--
.style4 {font-size: 12px}
.style6 {font-size: 16px; font-family: Arial, Helvetica, sans-serif;}
.style43 {font-family: Geneva, Arial, Helvetica, sans-serif}
.style55 {font-size: 14; font-family: Geneva, Arial, Helvetica, sans-serif; }
.style56 {font-size: 14}
.style82 {font-size: 14px}
.style83 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 14px; }
.style84 {
	font-size: 16px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
}
.style85 {font-size: 16px; font-family: Geneva, Arial, Helvetica, sans-serif; }
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
    <td height="42" colspan="3"><div align="center" >
      <div align="center" class="style6">
        
        <p class="style84">IDENTITAS GURU DAN PENILAI</p>
        
        <p align="left" class="style55"><strong> &nbsp;&nbsp; A. IDENTITAS </strong></p>
        <p align="left" class="style55">&nbsp;&nbsp;A.1 IDENTITAS GURU YANG DINILAI</p>
      </div>
    </div></td>
  </tr>

  <tr>
    <td colspan="3"><table width="707" border="1" align="center" >
      <tr>
        <td class="td" width="234"><span class="style55">Nama</span></td>
        <td class="td"width="8"><span class="style56 style43">:</span></td>
        <td class="td"width="444"><span class="style56 style43"><?php echo $listguruid->nama; ?></span></td>
      </tr>
      <tr>
        <td class="td"><span class="style55">NIP</span></td>
        <td class="td"><span class="style56 style43">:</span></td>
        <td class="td"><span class="style56 style43"><?php echo $listguruid->nip; ?></span></td>
      </tr>
      <tr>
        <td class="td"><span class="style55">Tempat/Tanggal Lahir </span></td>
        <td class="td"><span class="style56 style43">:</span></td>
        <td class="td"><span class="style56 style43"><?php echo $listguruid->tempatlahir." / ".date('d-m-Y', strtotime($listguruid->tanggallahir)); ?></span></td>
      </tr>
      <tr>
        <td class="td"><span class="style55">Pangkat/Jabatan/Golongan</span></td>
        <td class="td"><span class="style56 style43">:</span></td>
        <td class="td"><span class="style56 style43"><?php
                    foreach ($listpangkat as $pangkat) {
                      if($listguruid->kodepangkat==$pangkat->kodepangkat){
                        echo $pangkat->namapangkat."/";
                      }
                     } 
                     foreach ($listjabatan as $jabatan) {
                      if($listguruid->kodejabatan==$jabatan->kodejabatan){
                        echo $jabatan->namajabatan."/";
                      }
                     }
                     foreach ($listgolongan as $golongan) {
                      if($listguruid->kodegolongan==$golongan->kodegolongan){
                        echo $golongan->namagolongan;
                      }
                     } ?></span></td>
      </tr>
      <tr>
        <td class="td"><span class="style55">TMT sebagai guru </span></td>
        <td class="td"><span class="style56 style43">:</span></td>
        <td class="td"><span class="style56 style43"><?php echo $listguruid->tmtguru; ?></span></td>
      </tr>
      <tr>
        <td><span class="style55">Masa Kerja </span></td>
        <td><span class="style56 style43">:</span></td>
        <td><span class="style56 style43"><?php echo $listguruid->masakerja; ?></span></td>
      </tr>
      <tr>
        <td><span class="style55">Jenis Kelamin </span></td>
        <td><span class="style56 style43">:</span></td>
        <td><span class="style56 style43">
          <?php echo $listguruid->jeniskelamin ?>
        </span></td>
      </tr>
      <tr>
        <td><span class="style55">Pendidikan Terakhir/Spesialisasi</span></td>
        <td><span class="style56 style43">:</span></td>
        <td><span class="style56 style43"><?php echo $listguruid->pendidikan; ?></span></td>
      </tr>
      <tr>
        <td><span class="style55">Progam Keahlian yang diampu </span></td>
        <td><span class="style56 style43">:</span></td>
        <td><span class="style56 style43"><?php echo $listguruid->program; ?></span></td>
      </tr>
      </table>

      <div align="center" class="style6">
        
        <p align="left" class="style55">&nbsp;&nbsp;A.2 IDENTITAS SEKOLAH</p>
      </div>
      <table width="707" border="1" align="center">
      <tr>
        <td width="234"><span class="style55">
          <label></label>
        </span></td>
        <td width="8">&nbsp;</td>
        <td width="444">&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style55">Nama Instansi / Sekolah </span></td>
        <td><span class="style56 style43">:</span></td>
        <td><span class="style56 style43">
          <?php  echo $listsekolah->nama; ?>
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
    </table>
       <?php $kodepenilaian=$listnilai->kodepenilaian;
foreach ($listpenilai as $penilai) {
    if($kodepenilaian==$penilai->kodepenilai){
      // $kodepenilaian;
      ///echo $penilai->kodeguru; //ini nip penilai
      // $nomor_sk=$penilai->nomor_sk;
      // $tanggal_sk=$penilai->tanggal_sk;
      // $berlaku=$penilai->berlaku;

      ?>


      <p>&nbsp;&nbsp;<span class="style55">A.3 IDENTITAS PENILAI</span></p> <hr style="border:none;">
      <div class="style4" style="margin-top:0px;" >
	<table width="707" border="1" align="center">
  <?php
    foreach ($listguruall as $guru) {
      if($penilai->kodeguru==$guru->kodeguru){
        ?>


  <tr>
    <td width="234"><span class="style55">a. Nama </span></td>
        <td width="8"><span class="style56 style43">:</span></td>
        <td width="443"><span class="style56 style43">
          <?php  echo $guru->nama; ?>
        </span></td>
      </tr>
      <tr>
        <td><span class="style55">NIP</span></td>
        <td><span class="style56 style43">:</span></td>
        <td><span class="style56 style43"><?php echo $guru->nip; ?></span></td>
      </tr>
       <?php
      }
    }
  ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style55">b. SK Penugasan </span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style55">Nomor</span></td>
        <td><span class="style56 style43">:</span></td>
        <td><span class="style56 style43"><?php echo $penilai->nomorsk; ?></span></td>
      </tr>
      <tr>
        <td><span class="style55">Tanggal</span></td>
        <td><span class="style56 style43">:</span></td>
        <td><span class="style56 style43"><?php echo $penilai->tanggalsk; ?></span></td>
  </tr>
      <tr>
        <td class="style55"><span class="style55">Berlaku sampai dengan </span></td>
        <td class="style55"><span class="style83">:</span></td>
        <td class="style55"><span class="style43 style82"><?php echo $penilai->berlaku; ?></span></td>
      </tr>
</table>
<?php
    }
 } 
 ?>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
</table>
</body>