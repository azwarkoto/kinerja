<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Guru
                        </div>
                      
                        <div class="panel-body">
    
        <?php if($this->uri->segment(2)=="insert"){
            echo form_open('Guru/insert');
        }else{
            echo form_open('Guru/update/'.$this->uri->segment(3));
        } ?>
    
	  
        <div class="form-group">
            <label for="varchar">Kodeguru <?php echo form_error('kodeguru') ?></label>
            <input type="text" class="form-control" name="kodeguru" id="kodeguru" placeholder="Kodeguru" value="<?php echo $kodeguru; ?>" />
        </div>

        
	    <div class="form-group">
            <label for=>NIP <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" value="<?php echo $nip; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Nuptk <?php echo form_error('nuptk') ?></label>
            <input type="text" class="form-control" name="nuptk" id="nuptk" placeholder="Nuptk" value="<?php echo $nuptk; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Nrg <?php echo form_error('nrg') ?></label>
            <input type="text" class="form-control" name="nrg" id="nrg" placeholder="Nrg" value="<?php echo $nrg; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Tempatlahir <?php echo form_error('tempatlahir') ?></label>
            <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" placeholder="Tempatlahir" value="<?php echo $tempatlahir; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Tanggallahir <?php echo form_error('tanggallahir') ?></label>
            <input type="date" class="form-control" name="tanggallahir" id="tanggallahir" placeholder="Tanggallahir" value="<?php echo $tanggallahir; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Kodepangkat <?php echo form_error('kodepangkat') ?></label>
           <!--  <input type="text" class="form-control" name="kodepangkat" id="kodepangkat" placeholder="Kodepangkat" value="<?php echo $kodepangkat; ?>" /> -->
            <select name="kodepangkat" class="form-control" placeholder="Kode Pangkat">
            <?php foreach ($listpangkat as $isinya) {
              if($kodepangkat==$isinya->kodepangkat){
            ?>
                <option value="<?= $isinya->kodepangkat ?>"><?= $isinya->namapangkat ?></option>
            <?php
             } }
             foreach ($listpangkat as $isinya) {
             if($kodepangkat<>$isinya->kodepangkat){
                ?>
                <option value="<?= $isinya->kodepangkat ?>"><?= $isinya->namapangkat ?></option>
                <?php
             }
            }
            
             ?>
            </select>
        </div>
	    <div class="form-group">
            <label for=>Kodejabatan <?php echo form_error('kodejabatan') ?></label>
            <!-- <input type="text" class="form-control" name="kodejabatan" id="kodejabatan" placeholder="Kodejabatan" value="<?php echo $kodejabatan; ?>" /> -->
            <select name="kodejabatan" class="form-control" placeholder="Kode Jabatan">
            <?php foreach ($listjabatan as $isinya) {
              if($kodejabatan==$isinya->kodejabatan){
            ?>
                <option value="<?= $isinya->kodejabatan ?>"><?= $isinya->namajabatan ?></option>
            <?php
             } }
             foreach ($listjabatan as $isinya) {
             if($kodejabatan<>$isinya->kodejabatan){
                ?>
                <option value="<?= $isinya->kodejabatan ?>"><?= $isinya->namajabatan ?></option>
                <?php
             }
            }
            
             ?>
            </select>
        </div>
	    <div class="form-group">
            <label for=>Kodegolongan <?php echo form_error('kodegolongan') ?></label>
            <!-- <input type="text" class="form-control" name="kodegolongan" id="kodegolongan" placeholder="Kodegolongan" value="<?php echo $kodegolongan; ?>" /> -->
            <select name="kodegolongan" class="form-control" placeholder="Kode Jabatan">
            <?php foreach ($listgolongan as $isinya) {
              if($kodegolongan==$isinya->kodegolongan){
            ?>
                <option value="<?= $isinya->kodegolongan ?>"><?= $isinya->namagolongan ?></option>
            <?php
             } }
             foreach ($listgolongan as $isinya) {
             if($kodegolongan<>$isinya->kodegolongan){
                ?>
                <option value="<?= $isinya->kodegolongan ?>"><?= $isinya->namagolongan ?></option>
                <?php
             }
            }
            
             ?>
            </select>
        </div>
	    <div class="form-group">
            <label for=>Tmtguru <?php echo form_error('tmtguru') ?></label>
            <input type="date" class="form-control" name="tmtguru" id="tmtguru" placeholder="Tmtguru" value="<?php echo $tmtguru; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Jeniskelamin <?php echo form_error('jeniskelamin') ?></label><br>
            <!-- <input type="text" class="form-control" name="jeniskelamin" id="jeniskelamin" placeholder="Jeniskelamin" value="<?php echo $jeniskelamin; ?>" /> -->
            <label><input type="radio" name="jeniskelamin"  value="Laki-laki" <?php if($jeniskelamin=="Laki-laki"){echo "checked"; }?>> Laki-laki</label>&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="jeniskelamin" value="Perempuan" <?php if($jeniskelamin=="Perempuan"){echo "checked"; }?> > Perempuan</label>
        </div>
	    <div class="form-group">
            <label for=>Pendidikan <?php echo form_error('pendidikan') ?></label>
            <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan" value="<?php echo $pendidikan; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Program <?php echo form_error('program') ?></label>
            <input type="text" class="form-control" name="program" id="program" placeholder="Program" value="<?php echo $program; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Jam <?php echo form_error('jam') ?></label>
            <input type="number" class="form-control" name="jam" id="jam" placeholder="Jam" value="<?php echo $jam; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Masakerja <?php echo form_error('masakerja') ?></label>
            <input type="text" class="form-control" name="masakerja" id="masakerja" placeholder="Masakerja" value="<?php echo $masakerja; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Jenisguru <?php echo form_error('jenisguru') ?></label><br>
            <!-- <input type="text" class="form-control" name="jenisguru" id="jenisguru" placeholder="Jenisguru" value="<?php echo $jenisguru; ?>" /> -->
            <label><input type="radio" name="jenisguru"  value="Guru Matpel" <?php if($jenisguru=="Guru Matpel"){echo "checked"; }?>> Guru Matpel</label>&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="jenisguru" value="Guru BK" <?php if($jenisguru=="Guru BK"){echo "checked"; }?> > Guru BK</label>
        </div>
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    <a href="<?php echo site_url('guru') ?>" class="btn btn-default">Cancel</a>
	</form> </div>
                      
                    </div>
                </div>
    