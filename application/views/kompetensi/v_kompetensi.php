<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Kompetensi
                        </div>
                         <div class="panel-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('kompetensi/insert'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kompetensi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="cari" value="<?php echo $cari; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($cari <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kompetensi'); ?>" class="btn btn-default">Reset</a>
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
		<th>Kodekategori</th>
        <th>Nama Kategori</th>
		<th>Namakompetensi</th>
		<th>Action</th>
            </tr><?php
            foreach ($kompetensi_data as $kompetensi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kompetensi->kodekategori ?></td>
            <td><?php foreach ($listkategori as $komp) {
              if($kompetensi->kodekategori==$komp->kodekategori){
            ?>
                <?= $komp->namakategori ?>
            <?php
             } }?></td>
			<td><?php echo $kompetensi->namakompetensi ?></td>
			<td style="text-align:center" width="230px">
				<?php 
				echo anchor(site_url('kompetensi/view/'.$kompetensi->kodekompetensi),'Lihat','class="btn btn-info"'); 
				echo ' | '; 
				echo anchor(site_url('kompetensi/update/'.$kompetensi->kodekompetensi),'Edit','class="btn btn-success"'); 
				echo ' | '; 
				echo anchor(site_url('kompetensi/delete/'.$kompetensi->kodekompetensi),'Delete','class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
   