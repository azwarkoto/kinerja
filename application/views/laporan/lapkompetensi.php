<script language="JavaScript">
  function loadprint(){
  window.print();


} </script>
<link href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
<body onLoad="loadprint();">

	<?php 
		foreach ($kompetensi as $listkompetensi) {
	?>
	<table class="table table-striped table-hover table-bordered">

	<tr>
		<td colspan="5"><b> Kompetensi :  <?= $listkompetensi->namakompetensi ?></b></td>
	</tr>
	 <tr>
        	<th>No</th>
        	<th>Indikator</th>
        	<th>Tidak ada bukti</th>
        	<th>Terpenuhi Sebagian</th>
        	<th>Terpenuhi Seluruhnya</th>
        </tr>
	<?php //var_dump($isinilai);
	$index=0;foreach ($isiindikator as $indikator) {
		if ($listkompetensi->kodekompetensi==$indikator->kodekompetensi) {
			
					?>
				
		<tr>
		<td><?= ++$index; ?></td>
		<td><?= $indikator->isiindikator ?></td>
		<td width=10%><input type="radio" class="form-control" name="i<?=$index?>" value="<?=$indikator->kodeindikator?>" <?php 
			foreach ($isinilai as $nilai) {
				if($this->uri->segment(3)==$nilai->kodeguru and $indikator->kodeindikator==$nilai->kodeindikator){
					$isi=$nilai->nilai;	
						if(isset($isi) AND $isi==0){echo 'checked'; } 
					}
				}?>></td>
		<td width=10%><input type="radio" class="form-control" name="i<?=$index?>" value="<?=$indikator->kodeindikator?>" <?php foreach ($isinilai as $nilai) {
				if($this->uri->segment(3)==$nilai->kodeguru and $indikator->kodeindikator==$nilai->kodeindikator){
					$isi=$nilai->nilai;	
						if(isset($isi) AND $isi==1){echo 'checked'; } 
					}
				} ?>></td>
		<td width=10%> <input type="radio" class="form-control" name="i<?=$index?>" value="<?=$indikator->kodeindikator?>" <?php foreach ($isinilai as $nilai) {
				if($this->uri->segment(3)==$nilai->kodeguru and $indikator->kodeindikator==$nilai->kodeindikator){
					$isi=$nilai->nilai;	
						if(isset($isi) AND $isi==2){echo 'checked'; } 
					}
				} ?>></td>
	</tr>
	
	<?php


		}
	} ?>
</table>
<?php } ?>
</body>