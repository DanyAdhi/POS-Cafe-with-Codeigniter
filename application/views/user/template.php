<?php $i='' ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Cafe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/bootstrap4/css/bootstrap.min.css')?>">
    <!-- Fontawsome -->
    <script type="text/javascript" src="<?=base_url('assets/fontawesome/js/all.min.js')?>"></script>
    <!-- My Style -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/myStyle.css')?>">    
  </head>


  <body id="page-top">

      <button id="myBtn" title="Go to top" class="btn btn-sm btn-dark bg-danger px-3 py-2"><i class="fa fa-arrow-up"></i></button>


      <?php 
        $hal= $this->uri->segment(2);
        $aktif='active';
      ?>


    <!-- NAVBAR -->
    <div id="navbar">
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
          <a class="navbar-brand font-weight-bold" href="<?=base_url($i.'user/')?>"><i><j>Alfa</j>_<span>Cafe</span></i></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
              <a class="nav-item nav-link <?=($hal=='')?$aktif:'';?>" href="<?=base_url($i.'user/')?>" id="1"> <div>Home</div> <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link <?=($hal=='menu')?$aktif:'';?>" href="<?=base_url($i.'user/menu')?>" >Drink & Food</a>
              <a class="nav-item nav-link <?=($hal=='gallery')?$aktif:'';?>" href="<?=base_url($i.'user/gallery')?>" >Gallery</a>
              <a class="nav-item nav-link <?=($hal=='contact')?$aktif:'';?>" href="<?=base_url($i.'user/contact')?>" >Contact</a>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <!-- END NAVBAR -->


    <?php 
      if(!defined('BASEPATH')) exit ('No direct script access allowed');
      if($content) { $this->load->view($content); }
    ?>


    <!-- FOOTER -->
      <div id="footer">
          <footer>
            <div class="container">
              <div class="row">
                <div class="col-lg-4 left mb-5">
                  <div class="brand"><span>Alfa</span> Cafe</div>
                  <a href="<?=base_url($i.'user/')?>">Home</a> - <a href="<?=base_url($i.'user/menu')?>">Drink & Food</a> - <a href="<?=base_url($i.'user/gallery')?>">Gallery</a> - <a href="<?=base_url($i.'user/contact')?>">Contact</a> <br>
                  <div class="mt-3">&copy Developer 2019</div>
                </div>
                <div class="col-lg-4 col-md-6 center">
                  <div class="icon">
                    <i class="fa fa-map-marker-alt"></i> Jl. Location <br>
                  </div>
                  <div class="icon">
                    <i class="far fa-envelope"></i> Suport1234@company.com <br>
                  </div>
                  <div class="icon">
                    <i class="fas fa-phone"></i> 081995862719
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 right mt-3 mb-3">
                  <div class="brand">Social Media</div>
                  <div class="icon ">
                    <a href="" class="mr-3">
                      <i class="fab fa-facebook-square "></i>
                    </a>
                    <a href="" class="mr-3">
                      <i class="fab fa-twitter-square "></i>
                    </a>
                    <a href="" class="mr-3">
                      <i class="fab fa-instagram "></i>
                    </a>
                    <a href="" class="mr-3">
                      <i class="fab fa-google-plus-square "></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            
          </footer>
      </div>
    <!-- END FOOTER -->



  </body>

    <script src="<?=base_url('assets/bootstrap4/jquery-3.3.1.min.js')?>"></script>
    <script src="<?=base_url('assets/bootstrap4/js/bootstrap.min.js')?>"></script> 

    <!-- My Script -->
    <script src="<?=base_url('assets/myScript.js')?>"></script>
</html>