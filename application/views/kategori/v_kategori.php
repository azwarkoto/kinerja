<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Kategori
                        </div>
                         <div class="panel-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('kategori/insert'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kategori/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="cari" value="<?php echo $cari; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($cari <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kategori'); ?>" class="btn btn-default">Reset</a>
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
		<th>Namakategori</th>
		<th>Kode jenis penilaian</th>
        <th>Jenis Penilaian</th>
		<th>Action</th>
            </tr><?php
            foreach ($kategori_data as $kategori)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kategori->namakategori ?></td>
			<td><?php echo $kategori->kodejenis ?></td>
            <td><?php foreach ($listjenispenilaian as $isinya) {
              if($kategori->kodejenis==$isinya->kodejenis){
            ?>
                <?= $isinya->nama ?>
            <?php
             } }?></td>
			<td style="text-align:center" width="230px">
				<?php 
				echo anchor(site_url('kategori/view/'.$kategori->kodekategori),'Lihat','class="btn btn-info"'); 
				echo ' | '; 
				echo anchor(site_url('kategori/update/'.$kategori->kodekategori),'Edit','class="btn btn-success"'); 
				echo ' | '; 
				echo anchor(site_url('kategori/delete/'.$kategori->kodekategori),'Delete','class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
   