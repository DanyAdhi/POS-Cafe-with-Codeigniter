    <style type="text/css">
      #home .jumbotron{
        background-image: url(<?=base_url('assets/images/bg.jpg')?>);
        background-size: cover;
        background-attachment: fixed;
        height: 580px;
        position: relative;
        z-index: 1;
      }
      #home .jumbotron .container{
        position: relative;
        z-index: 3;
      }
      #home .jumbotron::after{
        content:'';
        display: block;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(to bottom, rgba(0,0,0,.5), rgba(0,0,0,0));
        position: absolute;
        bottom: 0;
        z-index: 2;
      }
      #favorit{
        background-image: url(<?=base_url('assets/images/2.jpg')?>);
        background-size: cover;
        padding-bottom: 90px;
      }
    </style>






    <!-- JUMBOTRON -->
      <div id="home">
        <div class="jumbotron jumbotron-fluid mb-0">
          <div class="container">
            <div id="text">
              <h1 >Welcome To <span>Alpha Cafe</span></h1>
              <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
          </div>
        </div>
      </div>
    <!-- END JUMBOTRON -->


    <!-- ABOUT -->
      <div id="about">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="text-center title">
                <h2>About Us</h2>
                <hr>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4" >
              <p>
              <div class="" style="overflow: hidden; height: 350px">
                <img src="<?=base_url('assets/images/gedung.jpg')?>" style="width: 100%">
              </div>
              </p>
            </div>
            <div class="col-lg-8">
              <div class="text-justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- END ABOUT -->

    <!-- Quality -->
      <div id="quality" class="bg-light mt-0 " >
        <div class="container">
          <div class="row">
            <div class="col"> 
              <div class="text-center title"> 
                <h2>Why Choose Us</h2>
                <hr>
              </div>
            </div>
          </div>
            <div class="row justify-content-sm-center">
              <div class="col-lg-4">
                <img class="rounded-circle mx-auto d-block bg-secondary" src="<?=base_url('assets/images/q1.jpeg')?>" alt="Generic placeholder image" width="140" height="140">
                <h2 class="text-center">High Quality</h2>
                <p class="text-dark">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              </div><!-- /.col-lg-4 -->
              <div class="col-lg-4">
                <img class="rounded-circle mx-auto d-block bg-secondary" src="<?=base_url('assets/images/q2.png')?>" alt="Generic placeholder image" width="140" height="140">
                <h2 class="text-center">Fresh Food</h2>
                <p class="text-dark">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit</p>
              </div><!-- /.col-lg-4 -->
              <div class="col-lg-4">
                <img class="rounded-circle mx-auto d-block bg-secondary" src="<?=base_url('assets/images/q3.png')?>" alt="Generic placeholder image" width="140" height="140">
                <h2 class="text-center">Frendly Staff</h2>
                <p class="text-dark">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit</p>
              </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div>
      </div>
    <!-- END QUALITY -->

    
    <!-- TESTiMONI -->
      <div id="favorit" >
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="text-center text title">
                <h2>Best Sellers</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="card-group">
                <div class="card">
                  <img class="card-img-top" src="<?=base_url('assets/upload/f004.jpg')?>" alt="Card image cap">
                </div>
                <div class="card">
                  <img class="card-img-top" src="<?=base_url('assets/upload/f006.jpg')?>" alt="Card image cap">
                </div>
                <div class="card">
                  <img class="card-img-top" src="<?=base_url('assets/upload/f001.jpg')?>" alt="Card image cap" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="card-group">
                <div class="card">
                  <img class="card-img-top" src="<?=base_url('assets/upload/f003.jpg')?>" alt="Card image cap">
                </div>
                <div class="card">
                  <img class="card-img-top" src="<?=base_url('assets/upload/f005.jpg')?>" alt="Card image cap">
                </div>
                <div class="card">
                  <img class="card-img-top" src="<?=base_url('assets/upload/f004.jpg')?>" alt="Card image cap" >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- END TESTIMONI -->




    <!-- FOUNDER -->
      <div id="founder">
        <div class="container">
          <div class="row">
            <div class="col ">
              <div class="">
                <img src="<?=base_url('assets/images/founder.jpeg')?>" class="rounded-circle img-thumbnail mx-auto d-block">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="text-center founder">
                Founder
              </div>
              <div class="text-center font-italic">
                "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam"
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- END FOUNDER -->