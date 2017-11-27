<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Indikator
        </div>
        <div class="panel-body">
        <?php 
        	echo form_open(); 
    	?>
        <table class="table table-striped table-hover table-bordered">
        <tr>
        	<th>No</th>
        	<th>Indikator</th>
        	<th>Tidak ada bukti</th>
        	<th>Terpenuhi Sebagian</th>
        	<th>Terpenuhi Seluruhnya</th>
        </tr>
        <?php $index=1; foreach ($isiindikator as $isi) {
        	?>
        <tr>
        	<td><?= $index;?></td>
        	<td><?= $isi->isiindikator;?></td>
        	<td><input type='radio' class='form-control' name='<?= "i".$index; ?>' value='<?= $isi->kodeindikator ?>-0' required <?php foreach ($isinilai as $nilai) {
                if($this->uri->segment(3)==$nilai->kodeguru and $isi->kodeindikator==$nilai->kodeindikator){
                    $isin=$nilai->nilai; 
                        if(isset($isin) AND $isin==0){echo 'checked'; } 
                    }
                }?>></td>
        	<td><input type='radio' class='form-control' name='<?= "i".$index;?>' value='<?= $isi->kodeindikator ?>-1' required <?php foreach ($isinilai as $nilai) {
                if($this->uri->segment(3)==$nilai->kodeguru and $isi->kodeindikator==$nilai->kodeindikator){
                    $isin=$nilai->nilai; 
                        if(isset($isin) AND $isin==1){echo 'checked'; } 
                    }
                }?>></td>
        	<td><input type='radio' class='form-control' name='<?= "i".$index;?>' value='<?= $isi->kodeindikator ?>-2' required <?php foreach ($isinilai as $nilai) {
                if($this->uri->segment(3)==$nilai->kodeguru and $isi->kodeindikator==$nilai->kodeindikator){
                    $isin=$nilai->nilai; 
                        if(isset($isin) AND $isin==2){echo 'checked'; } 
                    }
                }?>></td>
        </tr>
        <?php
       $index++; } ?>
        <tr>
        	<td colspan=5><input type="submit" class="btn btn-info pull-right" value="Simpan" name="submit"></td>
        </tr>
        </table>
		<?php echo form_close(); ?>
        </div>
    </div>
</div>