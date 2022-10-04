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
              <li class="breadcrumb-item active">Dosen</li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url('lecturer/proposal'); ?>">Proposal</a></li>
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
            <form class="form-horizontal" method="get" action="<?php echo current_url(); ?>">
              <div class="card card-primary collapsed-card">
                <div class="card-header"> 
                  <h3 class="card-title">Filter Data</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body ">
                  <div class="form-group row">
                    <label for="pilihtopik" class="col-sm-4 col-form-label">Tampilkan Proposal Dengan Topik</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="pilihtopik">
                        <option value="all">Semua Topik</option>
                        <?php if(count($topik) >0) { 
                            foreach($topik as $value) { ?>
                          <option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
                        <?php } 
                      } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <button type="submit" name="btncari" value="btncari" class="btn btn-primary">Cari</button>
                  </div>
              </div>
            </form>
          </div> 
          
             <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-12">
                    <h3 class="card-title">Data Proposal</h3>
                  </div>
                  
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Topik</th>
                    <th>Lab</th>
                    <th>Pembuat</th>
                    <th>Tgl. Pengajuan</th>
                    <th>Mahasiswa</th>
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
                    <td><?php echo $row->pembuat; ?></td>
                    <td><?php echo strftime("%d %B %Y", strtotime($row->created_date)); ?></td>
                    <td><?php echo $row->studentname.'<br/><small>'.$row->student_nrp.'</small>'; ?></td>
                    <td >
                       <?php

                        if($row->is_rejected == 1) {
                          echo '<span class="badge badge-danger">Proposal Ditolak</span>';
                        } else if($row->kalab_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Kalab</span>';
                        } else if($row->wd_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi WD</span>';
                        } else if($row->is_rejected == null) {
                          echo '<span class="badge badge-error">Proposal Ditolak</span>';
                        } else if($row->lecturer1_npk == null) {
                          echo '<span class="badge badge-success">Menunggu Kalab Pilih Dosbing</span>';
                        }  else if($row->is_verified == 0) {
                          echo '<span class="badge badge-success">Menunggu Validasi Final WD</span>';
                        }
                      ?>
                      <?php /*
                      <ul>
                        <li class="text-secondary"><small class="text-success"><i class="nav-icon fas fa-check"></i> Proposal masuk proses pengajuan</small></li>
                        <li class="text-secondary">
                          <?php if(!is_null($row->guardian_npk_verified)) { ?>
                          <small class="text-success"><i class="nav-icon fas fa-check"></i> 
                          <?php }  else { ?><small><?php } ?>
                           Dosen Wali mengecek syarat</small></li>
                        <li class="text-secondary"> <?php if(!is_null($row->kalab_npk_verified)) { ?>
                          <small class="text-success"><i class="nav-icon fas fa-check"></i> 
                          <?php }  else { ?><small><?php } ?>Kalab mengecek syarat dan validasi</small></li>
                        <li class="text-secondary"><?php if(!is_null($row->wd_npk_verified)) { ?>
                          <small class="text-success"><i class="nav-icon fas fa-check"></i> 
                          <?php }  else { ?><small><?php } ?>WD mengecek syarat dan persetujuan</small></li>
                        <li class="text-secondary"><?php if($row->judul != '') { ?>
                          <small class="text-success"><i class="nav-icon fas fa-check"></i> 
                          <?php }  else { ?><small><?php } ?>Mahasiswa mengisi judul</small></li>
                        <li class="text-secondary"><?php if(!is_null($row->lecturer_created)) { ?>
                          <small class="text-success"><i class="nav-icon fas fa-check"></i> 
                          <?php }  else { ?><small><?php } ?>Kalab menentukan Dosbing</small></li>
                      </ul> */ ?>
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
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

    <!-- /.modal -->
  <div class="modal fade" id="modal-pilih">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('proposal/student'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Pilih Topik</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="nrpedit" class="col-sm-2 col-form-label">Lab</label>
              <div class="col-sm-10">
                 <select class="form-control" id="lab" name="lab">
                    <option value="">Pilih Lab</option>
                    <?php foreach($lab as $row) { ?>
                      <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                    <?php } ?>
                  </select>
              </div>
            </div>
           <div class="form-group row">
              <label for="namaedit" class="col-sm-2 col-form-label">Daftar Topik</label>
              <div class="col-sm-10">
                 <table id="example3" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Topik</th>
                    <th>MK Prasyarat 1</th>
                    <th>MK Prasyarat 2</th>
                    <th width="5%">Kuota</th>
                    <th width="5%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody id="tabletopik">
                  </tfoot>
                </table>
              </div>
            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  