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

             <?php if(isset($iskalab)) {
              if($iskalab != false && count($student_kalab) >0  ) {

              ?>
             <div class="col-12">
                <div class="card card card-outline card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Data Proposal - <span class="badge badge-info">Kalab Cek Syarat &amp; Validasi</span></h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>               
                  </div>
              <!-- /.card-header -->
                  <div class="card-body ">
                    <?php if(count($student_kalab) >0 ) { ?>
                    <div class="alert alert-info alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                      Terdapat <?php echo count($student_kalab); ?> proposal mahasiswa dengan topik di lab anda yang butuh pengecekan syarat dan validasi
                    </div>
                  <?php }?>

                  <table id="example3" class="table table-bordered table-hover">
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
                        <?php if(isset($student_kalab)) { 
                          foreach($student_kalab as $row) {
                         
                          ?>
                      <tr>                    
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->namamhs.'<br/><small>'.$row->student_nrp.'</small>'; ?></td>
                        <td><?php echo strftime("%d %B %Y", strtotime($row->created_date)); ?></td>
                        <td >
                          <ul>
                            <li class="text-secondary"><small class="text-success"><i class="nav-icon fas fa-check"></i> Proposal masuk proses pengajuan</small></li>
                            <li class="text-secondary">
                             <?php if(!is_null($row->guardian_npk_verified)) { ?>
                          <small class="text-success"><i class="nav-icon fas fa-check"></i> 
                          <?php }  else { ?><small><?php } ?>Dosen Wali mengecek syarat</small></li>
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

                  
                </div>
             </div>
           <?php } } ?>

           <?php if(isset($iskalab)) {
                    if($iskalab != false  && count($needdosbing) >0 ) { ?>
<div class="col-12">
                <div class="card card card-outline card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Data Proposal - <span class="badge badge-success">Kalab Menentukan Dosbing</span></h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>               
                  </div>
              <!-- /.card-header -->
                  <div class="card-body ">
                    <?php if(count($needdosbing) >0 ) { ?>
                    <div class="alert alert-info alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                      Terdapat <?php echo count($needdosbing); ?> proposal mahasiswa dengan topik di lab anda yang butuh penentuan dosbing
                    </div>
                  <?php }?>

                  <table id="example3" class="table table-bordered table-hover">
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
                        <?php if(isset($needdosbing)) { 
                          foreach($needdosbing as $row) {
                         
                          ?>
                      <tr>                    
                        <td><?php echo $row->nama; 
                          if($row->judul != '') { echo '<br/><br/><small>Judul:<br/><strong>'.$row->judul.'</strong></small>'; }
                        ?></td>
                        <td><?php echo $row->namamhs.'<br/><small>'.$row->student_nrp.'</small>'; ?></td>
                        <td><?php echo strftime("%d %B %Y", strtotime($row->created_date)); ?></td>
                        <td >
                          <ul>
                            <li class="text-secondary"><small class="text-success"><i class="nav-icon fas fa-check"></i> Proposal masuk proses pengajuan</small></li>
                            <li class="text-secondary">
                             <?php if(!is_null($row->guardian_npk_verified)) { ?>
                          <small class="text-success"><i class="nav-icon fas fa-check"></i> 
                          <?php }  else { ?><small><?php } ?>Dosen Wali mengecek syarat</small></li>
                            <li class="text-secondary">
                              <?php if(!is_null($row->kalab_npk_verified)) { ?>
                          <small class="text-success"><i class="nav-icon fas fa-check"></i> 
                          <?php }  else { ?><small><?php } ?>Kalab mengecek syarat dan validasi</small></li>
                            <li class="text-secondary"><?php if(!is_null($row->is_verified==1)) { ?>
                          <small class="text-success"><i class="nav-icon fas fa-check"></i> 
                          <?php }  else { ?><small><?php } ?>WD mengecek syarat dan persetujuan</small></li>
                            <li class="text-secondary"><?php if(!is_null($row->judul != '')) { ?>
                          <small class="text-success"><i class="nav-icon fas fa-check"></i> 
                          <?php }  else { ?><small><?php } ?>Mahasiswa mengisi judul</small></li>
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

                  
                </div>
             </div>
           <?php } } ?>

           <?php if($wd != false) { ?>
            <div class="col-12">
             <div class="card card card-outline card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Data Proposal - WD Cek Syarat &amp; Persetujuan</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>               
                  </div>
              <!-- /.card-header -->
                  <div class="card-body ">
                    <?php if(count($wd_topic) >0 ) { ?>
                    <div class="alert alert-info alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                      Terdapat <?php echo count($wd_topic); ?> proposal mahasiswa yang butuh pengecekan syarat dan persetujuan
                    </div>
                  <?php }?>

                  <table id="example3" class="table table-bordered table-hover">
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
                        <?php if(isset($wd_topic)) { 
                          foreach($wd_topic as $row) {
                         
                          ?>
                      <tr>                    
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->namamhs.'<br/><small>'.$row->student_nrp.'</small>'; ?></td>
                        <td><?php echo strftime("%d %B %Y", strtotime($row->created_date)); ?></td>
                        <td >
                          <ul>
                            <li class="text-secondary"><small class="text-success"><i class="nav-icon fas fa-check"></i> Proposal masuk proses pengajuan</small></li>
                            <li class="text-secondary">
                             <?php if(!is_null($row->guardian_npk_verified)) { ?>
                          <small class="text-success"><i class="nav-icon fas fa-check"></i> 
                          <?php }  else { ?><small><?php } ?>Dosen Wali mengecek syarat</small></li>
                            <li class="text-secondary"><?php if(!is_null($row->kalab_npk_verified)) { ?>
                          <small class="text-success"><i class="nav-icon fas fa-check"></i> 
                          <?php }  else { ?><small><?php } ?>Kalab mengecek syarat dan validasi</small></li>
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

                  
                </div>
             </div>
           </div>
           <?php }?>
         </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  