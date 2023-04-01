<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('proposal'); ?>">Proposal</a></li>
              <li class="breadcrumb-item active">Detail Proposal</li>
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
            <div class=" card card-outline card-primary">
              <form method="post" action="<?php echo base_url('proposal/detail/'.$detail[0]->id); ?>">
              <div class="card-header">
                <div class="card-title">Data Proposal</div>
                <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="text-muted">
                  <div class="row">
                    <div class="col-12">
                      <p class="text-sm">Judul
                        <b class="d-block"><?php echo $detail[0]->judul; ?></b>
                      </p>
                    </div>
                    
                    <div class="col-12">
                      <p class="text-sm">Download File Kerangka Kerja Konseptual
                        <b class="d-block">
                  <?php if($detail[0]->kk_filename != null) { ?>
                          <a href="<?php echo base_url('uploads/kk/'.$detail[0]->kk_filename); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span></a>                          
                  <?php } else { echo 'Belum tersedia'; } ?> 
                        </b>
                      </p>
                    </div>                   <div class="col-12">
                      <p class="text-sm">Tanggal Pengajuan
                        <b class="d-block"><?php echo strftime("%d %B %Y %H:%M:%S", strtotime($detail[0]->created_date)); ?></b>
                      </p>
                    </div>
                    <div class="col-5">
                      <p class="text-sm">Topik
                        <b class="d-block"><?php echo $detail[0]->nama; ?></b>
                      </p>
                    </div>
                    <div class="col-5">
                      <p class="text-sm">Kuota
                        <b class="d-block"><?php echo $kuota.'/'.$topik[0]->kuota; ?></b>
                      </p>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <p class="text-sm">
                         <?php if(isset($prasyarat[0])) { ?>
                          <table class="table table-bordered" style="width:100%;">
                            <tr>
                              <td>MK Prasyarat 1</td>
                              <td><?php if(isset($prasyarat[0])) { echo $prasyarat[0]->nama.' ('.$prasyarat[0]->kode_mk.')'; } ?></td>
                            </tr>
                            <tr>
                              <td>Nilai min.</td>
                              <td><?php echo $prasyarat[0]->minimum_mark;  ?></td>
                            </tr>
                            <tr>
                              <td>Nilai Transkrip</td>
                              <td><?php 
                              $prasyarat1 = false;
                              foreach($transcript_prasyarat as $value) {
                                if($value->kode_mk == $prasyarat[0]->kode_mk) {
                                  echo $value->nisbi; $prasyarat1 = true;
                                }
                              }

                              if($prasyarat1 == false) {
                                if(isset($transcript_prasyarat[0])) { 
                                  echo $transcript_prasyarat[0]->nisbi; 
                                } else {
                                  echo 'Mahasiswa belum lulus MK ini'; 
                                }
                              }
                             // if(isset($transcript_prasyarat[0])) { echo $transcript_prasyarat[0]->nisbi; } else //{ echo 'Mahasiswa belum lulus MK ini'; } 

                            ?></td>
                            </tr>
                          </table>
                        <?php } ?>
                      </p>
                    </div>
                     <div class="col-md-6 col-sm-12">
                      <p class="text-sm">
                        <?php if(isset($prasyarat[1])) { ?>
                          <table class="table table-bordered" style="width:100%;">
                            <tr>
                              <td>MK Prasyarat 2</td>
                              <td><?php if(isset($prasyarat[1])) { echo $prasyarat[1]->nama.' ('.$prasyarat[1]->kode_mk.')'; } ?></td>
                            </tr>
                            <tr>
                              <td>Nilai min.</td>
                              <td><?php echo $prasyarat[1]->minimum_mark;  ?></td>
                            </tr>
                            <tr>
                              <td>Nilai Transkrip</td>
                              <td><?php 
                              $prasyarat2 = false;
                              foreach($transcript_prasyarat as $value) {
                                if($value->kode_mk == $prasyarat[1]->kode_mk) {
                                  echo $value->nisbi; $prasyarat2 = true;
                                }
                              }

                              if($prasyarat2 == false) {
                                if(isset($transcript_prasyarat[1])) { 
                                  echo $transcript_prasyarat[1]->nisbi; 
                                } else {
                                  echo 'Mahasiswa belum lulus MK ini'; 
                                }
                              }

                              //if(isset($transcript_prasyarat[1])) { echo $transcript_prasyarat[1]->nisbi; } else { echo 'Mahasiswa belum lulus MK ini'; } ?></td>
                            </tr>
                          </table>
                        <?php } ?>
                      </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <!-- Box Comment -->
                      <div class="card card-widget">
                        <div class="card-header">
                          <?php if(!is_null($detail[0]->lecturer1_npk)) { ?>
                            <div class="user-block">
                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $detail[0]->lecturer1_npk; ?>_l.jpg" alt="User Image">
                            <span class="username"><?php echo $detail[0]->dosbing1nama; ?></span>
                            <span class="description">Dosen Pembimbing 1</span>
                          </div>
                                  <?php        
                                  } else { ?> 
                            <div class="user-block">
                            <span class="username"><a href="#">(Belum Tersedia)</a></span>
                            <span class="description">Dosen Pembimbing 1</span>
                          </div>
                                 <?php } ?>
                        </div>
                        
                      </div>
                      <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                      <!-- Box Comment -->
                      <div class="card card-widget">
                        <div class="card-header">
                          <?php if(!is_null($detail[0]->lecturer2_npk)) { ?>
                            <div class="user-block">
                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $detail[0]->lecturer2_npk; ?>_l.jpg" alt="User Image">
                            <span class="username"><?php echo $detail[0]->dosbing2nama; ?></span>
                            <span class="description">Dosen Pembimbing 2</span>
                          </div>
                                  <?php        
                                  } else { ?> 
                            <div class="user-block">
                            <span class="username"><a href="#">(Belum Tersedia)</a></span>
                            <span class="description">Dosen Pembimbing 2</span>
                          </div>
                                 <?php } ?>
                        </div>
                        
                      </div>
                      <!-- /.card -->
                    </div>

                  </div>
                </div>
              </div>
            </form>

            </div>
          </div>
          <div class="col-12">
            <div class=" card card-outline card-primary">
              <div class="card-header">
                <div class="card-title">Data Mahasiswa</div>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="text-muted">
                  <div class="row">
                    <div class="col-4">
                      <p class="text-sm">Nama
                        <b class="d-block"><?php echo $student[0]->nama; ?></b>
                      </p>
                    </div>
                    <div class="col-4">
                      <p class="text-sm">NRP
                        <b class="d-block"><?php echo $student[0]->nrp; ?></b>
                      </p>

                    </div>
                    <div class="col-4 text-right">
                      <a href="<?php echo base_url('transkrip/student/'.$student[0]->nrp); ?>" class="btn btn-outline-primary">Lihat Transkrip</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                       <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Cek Eligibilitas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">

                          <table class="table">
                            <thead>
                              <tr>
                                <th style="width: 10px">#</th>
                                <th>Verifikasi Data</th>
                                <th>Hasil Verifikasi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($setting as $index => $value) { ?>
                                <tr>
                                  <td><?php echo $index+=1; ?></td>
                                  <td><?php echo $value->nama; ?>
                                    <?php if($value->display_value_in_postfix == 1) { echo ' <strong>'.$value->nilai.'</strong>'; } ?>
                                  </td>
                                  <td class="text-center">
                                    <?php if($value->nama_alias == 'skripsi') { 
                                    if($cekks) {
                                      echo '<i class="nav-icon fas fa-check"></i>';
                                    } else {
                                      echo '<i class="nav-icon fas fa-times"></i>';
                                    }
                                  } ?>
                                  
                                    <?php if($value->nama_alias == 'nilai_metpen_min') { 
                                      if($eligible['nilai_metpen_min']) {
                                        echo '<i class="nav-icon fas fa-check"></i>';
                                      } else {
                                        echo '<i class="nav-icon fas fa-times"></i>';
                                      }
                                    } ?>

                                     <?php if($value->nama_alias == 'total_sks_tanpa_e_min') { 
                                      if($eligible['total_sks_tanpa_e_min']) {
                                        echo '<i class="nav-icon fas fa-check"></i>';
                                      } else {
                                        echo '<i class="nav-icon fas fa-times"></i>';
                                      }
                                    } ?>

                                      <?php if($value->nama_alias == 'total_sks_nilai_d_max') { 
                                      if($eligible['total_sks_nilai_d_max']) {
                                        echo '<i class="nav-icon fas fa-check"></i>';
                                      } else {
                                        echo '<i class="nav-icon fas fa-times"></i>';
                                      }
                                    } ?>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          
          <div class="col-12">
            <div class=" card card-outline card-primary">
              <div class="card-header">
                <div class="card-title">Proses Pengajuan</div>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="text-muted">
                  <div class="row">
                    <div class="col-12">
                      <!-- The time line -->
                      <div class="timeline">
                       
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-check bg-green"></i>
                          <div class="timeline-item">
                            
                            <div class="timeline-body">
                              Proposal Masuk Proses Pengajuan<br/>
                              <small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail[0]->created_date)); ?>
                              </small>
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->

                         <!-- timeline item -->
                        <div>
                         <?php if(!is_null($detail[0]->lecturer1_npk_verified)) { ?>
                          <i class="fas fa-check bg-green"></i>
                        <?php } else if($detail[0]->is_rejected == 1 && !is_null($detail[0]->lecturer1_npk_rejected)) { ?><i class="fas fa-times bg-red"></i><?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                          <div class="timeline-item">
                            
                            <div class="timeline-body">
                            Dosbing - <?php if($detail[0]->is_rejected && !is_null($detail[0]->lecturer1_npk_rejected)) { ?>Proposal Ditolak<?php } else { ?>Validasi<?php } ?><br/>


                            <?php if(!is_null($detail[0]->lecturer1_npk_verified)) { ?>
                                <br/><small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail[0]->lecturer1_npk_verified_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i>
                                <?php echo $detail[0]->l1nama; ?>
                              </small>
                              <?php } ?>

                              <?php if($detail[0]->is_rejected && !is_null($detail[0]->lecturer1_npk_rejected)) { ?>
                                <br/><small><i class="fas fa-times"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail[0]->lecturer1_rejected_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i>
                                <?php echo $detail[0]->l1rnama; ?>
                              </small><br/><br/>
                              <div class="callout callout-danger">
                                <small><strong>Alasan</strong></small><br/>
                                <small><?php echo $detail[0]->lecturer1_reason_reject; ?></small>
                              </div>

                              <?php } ?>


                              <?php if(is_null($detail[0]->lecturer1_npk_verified_date) && $detail[0]->is_rejected == 0 && isset($lecturer1)) { ?>
                                <form method="post" action="<?php echo base_url('proposal/detail/'.$detail[0]->id); ?>">
                                      <div class="form-group">
                                        <label for="ceksyaratwd" class="col-sm-4 col-form-label">Hasil Validasi</label>
                                        <div class="col-12">
                                          <div class="form-group">
                                            <div class="form-check">
                                              <input class="form-check-input" value="diterima" <?php if($detail[0]->is_rejected ==0) { echo 'checked'; } ?> type="radio" name="radiovalidasidosbing" id="radioditerimadosbing">
                                              <label class="form-check-label" for="radioditerimadosbing">Diterima</label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input" <?php if($detail[0]->is_rejected ==1) { echo 'checked'; } ?> value="ditolak" type="radio" name="radiovalidasidosbing" id="radioditolakdosbing" >
                                              <label class="form-check-label"  for="radioditolakdosbing">Ditolak</label>
                                            </div>
                                          </div>

                                          <div class="form-group" <?php if($detail[0]->is_rejected == 0) { ?>style="display: none;"<?php } ?> id="container_alasan_dosbing">
                                            <label>Alasan</label>
                                            <textarea class="form-control" rows="3" name="alasan_ditolak_dosbing" id="alasan_ditolak_dosbing" placeholder="Tuliskan alasan ditolak"><?php echo $detail[0]->lecturer1_reason_reject; ?></textarea>
                                          </div>                                        
                                        </div>
                                      </div>
                                      

                                      <div class="form-group ">
                                        <div class="col-sm-12 text-right">
                                          <button type="submit" class="btn btn-primary" value="Submit" name="btndosbingsubmit" id="btndosbingsubmit">Submit</button>
                                        </div>
                                      </div>
                                    </form>
                              <?php } ?>
                              
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                          
                         <!-- timeline item -->
                        <div>
                          <?php if(!is_null($detail[0]->kalab_npk_verified)) { ?>
                          <i class="fas fa-check bg-green"></i>
                        <?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                          <div class="timeline-item">

                            <div class="timeline-body">
                              Kalab - Validasi
                              <?php if(!is_null($detail[0]->kalab_npk_verified)) { ?>
                                <br/><small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail[0]->kalab_verified_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i>
                                <?php echo $detail[0]->kalabnama; ?>
                              </small>
                              <?php } ?>
                              <?php
                              if(isset($kalab)) {
                                  if($kalab && !is_null($detail[0]->lecturer1_npk_verified_date) && is_null($detail[0]->kalab_npk_verified)) { ?>
                                    <form method="post" action="<?php echo base_url('proposal/detail/'.$detail[0]->id); ?>">
                                      <div class="form-group">
                                        <label for="ceksyaratkalab" class="col-sm-4 col-form-label">Cek Syarat</label>
                                        <div class="col-12">
                                          <div class="form-check">
                                            <input class="form-check-input" id="ceksyaratkalab" name="ceksyaratkalab" value="valid" type="checkbox">
                                            <label class="form-check-label" for="ceksyaratkalab">Saya telah memeriksa syarat pengajuan topik mahasiswa ini</label>
                                          </div>
                                        </div>
                                      </div>
                                      

                                      <div class="form-group ">
                                        <div class="col-sm-12 text-right">
                                          <button type="submit" class="btn btn-primary" value="Submit" name="btnkalabsubmit" disabled id="btnkalabsubmit">Validasi</button>
                                        </div>
                                      </div>
                                    </form>
                               <?php } 
                              } ?>
                             
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                          <?php if(!is_null($detail[0]->wd_npk_verified)) { ?>
                          <i class="fas fa-check bg-green"></i>
                        <?php } else if($detail[0]->is_rejected == 1 && !is_null($detail[0]->wd_npk_rejected)) { ?><i class="fas fa-times bg-red"></i><?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                          <div class="timeline-item">
                            
                            <div class="timeline-body">
                              WD - <?php if($detail[0]->is_rejected && !is_null($detail[0]->wd_npk_rejected)) { ?>Proposal Ditolak<?php } else { ?>Validasi<?php } ?>
                              <?php if(!is_null($detail[0]->wd_npk_verified)) { ?>
                                <br/><small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail[0]->wd_verified_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i>
                                <?php echo $detail[0]->wdnama; ?>
                              </small>
                              <?php } ?>

                              <?php if($detail[0]->is_rejected && !is_null($detail[0]->wd_npk_rejected)) { ?>
                                <br/><small><i class="fas fa-times"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail[0]->wd_rejected_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i>
                                <?php echo $detail[0]->wdnamareject; ?>
                              </small><br/><br/>
                              <div class="callout callout-danger">
                                <small><strong>Alasan</strong></small><br/>
                                <small><?php echo $detail[0]->wd_reason_reject; ?></small>
                              </div>

                              <?php } ?>


                              <?php  
                                if(isset($wd)) {
                                  if($wd && !is_null($detail[0]->kalab_npk_verified) && is_null($detail[0]->wd_npk_verified) && $detail[0]->is_rejected != 1) { ?>
                                    <form method="post" action="<?php echo base_url('proposal/detail/'.$detail[0]->id); ?>">
                                      <div class="form-group">
                                        <label for="ceksyaratwd" class="col-sm-4 col-form-label">Hasil Validasi</label>
                                        <div class="col-12">
                                          <div class="form-group">
                                            <div class="form-check">
                                              <input class="form-check-input" value="diterima" <?php if($detail[0]->is_rejected ==0) { echo 'checked'; } ?> type="radio" name="radiovalidasiwd" id="radioditerima">
                                              <label class="form-check-label" for="radioditerima">Diterima</label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input" <?php if($detail[0]->is_rejected ==1) { echo 'checked'; } ?> value="ditolak" type="radio" name="radiovalidasiwd" id="radioditolak" >
                                              <label class="form-check-label"  for="radioditolak">Ditolak</label>
                                            </div>
                                          </div>

                                          <div class="form-group" <?php if($detail[0]->is_rejected == 0) { ?>style="display: none;"<?php } ?> id="container_alasan">
                                            <label>Alasan</label>
                                            <textarea class="form-control" rows="3" name="alasan_ditolak" id="alasan_ditolak" placeholder="Tuliskan alasan ditolak"><?php echo $detail[0]->wd_reason_reject; ?></textarea>
                                          </div>                                        
                                        </div>
                                      </div>
                                      

                                      <div class="form-group ">
                                        <div class="col-sm-12 text-right">
                                          <button type="submit" class="btn btn-primary" value="Submit" name="btnwdsubmit" id="btnwdsubmit">Submit</button>
                                        </div>
                                      </div>
                                    </form>
                                  <?php }
                                } ?>
                             
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        
                        <!-- timeline item -->
                        <div>
                          <?php if(!is_null($detail[0]->lecturer_created)) { ?>
                          <i class="fas fa-check bg-green"></i>
                        <?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                          
                          <div class="timeline-item">
                            
                            <div class="timeline-body">
                              Kalab - Pemilihan Dosbing
                              <?php if(!is_null($detail[0]->lecturer_created)) { ?>
                                <br/><small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail[0]->lecturer_created)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i>
                                <?php echo $detail[0]->kalabnama; ?>
                              </small>
                            <?php } ?>
                            
                              <?php
                              if(isset($kalab)) { 
                                

                                  if($kalab && ((is_null($detail[0]->lecturer1_npk) && is_null($detail[0]->lecturer2_npk))
                                   || $detail[0]->is_rejected == 1) && !is_null($detail[0]->wd_npk_verified)) { ?>
                                    <form method="post" id='formpilihdosbing' action="<?php echo base_url('proposal/detail/'.$detail[0]->id); ?>">

                                      <div class="form-group">
                                        <label for="ceksyaratwd" class="col-sm-4 col-form-label">Dosbing 1</label>
                                        <?php print_r($topik[0]->lecturer_npk); ?>
                                        <div class="col-12">
                                          <select class="form-control select2bs4" name="dosbing1" id="dosbing1" style="width: 100%;">
                                            <option selected="selected" value="0">[Pilih Dosbing 1]</option>
                                            <?php foreach($dosbing as $value) { ?>
                                            <option totbimbingan="<?php echo ($value->beban1+$value->beban2); ?>" value="<?php echo $value->npk; ?>" <?php if(!is_null($detail[0]->lecturer1_npk)) { if($detail[0]->lecturer1_npk == $value->npk) { echo 'selected'; } } else if($topik[0]->lecturer_npk == $value->npk) { echo 'selected'; } ?> ><?php echo $value->nama.' (Total bimbingan: '.($value->beban1+$value->beban2).')'; ?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="ceksyaratwd" class="col-sm-4 col-form-label">Dosbing 2</label>
                                        <div class="col-12">
                                          <select class="form-control select2bs4"  name="dosbing2" id="dosbing2" style="width: 100%;">
                                            <option selected="selected" totbimbingan="0" value="0">[Pilih Dosbing 2]</option>
                                            <?php foreach($dosbing as $value) { ?>
                                            <option totbimbingan="<?php echo ($value->beban1+$value->beban2); ?>" value="<?php echo $value->npk; ?>" <?php if(!is_null($detail[0]->lecturer2_npk)) { if($detail[0]->lecturer2_npk == $value->npk) { echo 'selected'; } } ?> ><?php echo $value->nama.' (Total bimbingan: '.($value->beban1+$value->beban2).')'; ?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                      </div>
                                      

                                      <div class="form-group ">
                                        <div class="col-sm-12 text-right">
                                          <button type="submit" class="btn btn-primary" value="Submit" name="btnkalabpilihdosbingsubmit" id="btnkalabpilihdosbingsubmit">Submit Dosbing</button>
                                        </div>
                                      </div>
                                    </form>
                              <?php } 
                            } ?>                             
                            </div>
                          </div>
                        </div>

                         <div>
                        <?php if(!is_null($detail[0]->judul) && is_null($detail[0]->kalab_rejected_judul_date)) { ?>
                          <i class="fas fa-check bg-green"></i>
                        <?php }  else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>

                            <div class="timeline-item">
                            
                              <div class="timeline-body">
                                Mahasiswa - Mengisi Judul Proposal & Kerangka Konseptual

                                <?php 
                              if(isset($is_student)) {
                                  if($is_student && !is_null($detail[0]->lecturer1_npk)) { ?>
                                    <form method="post" action="<?php echo base_url('proposal/detail/'.$detail[0]->id); ?>" enctype="multipart/form-data">
                                      <?php if(!is_null($detail[0]->kalab_rejected_judul_date)) { ?>
                                        <div class="callout callout-danger">
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Kalab Menolak Judul &amp; Kerangka Konseptual</h5>
                   Perhatikan alasan penolakan judul dari Kalab dan silahkan lakukan revisi yang dibutuhkan.
                  </div>
                                        
                                      <?php } ?>
                                      <div class="form-group ">
                                        <label for="juduledit" class="col-sm-2 col-form-label">Judul</label>
                                        <div class="col-sm-12">
                                          <input type="text" class="form-control" id="juduledit" name="juduledit" value="<?php echo $detail[0]->judul; ?>" />
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                        <label for="juduledit" class="col-sm-12 col-form-label">File Kerangka Konseptual</label>
                                        <div class="col-sm-12">
                                          <input type="file"  name="filekk" class="form-control" accept="application/pdf" id="filekk" >
                                        </div>
                                      </div>

                                      <?php if(!is_null($detail[0]->kk_filename)) { ?>
                                        <div class="form-group ">
                                        <label for="juduledit" class="col-sm-12 col-form-label">Download File Kerangka Konseptual</label>
                                        <div class="col-sm-12">
                                          <a href="<?php echo base_url('uploads/kk/'.$detail[0]->kk_filename); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span></a>
                                        </div>
                                      </div>
                                      <?php } ?>
                                      <div class="form-group ">
                                        <div class="col-sm-12 text-right">
                                          <button type="submit" class="btn btn-primary" value="Submit" name="btnsimpanjudul"  id="btnsimpanjudul">Simpan</button>
                                        </div>
                                      </div>
                                    </form>
                               <?php } 
                              } ?>
                                 
                              </div>
                            </div>
                        </div>

                        <div>

                         <?php if(!is_null($detail[0]->judul) && !is_null($detail[0]->kalab_npk_verified_judul_date)) { ?>
                          <i class="fas fa-check bg-green"></i>
                        <?php } else if(!is_null($detail[0]->kalab_rejected_judul_date) && is_null($detail[0]->kalab_npk_verified_judul_date)) { ?><i class="fas fa-times bg-red"></i><?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                        

                            <div class="timeline-item">
                            
                              <div class="timeline-body">
                                Kalab - <?php if(!is_null($detail[0]->kalab_rejected_judul_date) && is_null($detail[0]->kalab_npk_verified_judul_date)) { echo "Menolak ";  } else { echo "Memvalidasi "; } ?>  Judul

                               <?php if(!isset($is_kalab)) { ?>
                                 <?php if(!is_null($detail[0]->kalab_npk_verified_judul_date)) { ?>
                                <br/><small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail[0]->kalab_npk_verified_judul_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i>
                                <?php echo $detail[0]->l6nama; ?>
                              </small>
                              <?php } else if(!is_null($detail[0]->kalab_rejected_judul_date) && is_null($detail[0]->kalab_npk_verified_judul_date)) { ?>
                                <br/><small><i class="fas fa-times"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail[0]->kalab_rejected_judul_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i>
                                <?php echo $detail[0]->l7nama; ?>
                              </small><br/><br/>
                              <div class="callout callout-danger">
                                <small><strong>Alasan</strong></small><br/>
                                <small><?php echo $detail[0]->kalab_reason_reject_judul; ?></small>
                              </div>
                              <?php } ?>
                            <?php } ?>
                               <?php
                              if(isset($is_kalab)) {

                                
                                  if($is_kalab && !is_null($detail[0]->judul) && is_null($detail[0]->kalab_npk_verified_judul_date)) { ?>
                                    <form method="post" action="<?php echo base_url('proposal/detail/'.$detail[0]->id); ?>">
                                      <div class="form-group">
                                        <div class="col-12">
                                          <p class="text-sm"><b>Judul</b>
                                            <span class="d-block"><?php echo $detail[0]->judul; ?></span>
                                          </p>
                                        </div>
                                        <?php if(!is_null($detail[0]->kk_filename)) { ?>
                                        <div class="form-group ">
                                          <label for="juduledit" class="col-sm-12 col-form-label">Download File Kerangka Konseptual</label>
                                          <div class="col-sm-12">
                                            <a href="<?php echo base_url('uploads/kk/'.$detail[0]->kk_filename); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span></a>
                                          </div>
                                        </div>
                                        <?php } ?>

                                        <div class="form-group">
                                          <label for="ceksyaratwd" class="col-sm-4 col-form-label">Hasil Validasi</label>
                                          <div class="col-12">
                                            <div class="form-group">
                                              <div class="form-check">
                                                <input class="form-check-input" value="diterima" <?php if($detail[0]->is_rejected ==0) { echo 'checked'; } ?> type="radio" name="radiovalidasijudulkalab" id="radioditerimajudulkalab">
                                                <label class="form-check-label" for="radioditerimajudulkalab">Diterima</label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" <?php if($detail[0]->is_rejected ==1) { echo 'checked'; } ?> value="ditolak" type="radio" name="radiovalidasijudulkalab" id="radioditolakjudulkalab" >
                                                <label class="form-check-label"  for="radioditolakjudulkalab">Ditolak</label>
                                              </div>
                                              <?php if(!is_null($detail[0]->kalab_reason_reject_judul)) { ?>
                                              <small id="emailHelp" class="form-text text-muted">Catatan:<br/>Anda pernah menolak judul ini dengan alasan <strong><?php echo $detail[0]->kalab_reason_reject_judul; ?></strong></small>
                                            <?php } ?>
                                            </div>

                                            <div class="form-group" <?php if($detail[0]->is_rejected == 0) { ?>style="display: none;"<?php } ?> id="container_alasan_kalab">
                                              <label>Alasan</label>
                                              <textarea class="form-control" rows="3" name="kalab_alasan_ditolak_judul" id="kalab_alasan_ditolak_judul" placeholder="Tuliskan alasan ditolak"><?php echo $detail[0]->kalab_reason_reject_judul; ?></textarea>
                                            </div>                                        
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="form-check">
                                            <input class="form-check-input" id="cekjudul" name="cekjudul" value="valid" type="checkbox">
                                            <label class="form-check-label" for="cekjudul">Saya telah memeriksa judul proposal mahasiswa ini</label>
                                          </div>
                                        </div>
                                      </div>
                                      

                                      <div class="form-group ">
                                        <div class="col-sm-12 text-right">
                                          <button type="submit" class="btn btn-primary" value="Submit" name="btnkalabvalidasijudul" disabled id="btnkalabvalidasijudul">Validasi</button>
                                        </div>
                                      </div>
                                    </form>
                               <?php } 
                              } ?>
                              </div>
                            </div>
                        </div>  

                        <div>
                          <?php if($detail[0]->is_verified == 1) { ?>
                          <i class="fas fa-check bg-green"></i>
                        <?php } else if($detail[0]->is_rejected == 1 && !is_null($detail[0]->wd_final_rejected_date)) { ?><i class="fas fa-times bg-red"></i><?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                          <div class="timeline-item">
                            
                            <div class="timeline-body">
                              WD - Validasi Final Dosbing <?php if($detail[0]->is_rejected == 1) { echo "Ditolak";  } ?>
                              <?php if($detail[0]->is_verified == 1) { ?>
                                <br/><small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail[0]->wd_verified_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i>
                                <?php echo $detail[0]->wdnama; ?>
                              </small>
                              <?php } ?>

                              <?php if($detail[0]->is_rejected && !is_null($detail[0]->wd_final_npk_rejected) && (!isset($wd) || isset($kalab))) { ?>
                                <br/><small><i class="fas fa-times"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail[0]->wd_final_rejected_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i>
                                <?php echo $detail[0]->wdfinalnamareject; ?>
                              </small><br/><br/>
                              <div class="callout callout-danger">
                                <small><strong>Alasan</strong></small><br/>
                                <small><?php echo $detail[0]->wd_final_reason_reject; ?></small>
                              </div>

                              <?php } ?>


                              <?php  
                                if(isset($wd)) {
                                  if($wd && !is_null($detail[0]->kalab_npk_verified_judul_date)) { ?>
                                    <div class="row">
                    <div class="col-12">
                      <p class="text-sm"><b>Judul</b>
                        <span class="d-block"><?php echo $detail[0]->judul; ?></span>
                      </p>
                    </div>
                    <div class="col-12">
                      <p class="text-sm"><b>Kerangka Kerja Konseptual</b>
                        <span class="d-block"><a href="<?php echo base_url('uploads/kk/'.$detail[0]->kk_filename); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span></a></span>
                      </p>
                    </div>
                    <div class="col-12">
                      <p class="text-sm"><b>Tanggal Pengajuan</b>
                        <span class="d-block"><?php echo strftime("%d %B %Y %H:%M:%S", strtotime($detail[0]->created_date)); ?></span>
                      </p>
                    </div>
                    <div class="col-5">
                      <p class="text-sm"><b>Topik</b>
                        <span class="d-block"><?php echo $detail[0]->nama; ?></span>
                      </p>
                    </div>
                    <div class="col-5">
                      <p class="text-sm"><b>Kuota</b>
                        <span class="d-block"><?php echo $kuota.'/'.$topik[0]->kuota; ?></span>
                      </p>
                    </div>
                    
                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <!-- Box Comment -->
                                      <div class="card card-widget">
                                        <div class="card-header" style="min-height: 90px;">
                                          <?php if(!is_null($detail[0]->lecturer1_npk)) { ?>
                                            <div class="user-block">
                                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $detail[0]->lecturer1_npk; ?>_l.jpg" alt="User Image">
                                            <span class="username"><?php echo $detail[0]->dosbing1nama; ?></span>
                                            <span class="description">Dosen Pembimbing 1</span>
                                          </div>
                                                  <?php        
                                                  } else { ?> 
                                            <div class="user-block">
                                            <span class="username"><a href="#">(Belum Tersedia)</a></span>
                                            <span class="description">Dosen Pembimbing 1</span>
                                          </div>
                                                 <?php } ?>
                                        </div>
                                        
                                      </div>
                                      <!-- /.card -->
                                    </div>
                                    <div class="col-md-6">
                                      <!-- Box Comment -->
                                      <div class="card card-widget">
                                        <div class="card-header" style="min-height: 90px;">
                                          <?php if(!is_null($detail[0]->lecturer2_npk)) { ?>
                                            <div class="user-block">
                                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $detail[0]->lecturer2_npk; ?>_l.jpg" alt="User Image">
                                            <span class="username"><?php echo $detail[0]->dosbing2nama; ?></span>
                                            <span class="description">Dosen Pembimbing 2</span>
                                          </div>
                                                  <?php        
                                                  } else { ?> 
                                            <div class="user-block">
                                            <span class="username"><a href="#">(Belum Tersedia)</a></span>
                                            <span class="description">Dosen Pembimbing 2</span>
                                          </div>
                                                 <?php } ?>
                                        </div>
                                        
                                      </div>
                                      <!-- /.card -->
                                    </div>

                                    <div class="col-12">
                                    <?php if($detail[0]->is_verified == 0) { ?>
                                      <form method="post" action="<?php echo base_url('proposal/detail/'.$detail[0]->id); ?>">

                                        <div class="form-group">
                                          <label for="ceksyaratwd" class="col-sm-4 col-form-label">Hasil Validasi</label>
                                          <div class="col-12">
                                            <div class="form-group">
                                              <div class="form-check">
                                                <input class="form-check-input" value="diterima" <?php if($detail[0]->is_rejected ==0) { echo 'checked'; } ?> type="radio" name="radiovalidasifinalwd" id="radioditerima">
                                                <label class="form-check-label" for="radioditerima">Diterima</label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" <?php if($detail[0]->is_rejected ==1) { echo 'checked'; } ?> value="ditolak" type="radio" name="radiovalidasifinalwd" id="radioditolak" >
                                                <label class="form-check-label"  for="radioditolak">Ditolak</label>
                                              </div>
                                            </div>

                                            <div class="form-group" <?php if($detail[0]->is_rejected == 0) { ?>style="display: none;"<?php } ?> id="container_alasan">
                                              <label>Alasan</label>
                                              <textarea class="form-control" rows="3" name="final_alasan_ditolak" id="final_alasan_ditolak" placeholder="Tuliskan alasan ditolak"><?php echo $detail[0]->wd_final_reason_reject; ?></textarea>
                                            </div>                                        
                                          </div>
                                        </div>
                                        

                                        <div class="form-group ">
                                          <div class="col-sm-12 text-right">
                                            <button type="submit" class="btn btn-primary" value="Submit" name="btnwdfinalsubmit" id="btnwdfinalsubmit">Submit</button>
                                          </div>
                                        </div>
                                      </form>
                                    <?php } ?>
                                    </div>
                                </div>
                                  <?php }
                                } ?>
                             
                            </div>
                          </div>
                          
                        </div>

                       

                        
                        <div>
                        <?php if($detail[0]->is_st_created == 1) { ?>
                          <i class="fas fa-check bg-green"></i>
                        <?php }  else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>

                            <div class="timeline-item">
                            
                              <div class="timeline-body">
                                Admin - Membuat Surat Tugas
                                 <?php if($detail[0]->is_st_created == 1) { ?>
                                <br/><small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail[0]->st_created_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i>
                                <?php echo $detail[0]->adminstnama; ?>
                              </small>
                              <?php } ?>
                              </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- END timeline item -->
              
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>

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
  