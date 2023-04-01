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
                  <h3 class="card-title"><strong>Welcome, <?php echo $info[0]->nama; ?></strong><br/><small><?php echo $info[0]->nrp; ?></small></h3>

                </div>
              </div>
            </div>

            <hr/>
            <?php if(@$proposal) { ?>
            <div class="col-md-12">
              <div class="card card-outline card-secondary">
                <div class="card-header">
                  <h4 class="card-title"><strong>JUDUL: <?php if(empty($proposal[0]->judul)) { echo '-'; } else { echo $proposal[0]->judul; } ?></strong><br/>
                    <small>Status Proposal: 
                      <?php
                        if($proposal[0]->is_rejected == 1) {
                          echo '<span class="badge badge-danger">Proposal Ditolak</span>';
                        } else if($proposal[0]->lecturer1_npk_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Dosbing</span>';
                        } else if($proposal[0]->kalab_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Kalab</span>';
                        } else if($proposal[0]->wd_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi WD</span>';
                        } else if($proposal[0]->lecturer1_npk == null) {
                          echo '<span class="badge badge-success">Menunggu Kalab Pilih Dosbing</span>';
                        }  else if($proposal[0]->judul == '') {
                          echo '<span class="badge badge-success">Menunggu Mahasiswa Input Judul</span>';
                        } else if($proposal[0]->judul != '' && $proposal[0]->kalab_npk_verified_judul_date == null) {
                          echo '<span class="badge badge-success">Menunggu Kalab Validasi Judul</span>';
                        } else if($proposal[0]->is_verified == 0) {
                          echo '<span class="badge badge-success">Menunggu Validasi Final WD</span>';
                        }  else if($proposal[0]->is_verified == 1 && $proposal[0]->is_st_created==0) {
                          echo '<span class="badge badge-success">Menunggu Pembuatan ST</span>';
                       } else if($proposal[0]->is_st_created == 1) {
                          echo '<span class="badge badge-success">ST Sudah Terbit</span>';
                        }
                      ?>
                    </small>
                  </h4>
                </div>
              </div>
            </div>
          <?php } ?>

            <?php if(@$jadwal_sempro) { ?>
               <div class="col-md-12">
                  <div class="card card-outline card-secondary">
                    <div class="card-header">
                      <h4 class="card-title">
                        <strong>Jadwal Sidang Sempro</strong>
                      </h4>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td><i class="fas fa-calendar"></i> Tanggal Sidang</td>
                          <td><i class="fas fa-clock"></i> Jam Sidang</td>
                          <td><i class="fas fa-door-open"></i> Ruang Sidang</td>
                        </tr>
                        <tr>
                          <td><strong><?php echo strftime("%d %B %Y", strtotime($jadwal_sempro[0]->sidang_date)); ?></strong></td>
                          <td><strong><?php echo $jadwal_sempro[0]->label; ?></strong></td>
                          <td><strong><?php echo $jadwal_sempro[0]->roomlabel; ?></strong></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
            <?php } ?>

            <?php if(@$jadwal_skripsi) { ?>
               <div class="col-md-12">
                  <div class="card card-outline card-secondary">
                    <div class="card-header">
                      <h4 class="card-title">
                        <strong>Jadwal Sidang Skripsi</strong>
                      </h4>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td><i class="fas fa-calendar"></i> Tanggal Sidang</td>
                          <td><i class="fas fa-clock"></i> Jam Sidang</td>
                          <td><i class="fas fa-door-open"></i> Ruang Sidang</td>
                        </tr>
                        <tr>
                          <td><strong><?php echo strftime("%d %B %Y", strtotime($jadwal_skripsi[0]->sidang_date)); ?></strong></td>
                          <td><strong><?php echo $jadwal_skripsi[0]->label; ?></strong></td>
                          <td><strong><?php echo $jadwal_skripsi[0]->roomlabel; ?></strong></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
            <?php } ?>

            <?php if(@$sempro_need_revision) { ?>
              <div class="col-md-12">                     
                  <div class="col-md-4 col-sm-6 col-12">
                    <a href="<?php echo base_url('sempro/detail/'.$sempro_need_revision[0]->id); ?>">
                      <div class="info-box">
                        <span class="info-box-icon bg-info"><?php echo count($sempro_need_revision); ?></span>

                        <div class="info-box-content" style="line-height: 14px;">
                          <span ><strong>Hasil Sidang Sempro</strong><br/>Belum Direvisi</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                    </a>
                  <!-- /.info-box -->
                </div>
              </div>
            <?php } ?>

            <?php if(@$lulus_sempro && empty(@$jadwal_skripsi)) { ?>
            <div class="col-md-12">
              <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-bullhorn"></i> Sidang Sempro Selesai</h5>
                    Mahasiswa telah berhasil menyelesaikan sidang Sempro. Untuk selanjutnya mahasiswa diperbolehkan untuk mengurus peminjaman lab, melakukan bimbingan skripsi, mengerjakan skripsi dan mendaftar sidang skripsi.
                  </div>
            </div>
            <hr/>
          <?php } ?>

          <?php if(@$notif_upload_naskah_skripsi) { 
            
            $now = time(); // or your date as well
            $kurang_hari = strtotime($notif_upload_naskah_skripsi[0]->sidang_date) - $now;

            $kurang_hari_round =  round($kurang_hari / (60 * 60 * 24));

            if($kurang_hari_round >= 0) {
            ?>
            <div class="col-md-12">
              <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Upload Naskah Sidang Skripsi</h5>
                    Sidang skripsi anda sudah dijadwalkan yakni pada hari <?php echo strftime("%A, %d %B %Y", strtotime($notif_upload_naskah_skripsi[0]->sidang_date)); ?>.<br/> 
                    <?php if($kurang_hari_round > 0) { echo '<strong>Waktu tersisa adalah '.$kurang_hari_round.' hari lagi.</strong>'; } else { echo '<strong>Batas waktu upload tersisa hanya hari ini.</strong>';  } ?><br/>
                    Silahkan klik <a href="<?php echo base_url('skripsi/detail/'.$notif_upload_naskah_skripsi[0]->id); ?>">tautan</a> ini untuk upload berkas naskah skripsi anda.
                  </div>
            </div>
            <hr/>
          <?php } else { ?>
            <div class="col-md-12">
              <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Upload Naskah Sidang Skripsi</h5>
                    Sidang skripsi anda sudah dijadwalkan yakni pada hari <?php echo strftime("%A, %d %B %Y", strtotime($notif_upload_naskah_skripsi[0]->sidang_date)); ?>.<br/> 
                    <strong>Anda terlambat mengupload naskah sidang skripsi. Silahkan hubungi petugas jurusan dan Kalab anda.</strong>
                  </div>
            </div>
            <hr/>
          <?php } ?>
          <?php } ?>

              <?php if(!$cektopik) { ?>
              <div class="col-md-12">
                  <div class="card card-outline card-primary">
                    <div class="card-header">
                      <h3 class="card-title"><strong>Eligibility Check</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="row">
                      
                      <div class="col-12">
                        <?php if($eligible_check) { ?>
                          <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Hasil Cek Prasyarat</h5>
                            Hasil cek eligbilitas menyatakan anda berhak memilih topik skripsi
                          </div>
                        <?php  } else { ?>
                          <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                            Hasil cek eligbilitas menyatakan anda belum dapat memilih topik skripsi
                          </div>
                        <?php } ?>
                        
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
                    </div>
                  </div>
                </div>
              </div>
                <?php } ?>

<?php if(@$need_upload_naskah_skripsi && $need_upload_naskah_skripsi >0) { ?>
                  <div class="col-md-12">                     
                      <div class="col-md-4 col-sm-6 col-12">
                        <a href="<?php echo base_url('skripsi'); ?>">
                          <div class="info-box">
                            <span class="info-box-icon bg-info"><?php echo count($need_upload_naskah_skripsi); ?></span>

                            <div class="info-box-content" style="line-height: 14px;">
                              <span ><strong>Naskah Skripsi</strong><br/>Belum Upload</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                        </a>
                      <!-- /.info-box -->
                    </div>
                  </div>
        <?php } ?>

<?php if(@$skterbit && $skterbit >0) { ?>
                  <div class="col-md-12">
                     
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lulus'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><?php echo count($skterbit); ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>SK LULUS</strong><br/>Sudah dapat diunduh</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        </div>
        <?php } ?>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  