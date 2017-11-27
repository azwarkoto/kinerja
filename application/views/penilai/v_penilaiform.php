<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Penilai
                        </div>
                      
                        <div class="panel-body">
    
        <?php if($this->uri->segment(2)=="insert"){
            echo form_open('Penilai/insert');
        }else{
            echo form_open('Penilai/update/'.$this->uri->segment(3));
        } ?>
        
	  
        <div class="form-group">
            <label for="varchar">Kodepenilai <?php echo form_error('kodepenilai') ?></label>
            <input type="text" class="form-control" name="kodepenilai" id="kodepenilai" placeholder="Kodepenilai" value="<?php echo $kodepenilai; ?>" />
        </div>

        
	    <div class="form-group">
            <label for=>Kodeguru <?php echo form_error('kodeguru') ?></label>
            <!-- <input type="text" class="form-control" name="kodeguru" id="kodeguru" placeholder="Kodeguru" value="<?php echo $kodeguru; ?>" /> -->
            <select name="kodeguru" class="form-control" placeholder="Kode Guru">
            <?php foreach ($listguru as $isinya) {
              if($kodeguru==$isinya->kodeguru){
            ?>
                <option value="<?= $isinya->kodeguru ?>"><?= $isinya->nama ?></option>
            <?php
             } }
             foreach ($listguru as $isinya) {
             if($kodeguru<>$isinya->kodeguru){
                ?>
                <option value="<?= $isinya->kodeguru ?>"><?= $isinya->nama ?></option>
                <?php
             }
         }
            
             ?>
            </select>
        </div>
	    <div class="form-group">
            <label for=>Nomorsk <?php echo form_error('nomorsk') ?></label>
            <input type="text" class="form-control" name="nomorsk" id="nomorsk" placeholder="Nomorsk" value="<?php echo $nomorsk; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Tanggalsk <?php echo form_error('tanggalsk') ?></label>
            <input type="date" class="form-control" name="tanggalsk" id="tanggalsk" placeholder="Tanggalsk" value="<?php echo $tanggalsk; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Berlaku <?php echo form_error('berlaku') ?></label>
            <input type="text" class="form-control" name="berlaku" id="berlaku" placeholder="Berlaku" value="<?php echo $berlaku; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for=>Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Password <?php echo form_error('password') ?></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    <a href="<?php echo site_url('penilai') ?>" class="btn btn-default">Cancel</a>
	</form> </div>
                      
                    </div>
                </div>
    