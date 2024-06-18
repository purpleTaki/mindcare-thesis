<?php
login_header();
?>

<div class="login-box">
  <div class="login-logo mb-0 pt-4" style="background-color:white">
    <img src="<?= base_url() ?>assets/images/logo-no-background.png" height="65" class="rounded mx-auto d-block text-center" />
  </div>
  <!-- /.login-logo aaaaaaaaaaaaaaaaa -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Change Password</p>
      <form method="post">
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" placeholder="New Password" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password2" placeholder="Retype Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="button" id="change_pass" class="btn btn-success btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<?php
login_footer();
?>