<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Pangkat
                        </div>
                      
                        <div class="panel-body">
    
        <?php if($this->uri->segment(2)=="insert"){
            echo form_open('Pangkat/insert');
        }else{
            echo form_open('Pangkat/update/'.$this->uri->segment(3));
        } ?>
        
	  
        <div class="form-group">
            <label for="varchar">Kodepangkat <?php echo form_error('kodepangkat') ?></label>
            <input type="text" class="form-control" name="kodepangkat" id="kodepangkat" placeholder="Kodepangkat" value="<?php echo $kodepangkat; ?>" />
        </div>

        
	    <div class="form-group">
            <label for=>Namapangkat <?php echo form_error('namapangkat') ?></label>
            <input type="text" class="form-control" name="namapangkat" id="namapangkat" placeholder="Namapangkat" value="<?php echo $namapangkat; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    <a href="<?php echo site_url('pangkat') ?>" class="btn btn-default">Cancel</a>
	</form> </div>
                      
                    </div>
                </div>
    