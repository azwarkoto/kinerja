				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-book fa-fw"></i> Guru Detail
                        </div>
                         <div class="panel-body">
								<table class="table table-striped table-hover table-bordered">
									<tr >
										<td colspan='3'><b>Guru Detail</b></td>
									</tr>
									<tr>
										<td width='30%'>Nama</td>
										<td width="10">:</td>
										<td><?= $listguru->nama ?></td>
									</tr>
									<tr>
										<td>NIP/NRG</td>
										<td width="10">:</td>
										<td><?= $listguru->nip."/".$listguru->nrg ?></td>
									</tr>
									<tr>
										<td>Pangkat/Jabatan/Golongan</td>
										<td width="10">:</td>
										<td><?php
										foreach ($listpangkat as $pangkat) {
										 	if($listguru->kodepangkat==$pangkat->kodepangkat){
										 		echo $pangkat->namapangkat."/";
										 	}
										 } 
										 foreach ($listjabatan as $jabatan) {
										 	if($listguru->kodejabatan==$jabatan->kodejabatan){
										 		echo $jabatan->namajabatan."/";
										 	}
										 }
										 foreach ($listgolongan as $golongan) {
										 	if($listguru->kodegolongan==$golongan->kodegolongan){
										 		echo $golongan->namagolongan;
										 	}
										 } ?></td>
									</tr>
									<tr>
										<td>TMT Sebagai Guru</td>
										<td width="10">:</td>
										<td><?php $tanggal=date('d F Y',strtotime($listguru->tmtguru)); echo $tanggal; ?></td>
									</tr>
									<tr>
										<td>Masa Kerja</td>
										<td width="10">:</td>
										<td><?= $listguru->masakerja ?></td>
									</tr>
									<tr>
										<td>Jenis Kelamin</td>
										<td width="10">:</td>
										<td><?= $listguru->jeniskelamin ?></td>
									</tr>
									<tr>
										<td>Pendidikan Terahir</td>
										<td width="10">:</td>
										<td><?= $listguru->pendidikan ?></td>
									</tr>
									<tr>
										<td>Program keahlian yang diampu</td>
										<td width="10">:</td>
										<td><?= $listguru->program ?></td>
									</tr>
									<?php if ($listguru->jenisguru=="Guru Matpel") {
										$jenisguru='matpel';
									}else{
										$jenisguru='bk';
										} ?>
									<tr>
										<td colspan="3" >
											<a class="btn btn-primary pull-right" target="_blank" href="<?=base_url().$this->uri->segment(1).'/'.'laporankompetensi'.'/'.$this->uri->segment(3)?>/<?=$jenisguru?>">Cetak Laporan Kompetensi</a>
											</td></tr>
											<tr><td colspan="3">
											<a class="btn btn-primary pull-right" target="_blank" href="<?=base_url().$this->uri->segment(1).'/'."laporanindentitas".'/'.$this->uri->segment(3)?>">Cetak Laporan idenntitas guru dan penilai</a></td></tr>
											<tr><td colspan="3">
											<a class="btn btn-primary pull-right" target="_blank" href="<?=base_url().$this->uri->segment(1).'/'."laporanevaluasi".'/'.$this->uri->segment(3)?>">Cetak Laporan dan Evaluasi penilaian kinerja Guru</a></td></tr>
											<tr><td colspan="3">
											<a class="btn btn-primary pull-right" target="_blank" href="<?=base_url().$this->uri->segment(1).'/'."rekap".'/'.$this->uri->segment(3)?><?php if($listguru->jenisguru=="Guru Matpel"){ echo "/matpel"; }else{ echo "/bk"; } ?>">Cetak Rekap hasil penilaian kinerja guru kelas</a></td></tr>
											<tr><td colspan="3">
											<a class="btn btn-primary pull-right" target="_blank" href="<?=base_url().$this->uri->segment(1).'/'."lap_akk".'/'.$this->uri->segment(3)?><?php if($listguru->jenisguru=="Guru Matpel"){ echo "/matpel"; }else{ echo "/bk"; } ?>">Cetak perhitungan angka kredit penilaian kinerja guru</a>

										</td>
									</tr>
								</table>
                         </div>
                    </div>
                </div>