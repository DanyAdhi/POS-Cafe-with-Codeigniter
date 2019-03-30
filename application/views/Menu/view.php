<div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash') ?>"></div>

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-title-w-btn mb-4 ">
        <h3 class="title"><?=$title?></h3>
        <p><a class="btn btn-info icon-btn " href="<?=base_url($i.'menu/input')?>"><i class="fa fa-plus"> </i>Tambah</a></p>
      </div>
      <div class="tile-body">
        <table class="table table-hover table-bordered data" id="data">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Jenis</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($tampil as $t) {

                  $id = $t->kode_menu;
              ?>
                <tr>
                  <td><?=$t->kode_menu?></td>
                  <td><?=$t->type?></td>
                  <td><img src="<?=base_url('assets/upload/'.$t->picture)?>" width=80px></td>
                  <td><?=$t->name_menu?></td>
                  <td><?=number_format($t->price,0,'','.')?></td>
                  <td><?=$t->description?></td>
                  <td>
                      <a href="<?=site_url($i.'menu/updateStatus/'.$id)?>">
                        <?php 
                          if($t->status == '1')
                          { 
                            echo '<button class="btn btn-sm btn-primary">Tersedia</button>';
                          }
                          else
                          {
                            echo '<button class="btn btn-sm btn-secondary">Kosong</button>';
                          }
                        ?>
                      </a>
                  </td>
                  <td width="110px">
                    <a onclick="deleteConfirm('<?=site_url($i.'menu/delete/'.$id)?>')" href="#!" class="btn btn-danger btn-sm">Hapus</a>
                    <a href="<?=base_url($i.'menu/edit/'.$id)?>" class="btn btn-sm btn-warning text-white">Edit</a>
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







      