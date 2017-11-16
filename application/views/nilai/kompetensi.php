<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Guru
        </div>
        <div class="panel-body">
			<?php
			//var_dump($kompetensi);
			$index=0;
			?>
			<table class="table table-striped table-hover table-bordered">
				<?php foreach ($jenis as $kategori) {
					?>
						<tr>
							<td colspan="3"><b><?= $kategori->namakategori ?></b></td>
						</tr>
						<tr>
							<td>No</td>
							<td>Kompetensi</td>
							<td>Nilai</td>
						</tr>
					<?php
					foreach ($kompetensi as $komp) {
						$nilai=0; 
						if ($kategori->kodekategori==$komp->kodekategori) {
						
						?>
						<tr>
							<td><?= ++$index; ?></td>
							<td><a href="<?=base_url().$this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3)."/".$komp->kodekompetensi?>"><?= $komp->namakompetensi; ?></a></td>
							<td><?php 
							$totalindi=0;
								foreach ($tindikator as $key) {
								if($komp->kodekompetensi==$key->kodekompetensi){
									$nilai+=$key->nilai;
									$totalindi+=2;
								}

							} 
							if($totalindi<>0){
								$persen=((int)$nilai/(int)$totalindi)*100;
								if($persen<=25 or $nilai==0){
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
							} 
								echo "<center>".$hasil."</center>" ?></td>
						</tr>
						<?php
					}
					}
				} ?>
				
				
				
			</table>
        </div>
    </div>
</div>