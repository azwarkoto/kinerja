<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Komplain
                        </div>

                        <div class="panel-body">

        <?php
            echo form_open('Guru/update/'.$this->uri->segment(3));
         ?>


        <div class="form-group">
            <label for="varchar">Kodeguru <?php echo form_error('kodeguru') ?></label>
            <input type="text" class="form-control" name="kodeguru" id="kodeguru" placeholder="Kodeguru" value="<?php echo $kodeguru; ?>" />
        </div>


	    <div class="form-group">
            <label for=>Kodepenilai <?php echo form_error('kodepenilai') ?></label>
            <input type="text" class="form-control" name="kodepenilai" id="kodepenilai" placeholder="Kodepenilai" value="<?php echo $kodepenilai; ?>" />
        </div>
	    <div class="form-group">
            <label for=>gambar <?php echo form_error('gambar') ?></label>
            <input type="image" class="form-control" name="gambar" id="gambar" placeholder="" value="<?php echo $gambar; ?>" />
        </div>
	    <div class="form-group">
            <label for=>Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>


	    <button type="submit" class="btn btn-primary">Simpan</button>
	    <a href="<?php echo site_url('komplain') ?>" class="btn btn-default">Cancel</a>
	</form> </div>

                    </div>
                </div>
