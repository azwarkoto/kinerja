<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Petugasdinas
                        </div>
                      
                        <div class="panel-body">
    
        <?php if($this->uri->segment(2)=="insert"){
            echo form_open('Petugasdinas/insert');
        }else{
            echo form_open('Petugasdinas/update/'.$this->uri->segment(3));
        } ?>
        
	  
        <div class="form-group">
            <label for="text">Kodedinas <?php echo form_error('kodedinas') ?></label>
            <input type="text" class="form-control" name="kodedinas" id="kodedinas" placeholder="Kodedinas" value="<?php echo $kodedinas; ?>" />
        </div>

        
	    <div class="form-group">
            <label for=>Nama Petugas <?php echo form_error('nama_petugas') ?></label>
            <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" placeholder="Nama Petugas" value="<?php echo $nama_petugas; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Nip <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    <a href="<?php echo site_url('petugasdinas') ?>" class="btn btn-default">Cancel</a>
	</form> </div>
                      
                    </div>
                </div>
    