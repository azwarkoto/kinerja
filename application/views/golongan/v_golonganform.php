<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Golongan
                        </div>
                      
                        <div class="panel-body">
    
        <?php if($this->uri->segment(2)=="insert"){
            echo form_open('Golongan/insert');
        }else{
            echo form_open('Golongan/update/'.$this->uri->segment(3));
        } ?>
        
	  
        <div class="form-group">
            <label for="int">Kodegolongan <?php echo form_error('kodegolongan') ?></label>
            <input type="text" class="form-control" name="kodegolongan" id="kodegolongan" placeholder="Kodegolongan" value="<?php echo $kodegolongan; ?>" />
        </div>

        
	    <div class="form-group">
            <label for=>Namagolongan <?php echo form_error('namagolongan') ?></label>
            <input type="text" class="form-control" name="namagolongan" id="namagolongan" placeholder="Namagolongan" value="<?php echo $namagolongan; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Nilaiakk <?php echo form_error('nilaiakk') ?></label>
            <input type="number" class="form-control" name="nilaiakk" id="nilaiakk" placeholder="Nilaiakk" value="<?php echo $nilaiakk; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Nilaiakpkb <?php echo form_error('nilaiakpkb') ?></label>
            <input type="number" class="form-control" name="nilaiakpkb" id="nilaiakpkb" placeholder="Nilaiakpkb" value="<?php echo $nilaiakpkb; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Nilaiakp <?php echo form_error('nilaiakp') ?></label>
            <input type="number" class="form-control" name="nilaiakp" id="nilaiakp" placeholder="Nilaiakp" value="<?php echo $nilaiakp; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Jwm <?php echo form_error('jwm') ?></label>
            <input type="number" class="form-control" name="jwm" id="jwm" placeholder="Jwm" value="<?php echo $jwm; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    <a href="<?php echo site_url('golongan') ?>" class="btn btn-default">Cancel</a>
	</form> </div>
                      
                    </div>
                </div>
    