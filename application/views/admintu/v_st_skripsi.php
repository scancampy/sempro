<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ST Skripsi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Admin TU</li>
              <li class="breadcrumb-item active">ST Skripsi</li>
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
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Filter Data</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="nrp" class="col-sm-2 col-form-label">Tampilkan</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="filterlab">
                        <option value="all">Semua Status</option>
                        <option value="validated">Belum Validasi ST Skripsi</option>
                        <option value="not_validate">Sudah Validasi ST Skripsi</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('kalab/topic'); ?>" class="btn btn-default">Reset</a>
                    <button type="submit" name="btncari" value="btncari" class="btn btn-primary">Cari</button>
                  </div>
              </div>
            </form>
          </div>    
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-10">
                    <h3 class="card-title">Data Proposal Mahasiswa</h3>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
                    <?php if(isset($proposal)) { 
                      foreach($proposal as $row) { 
                      ?>
                  <tr>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->namalab; ?></td>
                    <td><?php echo $row->pembuat; ?></td>
                    <td><?php echo strftime("%d %B %Y", strtotime($row->created_date)); ?></td>
                    <td><?php echo $row->studentname.'<br/><small>'.$row->student_nrp.'</small>'; ?></td>
                    <td>
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
                        } else if($row->is_verified == 1) {
                          echo '<span class="badge badge-success">Menunggu Pembuatan ST</span>';
                        } else if($row->is_st_created == 1) {
                          echo '<span class="badge badge-success">ST Telah Dibuat</span>';
                        }
                      ?>
                    </td>
                    <td >
                      <?php if($row->is_st_created == 0 && $row->is_verified == 1) {
                        ?>
                      <button targetid="<?php echo $row->id; ?>" targetnama="<?php echo $row->nama; ?>" targetlab="<?php echo $row->namalab; ?>" targetnrp="<?php echo $row->student_nrp; ?>" targetstudentname="<?php echo $row->studentname; ?>" targetp1="<?php echo $row->dosbing1nama; ?>" targetp2="<?php echo $row->dosbing2nama; ?>" class="btn btn-xs btn-primary editbtn"  data-toggle="modal" data-target="#modal-edit" >Update ST</button> 
                      <?php }  ?> 
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

  <div class="modal fade" id="modal-edit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('admintu/stskripsi'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Update ST</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="nama" class="col-sm-4 col-form-label">Topik</label>
              <div class="col-sm-8">
                <input type="text" name="nama" readonly class="form-control" id="nama" >
                <input type="hidden" name="hidden_id" id="hidden_id">
              </div>
            </div>

            <div class="form-group row">
              <label for="lab" class="col-sm-4 col-form-label">Lab</label>
              <div class="col-sm-8">
                <input type="text" readonly   name="lab" class="form-control" id="lab" >
              </div>
            </div>

            <div class="form-group row">
              <label for="nrp" class="col-sm-4 col-form-label">NRP</label>
              <div class="col-sm-8">
                <input type="text" readonly   name="nrp" class="form-control" id="nrp" >
              </div>
            </div>

            <div class="form-group row">
              <label for="studentname" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
              <div class="col-sm-8">
                <input type="text" readonly   name="studentname" class="form-control" id="studentname" >
              </div>
            </div>

            <div class="form-group row">
              <label for="targetp1" class="col-sm-4 col-form-label">Pembimbing 1</label>
              <div class="col-sm-8">
                <input type="text" readonly   name="targetp1" class="form-control" id="targetp1" >
              </div>
            </div>

             <div class="form-group row">
              <label for="targetp2" class="col-sm-4 col-form-label">Pembimbing 2</label>
              <div class="col-sm-8">
                <input type="text" readonly   name="targetp2" class="form-control" id="targetp2" >
              </div>
            </div>

            <div class="form-check">
              <input type="checkbox" name="checkvalidasist" class="form-check-input" id="checkvalidasist">
              <label class="form-check-label" for="checkvalidasist">Surat Tugas (ST) untuk skripsi mahasiswa ini telah dibuat</label>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" name="btnvalidasi" disabled value="submit" id="btnvalidasi" class="btn btn-primary">Validasi ST</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  