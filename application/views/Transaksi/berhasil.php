<style type="text/css">
	#cetak .box{
		min-height: 300px; 
		background-color: rgba(38, 166, 91,.7);
	}
	#cetak h1{
		text-shadow: 1px 1px 1px rgba(230, 230, 230,4);
	}
	#cetak a{
		box-shadow: 4px 3px 5px gray;
	}
	#cetak a i{
		font-size:24px
	}
</style>
<?php $id = $this->session->userdata('id_transaksi') ?>
<div class="row" id="cetak">
  <div class="col-md-12">
    <div class="tile text-center box">
		<h1 class="mt-5">Transaksi Berhasil, Ingin Mencetak Struk Penjualan?</h1>
		<div class="row d-flex justify-content-center">
			<div class="col-xl-4 col-md-6 mt-5">
				<a href="<?=base_url('admin/transaksi/struk/'.$id)?>" class="btn btn-lg btn-info" ><i class="fa fa-print mr-1 mb-1"></i> Mencetak</a>
			</div>
			<div class="col-xl-4 col-md-6 mt-5">
				<a class="btn btn-lg btn-secondary" href="<?=base_url('admin/transaksi/back')?>" ><i class="fa fa-backward mr-1 mb-1"></i> Kembali</a>
			</div>
		</div>
    </div>
  </div>
</div>