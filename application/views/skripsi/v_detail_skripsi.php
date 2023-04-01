<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Sidang Skripsi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('skripsi'); ?>">Sidang Skripsi</a></li>
              <li class="breadcrumb-item active">Detail Sidang Skripsi</li>
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
            <?php // print_r($detail); ?>
            <div class=" card card-outline card-primary">
              <div class="card-header">
                <div class="card-title">Data Sidang Skripsi</div>
                <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="text-muted">
                  <div class="row">
                    <div class="col-md-12">
                      <p class="text-sm">Judul
                        <b class="d-block"><?php echo $detail->judul; ?></b>
                      </p>
                    </div>
                    <div class="col-md-3">
                      <p class="text-sm">Tanggal Pendaftaran
                        <b class="d-block"><?php echo strftime("%d %B %Y %H:%M:%S", strtotime($detail->registered_date)); ?></b>
                      </p>
                    </div>

                    <?php if($detail->naskah_filename != null) { ?>
                    <div class="col-md-3 col-sm-12">
                      <p class="text-sm">Download Naskah
                        <b class="d-block"><a href="<?php echo base_url('uploads/naskah/'.$detail->naskah_filename); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span></a></b>
                      </p>
                    </div>
                  <?php } ?>
                    <?php if($detail->naskah_drive != null) { ?>
                    <div class="col-md-3 col-sm-12">
                      <p class="text-sm">Link Drive
                        <b class="d-block"><a href="<?php echo $detail->naskah_drive; ?>" target="_blank" class="color-green btn btn-outline-warning btn-flat btn-sm"><span class="fa fa-link"></span></a></b>
                      </p>
                    </div>
                  <?php } ?>
                  <?php if($detail->kartu_bimbingan_filename != null) { ?>
                    <div class="col-md-3 col-sm-12">
                      <p class="text-sm">Download Kartu Bimbingan
                        <b class="d-block"><a href="<?php echo base_url('uploads/kartubimbingan/'.$detail->kartu_bimbingan_filename); ?>" target="_blank" class="color-red btn btn-outline-primary btn-flat btn-sm"><span class="fa fa-file-pdf"></span></a></b>
                      </p>
                    </div>
                  <?php } ?>

                    
                  </div>
                  <hr/>
                  <div class="row">
                    <div class="col-12"><h5>Jadwal Sidang</h5></div>
                    <div class="col-md-12">
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td><i class="fas fa-calendar"></i> Tanggal Sidang</td>
                          <td><i class="fas fa-clock"></i> Jam Sidang</td>
                          <td><i class="fas fa-door-open"></i> Ruang Sidang</td>
                        </tr>
                        <tr>
                          <td><strong> <?php if($detail->sidang_date != null) {  echo strftime("%d %B %Y", strtotime($detail->sidang_date)); } else { echo 'Belum ditentukan'; } ?></strong></td>
                          <td><strong><?php if($detail->sidang_date != null) { echo $detail->label; } else { echo 'Belum ditentukan'; } ?></strong></td>
                          <td><strong><?php if($detail->ruang_id != null) {  echo $detail->roomlabel; } else { echo 'Belum ditentukan';  } ?></strong></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12"><h5>Dosen Pembimbing</h5></div>
                    <div class="col-md-6">
                      <!-- Box Comment -->
                      <div class="card card-widget">
                        <div class="card-header">
                          <?php if(!is_null($detail->lecturer1_npk)) { ?>
                            <div class="user-block">
                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $detail->lecturer1_npk; ?>_l.jpg" alt="User Image">
                            <span class="username"><?php echo $detail->dosbing1; ?></span>
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
                          <?php if(!is_null($detail->lecturer2_npk)) { ?>
                            <div class="user-block">
                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $detail->lecturer2_npk; ?>_l.jpg" alt="User Image">
                            <span class="username"><?php echo $detail->dosbing2; ?></span>
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

                  <?php if($detail->kalab_npk_verified != null ) { ?>
<div class="row">
                    <div class="col-12"><h5>Dosen Penguji</h5></div>
                    <div class="col-md-6">
                      <!-- Box Comment -->
                      <div class="card card-widget">
                        <div class="card-header">
                          <?php if(!is_null($detail->penguji1)) { ?>
                            <div class="user-block">
                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $detail->penguji1; ?>_l.jpg" alt="User Image">
                            <span class="username"><?php echo $detail->namapenguji1; ?></span>
                            <span class="description">Ketua</span>
                          </div>
                                  <?php        
                                  } else { ?> 
                            <div class="user-block">
                            <span class="username"><a href="#">(Belum Tersedia)</a></span>
                            <span class="description">Ketua</span>
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
                          <?php if(!is_null($detail->penguji2)) { ?>
                            <div class="user-block">
                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $detail->penguji2; ?>_l.jpg" alt="User Image">
                            <span class="username"><?php echo $detail->namapenguji2; ?></span>
                            <span class="description">Sekretaris</span>
                          </div>
                                  <?php        
                                  } else { ?> 
                            <div class="user-block">
                            <span class="username"><a href="#">(Belum Tersedia)</a></span>
                            <span class="description">Sekretaris</span>
                          </div>
                                 <?php } ?>
                        </div>
                        
                      </div>
                      <!-- /.card -->
                    </div>

                  </div>
                  <?php } ?>
                </div>
              </div>

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
                        <b class="d-block"><?php echo $detail->nama; ?></b>
                      </p>
                    </div>
                    <div class="col-4">
                      <p class="text-sm">NRP
                        <b class="d-block"><?php echo $detail->nrp; ?></b>
                      </p>

                    </div>

                    <div class="col-4">
                      <p class="text-sm">SKS Kum

                        <b class="d-block"><?php echo $skskum; ?></b>
                      </p>
                    </div>


                    <div class="col-4">
                      <p class="text-sm">IPK Kum
                        <b class="d-block"><?php echo number_format((float)$ipkkum,2,'.',''); ?></b>
                      </p>
                    </div>

                    <div class="col-4">
                      <p class="text-sm">SKS Kum
                        <b class="d-block"><?php echo $sks_in_ks; ?></b>
                      </p>
                    </div>
                    <div class="col-12 text-right">
                      <a href="<?php echo base_url('transkrip/student/'.$detail->nrp); ?>" class="btn btn-outline-primary">Lihat Transkrip</a>
                    </div>
                  </div>
               
                </div>
              </div>

            </div>
          </div>
          
          <div class="col-12">
            <div class=" card card-outline card-primary">
              <div class="card-header">
                <div class="card-title">Proses Sidang Skripsi</div>
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
                              Mahasiswa Daftar Sidang Skripsi<br/>
                              <small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail->registered_date)); ?>
                              </small>
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->




                          
                         <!-- timeline item -->
                        <div>
                          <?php if(!is_null($detail->kalab_npk_verified)) { ?>
                          <i class="fas fa-check bg-green"></i>
                        <?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                          <div class="timeline-item">

                            <div class="timeline-body">
                              Kalab - Validasi
                              <?php if(!is_null($detail->kalab_npk_verified)) { ?>
                                <br/><small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail->kalab_verified_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i>
                                <?php echo $detail->kalabnama; ?>
                              </small>
                              
                              <?php if(isset($kalab)) { ?>
                              <div class="row" style="margin-top: 20px;">
                                <div class="col-4">
                                  <p class="text-sm">Jadwal Sidang
                                    <b class="d-block"><?php echo strftime('%d %B %Y', strtotime($detail->sidang_date)); ?></b>
                                  </p>
                                </div>
                                <div class="col-4">
                                  <p class="text-sm">Jam Sidang
                                    <b class="d-block"><?php echo $detail->label; ?></b>
                                  </p>
                                </div>
                                <?php if($detail->ruang_id != null) {?>
                                <div class="col-4">
                                  <p class="text-sm">Ruang Sidang
                                    <b class="d-block"><?php echo $detail->roomlabel; ?></b>
                                  </p>
                                </div>
                              <?php } ?>

                                <div class="col-6">
                                  <p class="text-sm">Pembimbing 1
                                    <b class="d-block"><?php echo $detail->dosbing1; ?></b>
                                  </p>
                                </div>

                                <div class="col-6">
                                  <p class="text-sm">Pembimbing 2
                                    <b class="d-block"><?php echo $detail->dosbing2; ?></b>
                                  </p>
                                </div>

                                <div class="col-6">
                                  <p class="text-sm">Ketua
                                    <b class="d-block"><?php echo $detail->namapenguji1; ?></b>
                                  </p>
                                </div>

                                <div class="col-6">
                                  <p class="text-sm">Sekretaris
                                    <b class="d-block"><?php echo $detail->namapenguji2; ?></b>
                                  </p>
                                </div>

                                <?php if(is_null($detail->naskah_filename)) { ?>
                                <form method="post" action="<?php echo base_url('skripsi/detail/'.$detail->id); ?>" >
                                  <div class="col-12 text-right">
                                      <div class="form-group ">
                                          <button type="submit" onclick="return confirm('Yakin batalkan plot ini?');" class="btn btn-outline-danger" id="btnbatalplot" name="btnbatalplot" value="batal">Batalkan Plot</button>
                                      </div>
                                    </div>
                                </form>
                              <?php } ?>
                              </div>
                            <?php } ?>

                              <?php } ?>
                              <?php
                              if(isset($kalab)) {
                                  if($kalab && is_null($detail->kalab_npk_verified)) { ?>
                                    <form method="post" action="<?php echo base_url('skripsi/detail/'.$detail->id); ?>">
                                      <div class="row">
                                        <div class="col-12">
                                            <h4>Periode Sidang <?php if(isset($periode_aktif)) { 
                                        echo '('.strftime("%d %B", strtotime($periode_aktif->date_start));
                                        echo '-'.strftime("%d %B %Y", strtotime($periode_aktif->date_end)).')'; 
                                            } ?></h4>
                                             
                                          <?php if(!isset($periode_aktif)) { ?>
                                              <p>Saat ini belum ada periode sidang yang aktif</p>
                                            <?php } ?>
                                          </div>
                                          
                                      </div>
                                      <?php if(isset($periode_aktif)) { ?>

                                        <?php 
                                                $curdate = strtotime($periode_aktif->date_start);
                                                $dayidx = 1; 
                                                while($curdate <= strtotime($periode_aktif->date_end)) {
                                                 
                                                  $curdate = strtotime($periode_aktif->date_start.' +'.$dayidx.' day');
                                                  $dayidx++;
                                                }
                                              ?>        
                                        
                                        <div class="row">
                                          <div class="col-12">
                                             <div class="form-group">
                                                 <label>Dosen Pembimbing 1</label>
                                                 <input type="text" class="form-control " readonly value="<?php echo $detail->dosbing1; ?> / <?php echo $detail->lecturer1_npk; ?>" />
                                            </div>
                                          </div>
                                          <div class="col-12">
                                             <div class="form-group">
                                                 <label>Dosen Pembimbing 2</label>

                                                 <input type="text" class="form-control" readonly value="<?php if(empty($detail->lecturer2_npk)) { echo '-'; } else { echo $detail->dosbing2.' / '.$detail->lecturer2_npk; } ?>" />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-12">
                                            <div class="form-group">
                                              <label for="penguji1" class="col-sm-4 col-form-label">Ketua</label>
                                                <select class="form-control select2bs4" name="penguji1" id="penguji1" style="width: 100%;">
                                                  <option selected="selected" value="0">[Pilih Ketua]</option>
                                                  <?php foreach($dosbing as $value) { ?>
                                                    <?php if($value->npk != $detail->lecturer1_npk && $value->npk != $detail->lecturer2_npk ) { ?> 
                                                  <option value="<?php echo $value->npk; ?>" ><?php echo $value->nama; ?></option>
                                                  <?php } } ?>
                                                </select>
                                            </div>
                                          </div>

                                          <div class="col-12">
                                            <div class="form-group">
                                              <label for="penguji2" class="col-sm-4 col-form-label">Sekretaris</label>
                                                <select class="form-control select2bs4" name="penguji2" id="penguji2" style="width: 100%;">
                                                  <option selected="selected" value="0">[Pilih Sekretaris]</option>
                                                  <?php foreach($dosbing as $value) { ?>
                                                    <?php if($value->npk != $detail->lecturer1_npk && $value->npk != $detail->lecturer2_npk ) { ?><option value="<?php echo $value->npk; ?>" ><?php echo $value->nama; ?></option>
                                                  <?php } }  ?>
                                                </select>
                                            </div>
                                          </div>
                                          <div class="col-12 text-right">
                                            <div class="form-group ">
                                                <a  class="btn btn-primary" id="btnkalabsubmit">Plot Tanggal &amp; Jam</a>
                                              
                                            </div>
                                          </div>
                                        </div>
                                    <?php } ?>
                                      
                                    </form>
                               <?php } 
                              } ?>
                             
                            </div>
                          </div>


                        </div>
                        <!-- END timeline item -->


                         <!-- timeline item -->
                        <div>
                           <?php if(!is_null($detail->ruang_id)) { ?>
                          <i class="fas fa-check bg-green"></i>
                        <?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                          <div class="timeline-item">
                            
                            <div class="timeline-body">
                              Admin - Plot Ruangan<br/>
                              <?php if(!is_null($detail->admin_plotting_date)) { ?>
                                  <small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail->admin_plotting_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i> Admin
                              </small>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->

                        

                        
                          <?php if($detail->revision_required == true) { ?>
                        <!-- timeline item -->
                        <div>
                           <?php if(!is_null($detail->revision_judul_date)) { ?>
                          <i class="fas fa-check bg-green"></i>
                        <?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                          <div class="timeline-item">
                            
                            <div class="timeline-body">
                              Mahasiswa - Revisi Naskah<br/>
                              <?php if(!is_null($detail->revision_judul_date)) { ?>
                                  <small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail->revision_judul_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i> <?php echo $detail->nama; ?>
                              </small>
                              <?php } ?>

                               <?php if(isset($is_student) && is_null($detail->revision_judul_date)) { ?>
                               <form method="post" action="<?php echo base_url('skripsi/detail/'.$detail->id); ?>" enctype="multipart/form-data">
                                  <div class="form-group ">
                                    <label for="juduledit" class="col-sm-12 col-form-label">Judul</label>
                                    <div class="col-sm-12">
                                      <input type="text"  name="revisijudul" class="form-control" value="<?php echo $detail->judul; ?>"/>
                                    </div>
                                  </div>

                                  <div class="form-group ">
                                    <label for="file_naskah_revisi" class="col-sm-12 col-form-label">File Revisi Naskah Sempro</label>
                                    <div class="col-sm-12">
                                      <input type="file"  name="file_naskah_revisi" class="form-control" accept="application/pdf" id="file_naskah_revisi" >
                                    </div>
                                  </div>

                                  <div class="col-12">
                                      <div class="form-check">
                                        <input class="form-check-input" id="cekrevisinaskah" name="cekrevisinaskah" value="valid" type="checkbox">
                                        <label class="form-check-label" for="cekrevisinaskah">Saya telah merevisi naskah sesuai hasil sidang sempro</label>
                                      </div>
                                    </div>

                                   <div class="form-group " style="margin-top: 20px;">
                                    <div class="col-sm-12 text-right">
                                      <button type="submit" class="btn btn-primary" value="Submit" name="btnmhssimpanjudul" id="btnmhssimpanjudul" disabled>Submit Revisi</button>
                                    </div>
                                  </div>
                                </form>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                      <?php } ?>
                        <!-- timeline item -->
                        <?php if($detail->revision_required == true) { ?>
                        <div>
                           <?php if(!is_null($detail->dosbing_validate_date)) { ?>
                          <i class="fas fa-check bg-green"></i>
                        <?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                          <div class="timeline-item">
                            
                            <div class="timeline-body">
                              Dosbing - Validasi Revisi Naskah<br/>
                              <?php if(!is_null($detail->dosbing_validate_date)) { ?>
                                  <small><i class="fas fa-clock"></i>
                                <?php echo strftime("%d %B %Y", strtotime($detail->dosbing_validate_date)); ?>
                              </small><br/>
                              <small><i class="fas fa-user"></i> <?php echo $detail->namadosbingvalidaterevisi; ?>
                              </small>
                              <?php } ?>

                              <?php 

                              if(isset($is_lecturer)) {
                                if(is_null($detail->dosbing_validate_date) AND !is_null($detail->revision_judul_date) AND ($info[0]->npk == $detail->pembimbing1 || $info[0]->npk == $detail->pembimbing2 )) { ?>
                              
                              <form method="post" action="<?php echo base_url('skripsi/detail/'.$detail->id); ?>" >
                                <div class="col-12">
                                  <div class="form-check">
                                    <input class="form-check-input" id="cekjudul" name="cekjudul" value="valid" type="checkbox">
                                    <label class="form-check-label" for="cekjudul">Saya telah memeriksa hasil revisi naskah mahasiswa ini</label>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <div class="col-sm-12 text-right">
                                    <button type="submit" class="btn btn-primary" value="Submit" name="btndosbingvalidasirevisijudul" disabled id="btndosbingvalidasirevisijudul">Validasi</button>
                                  </div>
                                </div>
                              </form>
                            <?php } } ?>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                        <!-- END timeline item -->

                        </div>
                        <!-- END timeline item -->

                        
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