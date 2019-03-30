<div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash') ?>"></div>

<!--  -->

<?php 
  $status= $merah;
  $danger='is-invalid';
 ?>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="text-center mb-5">
        <h3 class="title"><?=$title?></h3>
      </div>
      <div class="tile-body">

          <form method="post" action="<?=base_url($i.'menu/edit_save/'.$id)?>" enctype="multipart/form-data">
            <input type="hidden" name="id_menu" value="<?=$object['id_menu']?>">
            <div class="form-group has-danger">
              <div class="mb-0 pb-0 font-weight-bold"><label>Kode Menu</label></div>
              <div class="w-75">
                <input type="hidden" name="id_menu" value="<?=$object['id_menu']?>">
                <input class="form-control <?php echo form_error('kode_menu') ? 'is-invalid':'' ?> <?=($status=='merah')?$danger:'';?>" type="text" name="kode_menu" value="<?=$object['kode_menu']?>">
                <div class="invalid-feedback">
                  <?php echo form_error('kode_menu') ?>
                </div>
              </div>
              
            </div>


            <div class="form-group row">
              <label class="control-label col-md-3 font-weight-bold">Jenis Menu</label>
              <div class="col-md-12 ml-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="jenis" id="Makanan" value="Makanan" <?=($object['type']=='Makanan')?'checked':'' ?> >Makanan
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="jenis" id="Minuman" value="Minuman" <?=($object['type']=='Minuman')?'checked':'' ?>>Minuman
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label font-weight-bold">Gambar</label>
              <input class="form-control w-75" type="file" name="image">
              <input type="hidden" name="OldImage" value="<?=$object['picture']?>">

            </div>

            <div class="form-group has-danger">
              <div class="mb-0 pb-0 font-weight-bold"><label>Nama Menu</label></div>
              <div class="w-75">
                <input class="form-control <?php echo form_error('nama_menu') ? 'is-invalid':'' ?>" type="text" name="nama_menu" value="<?=$object['name_menu']?>">
                <div class="invalid-feedback">
                  <?php echo form_error('nama_menu') ?>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label font-weight-bold">Harga</label>
              <div class="form-group">
                <div class="input-group " style="width: 170px">
                  <input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"  type="text" placeholder="20" name="harga" value="<?=$object['price']?>" onkeypress="return hanyaAngka(event)">
                  <div class="input-group-append"><span class="input-group-text">Ribu</span></div>
                  <div class="invalid-feedback">
                    <?php echo form_error('harga') ?>
                  </div>
                </div>
              </div>
            </div>


            <div class="form-group">
              <label for="exampleTextarea" class="font-weight-bold">Deskripsi</label>
              <textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>" id="exampleTextarea" rows="3" name="deskripsi"><?=$object['description']?></textarea>
              <div class="invalid-feedback">
                <?php echo form_error('deskripsi') ?>
              </div>
            </div>

            <input type="hidden" name="status" value="<?=$object['status']?>">

            <div class="tile-footer">
              <button class="btn btn-primary" name="simpan">Simpan</button>
        </form>
              <a href="<?=base_url($i.'menu')?>" class="btn btn-secondary"> Batal</a>
            </div>



      </div>
    </div>
  </div>
</div>




<script>
    function hanyaAngka(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }  
</script>

      