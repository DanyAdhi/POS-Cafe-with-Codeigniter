      <section class="material-half-bg">
        <div class="cover"></div>
      </section>
      <section class="login-content">
        <div class="logo pb-0 mb-0" style="width:350px !important">
          <!-- <h1>Admin</h1> -->
            <?=$this->session->flashdata('flash') ?>
        </div>
        <div class="login-box pt-0">

          <form class="login-form" method="POST" action="<?=base_url('admin/login/auth')?>">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
              <label class="control-label">USERNAME</label>
              <input class="form-control" type="text" placeholder="Username" name="username" autofocus autocomplete="off" value="<?=set_value('username')?>">
              <?= form_error('username', '<small class="text-danger">','</small>');?>
            </div>
            <div class="form-group">
              <label class="control-label">PASSWORD</label>
              <input class="form-control" type="password" placeholder="Password" name="password">
              <?= form_error('password', '<small class="text-danger">','</small>');?>
            </div>
            <hr>
            <div class="form-group btn-container pb-5">
              <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw" type="submit"></i>SIGN IN</button>
            </div>
          </form>
        </div>
      </section>  