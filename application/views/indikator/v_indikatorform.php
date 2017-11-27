<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Indikator
                        </div>
                      
                        <div class="panel-body">
    
        <?php if($this->uri->segment(2)=="insert"){
            echo form_open('Indikator/insert');
        }else{
            echo form_open('Indikator/update/'.$this->uri->segment(3));
        } ?>
        
	  
        <div class="form-group">
            <label for="text">Kodeindikator <?php echo form_error('kodeindikator') ?></label>
            <input type="text" class="form-control" name="kodeindikator" id="kodeindikator" placeholder="Kodeindikator" value="<?php echo $kodeindikator; ?>" />
        </div>

        
	    <div class="form-group">
            <label for=>Kodekompetensi <?php echo form_error('kodekompetensi') ?></label>
            <!-- <input type="text" class="form-control" name="kodekompetensi" id="kodekompetensi" placeholder="Kodekompetensi" value="<?php echo $kodekompetensi; ?>" /> -->
            <select name="kodekompetensi" class="form-control" placeholder="Kode kompetensi">
            <?php foreach ($listkompetensi as $isinya) {
              if($kodekompetensi==$isinya->kodekompetensi){
            ?>
                <option value="<?= $isinya->kodekompetensi ?>"><?= $isinya->kodekompetensi." ".$isinya->namakompetensi ?></option>
            <?php
             } }
             foreach ($listkompetensi as $isinya) {
             if($kodekompetensi<>$isinya->kodekompetensi){
                ?>
                <option value="<?= $isinya->kodekompetensi ?>"><?= $isinya->kodekompetensi." ".$isinya->namakompetensi ?></option>
                <?php
             }
         }
            
             ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="isiindikator">Isiindikator <?php echo form_error('isiindikator') ?></label>
            <textarea class="form-control" rows="3" name="isiindikator" id="isiindikator" placeholder="Isiindikator"><?php echo $isiindikator; ?></textarea>
        </div>
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    <a href="<?php echo site_url('indikator') ?>" class="btn btn-default">Cancel</a>
	</form> </div>
                      
                    </div>
                </div>
    