<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Ijin Pemakaian Lab</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Laporan Ijin Pemakaian Lab</li>
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
                    <label for="nrp" class="col-sm-3 col-form-label">Fasilitas Lab</label>
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
                          <option value="<?php echo $l->id; ?>" <?php if($selectedlab == $l->id) { echo 'selected'; } ?>><?php echo $l->ruang_lab; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>                
                 <div class="form-group row">
                    <label for="filterlokasi" class="col-sm-3 col-form-label">Lokasi</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="filterlokasi">
                        <option value="all">Semua lokasi</option>
                        <option value="internal" <?php if($this->input->get('filterlokasi') == "internal") { echo 'selected'; } ?>>Internal</option>
                        <option value="eksternal" <?php if($this->input->get('filterlokasi') == "eksternal") { echo 'selected'; } ?>>Eksternal</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('laporan/ijinlab'); ?>" class="btn btn-default">Reset</a>
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
                    <h3 class="card-title">Laporan Ijin Pemakaian Lab</h3>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Nama Lab</th>
                    <th>Lokasi</th>
                    <th>Nrp</th>
                    <th>Nama Mahasiswa</th>
                    <th>Tanggal Pengajuan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($ijinlab)) { 
                      foreach($ijinlab as $row) { 
                      ?>
                      <tr>
                        <td><?php echo '<strong>'.$row->nama_lab.'</strong>'; ?></td>
                        <td><?php if($row->alamat_lab == "") { echo 'Internal'; } else { echo $row->alamat_lab; } ?></td>
                         <td><?php  echo $row->nrp;  ?></td>
                         <td><?php  echo $row->nama;  ?></td>
                        <td><?php echo strftime("%d %B %Y", strtotime($row->submit_date)); ?></td>
                       
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
  