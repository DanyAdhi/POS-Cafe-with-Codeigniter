<style type="text/css">
  #contact .jumbotron{
    background-image: url(<?=base_url('assets/images/g1.jpg')?>);
    background-size: cover;
    background-attachment: fixed;
    height: 580px;
    position: relative;
    z-index: 1;
  }
  #contact .jumbotron .container{
    position: relative;
    z-index: 3;
  }
  #contact .jumbotron::after{
    content:'';
    display: block;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,.4);
    background-image: linear-gradient(to bottom, rgba(0,0,0,.6), rgba(0,0,0,.3));
    position: absolute;
    bottom: 0;
    z-index: 2;
  }
</style>



    <!-- JUMBOTRON -->
      <div id="contact">
        <div class="jumbotron jumbotron-fluid mb-0">
          <div class="container">
            <div id="text">
              <h1 ><span>Find Us</span></h1>
              <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
          </div>
        </div>
      </div>
    <!-- END JUMBOTRON -->

    <!-- Contact -->
      <div class="contact">
        <div class="container ">
          <div class="row pt-3 mb-5">
            <div class="col text-center ">
              <h2 class="font-weight-bold">Contact</h2> 
              <hr>
            </div>
          </div>
          <div class="row justify-content-center ">
            <div class="col-lg-4 mb-4">

              <div class="card text-white bg-primary ">
                  <div class="card-header p-1">
                    <h2 class="card-title font-weight-bold text-center">Contact</h2>
                  </div>
                </div>
                <ul class="list-group">
                  <li class="list-group-item"><i class="fas fa-phone"></i> 081995862719</li>
                  <li class="list-group-item"><i class="far fa-envelope"></i> Suport1234@company.com </li>
                  <!-- <li class="list-group-item"><i class="fa fa-map-marker-alt"></i>  Bengkulu, Bengkulu, Indonesia</li> -->
                </ul>

                <div class="card text-white bg-info mt-3">
                  <div class="card-header p-1">
                    <h2 class="card-title font-weight-bold text-center">Location</h2>
                  </div>
                </div>
                <ul class="list-group">
                  <li class="list-group-item"><i class="fa fa-building"></i> My Home</li>
                  <li class="list-group-item"><i class="fa fa-map-marked-alt"></i> Panorama</li>
                  <li class="list-group-item"><i class="fa fa-map-marker-alt"></i>  Bengkulu, Bengkulu, Indonesia</li>
                </ul>

                
            </div>
            <div class="col-lg-8">
                <img src="<?=base_url('assets/images/map.png')?>" height="290" width="100%">
            </div>
          </div>
        </div>
      </div>
    <!-- End Contact -->