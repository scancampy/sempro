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

        <?php 
             if(isset($student_kalab)) { if(count($student_kalab) >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lecturer/proposal'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-success "><?php echo count($student_kalab); ?></span>

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
                  <span class="info-box-icon bg-warning "><?php echo count($needdosbing); ?></span>

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
          </div>
        <?php } ?>
           <?php }?>
         </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  