<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sidang Skripsi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Sidang Skripsi</li>
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
                    <h3 class="card-title">Data Sidang Skripsi</h3>
                  </div>
                  <div class="col-2">
                    <?php if(isset($registration_available) && $roles == 'student') { 
                      ?>
                    <a href="<?php echo base_url('skripsi/daftar'); ?>" class="btn btn-block btn-primary btn-sm" >Daftar</a>
                  <?php }  ?>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <?php if($roles == 'student') { ?>
                  <?php if(@$notif_upload_naskah_skripsi) { 
            
            $now = time(); // or your date as well
            $kurang_hari = strtotime($notif_upload_naskah_skripsi[0]->sidang_date) - $now;

            $kurang_hari_round =  round($kurang_hari / (60 * 60 * 24));

            if($kurang_hari_round >= 0) {
            ?>
              <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Upload Naskah Sidang Skripsi</h5>
                    Sidang skripsi anda sudah dijadwalkan yakni pada hari <?php echo strftime("%A, %d %B %Y", strtotime($notif_upload_naskah_skripsi[0]->sidang_date)); ?>.<br/> 
                    <?php if($kurang_hari_round > 0) { echo '<strong>Waktu tersisa adalah '.$kurang_hari_round.' hari lagi.</strong>'; } else { echo '<strong>Batas waktu upload tersisa hanya hari ini.</strong>';  } ?><br/>
                    Silahkan klik <a href="<?php echo base_url('skripsi/detail/'.$notif_upload_naskah_skripsi[0]->id); ?>">tautan</a> ini untuk upload berkas naskah skripsi anda.
                  </div>
            <hr/>
          <?php } else { ?>
              <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Upload Naskah Sidang Skripsi</h5>
                    Sidang skripsi anda sudah dijadwalkan yakni pada hari <?php echo strftime("%A, %d %B %Y", strtotime($notif_upload_naskah_skripsi[0]->sidang_date)); ?>.<br/> 
                    <strong>Anda terlambat mengupload naskah sidang skripsi. Silahkan hubungi petugas jurusan dan Kalab anda.</strong>
                  </div>
            <hr/>
          <?php } ?>
          <?php } ?>



                      <?php   if(isset($registration_not_eligible)) { ?>
                 <div class="callout callout-warning">
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                    Anda belum mengajukan ijin pemakaian lab
                  </div>
                <?php } else if(!isset($registration_available) && !isset($already_registered)) { ?>
                  <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                    Periode sidang skripsi belum dibuka.
                  </div>
                <?php } else if(isset($registration_available)) { ?>
                  <div class="callout callout-info">
                    <h5>Daftar Sidang Skripsi</h5>
                    <p><?php echo 'Periode '.strftime("%d %B %Y", strtotime($periode_aktif->date_start)).' s/d '.strftime("%d %B %Y", strtotime($periode_aktif->date_end)); ?><br/>Klik tombol <a href="<?php echo base_url('skripsi/daftar'); ?>">Daftar</a> untuk daftar sidang skripsi.</p>
                  </div>
               <?php } else { ?>
                <div class="callout callout-info">
                    <h5>Periode Sidang Aktif</h5>
                    <p><b><?php echo 'Periode '.strftime("%d %B", strtotime($periodeaktif->date_start)).' s/d '.strftime("%d %B %Y", strtotime($periodeaktif->date_end)); ?></b></p>
                  </div><?php }  
                } else { ?>
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
                          echo '<span class="badge badge-success">Lulus Sidang Skripsi</span>';
                        } else if($row->is_failed == 1) {
                          echo '<span class="badge badge-danger">Tidak Lulus</span>';
                        } else if($row->kalab_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Kalab</span>';
                        } else if($row->admin_plotting_date == null) {
                          echo '<span class="badge badge-success">Menunggu Admin TU Ploting Ruang</span>';
                        }  else if($row->naskah_upload_date == null) {
                          echo '<span class="badge badge-success">Menunggu Mahasiswa Upload Naskah</span>';
                        } else {
                          echo '<span class="badge badge-success">Naskah telah diupload</span>';
                        } 
                      ?>

                      
                    </td>
                    <td>
                      <a href="<?php echo base_url('skripsi/detail/'.$row->id); ?>" class="btn btn-primary btn-flat btn-sm">Detail</a>
                      <?php if(!is_null($row->naskah_filename)) { ?>
                      <a href="<?php echo base_url('uploads/naskahskripsi/'.$row->naskah_filename); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span></a>
                    <?php } ?>
                    <?php if(!is_null($row->naskah_drive)) { ?>
                      <a href="<?php echo $row->naskah_drive; ?>" target="_blank" class="color-red btn btn-outline-warning btn-flat btn-sm"><span class="fa fa-link"></span></a>
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