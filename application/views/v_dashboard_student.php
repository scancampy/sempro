<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-12">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title"><strong><?php echo $info[0]->nama; ?></strong><br/><small><?php echo $info[0]->nrp; ?></small></h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                  <div class="col-12">
                    <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Hasil cek eligbilitas menyatakan anda belum dapat memilih topik tugas akhir
                </div>
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Cek Eligibilitas</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">

                        <table class="table">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Verifikasi Data</th>
                              <th>Hasil Verifikasi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($setting as $index => $value) { ?>
                              <tr>
                                <td><?php echo $index+=1; ?></td>
                                <td><?php echo $value->nama; ?>
                                  <?php if($value->display_value_in_postfix == 1) { echo ' <strong>'.$value->nilai.'</strong>'; } ?>
                                </td>
                                <td class="text-center">
                                  <?php if($value->nama_alias == 'skripsi') { 
                                    if($cekks) {
                                      echo '<i class="nav-icon fas fa-check"></i>';
                                    } else {
                                      echo '<i class="nav-icon fas fa-times"></i>';
                                    }
                                  } ?>

                                  <?php if($value->nama_alias == 'nilai_metpen_min') { 
                                    if($eligible['nilai_metpen_min']) {
                                      echo '<i class="nav-icon fas fa-check"></i>';
                                    } else {
                                      echo '<i class="nav-icon fas fa-times"></i>';
                                    }
                                  } ?>

                                   <?php if($value->nama_alias == 'total_sks_tanpa_e_min') { 
                                    if($eligible['total_sks_tanpa_e_min']) {
                                      echo '<i class="nav-icon fas fa-check"></i>';
                                    } else {
                                      echo '<i class="nav-icon fas fa-times"></i>';
                                    }
                                  } ?>

                                    <?php if($value->nama_alias == 'total_sks_nilai_d_max') { 
                                    if($eligible['total_sks_nilai_d_max']) {
                                      echo '<i class="nav-icon fas fa-check"></i>';
                                    } else {
                                      echo '<i class="nav-icon fas fa-times"></i>';
                                    }
                                  } ?>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                <!-- /.row -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  