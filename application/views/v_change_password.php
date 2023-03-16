<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ubah Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Ubah Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php //print_r($registration_available); ?>
            <?php if(isset($error)) { ?>
                  <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                    <ul>
                    <?php echo $error; ?>
                  </ul>
                  </div>
                <?php } ?>
           
          </div>
          <div class="col-12">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('password'); ?>" >
            <div class=" card card-outline card-primary">
              <div class="card-header">
                <div class="card-title">Ubah Password</div>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="text-muted">
                  <div class="row">
                    <div class="col-12">
                      <p class="text-sm">Password Sekarang
                        <input type="password"  class="form-control" name="password" />
                      </p>
                    </div>
                    <div class="col-12">
                      <p class="text-sm">Password Baru
                        <input type="password"  class="form-control" name="new_password" />
                      </p>

                    </div>
                     <div class="col-12">
                      <p class="text-sm">Ulangi Password Baru
                        <input type="password"  class="form-control" name="reenter_new_password" />
                      </p>

                    </div>
                    
                   
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-12">
                    <input type="submit" class="btn btn-primary" name="btnSubmit" value="Ubah Password" />
                  </div>
                </div>
                
              </div>

            </div>

          </form>
          </div>
          
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

   