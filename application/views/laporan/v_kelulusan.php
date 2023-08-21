<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Kelulusan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Laporan Kelulusan</li>
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
                    <label for="nrp" class="col-sm-3 col-form-label">Range Tanggal</label>
                    <div class="col-sm-9">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" id="rangetanggal" name="rangetanggal" value="<?php if(@$rangetanggal) { echo $rangetanggal; } else { echo date('m/d/Y', strtotime('-30 days'));
                        echo ' - ';
                        echo  date('m/d/Y'); } ?>">
                      </div>
                    </div>
                  </div>         
                 <div class="form-group row">
                    <label for="filterstatus" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="filterstatus" id="filterstatus">
                        <option value="all" <?php if($this->input->get('filterstatus') == 'all') { echo 'selected'; } ?>>Semua status</option>
                        <option value="waitdosbing" <?php if($this->input->get('filterstatus') == 'waitdosbing') { echo 'selected'; } ?>>Menunggu validasi dosbing</option>
                        <option value="waitadmin" <?php if($this->input->get('filterstatus') == 'waitadmin') { echo 'selected'; } ?>>Menunggu validasi admin</option>
                        <option value="waitwd" <?php if($this->input->get('filterstatus') == 'waitwd') { echo 'selected'; } ?>>Menunggu validasi WD</option>
                        <option value="waitsk" <?php if($this->input->get('filterstatus') == 'waitsk') { echo 'selected'; } ?>>Menunggu SK</option>
                        <option value="skterbit" <?php if($this->input->get('filterstatus') == 'skterbit') { echo 'selected'; } ?>>SK Lulus Terbit</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('laporan/kelulusan'); ?>" class="btn btn-default">Reset</a>
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
                    <h3 class="card-title">Laporan Kelulusan</h3>
                    <div class="" style="text-align:right;">Export to: 
                      <a target="_blank" href="<?php echo base_url('laporan/excelkelulusan?'.$_SERVER['QUERY_STRING']); ?>" class="btn btn-tool"><i class="fas fa-file-excel"></i></a>
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
                    <th>Download</th>
                    <th>SK Lulus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(@$lulus != '') {                       
                      setlocale (LC_TIME, 'id_ID');

                      foreach($lulus as $row) { 
                      ?>
                      <tr>
                        <td><?php if($row->submit_date != null) {  echo strftime("%d/%m/%Y", strtotime($row->submit_date)); } else {  echo '-'; } ?></td>
                         <td><?php  echo $row->nama.' ('.$row->nrp.')';  ?></td>
                         <td><?php 
                         if($row->dosbing_validate_date == null) {
                          echo '<span class="badge badge-primary">Menunggu Validasi Dosbing</span>';
                         } else if($row->admin_validate_date == null) {
                          echo '<span class="badge badge-primary">Menunggu Validasi Admin</span>';
                         } else if($row->wd_validate_date == null) {
                          echo '<span class="badge badge-primary">Menunggu Validasi WD</span>';
                         } else if($row->sk_filename == null) {
                          echo '<span class="badge badge-primary">Menunggu SK</span>';
                         } else {
                          echo '<span class="badge badge-success">SK Lulus Terbit</span>';
                         }
                          ?></td>
                         <td >
                          <div style="
                         display:flex !important;  justify-content: space-between;">
                          
                            <?php if($row->filekartuwali != null) { ?>
                            <a href="<?php echo base_url('uploads/lulus/'.$row->filekartuwali); ?>" target="_blank" style="display: flex;
    flex-flow: column;
    text-align: center;"><span class="fas fa-file-alt"></span> Perwalian</a>
                          <?php } ?>
                          <?php if($row->filebebaspakai != null) { ?>
                            <a href="<?php echo base_url('uploads/lulus/'.$row->filebebaspakai); ?>" target="_blank" style="display: flex;
    flex-flow: column;
    text-align: center;"><span class="fas fa-file-alt"></span> Bebas Pakai</a>
                          <?php } ?>
                          <?php if($row->filenaskahfinal != null) { ?>
                            <a href="<?php echo base_url('uploads/lulus/'.$row->filenaskahfinal); ?>" target="_blank" style="display: flex;
    flex-flow: column;
    text-align: center;"><span class="fas fa-file-alt"></span> Naskah</a>
                          <?php } ?>

                          <?php if($row->filetoefl != null) { ?>
                            <a href="<?php echo base_url('uploads/lulus/'.$row->filetoefl); ?>" target="_blank" style="display: flex;
    flex-flow: column;
    text-align: center;"><span class="fas fa-file-alt"></span> TOEFL</a>
                          <?php } ?> 
                        </div>
                         </td>
                         <td><?php if($row->sk_filename != null) { ?>
                            <a href="<?php echo base_url('uploads/lulus/'.$row->sk_filename); ?>" target="_blank" style="display: flex;
    flex-flow: column;
    text-align: center;"><span class="fas fa-file-alt"></span> SK Lulus</a>
                          <?php } else { echo '-'; } ?> </td>
                         
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
  