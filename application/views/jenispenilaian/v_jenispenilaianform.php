<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Jenispenilaian
                        </div>
                      
                        <div class="panel-body">
    
        <?php if($this->uri->segment(2)=="insert"){
            echo form_open('Jenispenilaian/insert');
        }else{
            echo form_open('Jenispenilaian/update/'.$this->uri->segment(3));
        } ?>
        
	  
        <div class="form-group">
            <label for="text">Kodejenis <?php echo form_error('kodejenis') ?></label>
            <input type="text" class="form-control" name="kodejenis" id="kodejenis" placeholder="Kodejenis" value="<?php echo $kodejenis; ?>" />
        </div>

        
	    <div class="form-group">
            <label for=>Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    <a href="<?php echo site_url('jenispenilaian') ?>" class="btn btn-default">Cancel</a>
	</form> </div>
                      
                    </div>
                </div>
    