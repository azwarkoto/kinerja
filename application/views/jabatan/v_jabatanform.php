<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Jabatan
                        </div>
                      
                        <div class="panel-body">
    
        <?php if($this->uri->segment(2)=="insert"){
            echo form_open('Jabatan/insert');
        }else{
            echo form_open('Jabatan/update/'.$this->uri->segment(3));
        } ?>
        
	  
        <div class="form-group">
            <label for="varchar">Kodejabatan <?php echo form_error('kodejabatan') ?></label>
            <input type="text" class="form-control" name="kodejabatan" id="kodejabatan" placeholder="Kodejabatan" value="<?php echo $kodejabatan; ?>" />
        </div>

        
	    <div class="form-group">
            <label for=>Namajabatan <?php echo form_error('namajabatan') ?></label>
            <input type="text" class="form-control" name="namajabatan" id="namajabatan" placeholder="Namajabatan" value="<?php echo $namajabatan; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    <a href="<?php echo site_url('jabatan') ?>" class="btn btn-default">Cancel</a>
	</form> </div>
                      
                    </div>
                </div>
    