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
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group ">
                        <label for="pilihtopik" class="col-sm-4 col-form-label">Tampilkan</label>
                        <div class="col-sm-6">
                          <div class="form-check">
                            <input class="form-check-input" <?php if($this->input->get('topiksaya')) { echo 'checked'; } ?> id="topiksaya" name="topiksaya" value="true" type="checkbox">
                            <label class="form-check-label" for="topiksaya">Topik Saya</label>
                          </div>

                          <div class="form-check">
                            <input class="form-check-input" <?php if($this->input->get('bimbingansaya')) { echo 'checked'; } ?> id="bimbingansaya" name="bimbingansaya" value="valid" type="checkbox">
                            <label class="form-check-label" for="bimbingansaya">Bimbingan Saya</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group ">
                        <label for="pilihtopik" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-10">
                           <select class="form-control" id="selectstatus" name="selectstatus">
                              <option value="all" <?php if($this->input->get('selectstatus') == 'all') { echo 'selected'; } ?>>Semua Status</option>
                              <option value="validasilecturer1" <?php if($this->input->get('selectstatus') == 'validasilecturer1') { echo 'selected'; } ?>>Menunggu Validasi Dosbing</option>
                              <option value="validasikalab" <?php if($this->input->get('selectstatus') == 'validasikalab') { echo 'selected'; } ?>>Menunggu Validasi Kalab</option>
                              <option value="validasiwd" <?php if($this->input->get('selectstatus') == 'validasiwd') { echo 'selected'; } ?>>Menunggu Validasi WD</option>
                              <option value="dosbingkalab" <?php if($this->input->get('selectstatus') == 'dosbingkalab') { echo 'selected'; } ?>>Menunggu Kalab Pilih Dosbing</option>
                              <option value="mhsinputjudul" <?php if($this->input->get('selectstatus') == 'mhsinputjudul') { echo 'selected'; } ?>>Menunggu Mahasiswa Input Judul</option>
                              <option value="validasijudulkalab" <?php if($this->input->get('selectstatus') == 'validasijudulkalab') { echo 'selected'; } ?>>Menunggu Validasi Judul oleh Kalab</option> 
                              <option value="validasidosbingwd" <?php if($this->input->get('selectstatus') == 'validasidosbingwd') { echo 'selected'; } ?>>Menunggu Validasi Final WD</option>
                              <option value="stwaiting" <?php if($this->input->get('selectstatus') == 'stwaiting') { echo 'selected'; } ?>>Menunggu Pembuatan ST</option>
                              <option value="stterbuat" <?php if($this->input->get('selectstatus') == 'stterbuat') { echo 'selected'; } ?>>ST Telah Terbit</option>
                              <option value="reject" <?php if($this->input->get('selectstatus') == 'reject') { echo 'selected'; } ?>>Proposal Ditolak</option>
                            </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group ">
                        <label for="filterlab" class="col-sm-4 col-form-label">Filter Lab</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="filterlab">
                            <option value="all">Semua Lab</option>
                            <?php 
                              $selectedlab = '';
                              if($this->input->get('filterlab')) {

                                $selectedlab = $this->input->get('filterlab');
                              } 
                            ?>
                            <?php foreach($lab as $l) { ?>
                              <option value="<?php echo $l->id; ?>" <?php if($selectedlab == $l->id) { echo 'selected'; } ?>><?php echo $l->nama; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <button type="submit" name="btncari" value="btncari" class="btn btn-primary">Cari</button>
                   <a href="<?php echo base_url('lecturer/proposal'); ?>"  class="btn btn-info">Reset</a>
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
                <?php  
                $notif = 0;
                if(isset($student_topic)) {
                  foreach($student_topic as $idx => $row) { 
                    if($is_wd && $row->wd_npk_verified == null && $row->kalab_verified_date != null) { $notif++; }

                    if($is_kalab && $row->lecturer1_npk == null && $row->wd_npk_verified != null) { $notif++; }
                  }


                } ?>


                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
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
//print_r($row);

                        $datashown = false;
                        if($this->input->get('selectstatus') != 'all' && !is_null($this->input->get('selectstatus'))) {                          
                          if($this->input->get('selectstatus') == 'validasilecturer1' && $row->lecturer1_npk_verified == null && $row->is_rejected == 0) {
                            $datashown = true;
                          } else if($this->input->get('selectstatus') == 'validasikalab' && $row->kalab_verified_date == null && $row->is_rejected == 0 && $row->lecturer1_npk_verified != null) {
                            $datashown = true;
                          } else if($this->input->get('selectstatus') == 'validasiwd' &&  $row->kalab_verified_date != null && $row->wd_verified_date == null  && $row->is_rejected == 0) {
                            $datashown = true;
                          } else if($this->input->get('selectstatus') == 'dosbingkalab' && $row->wd_verified_date != null && $row->lecturer1_npk == null  && $row->is_rejected == 0) {
                            $datashown = true;
                          } else if($this->input->get('selectstatus') == 'mhsinputjudul' && $row->judul == null && $row->lecturer_created != null && $row->lecturer1_npk != null  && $row->is_rejected == 0) {
                            $datashown = true;
                          } else if($this->input->get('selectstatus') == 'validasijudulkalab' && $row->judul != null && $row->judul_created != null && $row->kalab_npk_verified_judul_date == null  && $row->is_rejected == 0) {
                            $datashown = true;
                          } else if($this->input->get('selectstatus') == 'validasidosbingwd' &&  $row->kalab_npk_verified_judul_date != null && $row->is_verified == 0  && $row->is_rejected == 0) {
                            $datashown = true;
                          }  else if($this->input->get('selectstatus') == 'stwaiting' &&  $row->lecturer1_validate_date != null  && $row->is_st_created == 0  && $row->is_rejected == 0) {
                            $datashown = true;
                          } else if($this->input->get('selectstatus') == 'stterbuat'  && $row->is_st_created == 1  && $row->is_rejected == 0) {
                            $datashown = true;
                          } else if($this->input->get('selectstatus') == 'reject'  && $row->is_rejected == 1) {
                            $datashown = true;
                          }
                        } else {
                          $datashown = true;
                        } 

                       if($this->input->get('filterlab') != 'all' && !is_null($this->input->get('filterlab'))) {
                          if($row->idlab != $this->input->get('filterlab')) {
                            $datashown = false;
                          }
                        }

                        if(!$datashown) {
                          continue;
                        }
                      ?>
                  <tr>
                   
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->namalab; ?></td>
                    <td><?php echo $row->pembuat; ?></td>
                    <td><?php echo strftime("%d %B %Y", strtotime($row->created_date)); ?></td>
                    <td><?php echo $row->studentname.'<br/><small>'.$row->student_nrp.'</small>'; ?></td>
                    <td class="text-center" >
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
                        }  else if($row->is_verified == 1 && $row->is_st_created==0) {
                          echo '<span class="badge badge-success">Menunggu Pembuatan ST</span>';
                        } else if($row->is_st_created) { echo '<span class="badge badge-success">ST Telah Terbit</span>'; }
                      ?>
                      
                      
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
  