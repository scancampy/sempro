<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Topik</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Dosen</li>
              <li class="breadcrumb-item active">Topik</li>
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
                    <label for="nrp" class="col-sm-3 col-form-label">Lab</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="filterlab">
                        <option value="all">Semua Lab</option>
                        <?php 
                          $selectedlab = '';
                          if($this->input->get('filterlab')) {
                            $selectedlab = $this->input->get('filterlab');
                          } else {
                            $selectedlab = $info[0]->lab_id;
                          }
                        ?>
                        <?php foreach($lab as $l) { ?>
                          <option value="<?php echo $l->id; ?>" <?php if($selectedlab == $l->id) { echo 'selected'; } ?>><?php echo $l->nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                 <div class="form-group row">
                    <label for="pilihdosenpembuat" class="col-sm-3 col-form-label">Dosen Pembuat </label>
                    <div class="col-sm-9">
                      <select class="form-control" name="pilihdosenpembuat">
                        <option value="all" <?php if($this->input->get('pilihdosenpembuat') == 'all') { echo 'selected'; } ?>>Semua dosen</option>
                        <option value="self" <?php if($this->input->get('pilihdosenpembuat') == 'self') { echo 'selected'; } ?>>Diri sendiri</option>
                        
                      </select>
                    </div>
                 </div>
                 <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Kuota</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="pilihkuota">
                        <option value="all">Semua kuota</option>
                        <option value="sedia">Kuota tersedia</option>
                        <option value="habis">Kuota habis</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="pilihsemestersedia" class="col-sm-3 col-form-label">Status Topik</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                          <input class="form-check-input" <?php if($this->input->get('radioaktif') == 'all') { echo 'checked'; }  ?> <?php if(is_null($this->input->get('radioaktif'))) { echo 'checked'; }  ?> type="radio" name="radioaktif" id="radioaktif" value="all">
                          <label for="radioaktif"  class="form-check-label">Semua Status</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" <?php if($this->input->get('radioaktif') == "1") { echo 'checked'; }  ?> type="radio" name="radioaktif" id="radioaktif" value="1">
                          <label for="radioaktif"  class="form-check-label">Aktif</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" <?php  if($this->input->get('radioaktif') == "0") { echo 'checked'; }  ?> type="radio" name="radioaktif" id="radiotidakaktif" value="0">
                          <label for="radiotidakaktif" class="form-check-label">Tidak Aktif</label>
                        </div>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('lecturer/topic'); ?>" class="btn btn-default">Reset</a>
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
                    <h3 class="card-title">Data Topik</h3>
                  </div>
                  <div class="col-2">
                    <a href="<?php echo base_url('lecturer/add_topic'); ?>" class="btn  btn-primary btn-sm">Tambah Topik</a>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php  
                $notif = 0;
                if(isset($topik)) {
                  foreach($topik as $idx => $row) { 
                    if($is_kalab && $row->id_lab == $info[0]->lab_id && $row->kalab_verified_date == null) { $notif++; }
                  }
                } ?>

                <?php if($notif > 0) { ?>
                  <div class="callout callout-info">
                  <p>Terdapat <strong><?php echo $notif; ?></strong> topik yang membutuhkan validasi anda</p>
                </div>
                <?php }?>

                

                <table id="example2" class="table table-bordered table-hover" style="width:100%">
                  <thead>
                  <tr>
                    <th>Topik</th>
                    <th>MK Prasyarat</th>
                    <th>Kuota</th>
                    <th>Lab</th>   
                    <th>Validasi Kalab</th>                 
                    <th>Pembuat</th>
                    <th>Status</th>
                    <th width="15%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($topik)) {
                    $k = 0;

                      foreach($topik as $idx => $row) { 
                      ?>
                  <tr <?php if($is_kalab && $row->id_lab == $info[0]->lab_id && $row->kalab_verified_date == null) { ?>
                     class="bg-warning color-palette"<?php } ?>>
                    <td><?php echo $row->nama; ?></td>
                    <td><small><?php if(isset($prasyarat[$k][0])) { echo $prasyarat[$k][0]->nama.' ('.$prasyarat[$k][0]->minimum_mark.')<br/><br/>'; }
                    if(isset($prasyarat[$k][1])) { echo $prasyarat[$k][1]->nama.' ('.$prasyarat[$k][1]->minimum_mark.')<br/>'; } ?></small></td>
                    <td><?php echo $kuota[$idx].'/'.$row->kuota; ?></td>
                    <td><?php echo $row->namalab; ?></td>
                    <td><?php if($row->kalab_verified_date == null ) { echo '<small class="badge badge-secondary">Belum Divalidasi</small>'; } else { echo '<small class="badge badge-success">Sudah Divalidasi</small><br/><small>'.$row->namakalab; echo '<br/>'.strftime("%d %B %Y", strtotime($row->kalab_verified_date)).'</small>'; } ?></td>
                    <td><?php echo $row->namalecturer; ?></td>
                    <td><?php if($row->is_active) { echo '<span class="badge badge-success">Aktif</span>'; } else { echo '<span class="badge-secondary badge">Tidak Aktif</span>'; } ?></td>
                    <td >
                      <?php if($is_kalab && $row->id_lab == $info[0]->lab_id && $row->kalab_verified_date == null) { ?>
                        <button data-target="#modal-validasi" targetid="<?php echo $row->id; ?>" targetnama="<?php echo $row->nama; ?>" targetkuota="<?php echo $row->kuota; ?>" targetidlab="<?php echo $row->id_lab; ?>"  d
                                data-toggle="modal"
                                periodebuka="<?php echo $row->is_active; ?>"

                                <?php  if(isset($prasyarat[$k][0])) {   ?>
                                  targetprasyarat1="<?php echo $prasyarat[$k][0]->nama; ?>"
                                  targetmin1="<?php echo $prasyarat[$k][0]->minimum_mark; ?>"
                                <?php } else { ?>targetprasyarat1="" targetmin1=""<?php } ?> 

                                <?php if(isset($prasyarat[$k][1])) { ?>
                                  targetprasyarat2="<?php echo $prasyarat[$k][1]->nama; ?>"
                                  targetmin2="<?php echo $prasyarat[$k][1]->minimum_mark; ?>"
                                <?php } else { ?>targetprasyarat2="" targetmin2=""<?php } ?>
                                  class="btn btn-xs btn-primary validatebtn">Validasi</button>
                              <?php } ?>

                      <?php if($info[0]->npk == $row->lecturer_npk && $row->kalab_verified_date == null) {  ?>
                      <button targetid="<?php echo $row->id; ?>" targetnama="<?php echo $row->nama; ?>" targetkuota="<?php echo $row->kuota; ?>" targetaktif="<?php echo $row->is_active; ?>" targetidlab="<?php echo $row->id_lab; ?>" class="btn btn-xs btn-primary editbtn"  data-toggle="modal" periodebuka="<?php if(count($periode_topik[$k]) >0 ) { 
                        foreach($periode_topik[$k] as $idx => $pt) {
                          if($idx != 0) { echo ', '; }
                          echo $pt->nama; 
                        }
                       } ?>"

                        <?php if(isset($prasyarat[$k][0])) {   ?>
                          targetprasyarat1="<?php echo $prasyarat[$k][0]->course_id; ?>"
                          targetmin1="<?php echo $prasyarat[$k][0]->minimum_mark; ?>"
                        <?php } else { ?>targetprasyarat1="" targetmin1=""<?php } ?> 

                        <?php if(isset($prasyarat[$k][1])) { ?>
                          targetprasyarat2="<?php echo $prasyarat[$k][1]->course_id; ?>"
                          targetmin2="<?php echo $prasyarat[$k][1]->minimum_mark; ?>"
                        <?php } else { ?>targetprasyarat2="" targetmin2=""<?php } ?>  
                        data-target="#modal-edit" >Edit</button> <a href="<?php echo base_url('lecturer/topic/del/'.$row->id); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a>
                      <?php  } ?> 
                    </td>
                  </tr>

                    <?php $k++; } }  ?>
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
          <form method="post" action="<?php echo base_url('lecturer/topic'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Edit Topik</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="namaedit" class="col-sm-4 col-form-label">Topik</label>
              <div class="col-sm-8">
                <input type="text" name="namaedit" class="form-control" id="namaedit" >
                <input type="hidden" name="hidid" id="hidid">
              </div>
            </div>

            <div class="form-group row">
              <label for="kuotaedit" class="col-sm-4 col-form-label">Kuota</label>
              <div class="col-sm-8">
                <input type="number" value="1" min="1" name="kuotaedit" class="form-control" id="kuotaedit" >
              </div>
            </div>

            <div class="form-group row">
                <label for="angkatan" class="col-sm-4 col-form-label">Status Topik</label>
                <div class="col-sm-8">
                  <?php /*<span id="currentperiode"></span> <a class="btn btn-outline-primary btn-sm" id="ubahperiode">Ubah</a>*/ ?>
                  <input type="hidden" name="hidubahperiode" id="hidubahperiode" value="false"/>
                  <div id="containerperiode" style="display:none;">
                    <?php foreach($periode_edit as $row) {  ?>
                    <div class="form-check">
                      <input type="checkbox" <?php if($row->is_active == 1) { echo 'checked'; } ?> class="form-check-input" id="periodecheck_<?php echo $row->id; ?>" value="<?php echo $row->id; ?>" name="periodecheck[]">
                      <label class="form-check-label" for="periodecheck_<?php echo $row->id; ?>" ><?php echo $row->nama; ?></label>
                    </div>
                    <?php } ?>                      
                  </div>

                  <div class="form-check">
                      <input class="form-check-input"  type="radio" name="radioaktif" id="edit_radioaktif" value="1">
                      <label for="edit_radioaktif"  class="form-check-label">Aktif (topik dapat dipilih oleh mahasiswa)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radioaktif" id="edit_radiotidakaktif" value="0">
                      <label for="edit_radiotidakaktif" class="form-check-label">Tidak Aktif (topik tidak dapat dicari dan dipilih oleh mahasiswa)</label>
                    </div>                      
                
                </div>
              </div>
            <div class="form-group row">
                <label for="course_id1" class="col-sm-4 col-form-label">MK Prasyarat 1</label>
                <div class="col-sm-5">
                    <select class="form-control select2bs4" name="course_id1" id="course_id1">
                      <option selected="selected" value="">Pilih MK</option>
                      <?php foreach($course as $row) { ?>
                        <option value="<?php echo $row->id; ?>"><?php echo $row->kode_mk.' - '.$row->nama; ;?></option>
                      <?php } ?>
                    </select>
                </div>
                <div class="col-sm-3">
                   <select class="form-control" name="minimum_mark1" id="minimum_mark1">
                      <option value="" selected>Pilih Nilai Minimum</option>
                      <option value="A">A</option>
                      <option value="AB">AB</option>
                      <option value="B">B</option>
                      <option value="BC">BC</option>    
                      <option value="C">C</option>                        
                   </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="course_id2" class="col-sm-4 col-form-label">MK Prasyarat 2</label>
                <div class="col-sm-5">
                    <select class="form-control select2bs4" name="course_id2" id="course_id2">
                      <option selected="selected" value="">Pilih MK</option>
                      <?php foreach($course as $row) { ?>
                        <option value="<?php echo $row->id; ?>"><?php echo $row->kode_mk.' - '.$row->nama; ;?></option>
                      <?php } ?>
                    </select>
                </div>
                <div class="col-sm-3">
                   <select class="form-control" name="minimum_mark2" id="minimum_mark2">
                      <option value="" selected>Pilih Nilai Minimum</option>
                      <option value="A">A</option>
                      <option value="AB">AB</option>
                      <option value="B">B</option>
                      <option value="BC">BC</option>    
                      <option value="C">C</option>                        
                   </select>
                </div>
              </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" name="btnsimpan" value="btnsimpan" class="btn btn-primary">Simpan</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  

  <div class="modal fade" id="modal-validasi">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('lecturer/topic'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Detail Topik</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="namavalidasi" class="col-sm-4 col-form-label">Topik</label>
              <div class="col-sm-8">
                 <input type="text" readonly class="form-control-plaintext" id="namavalidasi" value="Topik">
                <input type="hidden" name="hididvalidasi" id="hididvalidasi">
              </div>
            </div>

            <div class="form-group row">
              <label for="kuotavalidasi" class="col-sm-4 col-form-label">Kuota</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="kuotavalidasi" value="Kuota">
              </div>
            </div>

            <div class="form-group row">
                <label for="angkatanvalidasi" class="col-sm-4 col-form-label">Status Topik</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" id="angkatanvalidasi" value="Gasal">
                </div>
                 
              </div>
            <div class="form-group row">
                <label for="course_id1_validasi" class="col-sm-4 col-form-label">MK Prasyarat 1</label>
                <div class="col-sm-8">
                   <input type="text" readonly class="form-control-plaintext" id="course_id1_validasi" value="MK 1 (minimal A)">
                </div>
              </div>

              <div class="form-group row">
                <label for="course_id1_validasi" class="col-sm-4 col-form-label">MK Prasyarat 2</label>
                <div class="col-sm-8">
                   <input type="text" readonly class="form-control-plaintext" id="course_id2_validasi" value="MK 2 (minimal A)">
                </div>
              </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" name="btnvalidasi" value="btnvalidasi" class="btn btn-primary">Validasi Topik Ini</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  