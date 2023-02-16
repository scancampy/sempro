<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Sidang Skripsi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('sempro'); ?>">Sidang Skripsi</a></li>
              <li class="breadcrumb-item active">Daftar Sidang Skripsi</li>
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
                    <?php echo $error; ?>
                  </div>
                <?php } ?>
            <div class=" card card-outline card-primary">
              <form method="post" action="<?php echo base_url('sempro/daftar'); ?>">
              <div class="card-header">
                <div class="card-title">Data Judul</div>
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
                      <p class="text-sm">Judul
                        <?php // print_r($registration_available); ?>
                        <b class="d-block"><?php  echo $registration_available[0]->judul; ?></b>
                      </p>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <!-- Box Comment -->
                      <div class="card card-widget">
                        <div class="card-header">
                           <div class="user-block">
                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $registration_available[0]->pembimbing1; ?>_l.jpg" alt="User Image">
                            <span class="username"><?php echo $registration_available[0]->dosbing1; ?></span>
                            <span class="description">Dosen Pembimbing 1</span>
                          </div>
                                 
                        </div>
                        
                      </div>
                      <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                      <!-- Box Comment -->
                      <div class="card card-widget">
                        <div class="card-header">
                           <div class="user-block">
                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $registration_available[0]->pembimbing2; ?>_l.jpg" alt="User Image">
                            <span class="username"><?php echo $registration_available[0]->dosbing2; ?></span>
                            <span class="description">Dosen Pembimbing 2</span>
                          </div>
                        </div>
                        
                      </div>
                      <!-- /.card -->
                    </div>

                  </div>
                </div>
              </div>
            </form>

            </div>
          </div>
          <div class="col-12">
            <form method="post" action="<?php echo base_url('skripsi/daftar'); ?>" >
            <div class=" card card-outline card-primary">
              <div class="card-header">
                <div class="card-title">Data Mahasiswa</div>
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
                      <p class="text-sm">Nama
                        <input type="text" readonly class="form-control" value="<?php echo $registration_available[0]->nama; ?>" />
                      </p>
                    </div>
                    <div class="col-12">
                      <p class="text-sm">NRP
                        <input type="text" readonly class="form-control" value="<?php echo $registration_available[0]->nrp; ?>" />
                      </p>

                    </div>
                     <div class="col-4">
                      <p class="text-sm">SKS Kum
                        <input type="number" required min="1" name="skskum" max="200" class="form-control" value="<?php echo $skskum; ?>" />
                      </p>

                    </div>
                    <div class="col-4">
                      <p class="text-sm">IPK Kum
                        <input type="number" required min="1" name="ipkkum" step="0.01" class="form-control" value="<?php echo number_format((float)$ipkkum,2,'.',''); ?>" />
                      </p>

                    </div>
                    <div class="col-4">
                      <p class="text-sm">MK yang sedang ditempuh (SKS)
                        <input type="number" required  name="sksks" max="200" class="form-control" value="<?php echo @$sks_in_ks; ?>" />
                      </p>

                    </div>
                    <div class="col-12">
                      <p class="text-sm">Telah Lulus Sidang Sempro Tanggal
                        <input type="text" readonly class="form-control" value="<?php echo strftime("%d %B %Y", strtotime($registration_available[0]->sidang_date)); ?>" />
                      </p>

                    </div>
                   
                    <div class="col-12">
                      <div class="form-check">
                        <input type="checkbox" value="true" class="form-check-input" id="checkbox_setuju" name="checkbox_setuju">
                        <label class="form-check-label" for="checkbox_setuju">Saya telah memeriksa semua data pengajuan ini dengan teliti dan benar</label>
                      </div>
                    </div>

                    <div class="col-12">
                      <input type="submit" class="btn btn-primary" name="btnSubmit" value="Submit" />
                    </div>
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

   