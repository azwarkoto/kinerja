<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Kompetensi
                        </div>
                      
                        <div class="panel-body">
    
        <?php if($this->uri->segment(2)=="insert"){
            echo form_open('Kompetensi/insert');
        }else{
            echo form_open('Kompetensi/update/'.$this->uri->segment(3));
        } ?>
        
	  
        <div class="form-group">
            <label for="text">Kodekompetensi <?php echo form_error('kodekompetensi') ?></label>
            <input type="text" class="form-control" name="kodekompetensi" id="kodekompetensi" placeholder="Kodekompetensi" value="<?php echo $kodekompetensi; ?>" />
        </div>

        
	    <div class="form-group">
            <label for=>Kodekategori <?php echo form_error('kodekategori') ?></label>
            <!-- <input type="text" class="form-control" name="kodekategori" id="kodekategori" placeholder="Kodekategori" value="<?php echo $kodekategori; ?>" /> -->
            <select name="kodekategori" class="form-control" placeholder="Kodekategori">
            <?php foreach ($listkategori as $komp) {
              if($kodekategori==$komp->kodekategori){
            ?>
                <option value="<?= $komp->kodekategori ?>"><?= $komp->kodekategori." ".$komp->namakategori ?></option>
            <?php
             } }
             foreach ($listkategori as $komp) {
             if($kodekategori<>$komp->kodekategori){
                ?>
                <option value="<?= $komp->kodekategori ?>"><?= $komp->kodekategori." ".$komp->namakategori ?></option>
                <?php
             }
         }
            
             ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="namakompetensi">Namakompetensi <?php echo form_error('namakompetensi') ?></label>
            <textarea class="form-control" rows="3" name="namakompetensi" id="namakompetensi" placeholder="Namakompetensi"><?php echo $namakompetensi; ?></textarea>
        </div>
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    <a href="<?php echo site_url('kompetensi') ?>" class="btn btn-default">Cancel</a>
	</form> </div>
                      
                    </div>
                </div>
    