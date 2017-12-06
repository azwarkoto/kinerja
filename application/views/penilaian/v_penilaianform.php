<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Penilaian
                        </div>
                      
                        <div class="panel-body">
    
        <?php if($this->uri->segment(2)=="insert"){
            echo form_open('Penilaian/insert');
        }else{
            echo form_open('Penilaian/update/'.$this->uri->segment(3));
        } ?>
        
	  
        <div class="form-group">
            <label for="varchar">Kodepenilaian <?php echo form_error('kodepenilaian') ?></label>
            <input type="text" class="form-control" name="kodepenilaian" id="kodepenilaian" placeholder="Kodepenilaian" value="<?php echo $kodepenilaian; ?>" />
        </div>

        
	    <div class="form-group">
            <label for=>Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Periode <?php echo form_error('periode') ?></label>
            <input type="text" class="form-control" name="periode" id="periode" placeholder="Periode" value="<?php echo $periode; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Kodedinas <?php echo form_error('kodedinas') ?></label>
            <!-- <input type="text" class="form-control" name="kodedinas" id="kodedinas" placeholder="Kodedinas" value="<?php echo $kodedinas; ?>" /> -->
            <select name="kodedinas" class="form-control" placeholder="Kode Dinas">
            <?php foreach ($listpetugasdinas as $isinya) {
              if($kodedinas==$isinya->kodedinas){
            ?>
                <option value="<?= $isinya->kodedinas ?>"><?= $isinya->nama_petugas ?></option>
            <?php
             } }
             foreach ($listpetugasdinas as $isinya) {
             if($kodedinas<>$isinya->kodedinas){
                ?>
                <option value="<?= $isinya->kodedinas ?>"><?= $isinya->nama_petugas ?></option>
                <?php
             }
         }
            
             ?>
            </select>
        </div>
	    <div class="form-group">
            <label for=>Kodepenilai <?php echo form_error('kodepenilai') ?></label>
            <!-- <input type="text" class="form-control" name="kodepenilai" id="kodepenilai" placeholder="Kodepenilai" value="<?php echo $kodepenilai; ?>" /> -->
            <select name="kodepenilai" class="form-control" placeholder="Kode Dinas">
            <?php foreach ($listpenilai as $isinya) {
              if($kodepenilai==$isinya->kodepenilai){
                foreach ($listguru as $isiguru) {
                    if ($isinya->kodeguru==$isiguru->kodeguru) {
                        echo "<option value='$isinya->kodepenilai'> [$isiguru->kodeguru] $isiguru->nama</option>";
                    }
                }
            ?>
                
            <?php
             } }
             foreach ($listpenilai as $isinya) {
             if($kodepenilai<>$isinya->kodepenilai){
                foreach ($listguru as $isiguru) {
                    if ($isinya->kodeguru==$isiguru->kodeguru) {
                        echo "<option value='$isinya->kodepenilai'> [$isiguru->kodeguru] $isiguru->nama</option>";
                    }
                }
              }
          }
            
             ?>
            </select>
        </div>
	    <div class="form-group"><br>
            <label for=>Tipe <?php echo form_error('tipe') ?></label>
            <!-- <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe" value="<?php echo $tipe; ?>" /> -->
             <label><input type="radio" name="tipe"  value="Formatif" <?php if($tipe=="Formatif"){echo "checked"; }?>> Formatif</label>&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="tipe" value="Sumatif" <?php if($tipe=="Sumatif"){echo "checked"; }?> > Sumatif</label>&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="tipe" value="Kemajuan" <?php if($tipe=="Kemajuan"){echo "checked"; }?> > Kemajuan</label>
        </div>
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    <a href="<?php echo site_url('penilaian') ?>" class="btn btn-default">Cancel</a>
	</form> </div>
                      
                    </div>
                </div>
    