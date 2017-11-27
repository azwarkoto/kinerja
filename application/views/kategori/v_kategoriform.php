<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Kategori
                        </div>
                      
                        <div class="panel-body">
    
        <?php if($this->uri->segment(2)=="insert"){
            echo form_open('Kategori/insert');
        }else{
            echo form_open('Kategori/update/'.$this->uri->segment(3));
        } ?>
        
	  
        <div class="form-group">
            <label for="varchar">Kodekategori <?php echo form_error('kodekategori') ?></label>
            <input type="text" class="form-control" name="kodekategori" id="kodekategori" placeholder="Kodekategori" value="<?php echo $kodekategori; ?>" />
        </div>

        
	    <div class="form-group">
            <label for=>Namakategori <?php echo form_error('namakategori') ?></label>
            <input type="text" class="form-control" name="namakategori" id="namakategori" placeholder="Namakategori" value="<?php echo $namakategori; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Kodejenis <?php echo form_error('kodejenis') ?></label>
             <select name="kodejenis" class="form-control" placeholder="Kode Kategori">
            <?php foreach ($listjenispenilaian as $isinya) {
              if($kodejenis==$isinya->kodejenis){
            ?>
                <option value="<?= $isinya->kodejenis ?>"><?= $isinya->nama ?></option>
            <?php
             } }
             foreach ($listjenispenilaian as $isinya) {
             if($kodejenis<>$isinya->kodejenis){
                ?>
                <option value="<?= $isinya->kodejenis ?>"><?= $isinya->nama ?></option>
                <?php
             }
         }
            
             ?>
            </select>
        </div>
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    <a href="<?php echo site_url('kategori') ?>" class="btn btn-default">Cancel</a>
	</form> </div>
                      
                    </div>
                </div>
    