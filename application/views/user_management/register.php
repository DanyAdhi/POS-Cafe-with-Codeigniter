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

          <form method="POST" action="<?=base_url($i.'user/add_save')?>">
            <div class="form-group has-danger">
              <div class="mb-0 pb-0 font-weight-bold"><label>Nama</label></div>
              <div class="w-75">
                <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?> <?=($status=='merah')?$danger:'';?>" type="text" name="nama" value="<?=set_value('nama')?>" placeholder="Nama Lengkap...">
                <div class="invalid-feedback">
                  <?php echo form_error('nama') ?>
                </div>
              </div>
            </div>

            <div class="form-group has-danger">
              <div class="mb-0 pb-0 font-weight-bold"><label>Username</label></div>
              <div class="w-75">
                <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?> <?=($status=='merah')?$danger:'';?>" type="text" name="username" value="<?=set_value('username')?>" placeholder="Username...">
                <div class="invalid-feedback">
                  <?php echo form_error('username') ?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="form-group has-danger">
                  <div class="mb-0 pb-0 font-weight-bold"><label>Password</label></div>
                  <div class="w-75">
                    <input class="form-control <?php echo form_error('password1') ? 'is-invalid':'' ?> <?=($status=='merah')?$danger:'';?>" type="password" name="password1" placeholder="Password...">
                    <div class="invalid-feedback">
                      <?php echo form_error('password1') ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group has-danger">
                  <div class="mb-0 pb-0 font-weight-bold"><label>Ulangi Password</label></div>
                  <div class="w-75">
                    <input class="form-control" type="password" name="password2" value="" placeholder="Ulangi Password...">
                  </div>
                </div>
              </div>
            </div>


            <div class="form-group w-50">
              <label for="exampleSelect1">Example select</label>
              <select class="form-control" id="exampleSelect1" name="level">
                <option value="1" <?=set_select('level','1')?> >Admin</option>
                <option value="2" <?=set_select('level','2')?> >Kasir</option>
              </select>
            </div>

            <div class="tile-footer">
              <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
            </div>

        </form>

      </div>
    </div>
  </div>
</div>