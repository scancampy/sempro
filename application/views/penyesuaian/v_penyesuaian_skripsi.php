<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Penyesuaian Manual Status Skripsi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Penyesuaian Manual Skripsi</li>
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
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body ">
                  <div class="form-group row">
                    <label for="nrp" class="col-sm-3 col-form-label">Periode Sidang</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="filtersemester">
                        <option value="all">Pilih Periode</option>                        
                        <?php foreach($periode as $l) { ?>
                          <option value="<?php echo $l->id; ?>" <?php if($l->id == $this->input->get('filtersemester')) { echo 'selected'; } else if(empty($this->input->get('filtersemester')) && $l->is_active == 1) { echo 'selected';  } ?> ><?php echo strftime("%d %B %Y", strtotime($l->date_start)).' - '.strftime("%d %B %Y", strtotime($l->date_end)); if($l->is_active==1) { echo ' (Periode Aktif)'; } ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>                
                 <div class="form-group row">
                    <label for="filterlokasi" class="col-sm-3 col-form-label">Tampilkan</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="filtertampilkan">
                        <?php if($is_lecturer) { ?>
                        <option value="self" <?php if('self' == $this->input->get('filtertampilkan')) { echo 'selected'; } ?>>Diri saya</option>
                        <?php } ?>
                        <option value="all" <?php if('all' == $this->input->get('filtertampilkan')) { echo 'selected'; } else if(empty($this->input->get('filtertampilkan'))) { echo 'selected'; } ?>>Semua</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('laporan/sempro'); ?>" class="btn btn-default">Reset</a>
                    <button type="submit" name="btncari" value="btncari" class="btn btn-primary">Cari</button>
                  </div>
              </div>
            </form>
          </div>
          
             <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="row">
                  <div class="col-12">
                    <h3 class="card-title">Data Skripsi</h3>
                    <div class="" style="text-align:right;">Export to: 
                      <a target="_blank" href="<?php echo base_url('laporan/excelsempro?'.$_SERVER['QUERY_STRING']); ?>" class="btn btn-tool"><i class="fas fa-file-excel"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Tanggal Sidang</th>
                    <th>Ruang</th>
                    <th>Jam</th>
                    <th>Mahasiswa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php if(@$skripsi != '') {       
                      setlocale (LC_TIME, 'id_ID');
                      foreach($skripsi as $row) { 
                      ?>
                      <tr>
                        <td><?php if(!empty($row->sidang_date)) { echo strftime("%A, %d %B %Y", strtotime($row->sidang_date)); } else { echo '-'; } ?></td>
                          <td><?php  echo $row->roomlabel;  ?></td>
                         <td><?php  echo $row->label;  ?></td>
                         <td><?php  echo $row->nama.' ('.$row->nrp.')';  ?></td>
                         <td><?php
                        if($row->is_done == true) {
                          echo '<span class="badge badge-success">Lulus Sidang Sempro</span>';
                        } else if($row->is_failed == 1) {
                          echo '<span class="badge badge-danger">Tidak Lulus</span>';
                        } else if($row->kalab_verified_date == null) {
                          echo '<span class="badge badge-success">Menunggu Validasi Kalab</span>';
                        } else if($row->admin_plotting_date == null) {
                          echo '<span class="badge badge-success">Menunggu Admin TU Ploting Ruang</span>';
                        }  else if($row->naskah_filename == null) {
                          echo '<span class="badge badge-success">Menunggu Mahasiswa Upload Naskah</span>';
                        } else if( $row->hasil_submited_date == null) {
                          echo '<span class="badge badge-success">Menunggu Hasil Sidang</span>';
                        } else if($row->revision_required == true && $row->revision_judul_date == null) {
                          echo '<span class="badge badge-success">Menunggu Mahasiswa Revisi Judul</span>';
                        }  else if($row->dosbing_validate_date == null) {
                          echo '<span class="badge badge-success">Menunggu Dosbing Validasi Revisi Judul</span>';
                        } 
                      ?></td>
                      <td>
                        <a href="#" semproid="<?php echo $row->id; ?>" class="btn btn-xs btn-primary btnpenyesuaian" data-toggle="modal" data-target="#modal-tampil">Ubah Status</a>
                        <a href="#" semproid="<?php echo $row->id; ?>" class="btn btn-xs btn-primary btnubahpenguji" data-toggle="modal" data-target="#modal-ubah-penguji-tampil">Ubah Penguji</a></td>                       
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

  <!-- Model Ubah penguji -->
  <div class="modal fade" id="modal-ubah-penguji-tampil">
      <div class="modal-dialog modal-lg ">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('penyesuaian/statusskripsi'); ?>">
          
          <div class="modal-header">
            <h4 class="modal-title">Ubah Penguji Skripsi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-6">
                <p class="text-sm"><b>Nama</b>
                  <span class="d-block" id="namamhs_ubah_penguji"></span>
                  <input type="hidden" name="hid_skripsi_ubah_penguji_id" id="hid_skripsi_ubah_penguji_id"/>
                </p>
              </div>
              <div class="col-6">
                <p class="text-sm"><b>NRP</b>
                  <span class="d-block" id="nrp_ubah_penguji"></span>
                </p>
              </div>   
              <div class="col-12">
                <p class="text-sm"><b>Judul</b>
                  <span class="d-block" id="judul_ubah_penguji"></span>
                </p>
              </div>    
              <div class="col-6">
                <p class="text-sm"><b>Tanggal Sidang</b>
                  <span class="d-block" id="sidangdate_ubah_penguji"></span>
                </p>
              </div>

              <div class="col-6">
                <p class="text-sm"><b>Ruang Sidang</b>
                  <span class="d-block" id="ruang_ubah_penguji"></span>
                </p>
              </div>

              <div class="col-6">
                <p class="text-sm"><b>Dosbing 1</b>
                  <span class="d-block" id="dosbing1_ubah_penguji"></span>
                </p>
              </div>
               <div class="col-6">
                <p class="text-sm"><b>Dosbing 2</b>
                  <span class="d-block" id="dosbing2_ubah_penguji"></span>
                </p>
              </div>

              <div class="col-6">
                <p class="text-sm"><b>Ketua</b>
                  <span class="d-block" id="penguji1_ubah_penguji">
                    <select class="form-control" id="cbo_penguji1_ubah_penguji" name="cbo_penguji1_ubah_penguji">
                    </select>
                  </span>
                </p>
              </div>
               <div class="col-6">
                <p class="text-sm"><b>Sekretaris</b>
                  <span class="d-block" id="penguji2_ubah_penguji">
                    <select class="form-control" id="cbo_penguji2_ubah_penguji" name="cbo_penguji2_ubah_penguji">
                    </select>
                  </span>
                </p>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" name="btn_submit_ubah_penguji" value="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end of Modal Ubah penguji -->

  <!-- /.modal -->
  <div class="modal fade" id="modal-tampil">
      <div class="modal-dialog modal-lg ">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('penyesuaian/statusskripsi'); ?>">
          
          <div class="modal-header">
            <h4 class="modal-title">Penyesuaian Status Skripsi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
             <div class="col-6">
                <p class="text-sm"><b>Nama</b>
                  <span class="d-block" id="namamhs"></span>
                  <input type="hidden" name="hid_skripsi_id" id="hid_skripsi_id"/>
                </p>
              </div>
              <div class="col-6">
                <p class="text-sm"><b>NRP</b>
                  <span class="d-block" id="nrp"></span>
                </p>
              </div>   
              <div class="col-12">
                <p class="text-sm"><b>Judul</b>
                  <span class="d-block" id="judul"></span>
                </p>
              </div>    
              <div class="col-6">
                <p class="text-sm"><b>Tanggal Sidang</b>
                  <span class="d-block" id="sidangdate"></span>
                </p>
              </div>

              <div class="col-6">
                <p class="text-sm"><b>Ruang Sidang</b>
                  <span class="d-block" id="ruang"></span>
                </p>
              </div>

              <div class="col-6">
                <p class="text-sm"><b>Dosbing 1</b>
                  <span class="d-block" id="dosbing1"></span>
                </p>
              </div>
               <div class="col-6">
                <p class="text-sm"><b>Dosbing 2</b>
                  <span class="d-block" id="dosbing2"></span>
                </p>
              </div>

              <div class="col-6">
                <p class="text-sm"><b>Ketua</b>
                  <span class="d-block" id="penguji1"></span>
                </p>
              </div>
               <div class="col-6">
                <p class="text-sm"><b>Sekretaris</b>
                  <span class="d-block" id="penguji2"></span>
                </p>
              </div>


               <div class="col-12">
                <p class="text-sm"><b>Status</b>
                  <span class="d-block" id="status">
                    <div class="row">
                      <div class="col-12">
                        <!-- The time line -->
                        <div class="timeline">
                       
                          <!-- timeline item -->
                          <div>
                            <i class="fas fa-check bg-green"></i>
                            <div class="timeline-item">
                              
                              <div class="timeline-body">
                                Mahasiswa Daftar Sidang Skripsi<br/>
                                <small><i class="fas fa-clock"></i>
                                  <span id="tgldaftarsidang"></span>
                                   <button class="btn btn-danger btn-xs" style="position: absolute;
    right: 20px;" id="btn_hapus_skripsi" name="btn_hapus_skripsi" value="batal" onclick="return confirm('Yakin menghapus skripsi ini?'); ">Hapus Pendaftaran Skripsi</button>
                              
                                </small>
                              </div>
                            </div>
                          </div>
                          <!-- end timeline -->

                           <!-- timeline item -->
                          <div>
                            <i id="validasikalabclock"></i>
                            <div class="timeline-item">
                              
                              <div class="timeline-body">
                                Kalab - Validasi<br/>
                                <small id="div_validasi_kalab_content"><i class="fas fa-clock"></i>
                                  <span id="tglvalidasikalab"></span>
                                </small>
                                <button class="btn btn-danger btn-xs" style="position: absolute;
    right: 20px;" id="btn_batal_validasi_kalab" name="btn_batal_validasi_kalab" value="batal" onclick="return confirm('Yakin batalkan status skripsi ini?'); ">Batalkan</button>
                              </div>
                            </div>
                          </div>
                          <!-- end timeline -->

                          <!-- timeline item -->
                          <div>
                            <i id="adminplotruangclock"></i>
                            <div class="timeline-item">
                              
                              <div class="timeline-body">
                                Admin - Plot Ruangan<br/>
                                <small id="div_admin_plot_ruang_content"><i class="fas fa-clock"></i>
                                  <span id="tgladminplotruang"></span>
                                </small>
                                <button class="btn btn-danger btn-xs" style="position: absolute;
    right: 20px;" id="btn_batal_admin_plot_ruang" name="btn_batal_admin_plot_ruang" value="batal" onclick="return confirm('Yakin batalkan status skripsi ini?'); ">Batalkan</button>
                              </div>
                            </div>
                          </div>
                          <!-- end timeline -->

                        </div>
                      </div>
                    </div>
                  </span>
                </p>
              </div>
            </div>
                        
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  