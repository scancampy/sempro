<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Topik</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Laporan Topik</li>
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
                    <label for="nrp" class="col-sm-3 col-form-label">Lab </label>
                    <div class="col-sm-9">
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
                  <div class="form-group row">
                    <label for="nrp" class="col-sm-3 col-form-label">Pemilik Topik</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="filterpemilik">
                        <option value="all">Semua</option>
                        <?php foreach($lecturer as $l) { ?>
                          <option value="<?php echo $l->npk; ?>" <?php if($this->input->get('filterpemilik') == $l->npk) { echo 'selected'; } ?>><?php echo $l->nama;  ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                                  
                 <div class="form-group row">
                    <label for="filtervalidasikalab" class="col-sm-3 col-form-label">Status Validasi Kalab</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="filtervalidasikalab">
                        <option value="all">Semua Status</option>
                        <option value="validasi" <?php if($this->input->get('filtervalidasikalab') == "validasi") { echo 'selected'; } ?>>Sudah Validasi</option>
                        <option value="belum" <?php if($this->input->get('filtervalidasikalab') == "belum") { echo 'selected'; } ?>>Belum Validasi</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="filterstatusaktif" class="col-sm-3 col-form-label">Status Topik Aktif</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="filterstatusaktif">
                        <option value="all" <?php if($this->input->get('filterstatusaktif') == 'all') { echo 'selected'; } ?>>Semua Status</option>
                        <option value="1" <?php if($this->input->get('filterstatusaktif') == 1) { echo 'selected'; } ?>>Aktif</option>
                        <option value="0" <?php if($this->input->get('filterstatusaktif') != 'all' && $this->input->get('filterstatusaktif') == '0') { echo 'selected'; } ?>>Tidak Aktif</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="filterkuota" class="col-sm-3 col-form-label">Status Kuota</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="filterkuota">
                        <option value="all">Semua Kuota</option>
                        <option value="penuh" <?php if($this->input->get('filterkuota') == "penuh") { echo 'selected'; } ?>>Kuota Penuh</option>
                        <option value="sisa" <?php if($this->input->get('filterkuota') == "sisa") { echo 'selected'; } ?>>Kuota Sisa</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('laporan/topik'); ?>" class="btn btn-default">Reset</a>
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
                    <h3 class="card-title">Laporan Topik</h3>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Lab</th>
                    <th>Prasyarat</th>
                    <th>Pemilik</th>
                    <th>Kuota</th>
                    <th>Validasi Kalab</th>
                    <th>Topik Aktif</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(@$topik != '') { 
                     // print_r($topik);
                      $k = 0;
                      foreach($topik as $row) { 
                        $bolehtampil = true;
                        if($this->input->get('filterkuota') != 'all') {
                          if($this->input->get('filterkuota') == 'sisa') {
                            if($kuota[$k] >= $row->kuota) {
                              $bolehtampil = false;
                            }
                          } else if($this->input->get('filterkuota') == 'penuh') {
                            if($kuota[$k] < $row->kuota) {
                              $bolehtampil = false;
                            }
                          }
                        }

                        if($bolehtampil) {
                      ?>
                      <tr>
                        <td><?php echo '<strong>'.$row->nama.'</strong>'; ?></td>
                        <td><?php echo $row->namalab; ?></td>
                         <td><?php if(isset($prasyarat[$k][0])) { echo $prasyarat[$k][0]->nama.' ('.$prasyarat[$k][0]->minimum_mark.')<br/>'; }
                    if(isset($prasyarat[$k][1])) { echo $prasyarat[$k][1]->nama.' ('.$prasyarat[$k][1]->minimum_mark.')<br/>'; } ?></td>
                         <td><?php  echo $row->pembuat;  ?></td>
                        <td><?php echo $kuota[$k].'/'.$row->kuota; ?></td>
                        <td><?php if($row->kalab_verified_date == null ) { echo '<small class="badge badge-secondary">Belum Divalidasi</small>'; } else { echo '<small class="badge badge-success">Sudah Divalidasi</small><br/><small>'.$row->namakalab; echo '<br/>'.strftime("%d %B %Y", strtotime($row->kalab_verified_date)).'</small>'; } ?></td>
                        <td><?php if($row->is_active) { echo '<span class="badge badge-success">Aktif</span>'; } else { echo '<span class="badge-secondary badge">Tidak Aktif</span>'; } ?></td>
                       
                      </tr>
                    <?php } $k++; } }  ?>
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
          <form method="post" action="<?php echo base_url('ijinlab'); ?>">
          
          <div class="modal-header">
            <h4 class="modal-title">Ijin Pemakaian Fasilitas Laboratorium</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
             <div class="col-6">
                <p class="text-sm"><b>Nama</b>
                  <span class="d-block" id="namamhs"></span>
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
                <p class="text-sm"><b>Tanggal Pengajuan</b>
                  <span class="d-block" id="submitdate"></span>
                </p>
              </div>

              <div class="col-12">
                <p class="text-sm"><b>Fasilitas Laboratorium yang Diajukan:</b>
                  
                </p>
                <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                      <th>Nama Lab</th>
                      <th>Lokasi</th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    
                  </tbody>                 
                </table>
              </div> 
            </div>
              


                        
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <input type="hidden" name="hid_ijin_id" id="hid_ijin_id"/>
            <button type="submit" value="submit" name="btnvalidasidosbing" id="btnvalidasidosbing"  class="btn btn-primary">Validasi Dosbing</button>
            <button type="submit" value="submit" name="btnvalidasikalab" id="btnvalidasikalab"  class="btn btn-primary">Validasi Kalab</button>
             <button type="submit" value="submit" name="btnvalidasiwd" id="btnvalidasiwd"  class="btn btn-primary">Validasi WD</button>
             <!-- <button type="button" value="submit" name="btnsubmit" id="btnsubmit" disabled class="btn btn-primary">Tambah Lab</button> -->
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  