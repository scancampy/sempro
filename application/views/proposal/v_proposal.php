<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Proposal</li>
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
                    <h3 class="card-title">Data Proposal</h3>
                  </div>
                  <div class="col-2">
                    <?php if(count($active_topic) == 0) { ?>
                    <a href="<?php echo base_url('proposal/pilihtopik'); ?>" class="btn btn-block btn-primary btn-sm" >Pilih Topik</a>
                  <?php } ?>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <?php if($student[0]->eligible ==0 ) { ?>
                  <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                    Anda belum memenuhi prasyarat untuk memilih topik dan mengajukan proposal.
                  </div>
                <?php } else if(count($active_topic) == 0) { ?>
                  <div class="callout callout-info">
                    <h5>Anda belum memilih topik</h5>
                    <p>Klik tombol <a href="<?php echo base_url('proposal/pilihtopik'); ?>">Pilih Topik</a> untuk memilih topik.</p>
                  </div>
                <?php } ?>

                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Topik</th>
                    <th>Lab</th>
                    <th>Tgl. Pengajuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($student_topic)) { 
                      foreach($student_topic as $row) { 
                      ?>
                  <tr>                   
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->namalab; ?></td>
                    <td><?php echo strftime("%d %B %Y", strtotime($row->created_date)); ?></td>
                    <td >
                       <?php
                        if($row->is_rejected == 1) {
                          echo '<span class="badge badge-danger">Proposal Ditolak</span>';
                        } else if($row->lecturer1_npk_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Dosbing</span>';
                        } else if($row->kalab_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Kalab</span>';
                        } else if($row->wd_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi WD</span>';
                        } else if($row->lecturer1_npk == null) {
                          echo '<span class="badge badge-success">Menunggu Kalab Pilih Dosbing</span>';
                        }  else if($row->judul == '') {
                          echo '<span class="badge badge-success">Menunggu Mahasiswa Input Judul</span>';
                        } else if($row->judul != '' && $row->kalab_npk_verified_judul_date == null) {
                          echo '<span class="badge badge-success">Menunggu Kalab Validasi Judul</span>';
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
                      <a href="<?php echo base_url('proposal/detail/'.$row->id); ?>" class="btn btn-primary btn-flat btn-sm">Detail</a>

                      <a data-target="#modal-tracking" data-toggle="modal" href="<?php echo base_url('proposal/detail/'.$row->id); ?>" class="btn btn-outline-primary btn-flat btn-sm">Tracking</a>

                      <?php if($row->is_st_created == 1) {
                          echo '<a href="'.base_url('uploads/st/'.$row->st_filename).'" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span></a>';
                        } ?>
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

    <!-- /.modal -->
  <div class="modal fade" id="modal-tracking">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Tracking</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="bs-stepper linear">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step  <?php if($row->lecturer1_npk_verified_date != null) { echo 'active'; } ?> text-center" data-target="#logins-part" >
                      
                        <?php if(!is_null($row->lecturer1_npk_rejected)) { echo '<span class="bs-stepper-circle bg-danger"><span class="fa fa-times"></span></span>'; } else { echo '<span class="bs-stepper-circle ">1</span>'; } ?>
                        <br/>
                        <span class="bs-stepper-label"><small>
                          <?php 
                          if(!is_null($row->lecturer1_npk_rejected)) { 
                            echo 'Ditolak Dosbing';
                          } else if($row->lecturer1_npk_verified_date == null) { echo 'Menunggu Validasi Dosbing'; } else { echo 'Validasi Dosbing'; } ?></small></span>
                      
                    </div>
                    <div class="line"></div>
                    <div class="step  <?php if($row->kalab_verified_date != null) { echo 'active'; } ?> text-center" data-target="#logins-part" >
                      
                        <span class="bs-stepper-circle">2</span>
                        <br/>
                        <span class="bs-stepper-label"><small><?php if($row->kalab_verified_date == null && $row->lecturer1_npk_verified_date != null) { echo 'Menunggu '; } ?> Validasi Kalab<?php ?></small></span>
                      
                    </div>
                    <div class="line"></div>
                    <div class="step  <?php if($row->wd_verified_date != null) { echo 'active'; } ?> text-center" data-target="#information-part">
                     
                        <span class="bs-stepper-circle <?php if(!is_null($row->wd_npk_rejected)) { echo 'bg-red'; } ?>"><?php if(!is_null($row->wd_npk_rejected)) { echo '<i class="fas fa-times bg-red"></i>'; } else { echo '3'; } ?></span><br/>
                        <span class="bs-stepper-label"><small><?php if($row->wd_verified_date == null && $row->kalab_verified_date != null) { echo 'Menunggu '; } ?> Validasi WD<?php ?></small></span>
                    </div>
                    <div class="line"></div>
                    <div class="step text-center <?php if($row->lecturer1_npk != null) { echo 'active'; } ?>" data-target="#information-part">                     
                        <span class="bs-stepper-circle">4</span><br/>
                        <span class="bs-stepper-label"><small>Kalab Pilih Dosbing</small></span>
                    </div>
                    <div class="line"></div>
                    <div class="step text-center <?php if($row->judul != NULL ) { echo 'active'; } ?>" data-target="#information-part">                     
                        <span class="bs-stepper-circle">5</span><br/>
                        <span class="bs-stepper-label"><small>Mahasiswa Input Judul</small></span>
                    </div>
                    <div class="line"></div>
                    <div class="step text-center <?php if($row->judul != NULL && $row->kalab_npk_verified_judul != NULL) { echo 'active'; } ?>" data-target="#information-part">                     
                        <span class="bs-stepper-circle">6</span><br/>
                        <span class="bs-stepper-label"><small>Kalab Validasi Judul</small></span>
                    </div>
                    <div class="line"></div>
                    <div class="step text-center <?php if($row->is_verified ==1) { echo 'active'; } ?>" data-target="#information-part">                     
                        <span class="bs-stepper-circle">7</span><br/>
                        <span class="bs-stepper-label"><small>Validasi WD</small></span>
                    </div>
                     <div class="line"></div>
                    <div class="step text-center <?php if($row->is_st_created ==1) { echo 'active'; } ?>" data-target="#information-part">                     
                        <span class="bs-stepper-circle">8</span><br/>
                        <span class="bs-stepper-label"><small>Surat Tugas</small></span>
                    </div>
                  </div>
                </div>
    </div>
</div>
</div>


          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <style type="text/css">
      .line { 
            min-height: 3px !important;
            border-radius: 20px !important;
       }
    </style>