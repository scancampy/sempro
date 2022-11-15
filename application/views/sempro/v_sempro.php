<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ujian Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Ujian Proposal</li>
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
                    <h3 class="card-title">Data Ujian Proposal</h3>
                  </div>
                  <div class="col-2">
                    <?php if(isset($registration_available)) { 
                      ?>
                    <a href="<?php echo base_url('sempro/daftar'); ?>" class="btn btn-block btn-primary btn-sm" >Daftar</a>
                  <?php }  ?>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <?php if($roles == 'student') { 
                         if(isset($registration_not_eligible)) { ?>
                 <div class="callout callout-warning">
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                    Anda belum memiliki surat tugas proposal
                  </div>
                <?php } else if(!isset($registration_available) && !isset($already_registered)) { ?>
                  <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                    Periode sidang proposal belum dibuka.
                  </div>
                <?php } else if(isset($registration_available)) { ?>
                  <div class="callout callout-info">
                    <h5>Daftar Sidang Proposal</h5>
                    <p><?php echo 'Periode '.strftime("%d %B %Y", strtotime($periode_aktif->date_start)).' s/d '.strftime("%d %B %Y", strtotime($periode_aktif->date_end)); ?><br/>Klik tombol <a href="<?php echo base_url('sempro/daftar'); ?>">Daftar</a> untuk daftar sidang proposal.</p>
                  </div>
               <?php }  
                } ?>

                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Judul</th>
                    <th>NRP</th>
                    <th>Mahasiswa</th>
                    <th>Dosbing 1</th>
                    <th>Dosbing 2</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($sempro)) {
                      foreach($sempro as $row) { 
                      ?>
                  <tr>                   
                    <td><?php echo $row->judul; ?></td>
                    <td><?php echo $row->nrp; ?></td>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->dosbing1; ?></td>
                    <td><?php echo $row->dosbing2; ?></td>
                    <td><?php echo strftime("%d %B %Y", strtotime($row->registered_date)); ?></td>
                    <td >
                       <?php
                        if($row->is_failed == 1) {
                          echo '<span class="badge badge-danger">Tidak Lulus</span>';
                        } else if($row->kalab_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Kalab</span>';
                        } else if($row->admin_plotting_date == null) {
                          echo '<span class="badge badge-success">Menunggu Admin TU Ploting Ruang</span>';
                        } else if($row->lecturer1_npk == null) {
                          echo '<span class="badge badge-success">Menunggu Kalab Pilih Dosbing</span>';
                        }  else if($row->judul == '') {
                          echo '<span class="badge badge-success">Menunggu Mahasiswa Input Judul</span>';
                        } else if($row->judul != '' && $row->lecturer1_validate_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Judul Dosbing</span>';
                        } else if($row->is_verified == 0) {
                          echo '<span class="badge badge-success">Menunggu Validasi Final WD</span>';
                        }  else if($row->lecturer1_validate_date != null && $row->is_st_created==0) {
                          echo '<span class="badge badge-success">Menunggu Pembuatan ST</span>';
                        } else if($row->is_st_created == 1) {
                          echo '<span class="badge badge-success">ST Sudah Terbit</span>';
                        }
                      ?>

                      
                    </td>
                    <td>
                      <a href="<?php echo base_url('sempro/detail/'.$row->id); ?>" class="btn btn-primary btn-flat btn-sm">Detail</a>
                    </td>
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