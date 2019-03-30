<style type="text/css">
  #galeri .jumbotron{
    background-image: url(<?=base_url('assets/images/t16.jpeg')?>);
    background-size: cover;
    background-attachment: fixed;
    height: 580px;
    position: relative;
    z-index: 1;
  }
  #galeri .jumbotron .container{
    position: relative;
    z-index: 3;
  }
  #galeri .jumbotron::after{
    content:'';
    display: block;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,.1);
    background-image: linear-gradient(to bottom, rgba(0,0,0,.8), rgba(0,0,0,.0));
    position: absolute;
    bottom: 0;
    z-index: 2;
  }
</style>




    <!-- JUMBOTRON -->
      <div id="galeri">
        <div class="jumbotron jumbotron-fluid mb-0">
          <div class="container">
            <div id="text">
              <h1 >Look <span> Our Gallery</span></h1>
              <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
          </div>
        </div>
      </div>
    <!-- END JUMBOTRON -->

    <!-- Contact -->
      <div class="gallery">
        <div class="container ">
          <div class="row pt-3 mb-5">
            <div class="col text-center ">
              <h2 class="font-weight-bold">Gallery</h2> 
              <hr>
            </div>
          </div>
          <div class="row justify-content-center ">
            <div class="col">
              <div class="container">
                <!-- <h1 class="my-4 text-center text-lg-left">Thumbnail Gallery</h1> -->
                <div class="row text-center text-lg-left">

                  <?php foreach ($tampil as $t) {
                  ?>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="d-block mb-4 h-100">
                      <img class="img-fluid img-thumbnail" src="<?=base_url('assets/upload/gallery/'.$t->name_picture)?>" alt="" width="400" height="300">
                    </div>
                  </div>

                  <?php } ?>

                </div>
              </div>
            </div>
            
            
          </div>
        </div>
      </div>
    <!-- End Contact -->