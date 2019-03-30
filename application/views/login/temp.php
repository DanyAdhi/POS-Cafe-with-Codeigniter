<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Cafe - <?=$section;?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/admin/css/main.css')?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/admin/fontawesome/css/all.min.css')?>">
    <script src="<?=base_url('assets/admin/js/jquery-3.2.1.min.js')?>"></script>

    

  </head>
  <body>

    <?php 
      if(!defined('BASEPATH')) exit ('No direct script access allowed');
      if($content){ 
        $this->load->view($content);
      }
     ?>


  </body>
    <script src="<?=base_url('assets/admin/js/popper.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/main.js')?>"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?=base_url('assets/admin/js/plugins/pace.min.js')?>"></script> 
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/chart.js')?>"></script>
    <!-- Data table plugin-->

    <script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/sweetalert.min.js')?>"></script>
</html>