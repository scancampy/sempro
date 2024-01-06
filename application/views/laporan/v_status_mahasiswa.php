<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Status Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Laporan</li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url('laporan/statusmahasiswa'); ?>">Status Mahasiswa</a></li>
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
              <div class="card card-primary ">
                <div class="card-header"> 
                  <h3 class="card-title">Filter Data</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body ">
                    <div class="form-group row">
                      <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                      <div class="col-sm-10">
                        <input type="text" name="angkatan" class="form-control" id="angkatan" placeholder="Angkatan" value="<?php echo $this->input->get('angkatan'); ?>">
                      </div>
                    </div>
                </div>
                <div class="card-footer">
                   <button type="submit" name="btncari" value="btncari" class="btn btn-primary">Cari</button>
                   <a href="<?php echo base_url('laporan/proposal'); ?>"  class="btn btn-info">Reset</a>
                </div>
            </form>
          </div> 
          </div>
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="row">
                  <div class="col-12">
                    <h3 class="card-title">Data Proposal</h3>
                    <div class="" style="text-align:right;">Export to: 
                      <a target="_blank" href="<?php echo base_url('laporan/excelstatusmahasiswa?'.$_SERVER['QUERY_STRING']); ?>" class="btn btn-tool"><i class="fas fa-file-excel"></i></a>
                    </div>
                  </div>
                  
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                


                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>NRP</th>
                    <th>Status Proposal</th>
                    <th>Status Sempro</th>
                    <th>Status Skripsi</th>
                    <th>Status Kelulusan</th>
                    <th>Dosbing</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($student)) {                       
                      foreach($student as $key => $row) {

                        
                      ?>
                  <tr>
                   
                    <td><?php echo $row->nrp; ?></td>
                    <td><?php
                        if(!isset($status_proposal[$key][0])) {
                          echo '<span class="badge badge-secondary">N/A</span>';
                        }
                        else if($status_proposal[$key][0]->is_rejected == 1) {
                          echo '<span class="badge badge-danger">Proposal Ditolak</span>';
                        } else if($status_proposal[$key][0]->lecturer1_npk_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Dosbing</span>';
                        } else if($status_proposal[$key][0]->kalab_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Kalab</span>';
                        } else if($status_proposal[$key][0]->wd_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi WD</span>';
                        } else if($status_proposal[$key][0]->lecturer1_npk == null) {
                          echo '<span class="badge badge-success">Menunggu Kalab Pilih Dosbing</span>';
                        }  else if($status_proposal[$key][0]->judul == '') {
                          echo '<span class="badge badge-success">Menunggu Mahasiswa Input Judul</span>';
                        } else if($status_proposal[$key][0]->judul != '' && $status_proposal[$key][0]->kalab_npk_verified_judul_date == null) {
                          echo '<span class="badge badge-success">Menunggu Kalab Validasi Judul</span>';
                        } else if($status_proposal[$key][0]->is_verified == 0) {
                          echo '<span class="badge badge-success">Menunggu Validasi Final WD</span>';
                        }  else if($status_proposal[$key][0]->is_verified == 1 && $status_proposal[$key][0]->is_st_created==0) {
                          echo '<span class="badge badge-success">Menunggu Pembuatan ST</span>';
                        } else if($status_proposal[$key][0]->is_st_created) { echo '<span class="badge badge-success">ST Telah Terbit</span>'; }
                      ?></td>
                    <td><?php

                   // print_r($status_sempro[$key]);
                        if(!isset($status_sempro[$key][0])) {
                          echo '<span class="badge badge-secondary">N/A</span>';
                        }
                        else if($status_sempro[$key][0]->is_done == 1) {
                          echo '<span class="badge badge-success">Lulus Sidang Sempro</span>';
                        } else if($status_sempro[$key][0]->is_failed == 1) {
                          echo '<span class="badge badge-danger">Tidak Lulus</span>';
                        } else if($status_sempro[$key][0]->kalab_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Kalab</span>';
                        } else if($status_sempro[$key][0]->admin_plotting_date == null) {
                          echo '<span class="badge badge-success">Menunggu Admin TU Ploting Ruang</span>';
                        }  else if( $status_sempro[$key][0]->hasil_submited_date == null) {
                          echo '<span class="badge badge-success">Menunggu Hasil Sidang</span>';
                        } else if($status_sempro[$key][0]->revision_required == true && $status_sempro[$key][0]->revision_judul_date == null) {
                          echo '<span class="badge badge-success">Menunggu Mahasiswa Revisi Judul</span>';
                        }  else if($status_sempro[$key][0]->dosbing_validate_date == null) {
                          echo '<span class="badge badge-success">Menunggu Dosbing Validasi Revisi Judul</span>';
                        } 
                      ?></td>
                    <td><?php
                        if(!isset($status_skripsi[$key][0])) {
                          echo '<span class="badge badge-secondary">N/A</span>';
                        }
                        else if($status_skripsi[$key][0]->is_done == true) {
                          echo '<span class="badge badge-success">Lulus Sidang Skripsi</span>';
                        } else if($status_skripsi[$key][0]->is_failed == 1) {
                          echo '<span class="badge badge-danger">Tidak Lulus</span>';
                        } else if($status_skripsi[$key][0]->kalab_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Kalab</span>';
                        } else if($status_skripsi[$key][0]->admin_plotting_date == null) {
                          echo '<span class="badge badge-success">Menunggu Admin TU Ploting Ruang</span>';
                        }  else if(empty($status_skripsi[$key][0]->naskah_filename)) {
                          echo '<span class="badge badge-success">Menunggu Mahasiswa Upload Naskah</span>';
                        } else {
                          echo '<span class="badge badge-success">Naskah telah diupload</span>';
                        } 
                      ?></td>
                    <td><?php 
                        if(!isset($status_lulus[$key][0])) {
                          echo '<span class="badge badge-secondary">N/A</span>';
                        }
                        else if($status_lulus[$key][0]->dosbing_validate_date == null) {
                          echo '<span class="badge badge-primary">Menunggu Validasi Dosbing</span>';
                         } else if($status_lulus[$key][0]->admin_validate_date == null) {
                          echo '<span class="badge badge-primary">Menunggu Validasi Admin</span>';
                         } else if($status_lulus[$key][0]->wd_validate_date == null) {
                          echo '<span class="badge badge-primary">Menunggu Validasi WD</span>';
                         } else if($status_lulus[$key][0]->sk_filename == null) {
                          echo '<span class="badge badge-primary">Menunggu SK</span>';
                         } else {
                          echo '<span class="badge badge-success">SK Lulus Terbit</span>';
                         }
                          ?></td>
                    <td>
                      <small>
                        <?php //print_r($status_proposal[$key][0]); ?>
                        <?php if(!isset($status_proposal[$key][0])) {
                          echo '<span class="badge badge-secondary">N/A</span>';
                        } else { 
                          if($status_proposal[$key][0]->dosbing1nama != '')  { echo '- '.$status_proposal[$key][0]->dosbing1nama;  
                          }
                          if($status_proposal[$key][0]->dosbing2nama != '')  { echo '<br/>- '.$status_proposal[$key][0]->dosbing2nama;  
                          }
                        }?>
                      </small>
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
  