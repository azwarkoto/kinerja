<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Sekolah
                        </div>
                         <div class="panel-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('sekolah/insert'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sekolah/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="cari" value="<?php echo $cari; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($cari <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('sekolah'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Telp</th>
		<th>Alamat</th>
		<th>Kepala sekolah</th>
		<th>Status</th>
		<th>Action</th>
            </tr><?php
            foreach ($sekolah_data as $sekolah)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $sekolah->nama ?></td>
			<td><?php echo $sekolah->telp ?></td>
			<td><?php echo $sekolah->alamat ?></td>
			<td><?php 
            foreach ($listguru as $isinya) {
                if($sekolah->idguru==$isinya->kodeguru){
                    echo $isinya->nama;
                }
            }
             ?></td>
			<td><?php echo $sekolah->status ?></td>
			<td style="text-align:center" width="230px">
				<?php 
				echo anchor(site_url('sekolah/view/'.$sekolah->kode_sekolah),'Lihat','class="btn btn-info"'); 
				echo ' | '; 
				echo anchor(site_url('sekolah/update/'.$sekolah->kode_sekolah),'Edit','class="btn btn-success"'); 
				echo ' | '; 
				echo anchor(site_url('sekolah/delete/'.$sekolah->kode_sekolah),'Delete','class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div></div></div></div>
   