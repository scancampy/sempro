<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Sempro (v1.0)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css'); ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo current_url(); ?>" class="h1"><b>My</b>Sempro (v1.0)</a>
    </div>
    <div class="card-body">
      <?php if(isset($error)) { ?>
      <div class="alert alert-danger alert-dismissible" >
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo '<ul style="padding-left: 10px !important; margin-bottom: 0px!important;">'.$error.'</ul>'; ?>
      </div><?php }  else { ?>
      <p class="login-box-msg">Silahkan login terlebih dahulu</p>
    <?php } ?>

      <form action="<?php echo current_url(); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="userid"  autocomplete="username" class="form-control" placeholder="NRP / NPK">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" autocomplete="current-password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" value="submit" name="btnlogin" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/adminlte.min.js'); ?>"></script>
</body>
</html>
