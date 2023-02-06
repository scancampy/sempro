<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ijin Pemakaian Fasilitas Laboratorium</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Ijin Pemakaian Fasilitas Laboratorium</li>
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
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-10">
                    <h3 class="card-title">Ijin Pemakaian Fasilitas Laboratorium</h3>
                  </div>
                  <div class="col-2">
                    <?php
                      $eligibleijin = true;
                      foreach($ijinlab as $key => $value) {
                        if($value->wd_validated_npk == null) {
                          $eligibleijin = false;
                        }
                      } 
                    ?>
                    <?php if($eligibleijin == true && $roles =="student") { ?>
                    <a href="<?php echo base_url('ijinlab/baru'); ?>" class="btn btn-block btn-primary btn-sm" >Ajukan Ijin</a>
                  <?php } ?>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Mahasiswa</th>
                    <th>Judul</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Validasi Dosbing</th>
                    <th>Validasi Kalab</th>
                    <th>Validasi WD</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($ijinlab)) { 
                      foreach($ijinlab as $row) { 
                      ?>
                      <tr>
                        <td><?php echo '<strong>'.$row->nama.'</strong><br/>'.$row->nrp; ?></td>
                        <td><?php echo $row->judul; ?></td>
                        <td><?php echo strftime("%d %B %Y", strtotime($row->submit_date)); ?></td>
                        <td><?php if($row->pembimbing_validated_npk == NULL) { echo 'Belum Divalidasi'; } else {
                          echo $row->dosbing1.'<br/>Tanggal: '.strftime("%d %B %Y", strtotime($row->pembimbing_validated_date));
                        } ?></td>
                        <td><?php if($row->kalab_validated_npk == NULL) { echo 'Belum Divalidasi'; } else {
                          echo $row->kalab.'<br/>Tanggal: '.strftime("%d %B %Y", strtotime($row->kalab_validated_date));
                        } ?></td>
                        <td><?php if($row->wd_validated_npk == NULL) { echo 'Belum Divalidasi'; } else {
                          echo $row->wd.'<br/>Tanggal: '.strftime("%d %B %Y", strtotime($row->wd_validated_date));
                        } ?></td>
                        <td> <button  class="btn btn-sm btn-primary btndetailijin" loadid="<?php echo $row->id; ?>" data-toggle="modal" data-target="#modal-tampil" >Detail</button></td>
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
  