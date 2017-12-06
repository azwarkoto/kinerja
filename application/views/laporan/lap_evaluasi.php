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
.style82 {font-size: 14px}
.style84 {font-size: 16px}
.style86 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 14px; }
-->
</style>
<body onLoad="loadprint();">

<div align="left">
  
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
	font-size: 18px;
	font-weight: bold;
	color: #000000;
}
.style4 {color: #000000}
-->
</style>
 <table width="718" border="0" style="margin-top:-10px;" >
  <tr>
    <td height="21" colspan="3"></td>
  </tr>
  <tr>
    <td height="42" colspan="3"><div align="center" class="style3">
      <div align="center" class="style6">
        <p>LAPORAN DAN EVALUASI</p>
        <p>PENILAIAN KINERJA GURU KELAS/GURU MATA PELAJARAN</p>
        <p></p>
      </div>
    </div></td>
  </tr>

  <tr>
    <td colspan="3"><table width="707" border="1" align="center" >
      <tr>
        <td class="td" width="265"><span class="style55 style84">Nama</span></td>
        <td class="td"width="13"><span class="style43 style84">:</span></td>
        <td colspan="3" class="td"><span class="style43 style84"><?php echo $listguruid->nama; ?></span></td>
      </tr>
      <tr>
        <td class="td"><span class="style55 style84">NIP</span></td>
        <td class="td"><span class="style43 style84">:</span></td>
        <td colspan="3" class="td"><span class="style43 style84"><?php echo $listguruid->nip; ?></span></td>
      </tr>
      <tr>
        <td class="td"><span class="style55 style84">Pangkat/Golongan Ruang/TMT </span></td>
        <td class="td"><span class="style43 style84">:</span></td>
        <td width="137" class="td"><span class="style43 style84"><?php foreach ($listpangkat as $pangkat) {
                      if($listguruid->kodepangkat==$pangkat->kodepangkat){
                        echo $pangkat->namapangkat;
                      }
                     } ?></span></td>
        <td width="120" class="td"><span class="style84"><?php foreach ($listgolongan as $golongan) {
                      if($listguruid->kodegolongan==$golongan->kodegolongan){
                        echo $golongan->namagolongan;
                      }
                     } ?></span></td>
        <td width="140" class="td"><span class="style43 style84"><?php echo date('d-m-Y',strtotime($listguruid->tmtguru)); ?></span></td>
      </tr>
      <tr>
        <td class="td"><span class="style55 style84">NUPTK/NRG</span></td>
        <td class="td"><span class="style43 style84">:</span></td>
        <td colspan="2" class="td"><span class="style43 style84"><?php echo $listguruid->nuptk; ?></span></td>
        <td class="td"><span class="style43 style84"><?php echo $listguruid->nrg; ?></span></td>
      </tr>
      <tr>
        <td><span class="style55 style84">Nama Sekolah </span></td>
        <td><span class="style43 style84">:</span></td>
        <td colspan="3"><span class="style43 style84">
          <?php  echo $listsekolah->nama; ?>
        </span></td>
      </tr>
      <tr>
        <td><span class="style55 style84">Alamat Sekolah </span></td>
        <td><span class="style43 style84">:</span></td>
        <td colspan="3"><span class="style43 style84"><?php echo $listsekolah->alamat; ?></span></td>
      </tr>
      <tr>
        <td><span class="style55 style84">Periode Penilaian </span></td>
        <td><span class="style43 style84">:</span></td>
        <td colspan="3"><span class="style43 style84"><?php
        foreach ($listpenilaian as $key) {
           if($listnilai->kodepenilaian==$key->kodepenilai){
            echo $key->periode;
            break;
           }
         } ?></span></td>
      </tr>

    </table>
      
      <div class="style4" style="margin-top:-20px;" >
	<p>
	</p>
	<p>&nbsp;</p>
	<table width="707" border="1" align="center"  >
      <tr>
       
        <td width="106"><div align="center" class="style43 style84">PERSETUJUAN</div></td>
      </tr>
      <tr>
        <td><div align="center" class="style43 style84">
          <p><em>(Persetujuan ini harus di tandatangani oleh penilai dan guru yang dinilai) </em></p>
          <p>&nbsp;</p>
        </div></td>
        </tr>
      <tr>
        <td height="23"><p class="style43 style84">Penilai dan guru yang dinilai menyatakn telah membaca dan memahami semua aspek yang ditulis/dilaporkan dalam format ini dan menyatakan setuju. </p>
          <p class="style43 style84">&nbsp;</p></td>
        </tr>
    </table>
	<p></p><hr style="border:none" />
      </div></td>
  </tr>
  <tr>
    <td width="16"><div align="center" class="style4"></div></td>
    <td width="486"><span class="style84"></span></td>
    <td width="206"><div align="left" class="style84"><span class="style43 ">Malang,
      <?php echo date('d-m-Y'); ?>
    </span></div></td>
  </tr>
  
  <tr>
    <td colspan="3"><table width="717" border="0" align="center">
      <tr>
        <td width="241" height="26" class="style4"><div align="left"></div></td>
        <td width="241" class="style4"><div align="left"></div></td>
        <td width="221" class="style43 style82"></td>
      </tr>
      <tr>
        <td colspan="3" class="style4"><table width="707" border="0" align="center" >
          <tr>
            <td width="249"><div  class="style84"><span class="style43">Penilai</span></div></td>
            <td width="206"><div  class="style84"><span class="style43"></span></div></td>
            <td width="230"><div  class="style84"><span class="style43">Guru Mata Pelajaran</span></div></td>
          </tr>
          <tr>
            <td><p class="style86"><td></td>
            <td><p class="style82">&nbsp;</p>
              <p class="style82">&nbsp;</p>
              <p class="style82">&nbsp;</p></td>
          </tr>
          <tr>
            <?php 
foreach ($listpenilai as $key) {
           if($listnilai->kodepenilaian==$key->kodepenilai){
            foreach ($listguruall as $key1) {
              if($key->kodeguru==$key1->kodeguru){
          ?>
            <td><p ><?php echo strtoupper($key1->nama)."<br>" ?><?php echo "NIP.".$key1->nip ?></p><hr style="border:none" /></td>
            
              <?php break; } } } } 
            ?>
            <td></td>
            <?php foreach ($listguruall as $guru) {
              if($listsekolah->idguru==$guru->kodeguru){
                
             ?>< 
            <td><p><?php echo strtoupper($guru->nama)."<br>";echo "NIP. ".$guru->nip  ?></p><hr style="border:none" /></td>
            <?php    break;
              }
            };  ?>
          </tr>
        </table></td>
        </tr>
      
    </table></td>
  </tr>
</table>
