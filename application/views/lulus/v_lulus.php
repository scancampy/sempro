<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pendaftaran Kelulusan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Pendaftaran Kelulusan</li>
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
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-10">
                    <h3 class="card-title">Pendaftaran Kelulusan</h3>
                  </div>
                  <div class="col-2">
                    <?php
                    $eligible = false;
                    //print_r($skripsi);
                    if($lulus) {
                      foreach($lulus as $value) {
                        if($value->sk_filename != NULL) {
                          $eligible = false;
                          break;
                        }
                      }
                    }

                    if(!empty(@$skripsi)) {
                      foreach ($skripsi as $key => $value) {
                        if(!empty($value->ruang_id)) {
                          $eligible = true;
                        }
                      }
                    }

                    if(!empty($lulus)) { $eligible = false; }

                     if($eligible && $roles == 'student') { ?>
                    
                    <a href="<?php echo base_url('lulus/baru'); ?>" class="btn btn-block btn-primary btn-sm" >Daftar</a>
                  <?php } ?>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Mahasiswa</th>
                    <th>Judul</th>
                    <th>Tanggal Daftar</th>
                    <th>Validasi Dosbing</th>
                    <th>Validasi Admin</th>
                    <th>Validasi WD</th>
                    <th>SK Lulus</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if($lulus) { 
                      foreach($lulus as $row) { 
                      ?>
                      <tr>
                        <td><?php echo '<strong>'.$row->nama.'</strong><br/>'.$row->nrp; ?></td>
                        <td><?php echo $row->judul; ?></td>
                        <td><?php echo strftime("%d %B %Y", strtotime($row->submit_date)); ?></td>
                        <td><?php if($row->dosbing_validate_date == NULL) { echo 'Belum Divalidasi'; } else {
                          echo $row->dosbing.'<br/>Tanggal: '.strftime("%d %B %Y", strtotime($row->dosbing_validate_date));
                        } ?></td> 
                        <td><?php if($row->admin_validate_date == NULL) { echo 'Belum Divalidasi'; } else {
                          echo 'Admin<br/>Tanggal: '.strftime("%d %B %Y", strtotime($row->admin_validate_date));
                        } ?></td>
                        <td><?php if($row->wd_validate_date == NULL) { echo 'Belum Divalidasi'; } else {
                          echo $row->wd.'<br/>Tanggal: '.strftime("%d %B %Y", strtotime($row->wd_validate_date));
                        } ?></td>
                        <td>
                          <?php if($row->sk_filename == NULL) { echo 'SK Belum Terbit'; } else { ?>
 <a href="<?php echo base_url('uploads/lulus/'.$row->sk_filename); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span></a>
                          <?php } ?>
                        </td>
                        <td> <a href="<?php echo base_url('lulus/detail/'.$row->id); ?>"  class="btn btn-sm btn-primary btndetailijin"   >Detail</a></td>
                      </tr>
                    <?php } }  ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>  