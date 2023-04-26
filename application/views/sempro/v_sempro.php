<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sidang Sempro</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Sidang Sempro</li>
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
                    <h3 class="card-title">Data Sidang Sempro</h3>
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
                <?php if($roles == 'student') { ?>
                      <?php if(@$lulus_sempro) { ?>
            <div class="col-md-12">
              <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-bullhorn"></i> Sidang Sempro Selesai</h5>
                    Mahasiswa telah berhasil menyelesaikan sidang Sempro. Untuk selanjutnya mahasiswa diperbolehkan untuk mengurus peminjaman lab, melakukan bimbingan skripsi, mengerjakan skripsi dan mendaftar sidang skripsi.
                  </div>
            </div>
            <hr/>
          <?php } ?>
                      <?php   if(isset($registration_not_eligible)) { ?>
                 <div class="callout callout-warning">
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                    Anda belum memiliki surat tugas proposal
                  </div>
                <?php } else if(!isset($registration_available) && !isset($already_registered)) { ?>
                  <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                    Periode sidang sempro belum dibuka.
                  </div>
                <?php } else if(isset($registration_available)) { ?>
                  <div class="callout callout-info">
                    <h5>Daftar Sidang Proposal</h5>
                    <p><?php echo 'Periode '.strftime("%d %B %Y", strtotime($periode_aktif->date_start)).' s/d '.strftime("%d %B %Y", strtotime($periode_aktif->date_end)); ?><br/>Klik tombol <a href="<?php echo base_url('sempro/daftar'); ?>">Daftar</a> untuk daftar sidang sempro.</p>
                  </div>
               <?php } else if($periodeaktif!= false) { ?>
                <div class="callout callout-info">
                    <h5>Periode Sidang Aktif</h5>
                    <p><b><?php echo 'Periode '.strftime("%d %B", strtotime($periodeaktif->date_start)).' s/d '.strftime("%d %B %Y", strtotime($periodeaktif->date_end)); ?></b></p>
                  </div><?php }  
                } else if($periodeaktif!= false)  { ?>
                  <div class="callout callout-info">
                    <h5>Periode Sidang Aktif</h5>
                    <p><b><?php echo 'Periode '.strftime("%d %B", strtotime($periodeaktif->date_start)).' s/d '.strftime("%d %B %Y", strtotime($periodeaktif->date_end)); ?></b></p>
                  </div>
                <?php } ?>

                
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Keterangan</th>
                    <th>Tanggal Sidang</th>
                    <th>Jam Sidang</th>
                    <th>Ruang Sidang</th>
                    <th>Status</th>
                    <th width="100px;">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($sempro)) {
                      //print_r($sempro);
                      foreach($sempro as $row) { 
                      ?>
                  <tr>                   
                    <td>
                      <div class="col-12">
                        <p class="text-sm"><b>Judul</b>
                          <span class="d-block"><?php echo $row->judul; ?></span>
                        </p>
                      </div>
                      <div class="col-12">
                        <p class="text-sm"><b>Mahasiswa</b>
                          <span class="d-block"><?php echo $row->nama.' / '.$row->nrp; ?></span>
                        </p>
                      </div>
                      <div class="col-12">
                        <p class="text-sm"><b>Dosbing 1</b>
                          <span class="d-block"><?php echo $row->dosbing1; ?></span>
                        </p>
                      </div>
                      <div class="col-12">
                        <p class="text-sm"><b>Dosbing 2</b>
                          <span class="d-block"><?php echo $row->dosbing2; ?></span>
                        </p>
                      </div>
                      <div class="col-12">
                        <p class="text-sm"><b>Tanggal Daftar</b>
                          <span class="d-block"><?php echo strftime("%d %B %Y", strtotime($row->registered_date)); ?></span>
                        </p>                        
                      </div>
                    </td>
                    <td><?php if($row->sidang_date != null && $row->ruang_id != null) { 
                      echo strftime("%d %B %Y", strtotime($row->sidang_date));
                     } else { echo '<span class="badge badge-secondary">belum tersedia</span>'; } ?></td>
                    
                    <td><?php if($row->sidang_date != null && $row->ruang_id != null) { 
                      echo $row->label;
                     } else { echo '<span class="badge badge-secondary">belum tersedia</span>'; } ?></td>
                     <td><?php if($row->sidang_date != null && $row->ruang_id != null) { 
                      echo $row->roomlabel;
                     } else { echo '<span class="badge badge-secondary">belum tersedia</span>'; } ?></td>
                    <td >
                       <?php
                        if($row->is_done == true) {
                          echo '<span class="badge badge-success">Lulus Sidang Sempro</span>';
                        } else if($row->is_failed == 1) {
                          echo '<span class="badge badge-danger">Tidak Lulus</span>';
                        } else if($row->kalab_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Kalab</span>';
                        } else if($row->admin_plotting_date == null) {
                          echo '<span class="badge badge-success">Menunggu Admin TU Ploting Ruang</span>';
                        }  else if( $row->hasil_submited_date == null) {
                          echo '<span class="badge badge-success">Menunggu Hasil Sidang</span>';
                        } else if($row->revision_required == true && $row->revision_judul_date == null) {
                          echo '<span class="badge badge-success">Menunggu Mahasiswa Revisi Judul</span>';
                        }  else if($row->dosbing_validate_date == null) {
                          echo '<span class="badge badge-success">Menunggu Dosbing Validasi Revisi Judul</span>';
                        } 
                      ?>

                      
                    </td>
                    <td>
                      <a href="<?php echo base_url('sempro/detail/'.$row->id); ?>" class="btn btn-primary btn-flat btn-sm">Detail</a>
                      <?php if(!is_null($row->naskah_filename)) { ?>
                      <a href="<?php echo base_url('uploads/naskah/'.$row->naskah_filename); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span></a>
                    <?php } ?>
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