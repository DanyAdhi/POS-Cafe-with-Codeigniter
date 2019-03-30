<?php 
// foreach($bulan as $b)
// {
// }
 ?>

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-title-w-btn mb-4 ">
        <h3 class="title"><?=$title?></h3>
      </div>
      <div class="tile-body">
        <table class="table table-hover table-bordered data" id="data">
            <thead>
				<tr>
					<th width="10px">No</th>
					<th>Laporan</th>
					<th class="text-center" width="80px">Aksi</th>
				</tr>
            </thead>
            	<tr>
            		<td>1</td>
            		<td>Laporan Penjualan Per-Tanggal</td>
            		<td class="justify-content-center d-flex"><button data-toggle="modal"  data-target="#tanggal" class="btn btn-info btn-sm "><i class="fa fa-print"></i>Cetak</button></td>
            	</tr>
            	<tr>
            		<td>2</td>
            		<td>Laporan Penjualan Per-Bulan</td>
            		<td class="justify-content-center d-flex"><button data-toggle="modal"  data-target="#bulan" class="btn btn-info btn-sm "><i class="fa fa-print"></i>Cetak</button></td>
            	</tr>
            	<tr>
            		<td>3</td>
            		<td>Laporan Penjualan Per-Tahun</td>
            		<td class="justify-content-center d-flex"><button data-toggle="modal" data-target="#tahun" class="btn btn-info btn-sm "><i class="fa fa-print"></i>Cetak</button></td>
            	</tr>
            	<tr>
            		<td>4</td>
            		<td>Laporan Seluruh Penjualan</td>
            		<td class="justify-content-center d-flex"><a href="<?=base_url($i.'cetak/print_all')?>" class="btn btn-info btn-sm "><i class="fa fa-print"></i>Cetak</a></td>
            	</tr>
            <tbody>
              
            </tbody>
        </table

      </div>
    </div>
  </div>
</div>





<!-- Modal Tanggal-->
  <div class="modal fade" id="tanggal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      <form method="POST" action="<?=base_url($i.'cetak/date')?>">      
          <div class="input-group">
            <label class="font-weight-bold col-sm-3 py-1">Tanggal</label>
              <div class="form-group">
                <div class="input-group"  style="width: 100%">
                  <input class="form-control" id="datepicker"  type="text" placeholder="Tanggal..." name="tgl" >
                  <div class="input-group-append" ><span class="input-group-text"><i class="fa fa-calendar-alt"></i></span></div>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer m-0 py-2 px-3">
          <button type="submit" class="btn btn-primary">Cetak</button>
    </form>
        </div>
      </div>
    </div>
  </div>
<!-- End Modal -->

<script>
  $(function(){
      $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
      })
  });
</script>




<!-- Modal Bulan-->
  <div class="modal fade" id="bulan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Bulan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      <form method="POST" action="<?=base_url($i.'cetak/month')?>">      
          <div class="input-group">
            <label class="font-weight-bold col-sm-3 py-1">Bulan</label>
              <div class="form-group">
                <div class="input-group"  style="width: 200px">
                  <select name="bln" class=" form-control" title="Pilih Bulan" />
                    <?php foreach ($bulan as $b) { 
                      $bl=$b['bulan'];
                      ?>
                        <option value="<?=date('m', strtotime('0-'.$bl.'-1')).'-'.$b['tahun']?>"><?php echo bulan_indo($b['bulan']).'-'.$b['tahun'];?></option>
                    <?php }?>
                  </select>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer m-0 py-2 px-3">
          <button type="submit" class="btn btn-primary">Cetak</button>
    </form>
        </div>
      </div>
    </div>
  </div>
<!-- End Modal -->

<?php 
function bulan_indo($bln)
  {
    $bulan = array(
      1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober','November','Desember'
    );
    return $bulan[(int)$bln[0]];
  }
 ?>


 <!-- Modal Bulan-->
  <div class="modal fade" id="tahun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Tahun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      <form method="POST" action="<?=base_url($i.'cetak/year')?>">      
          <div class="input-group">
            <label class="font-weight-bold col-sm-3 py-1">Tahun</label>
              <div class="form-group">
                <div class="input-group"  style="width: 200px">
                  <select name="tahun" class=" form-control" title="Pilih Bulan" />
                    <?php foreach ($tahun as $t) { 
                      ?>
                        <option><?php echo $t->tahun;?></option>
                    <?php }?>
                  </select>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer m-0 py-2 px-3">
          <button type="submit" class="btn btn-primary">Cetak</button>
    </form>
        </div>
      </div>
    </div>
  </div>
<!-- End Modal -->