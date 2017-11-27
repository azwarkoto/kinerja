<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Penilaian
                        </div>
                         <div class="panel-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('penilaian/insert'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('penilaian/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="cari" value="<?php echo $cari; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($cari <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('penilaian'); ?>" class="btn btn-default">Reset</a>
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
		<th>Tanggal</th>
		<th>Periode</th>
		<th>Kodedinas</th>
		<th>Kodepenilai</th>
		<th>Tipe</th>
		<th>Action</th>
            </tr><?php
            foreach ($penilaian_data as $penilaian)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $penilaian->tanggal ?></td>
			<td><?php echo $penilaian->periode ?></td>
			<td><?php echo $penilaian->kodedinas ?></td>
			<td><?php echo $penilaian->kodepenilai ?></td>
			<td><?php echo $penilaian->tipe ?></td>
			<td style="text-align:center" width="230px">
				<?php 
				echo anchor(site_url('penilaian/view/'.$penilaian->kodepenilaian),'Lihat','class="btn btn-info"'); 
				echo ' | '; 
				echo anchor(site_url('penilaian/update/'.$penilaian->kodepenilaian),'Edit','class="btn btn-success"'); 
				echo ' | '; 
				echo anchor(site_url('penilaian/delete/'.$penilaian->kodepenilaian),'Delete','class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
   