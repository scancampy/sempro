<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Sidang Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('sempro'); ?>">Sidang Proposal</a></li>
              <li class="breadcrumb-item active">Daftar Sidang Proposal</li>
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
            <?php // print_r($registration_available); ?>
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
                <div class="card-title">Data Proposal</div>
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
                        <b class="d-block"><?php  echo $registration_available->judul; ?></b>
                      </p>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <p class="text-sm">
                         <?php if(isset($prasyarat[0])) { ?>
                          <table class="table table-bordered" style="width:100%;">
                            <tr>
                              <td>MK Prasyarat 1</td>
                              <td><?php if(isset($prasyarat[0])) { echo $prasyarat[0]->nama.' ('.$prasyarat[0]->kode_mk.')'; } ?></td>
                            </tr>
                            <tr>
                              <td>Nilai min.</td>
                              <td><?php echo $prasyarat[0]->minimum_mark;  ?></td>
                            </tr>
                            <tr>
                              <td>Nilai Transkrip</td>
                              <td><?php if(isset($transcript_prasyarat[0])) { echo $transcript_prasyarat[0]->nisbi; } else { echo 'Mahasiswa belum lulus MK ini'; } ?></td>
                            </tr>
                          </table>
                        <?php } ?>
                      </p>
                    </div>>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <!-- Box Comment -->
                      <div class="card card-widget">
                        <div class="card-header">
                          <?php if(!is_null($registration_available->lecturer1_npk)) { ?>
                            <div class="user-block">
                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $registration_available->lecturer1_npk; ?>_l.jpg" alt="User Image">
                            <span class="username"><?php echo $registration_available->dosbing1nama; ?></span>
                            <span class="description">Dosen Pembimbing 1</span>
                          </div>
                                  <?php        
                                  } else { ?> 
                            <div class="user-block">
                            <span class="username"><a href="#">(Belum Tersedia)</a></span>
                            <span class="description">Dosen Pembimbing 1</span>
                          </div>
                                 <?php } ?>
                        </div>
                        
                      </div>
                      <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                      <!-- Box Comment -->
                      <div class="card card-widget">
                        <div class="card-header">
                          <?php if(!is_null($registration_available->lecturer2_npk)) { ?>
                            <div class="user-block">
                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $registration_available->lecturer2_npk; ?>_l.jpg" alt="User Image">
                            <span class="username"><?php echo $registration_available->dosbing2nama; ?></span>
                            <span class="description">Dosen Pembimbing 2</span>
                          </div>
                                  <?php        
                                  } else { ?> 
                            <div class="user-block">
                            <span class="username"><a href="#">(Belum Tersedia)</a></span>
                            <span class="description">Dosen Pembimbing 2</span>
                          </div>
                                 <?php } ?>
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
            <form method="post" action="<?php echo base_url('sempro/daftar'); ?>" >
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
                        <input type="text" readonly class="form-control" value="<?php echo $registration_available->studentname; ?>" />
                      </p>
                    </div>
                    <div class="col-12">
                      <p class="text-sm">NRP
                        <input type="text" readonly class="form-control" value="<?php echo $registration_available->student_nrp; ?>" />
                      </p>

                    </div>
                    <div class="col-4">
                      <p class="text-sm">SKS Kum
                        <input type="number" required min="1" name="skskum" max="200" class="form-control" value="" />
                      </p>

                    </div>
                    <div class="col-4">
                      <p class="text-sm">IPK Kum
                        <input type="number" required min="1" name="ipkkum" step="0.01" class="form-control" value="" />
                      </p>

                    </div>
                    <div class="col-4">
                      <p class="text-sm">MK yang sedang ditempuh (SKS)
                        <input type="number" required  name="sksks" max="200" class="form-control" value="" />
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

   