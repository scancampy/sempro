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
              <li class="breadcrumb-item active">Dashboard</li>
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
          <?php 
             if(@$needvalidatelulus) { if(count($needvalidatelulus) >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lulus'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info "><?php echo count($needvalidatelulus); ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Pengajuan Pendaftaran Kelulusan</strong><br/>Membutuhkan validasi anda</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } } ?>

        <?php 
             if(@$needvalidateluluswd) { if(count($needvalidateluluswd) >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lulus'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info "><?php echo count($needvalidateluluswd); ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Pengajuan Pendaftaran Kelulusan</strong><br/>Membutuhkan validasi anda</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } } ?>
            <?php if(count($student) >0 ) { ?>
             <div class="col-12">
                <div class="card card card-outline card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Data Proposal - <span class="badge badge-warning">Dosen Wali Cek Syarat</span></h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>               
                  </div>
              <!-- /.card-header -->
                  <div class="card-body">
                    <?php if(count($student) >0 ) { ?>
                    <div class="alert alert-info alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                      Terdapat <?php echo count($student); ?> proposal mahasiswa wali anda yang butuh pengecekan syarat
                    </div>
                  <?php }?>
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Topik</th>
                        <th>Mahasiswa</th>
                        <th>Tgl. Pengajuan</th>
                        <th>Proses Pengajuan</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php if(isset($student)) { 
                          foreach($student as $row) { 
                          ?>
                      <tr>                    
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->namamhs.'<br/><small>'.$row->student_nrp.'</small>'; ?></td>
                        <td><?php echo strftime("%d %B %Y", strtotime($row->created_date)); ?></td>
                        <td >
                          <ul>
                            <li class="text-secondary"><small class="text-success"><i class="nav-icon fas fa-check"></i> Proposal masuk proses pengajuan</small></li>
                            <li class="text-secondary"><small>Dosen Wali mengecek syarat</small></li>
                            <li class="text-secondary"><small>Kalab mengecek syarat dan validasi</small></li>
                            <li class="text-secondary"><small>WD mengecek syarat dan persetujuan</small></li>
                            <li class="text-secondary"><small>Mahasiswa mengisi judul</small></li>
                            <li class="text-secondary"><small>Kalab menentukan Dosbing</small></li>
                          </ul>
                        </td>
                        <td>
                          <a href="<?php echo base_url('proposal/detail/'.$row->id); ?>" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>

                        <?php } }  ?>
                      </tfoot>
                    </table>
                  </div>
              <!-- /.card-body -->
                </div>
             </div>
           <?php } ?>

           <?php  if(@$iskalab == true) {  ?>

            <?php if($topic_need_validate >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lecturer/topic'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><?php echo $topic_need_validate; ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Topik</strong><br/>Membutuhkan validasi anda</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } ?>

        <?php if($need_kalab_title_validation >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lecturer/proposal'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><?php echo $need_kalab_title_validation; ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Judul Proposal</strong><br/>Membutuhkan validasi anda</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } ?>

        <?php if($need_kalab_sempro_validation >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('sempro'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><?php echo $need_kalab_sempro_validation; ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Sidang Sempro</strong><br/>Membutuhkan validasi anda</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } ?>

        <?php 
             if(isset($student_kalab)) { if(count($student_kalab) >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lecturer/proposal'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info "><?php echo count($student_kalab); ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Proposal</strong><br/>Membutuhkan validasi anda</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } } ?>

        

        <?php if(isset($needdosbing)) { if(count($needdosbing) >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lecturer/proposal'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info "><?php echo count($needdosbing); ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Proposal</strong><br/>Membutuhkan pemilihan dosbing</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } } ?>

      
           <?php } ?>
            
  <?php if(isset($need_dosbing1_validation)) { if($need_dosbing1_validation >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lecturer/proposal'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info "><?php echo $need_dosbing1_validation; ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Proposal</strong><br/>Membutuhkan validasi anda</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } } ?>

        <?php if(@$my_skripsi_schedule && $my_skripsi_schedule!= false) { ?>
          <div class="col-md-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jadwal Sidang Skripsi Anda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tanggal</th>
                      <th>Jam</th>
                      <th>Ruang</th>
                      <th>Mahasiswa</th>
                      <th>Pembimbing</th>
                      <th>Penguji</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($my_skripsi_schedule as $key => $value) { ?>
                      <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo strftime("%d %B %Y", strtotime($value->sidang_date)); ?></td>
                        <td><?php echo $value->label; ?></td>
                        <td><?php echo $value->roomlabel; ?></td>
                        <td><?php echo $value->nama.'<br/>'.$value->nrp; ?></td>
                        <td><small>
                          <?php if($info[0]->npk == $value->lecturer1_npk) { echo '<strong>(1) '.$value->dosbing1.'</strong><br/><br/>';  } else { echo '(1) '.$value->dosbing1.'<br/><br/>'; }

                                if($info[0]->npk == $value->lecturer2_npk) { echo '<strong>(2) '.$value->dosbing2.'</strong>';  } else { echo '(2) '.$value->dosbing2; } ?></small></td>
                          
                        <td><small> <?php if($info[0]->npk == $value->penguji1) { echo '<strong>(Ketua) '.$value->namapenguji1.'</strong><br/><br/>';  } else { echo '(Ketua) '.$value->namapenguji1.'<br/><br/>'; }

                                if($info[0]->npk == $value->penguji2) { echo '<strong>(Sekretaris) '.$value->namapenguji2.'</strong>';  } else { echo '(Sekretaris) '.$value->namapenguji2; } ?></small></td>
                        <td><a href="<?php echo base_url('skripsi/detail/'.$value->id); ?>" class="btn btn-outline-primary btn-flat">Detil</a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php } ?>

        <?php if(@$my_sempro_schedule && $my_sempro_schedule!= false) { ?>
          <div class="col-md-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jadwal Sidang Sempro Anda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tanggal</th>
                      <th>Jam</th>
                      <th>Ruang</th>
                      <th>Mahasiswa</th>
                      <th>Pembimbing</th>
                      <th>Penguji</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($my_sempro_schedule as $key => $value) { ?>
                      <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo strftime("%d %B %Y", strtotime($value->sidang_date)); ?></td>
                        <td><?php echo $value->label; ?></td>
                        <td><?php echo $value->roomlabel; ?></td>
                        <td><?php echo $value->nama.'<br/>'.$value->nrp; ?></td>
                        <td><small>
                          <?php if($info[0]->npk == $value->lecturer1_npk) { echo '<strong>(1) '.$value->dosbing1.'</strong><br/><br/>';  } else { echo '(1) '.$value->dosbing1.'<br/><br/>'; }

                                if($info[0]->npk == $value->lecturer2_npk) { echo '<strong>(2) '.$value->dosbing2.'</strong>';  } else { echo '(2) '.$value->dosbing2; } ?></small></td>
                          
                        <td><small> <?php if($info[0]->npk == $value->penguji1) { echo '<strong>(Ketua) '.$value->namapenguji1.'</strong><br/><br/>';  } else { echo '(Ketua) '.$value->namapenguji1.'<br/><br/>'; }

                                if($info[0]->npk == $value->penguji2) { echo '<strong>(Sekretaris) '.$value->namapenguji2.'</strong>';  } else { echo '(Sekretaris) '.$value->namapenguji2; } ?></small></td>
                        <td><a href="<?php echo base_url('sempro/detail/'.$value->id); ?>" class="btn btn-outline-primary btn-flat">Detil</a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php } ?>

           <?php if($wd != false) { ?>
            <?php if(count($wd_topic) >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lecturer/proposal'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><?php echo count($wd_topic); ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Proposal</strong><br/>Membutuhkan validasi anda</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
        }
          </div>
        <?php } ?>

        <?php if($need_wd_validation >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lecturer/proposal'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><?php echo $need_wd_validation; ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Proposal</strong><br/>Membutuhkan validasi anda</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } ?>
        <?php if($need_wd_final_validation >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lecturer/proposal'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><?php echo $need_wd_final_validation; ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Proposal</strong><br/>Membutuhkan validasi final anda</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } ?>

           <?php }?>
         </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  