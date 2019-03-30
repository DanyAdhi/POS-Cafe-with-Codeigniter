<div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash') ?>"></div>

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-title-w-btn mb-4 ">
        <h3 class="title"><?=$title?></h3>
        <p><a class="btn btn-info icon-btn " href="<?=base_url($i.'user/add')?>"><i class="fa fa-plus"> </i>Tambah</a></p>
      </div>
      <div class="tile-body">
        <table class="table table-hover table-bordered data" id="data">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($tampil as $t) {

                  $id = $t->id;
              ?>
                <tr>
                  <td><?=$t->nama?></td>
                  <td><?=$t->username?></td>
                  <td><?php if($t->level=='1'){echo 'Admin';}else{echo 'Kasir';}?></td>
                  <td width="110px">
                    <a onclick="deleteConfirm('<?=site_url($i.'user/delete/'.$id)?>')" href="#!" class="btn btn-danger btn-sm">Hapus</a>
                    <a href="<?=base_url($i.'user/reset/'.$id)?>" class="btn btn-sm btn-success text-white" title="Reset Password">Reset</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
                
      </div>
    </div>
  </div>
</div>





<!-- Modal Delete -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>