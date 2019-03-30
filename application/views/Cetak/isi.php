<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/admin/css/main.css')?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/admin/fontawesome/css/all.min.css')?>">


	<script src="<?=base_url('assets/admin/js/jquery-3.2.1.min.js')?>"></script>

    <script src="<?=base_url('assets/admin/datepicker/js/bootstrap-datepicker.js')?>" type="text/javascript" ></script>
    <link  href="<?=base_url('assets/admin/datepicker/css/datepicker.css')?>" rel="stylesheet" type="text/css" >

    


	<title>cetak</title>
</head>
<body>
	<div>		
		<input type="text" name="tanggal" id="date" class="input"> <button id="t">Tombol</button>
	</div>

<script >
	$(function(){
      $('#date').datepicker({
        autoclose: true
      })
  	});


</script>


<!-- Essential javascripts for application to work-->
    <script src="<?=base_url('assets/admin/js/jquery-3.2.1.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/popper.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/main.js')?>"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?=base_url('assets/admin/js/plugins/pace.min.js')?>"></script> 
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/chart.js')?>"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/jquery.dataTables.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/dataTables.bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/sweetalert.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/admin/js/jquery.price_format.min.js')?>"></script>



      
    <script type="text/javascript">$('#data').DataTable();</script>
    <script type="text/javascript" src="<?=base_url('assets/admin/myScript.js')?>"></script>
   
</body>
</html>