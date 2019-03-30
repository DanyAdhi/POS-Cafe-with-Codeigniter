<div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash') ?>"></div>

<?php 
  $danger='is-invalid';
 ?>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="text-center mb-5">
        <h3 class="title"><?=$title?></h3>
      </div>
      <div class="tile-body">
      	<div  class=" mb-5">	
	      	<button class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Pilih Menu</button>
      	</div>
        	<table class="table table-hover table-responsive mb-3">
        		<thead>
	        		<tr>
		        		<th width="130px">Kode Menu</th>
		        		<th style="text-align: left; width: 300px;">Nama Menu</th>
		        		<th style="width: 150px">Harga</th>
		        		<th style="text-align:right;width: 50px">Jumlah</th>
		        		<th style="text-align:right; width: 150px">Total</th>
		        		<th style="text-align:center; width: 150px">Aksi</th>
	        		</tr>
        		</thead>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                <tbody>
                    <tr>
                         <td><?=$items['id'];?></td>
                         <td><?=$items['name'];?></td>
                         <td><?=number_format($items['price'],0,'','.');?></td>
                         <td style="text-align:center;"> <?php echo number_format($items['qty']);?></td>
                         <td style="text-align:right; "> <?php echo number_format($items['subtotal']);?> </td>   
                         <td style="text-align:center;"><a href="<?php echo base_url().'admin/transaksi/remove/'.$items['rowid'];?>" class="btn btn-danger btn-xs"> Batal</a></td>
                    </tr>
                </tbody>
                        
                    <?php endforeach; ?>
        	</table>

        <form method="POST" action="<?=base_url('admin/transaksi/save_transaksi')?>">
        	<table class="table-responsive" width="80%" border="0px">
        		<tr>
		            <td rowspan="2" style="width: 68%">
			              <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
		            </td>
		            <th style="width:130px">Total Belanja(Rp)</th>
		            <th style="width: 150px"><input type="text" name="total_transaksi" class="form-control total" value="<?php echo number_format($this->cart->total());?>" style="text-align:right;margin-bottom:5px;" readonly></th>
        		</tr>
        		<tr>
        			<th>Tunai(Rp)</th>
        			<td><input type="text" name="jml_uang" value="<?=set_value('jml_uang')?>" class="form-control jml_uang" style="text-align:right;margin-bottom:5px;" ></td>
        		</tr>
        		<tr>
        			<td></td>
        			<th>Kembalian(Rp)</th>
        			<td><input type="text" name="kembali" class="form-control kembali" style="text-align:right;margin-bottom:5px;" ></td>
        		</tr>
        	</table>
        </form>



      </div>
    </div>
  </div>
</div>

<!-- Modal -->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <table class="table table-hover data" id="data">
	        	<thead>
		        	<tr>
		        		<th style="width: 10px">Kode</th>
		        		<th>picture</th>
		        		<th>Nama</th>
		        		<th>Jenis</th>
		        		<th>Harga</th>
		        		<th>Jumlah</th>
		        		<th></th>
		        	</tr>
	        	</thead>
	        	<tbody>
		        	<?php foreach ($tampil_modal as $a): ?>
		        	<tr>
		        		<td> <?=$a->kode_menu ?> </td>
		        		<td> <img src="<?=base_url('assets/upload/'.$a->picture)?>" width="50px"></td>
		        		<td> <?=$a->name_menu ?></td>
		        		<td> <?=$a->type ?></td>
		        		<td> <?=number_format($a->price,0,'','.')?></td>
		        		
		        			<form action="<?=base_url('admin/transaksi/add_cart')?>" method="post">
		        		<td> <input type="number" name="qty" style="width:50px" value="1"></td>
		        		<td> 
		        				<input type="hidden" name="kode_menu" value="<?php echo $a->kode_menu?>">
                                <input type="hidden" name="name_menu" value="<?php echo $a->name_menu;?>">
                                <input type="hidden" name="type"      value="<?php echo $a->type;?>">
                                <input type="hidden" name="price"     value="<?php echo $a->price;?>">

		        				<button type="submit" class="btn btn-danger btn-sm">Pilih</button>
		        			</form>
		        		</td>
		        	</tr>
		        	<?php endforeach; ?>
	        	</tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
<!-- End Modal -->


<script>
    function hanyaAngka(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }


    $(function(){
            $('.jml_uang').on("input",function(){
                var total=$('.total').val();
                var tot = total.replace(/[^\d]/g,"");
                var jumuang=$('.jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('.jml_uang').val(hsl);
                $('.kembali').val(hsl - tot);
            })
            
        });
</script>

<script type="text/javascript">
    $(function(){
        $('.jml_uang').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
        });
        $('#jml_uang2').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ''
        });
        $('.kembali').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
        });
        $('.total').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
        });
    });
</script>    