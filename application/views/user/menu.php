<style type="text/css">
  #menu .jumbotron{
    background-image: url(<?=base_url('assets/images/bg8.jpeg')?>);
    background-size: cover;
    background-attachment: fixed;
    height: 580px;
    position: relative;
    z-index: 1;
  }
  #menu .jumbotron .container{
    position: relative;
    z-index: 3;
  }
  #menu .jumbotron::after{
    content:'';
    display: block;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,.4);
    background-image: linear-gradient(to bottom, rgba(0,0,0,.4), rgba(0,0,0,0));
    position: absolute;
    bottom: 0;
    z-index: 2;
  }
</style>


    <!-- JUMBOTRON -->
      <div id="menu">      
        <div class="jumbotron jumbotron-fluid mb-0">
          <div class="container">
            <div id="text">
              <h1 >Discover <span>Our Menu</span></h1>
              <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
          </div>
        </div>
      </div>
    <!-- END JUMBOTRON -->
      
    <!-- CONTENT -->
      <div id="content" class="bg-light">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="title">
                <h2>Our Menu</h2>
                <hr>
              </div>
            </div>
          </div>
          <div class="row" id="tab">
            <div class="col">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ALL</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">FOOD</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">DRINK</a>
                  </li>
                </ul>
              </div>
            </div>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <!-- ALL -->
                        <div class="row">
                          <div class="col">
                              <div class="row">

                              <?php foreach ($tampilAll as $ta) {
                                 
                              ?>
                                <div class="col-lg-4 col-md-6 col-xs-12">
                                  <div class="card mb-4" style="">
                                    <img class="card-img-top" src="<?=base_url('assets/upload/'.$ta->picture)?>" alt="Card image cap">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col p-0 d-flex">
                                          <h4 class="mr-auto p-2 "><?=$ta->name_menu?></h4>
                                        </div>                  
                                      </div>
                                      
                                      <p class="card-text text-dark text-justify"><?=$ta->description?></p>
                                    </div>
                                    <div class="card-footer pl-3 py-1 text-right"> 
                                       Rp  <h class=" price"><?=number_format($ta->price,0,'-,','.')?></h>
                                    </div>
                                  </div>
                                </div>
                              <?php } ?>

                              </div> <!-- ROW2 -->
                          </div> <!-- COL -->
                        </div> <!-- Row1 -->
                    <!-- END ALL -->
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <!-- FOOD -->
                        <div class="row">
                          <div class="col">
                              <div class="row">
                                <?php foreach ($tampilFood as $tf) { ?>
                                  <div class="col-lg-4 col-md-6 col-xs-12">
                                  <div class="card mb-4" style="">
                                    <img class="card-img-top" src="<?=base_url('assets/upload/'.$tf->picture)?>" alt="Card image cap">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col p-0 d-flex">
                                          <h4 class="mr-auto p-2 "><?=$tf->name_menu?></h4>
                                        </div>                  
                                      </div>
                                      
                                      <p class="card-text text-dark text-justify"><?=$tf->description?></p>
                                    </div>
                                    <div class="card-footer pl-3 py-1 text-right"> 
                                       Rp  <h class=" price"><?=number_format($tf->price,0,'-,','.')?></h>
                                    </div>
                                  </div>
                                </div>
                                <?php } ?>

                              </div> <!-- ROW2 -->
                          </div> <!-- COL -->
                        </div> <!-- Row1 -->
                    <!-- END FOOD -->
                  </div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <!-- DRINK -->
                        <div class="row">
                          <div class="col">
                              <div class="row">
                                <?php foreach ($tampilDrink as $td) { ?>
                                  <div class="col-lg-4 col-md-6 col-xs-12">
                                    <div class="card mb-4" style="">
                                      <img class="card-img-top" src="<?=base_url('assets/upload/'.$td->picture)?>" alt="Card image cap">
                                      <div class="card-body">
                                        <div class="row">
                                          <div class="col p-0 d-flex ">
                                            <h4 class="mr-auto p-2 card-title"><?=$td->name_menu?></h4>
                                            <h4 class="p-2 price"><?=$td->price?><span>/ Rb</span></h4>
                                          </div>                  
                                        </div>
                                        <p class="card-text text-dark text-left"><?=$td->description?></p>
                                      </div>
                                    </div>
                                  </div>
                                <?php } ?>
                                

                              </div> <!-- ROW2 -->
                          </div> <!-- COL -->
                        </div> <!-- Row1 -->
                    <!-- END DRINK -->
                  </div>
                </div>
            </div>
          </div>
    <!-- End CONTENT -->