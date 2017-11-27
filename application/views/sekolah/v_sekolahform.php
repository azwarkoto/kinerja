<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Sekolah
                        </div>
                      
                        <div class="panel-body">
    
        <?php if($this->uri->segment(2)=="insert"){
            echo form_open('Sekolah/insert');
        }else{
            echo form_open('Sekolah/update/'.$this->uri->segment(3));
        } ?>
        
	  
        <div class="form-group">
            <label for="varchar">Kode Sekolah <?php echo form_error('kode_sekolah') ?></label>
            <input type="text" class="form-control" name="kode_sekolah" id="kode_sekolah" placeholder="Kode Sekolah" value="<?php echo $kode_sekolah; ?>" />
        </div>

        
	    <div class="form-group">
            <label for=>Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Telp <?php echo form_error('telp') ?></label>
            <input type="text" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?php echo $telp; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Kelurahan <?php echo form_error('kelurahan') ?></label>
            <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Kecamatan <?php echo form_error('kecamatan') ?></label>
            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Kabupaten <?php echo form_error('kabupaten') ?></label>
            <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Provinsi <?php echo form_error('provinsi') ?></label>
            <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for=>Id Kepala Sekolah <?php echo form_error('idguru') ?></label>
            <!-- <input type="text" class="form-control" name="idguru" id="idguru" placeholder="Id Kepala Sekolah" value="<?php echo $idguru; ?>" /> -->
            <select name="idguru" class="form-control" placeholder="Kode Guru">
            <?php foreach ($listguru as $isinya) {
              if($idguru==$isinya->kodeguru){
            ?>
                <option value="<?= $isinya->kodeguru ?>"><?= $isinya->nama ?></option>
            <?php
             } }
             foreach ($listguru as $isinya) {
             if($idguru<>$isinya->kodeguru){
                ?>
                <option value="<?= $isinya->kodeguru ?>"><?= $isinya->nama ?></option>
                <?php
             }
         }
            
             ?>
            </select>
        </div>
	    <div class="form-group">
            <label for=>Status <?php echo form_error('status') ?></label><br>
            <!-- <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
            <label><input type="radio" name="status"  value="Aktif" <?php if($status=="Aktif"){echo "checked"; }?>> Aktif</label>&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="status" value="Non AKtif" <?php if($status=="Non Aktif"){echo "checked"; }?> > Non Aktif</label>
        </div>
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    <a href="<?php echo site_url('sekolah') ?>" class="btn btn-default">Cancel</a>
	</form> </div>
                      
                    </div>
                </div>
    