<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Penyesuaian Manual Status Kelulusan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Penyesuaian Manual Kelulusan</li>
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
                    <label for="nrp" class="col-sm-3 col-form-label">Semester</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="filtersemester">
                        <option value="all">Pilih Semester</option>                        
                        <?php foreach($periode as $l) { ?>
                          <option value="<?php echo $l->id; ?>" <?php if($l->id == $this->input->get('filtersemester')) { echo 'selected'; } else if(empty($this->input->get('filtersemester')) && $l->is_active == 1) { echo 'selected';  } ?> ><?php echo strftime("%d %B %Y", strtotime($l->date_start)).' - '.strftime("%d %B %Y", strtotime($l->date_end)); if($l->is_active==1) { echo ' (Semester Aktif)'; } ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>   
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('penyesuaian/statuslulus'); ?>" class="btn btn-default">Reset</a>
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
                    <h3 class="card-title">Data Kelulusan</h3>
                    <div class="" style="text-align:right;">Export to: 
                      <a target="_blank" href="<?php echo base_url('laporan/excellulus?'.$_SERVER['QUERY_STRING']); ?>" class="btn btn-tool"><i class="fas fa-file-excel"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Tanggal Daftar</th>
                    <th>Mahasiswa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php if(@$sempro != '') {       
                      setlocale (LC_TIME, 'id_ID');
                      foreach($sempro as $row) { 
                       // print_r($row);
                      ?>
                      <tr>
                        <td><?php if(!empty($row->submit_date)) { echo strftime("%A, %d %B %Y", strtotime($row->submit_date)); } else { echo '-'; } ?></td>
                          <td><?php  echo $row->nama.' ('.$row->nrp.')';  ?></td>
                         <td><?php
                        if(empty($row->dosbing_validate_date)) {
                          echo '<span class="badge badge-success">Menunggu Validasi Dosbing</span>';
                        } else if(empty($row->admin_validate_date)) {
                          echo '<span class="badge badge-success">Menunggu Validasi Admin</span>';
                        } else if(empty($row->wd_validate_date)) {
                          echo '<span class="badge badge-success">Menunggu Validasi WD</span>';
                        } else if(empty($row->sk_created_date)) {
                          echo '<span class="badge badge-success">Menunggu SK Terbit</span>';
                        }  else {
                          echo '<span class="badge badge-success">SK Terbit</span>';
                        } 
                      ?></td>
                      <td>
                        <a href="#" lulusid="<?php echo $row->id; ?>" class="btn btn-xs btn-primary btnpenyesuaian" data-toggle="modal" data-target="#modal-tampil">Ubah Status</a>
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
  <div class="modal fade" id="modal-tampil">
      <div class="modal-dialog modal-lg ">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('penyesuaian/statuslulus'); ?>">
          
          <div class="modal-header">
            <h4 class="modal-title">Penyesuaian Status Kelulusan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
             <div class="col-6">
                <p class="text-sm"><b>Nama</b>
                  <span class="d-block" id="namamhs"></span>
                  <input type="hidden" name="hid_lulus_id" id="hid_lulus_id"/>
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
              <div class="col-12">
                <p class="text-sm"><b>Tanggal Daftar</b>
                  <span class="d-block" id="sidangdate"></span>
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
                                Mahasiswa Daftar Kelulusan<br/>
                                <small><i class="fas fa-clock"></i>
                                  <span id="tgldaftarsidang"></span>
                                   <button class="btn btn-danger btn-xs" style="position: absolute;
    right: 20px;" id="btn_hapus_lulus" name="btn_hapus_lulus" value="batal" onclick="return confirm('Yakin menghapus data kelulusan ini?'); ">Hapus Pendaftaran Kelulusan</button>
                              
                                </small>
                              </div>
                            </div>
                          </div>
                          <!-- end timeline -->

                           <!-- timeline item -->
                          <div>
                            <i id="validasidosbingclock"></i>
                            <div class="timeline-item">
                              
                              <div class="timeline-body">
                                Dosbing - Validasi<br/>
                                <small id="div_validasi_dosbing_content"><i class="fas fa-clock"></i>
                                  <span id="tglvalidasidosbing"></span>
                                </small>
                                <button class="btn btn-danger btn-xs" style="position: absolute;
    right: 20px;" id="btn_batal_validasi_dosbing" name="btn_batal_validasi_dosbing" value="batal" onclick="return confirm('Yakin batalkan status kelulusan ini?'); ">Batalkan</button>
                              </div>
                            </div>
                          </div>
                          <!-- end timeline -->

                          <!-- timeline item -->
                          <div>
                            <i id="adminvalidasiclock"></i>
                            <div class="timeline-item">
                              
                              <div class="timeline-body">
                                Admin - Validasi<br/>
                                <small id="div_admin_validasi_content"><i class="fas fa-clock"></i>
                                  <span id="tgladminvalidasi"></span>
                                </small>
                                <button class="btn btn-danger btn-xs" style="position: absolute;
    right: 20px;" id="btn_batal_admin_validasi" name="btn_batal_admin_validasi" value="batal" onclick="return confirm('Yakin batalkan status kelulusan ini?'); ">Batalkan</button>
                              </div>
                            </div>
                          </div>
                          <!-- end timeline -->

                          
                           <!-- timeline item -->
                          <div>
                            <i id="validasiwdclock"></i>
                            <div class="timeline-item">
                              
                              <div class="timeline-body">
                                WD - Validasi<br/>
                                <small id="div_validasi_wd_content"><i class="fas fa-clock"></i>
                                  <span id="tglvalidasiwd"></span>
                                </small>
                                <button class="btn btn-danger btn-xs" style="position: absolute;
    right: 20px;" id="btn_batal_validasi_wd" name="btn_batal_validasi_wd" value="batal" onclick="return confirm('Yakin batalkan status kelulusan ini?'); ">Batalkan</button>
                              </div>
                            </div>
                          </div>
                          <!-- end timeline -->
                           <!-- timeline item -->
                          <div>
                            <i id="validasiadmintuclock"></i>
                            <div class="timeline-item">
                              
                              <div class="timeline-body">
                                Admin - Validasi (SK Terbit)<br/>
                                <small id="div_validasi_admintu_content"><i class="fas fa-clock"></i>
                                  <span id="tglvalidasiadmintu"></span>
                                </small>
                                <button class="btn btn-danger btn-xs" style="position: absolute;
    right: 20px;" id="btn_batal_validasi_admintu" name="btn_batal_validasi_admintu" value="batal" onclick="return confirm('Yakin batalkan status kelulusan ini?'); ">Batalkan</button>
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
  