<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Cafe - <?=$section?></title>
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

    

  </head>

<?php 
  $hal    = $this->uri->segment(2);
  $aktif  = 'active';
  $i      = 'admin/';
  $level  = $this->session->userdata('level');
?>


  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Valii</a>

      <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><i class="fas fa-align-justify"></i></a>

      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!--Notification Menu-->
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="<?=base_url($i.'login/logout')?>"><i class="fa fa-sign-out-alt fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?=base_url('assets/admin/img/avatar5.png')?>" alt="User Image" width="50px">
        <div>
          <p class="app-sidebar__user-name"><?=$this->session->userdata('nama')  ?></p>
          <p class="app-sidebar__user-designation"><?php if($this->session->userdata('level')!='1'){echo 'Kasir';}else{echo 'Admin';};  ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <?php if ($level=='2'){?>
          <li><a class="app-menu__item <?=($hal=='dashboard')?$aktif:'';?>" href="<?=base_url($i.'dashboard')?>"><i class="app-menu__icon fas fa-tachometer-alt"></i><span class="app-menu__label">Dashboard</span></a></li>
          <li><a class="app-menu__item <?=($hal=='menu')?$aktif:'';?>" href="<?=base_url($i.'menu')?>"><i class="app-menu__icon fa fa-mug-hot"></i><span class="app-menu__label">Menu</span></a></li>
          <li><a class="app-menu__item <?=($hal=='transaksi')?$aktif:'';?>" href="<?=base_url($i.'transaksi')?>"><i class="app-menu__icon fa fa-dollar-sign"></i><span class="app-menu__label">Transaksi</span></a></li>
        <?php }else{ ?>
          <li><a class="app-menu__item <?=($hal=='dashboard')?$aktif:'';?>" href="<?=base_url($i.'dashboard')?>"><i class="app-menu__icon fas fa-tachometer-alt"></i><span class="app-menu__label">Dashboard</span></a></li>
          <li><a class="app-menu__item <?=($hal=='menu')?$aktif:'';?>" href="<?=base_url($i.'menu')?>"><i class="app-menu__icon fa fa-mug-hot"></i><span class="app-menu__label">Menu</span></a></li>
          <li><a class="app-menu__item <?=($hal=='gallery')?$aktif:'';?>" href="<?=base_url($i.'gallery')?>"><i class="app-menu__icon fa fa-images"></i><span class="app-menu__label">Gallery</span></a></li>
          <li><a class="app-menu__item <?=($hal=='transaksi')?$aktif:'';?>" href="<?=base_url($i.'transaksi')?>"><i class="app-menu__icon fa fa-dollar-sign"></i><span class="app-menu__label">Transaksi</span></a></li>
          <li><a class="app-menu__item <?=($hal=='cetak')?$aktif:'';?>" href="<?=base_url($i.'cetak')?>"><i class="app-menu__icon fa fa-file-alt"></i><span class="app-menu__label">Laporan</span></a></li>
          <li><a class="app-menu__item <?=($hal=='user')?$aktif:'';?>" href="<?=base_url($i.'user')?>"><i class="app-menu__icon fa fa-file-alt"></i><span class="app-menu__label">User</span></a></li>
        <?php } ?>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><strong><?=$section?></strong></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#"><?=$title?></a></li>
        </ul>
      </div>
      
        <?php 
          if(!defined('BASEPATH')) exit ('No direct script access allowed');
          if($content) { $this->load->view($content); }
        ?>
      
    </main>
    <!-- Essential javascripts for application to work-->

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
    <script type="text/javascript" src="<?=base_url('assets/chart.js')?>"></script>

<!-- AJAX -->
  <script>
    
    ambilData();
    $('#dati').DataTable();

    function ambilData(){
        $.ajax({
          type    : 'GET',
          url     : '<?=base_url('index.php/admin/gallery/data_gallery')?>',
          async : false,
          dataType  : 'json',
          success   : function(data){
            var baris='';
            var i;
                for(var i=0; i<data.length; i++){
                  baris +='<tr>'+
                        '<td align="center" width="200px">'+
                        `<img src="<?=base_url('assets/upload/gallery/')?>${data[i].name_picture}" width="150px">`
                        +'</td>'+
                        '<td>'+data[i].size_picture+' MB</td>'+
                        '<td>'+data[i].date_upload+'</td>'+
                        '<td width="1px">'+'<a onclick="hapusData('+data[i].id_gallery+')" class="btn btn-sm btn-danger text-light" >Hapus</a>'+'</td>'+
                      '</tr>';
                  }
              $('#barisData').html(baris);

            }
        });
      }

    function uploadData(){
      $.ajax({
        type      : 'POST',
        data      : $("#formUpload").serialize(),
        url       : '<?=base_url('index.php/admin/gallery/post')?>',
        dataType  : 'json',
        success   : function(hasil){

            ambilData();
            $("[name= 'image']").val('');
          }
        });
      }

    function hapusData(id){
      var ask = confirm('Yakin Ingin Dihapus ?');
      if(ask){
        $.ajax({
          type      : 'POST',
          data      : 'id='+id,
          url       : '<?=base_url('index.php/admin/gallery/delete')?>',
          dataType    : 'json',
          success     : function(hasil){
          swal({
              title: "Berhasil",
              text: "Data berhasil dihapus",
              type: "success",
            });
            ambilData(); 
          }
        });
      }
    }



    function updateStatus(id){
      var ask = confirm('Yakin Ingin Dihapus ?');
      if(ask){
        $.ajax({
          type      : 'POST',
          data      : 'id='+id,
          url       : '<?=base_url('index.php/admin/gallery/delete')?>',
          dataType    : 'json',
          success     : function(hasil){
          swal({
              title: "Berhasil",
              text: "Data berhasil dihapus",
              type: "success",
            });
            ambilData(); 
          }
        });
      }
    }




    $('#formUpload').on('submit',(function(e){
        e.preventDefault();

        $.ajax({
          type      : 'POST',
          data      : new FormData(this),
          url       : '<?=base_url('index.php/admin/gallery/upload')?>',
          dataType  : false,
          processData : false,
          contentType : false,
          success   : function(data){
            if(data == 'true'){
                swal({
                      title: "Berhasil",
                      text: "Foto berhasil diupload",
                      type: "success",
                    });
                ambilData();
              $("[name= 'gambar']").val('');
            }
            else
            {
              swal({
                    title: "Gagal",
                    text: "Foto gagal diupload!",
                    type: "warning",
                  });
              $("[name= 'gambar']").val('');
            }
          }
        });


    }));
  </script>
<!-- END Ajax -->



  </body>
</html>