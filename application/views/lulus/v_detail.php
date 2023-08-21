<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Pendaftaran Kelulusan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Detail Pendaftaran Kelulusan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" action="<?php echo base_url('lulus/detail/'.$id); ?>" enctype="multipart/form-data">
        <div class="row">
          
             <div class="col-12">
              
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-10">
                    <h3 class="card-title">Detail Pendaftaran Kelulusan</h3>
                  </div>
                  
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body ">
                <div class="row">
                  <div class="col-4">
                    <p class="text-sm"><strong>NRP</strong>
                      <input type="text" readonly class="form-control" disabled value="<?php echo $detail[0]->nrp; ?>" />
                    </p>
                  </div>
                  <div class="col-8">
                    <p class="text-sm"><strong>Nama</strong>
                      <input type="text" readonly class="form-control" disabled value="<?php echo $detail[0]->nama; ?>" />
                    </p>
                  </div>
                  <div class="col-10">
                      <p class="text-sm"><strong>Judul</strong>
                        <input type="text" name="txtjudul" class="form-control" value="<?php echo strtoupper($detail[0]->judul); ?>" />
                      </p>
                    </div>
                    <div class="col-2">
                      <input type="hidden" name="hid_lulus_id" value="<?php echo $detail[0]->id; ?>">
                      <p class="text-sm"> <br/>
                      <?php if($is_student && $detail[0]->dosbing_validate_date == null) { ?>
                      <button type="submit" value="submit" name="btnsimpanjudul" id="btnsimpanjudul" onclick="return confirm('Yakin simpan judul?');"  class="btn btn-primary">Simpan Judul</button>
                      <?php } ?>
                      </p>
                    </div>
                  
                  <div class="col-3">
                    <p class="text-sm"><strong>Nilai Ujian</strong>
                      <input type="text" readonly class="form-control" disabled value="<?php if($dataskripsi) { echo $dataskripsi->nisbi; } else { echo 'Belum ada di transkrip'; } ?>" />
                    </p>
                  </div>

                  <div class="col-3">
                    <p class="text-sm"><strong>Jumlah SKS Nilai D</strong>
                      <input type="text" readonly class="form-control" disabled value="<?php echo $skskum; ?>" />
                      <small id="" class="form-text text-muted">Maksimal 30 sks, tanpa nilai E*</small>
                    </p>
                  </div>
                  <div class="col-3">
                    <p class="text-sm"><strong>IPK Kum</strong>
                      <input type="text" readonly class="form-control" disabled value="<?php echo number_format($ipkkum,2,'.','.'); ?>" />
                    </p>
                  </div>
                  <div class="col-3">
                    <p class="text-sm"><strong>Transkrip</strong>
                      <a  href="<?php echo base_url('transkrip/student/'.$detail[0]->nrp); ?>" class="btn btn-outline-primary form-control">Lihat Transkrip</a>
                    </p>
                  </div>

                  <div class="row">
                    <div class="col-12"><h5>Dosen Pembimbing</h5></div>
                    
                    <div class="col-md-6">
                      <!-- Box Comment -->
                      <div class="card card-widget">
                        <div class="card-header">
                          <?php if(!is_null($stopik[0]->lecturer1_npk)) { ?>
                            <div class="user-block">
                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $stopik[0]->lecturer1_npk; ?>_l.jpg" alt="User Image">
                            <span class="username"><?php echo $stopik[0]->dosbing1nama; ?></span>
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
                          <?php if(!is_null($stopik[0]->lecturer2_npk)) { ?>
                            <div class="user-block">
                            <img class="img-circle" src="https://my.ubaya.ac.id/img/krywn/<?php echo $stopik[0]->lecturer2_npk; ?>_l.jpg" alt="User Image">
                            <span class="username"><?php echo $stopik[0]->dosbing2nama; ?></span>
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

                  <div class="col-12">
                     <p class="text-sm"><strong>Nilai Mata Kuliah</strong></p>
                     <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                      <thead>
                        <tr>
                          <th>Kode Mata Kuliah</th>
                          <th>Nama Mata Kuliah</th>
                          <th>Nilai</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php echo $table_prasyarat; ?>
                      </tbody>
                     </table>
                  </div>
                  <div class="col-12">
                    <p class="text-sm"><strong>Download</strong></p>
                  </div>
                  <?php if(!empty($detail[0]->filekartuwali)) { ?>
                    <div class="col-2"><a href="<?php echo base_url('uploads/lulus/'.$detail[0]->filekartuwali); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span>Kartu Perwalian</a></div>
                  <?php } ?>

                  <?php if(!empty($detail[0]->filebebaspakai)) { ?>
                    <div class="col-2">
                      <a href="<?php echo base_url('uploads/lulus/'.$detail[0]->filebebaspakai); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span>Bukti Bebas Pakai</a>
                    </div>
                  <?php } ?>
                  <?php if(!empty($detail[0]->filenaskahfinal)) { ?>               
                    <div class="col-2">
                      <a href="<?php echo base_url('uploads/lulus/'.$detail[0]->filenaskahfinal); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span>Naskah Final</a>
                    </div>
                  <?php } ?>
                  <?php if(!empty($detail[0]->filetoefl)) { ?>
                    <div class="col-2">
                      <a href="<?php echo base_url('uploads/lulus/'.$detail[0]->filetoefl); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span>Sertif TOEFL</a>
                    </div>
                  <?php } ?>
                    <?php if(!is_null($detail[0]->sk_filename)) { ?>
                    <div class="col-2">
                      <a href="<?php echo base_url('uploads/lulus/'.$detail[0]->sk_filename); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span>SK Lulus</a>
                    </div>
                    <?php } ?>        
                </div>  
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-12">
                  <div class=" card card-outline card-primary">
                    <div class="card-header">
                      <div class="card-title">Proses Pengajuan Pendaftaran Kelulusan</div>
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
                                    Mahasiswa Daftar Kelulusan<br/>
                                    <small><i class="fas fa-clock"></i>
                                      <?php echo strftime("%d %B %Y", strtotime($detail[0]->submit_date)); ?>
                                    </small>

                                    <?php if($is_student) { ?>
                                    <hr/>
                                    <span class="btn btn-outline-primary" id="btnuploadulang">Upload Ulang</span>

                  <div style="margin-top:20px; display:none;" id="divuploadulang">
                    <form enctype="multipart/form-data" method="post" action="<?php echo base_url('lulus/detail/'.$id); ?>">
                  <div class="col-12 " >
                    <p class="text-sm"><strong>Upload Kartu Perwalian</strong>
                       <input type="file"  name="filekartuwali" class="form-control" accept="application/pdf" id="filekartuwali" >
                    </p>
                  </div>
                  <div class="col-12 ">
                    <p class="text-sm"><strong>Upload Bukti Bebas Pemakaian Alat dan Bahan Lab</strong>
                       <input type="file"  name="filebebaspakai" class="form-control" accept="application/pdf" id="filebebaspakai" >
                    </p>
                  </div>
                
                  <div class="col-12 ">
                    <p class="text-sm"><strong>Upload Naskah Final</strong>
                       <input type="file"  name="filenaskahfinal" class="form-control" accept="application/pdf" id="filenaskahfinal" >
                       <small id="" class="form-text text-muted">Naskah lengkap dan final yang sudah selesai revisi</small>
                    </p>
                  </div>

                  <div class="col-12 ">
                    <p class="text-sm"><strong>Upload Sertifikasi TOEFL</strong>
                       <input type="file"  name="filetoefl" class="form-control" accept="application/pdf" id="filetoefl" >
                    </p>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary" name="btnsubmitulang" id="btnsubmitulang" value="submit">Submit</button>
                  </div>
                </form>
                </div>
              <?php } ?>
                                  </div>
                                </div>
                              </div> <!-- end timeline item --> 
                              <div>
                               <?php if(!is_null($detail[0]->dosbing_validate_date)) { ?>
                              <i class="fas fa-check bg-green"></i>
                            <?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                              <div class="timeline-item">
                                
                                <div class="timeline-body">
                                  Dosbing - Validasi<br/>
                                  <?php if($is_dosbing && $detail[0]->dosbing_validate_date == null) { ?>
                    <button type="submit" value="submit" name="btnvalidasidosbing" id="btnvalidasidosbing" onclick="return confirm('Yakin memvalidasi pengajuan pendaftaran kelulusan mahasiswa ini?');"  class="btn btn-primary">Validasi Dosbing</button>
                  <?php } ?>
                                  <?php if(!is_null($detail[0]->dosbing_validate_date)) { ?>
                                      <small><i class="fas fa-clock"></i>
                                    <?php echo strftime("%d %B %Y", strtotime($detail[0]->dosbing_validate_date)); ?>
                                  </small><br/>
                                  <small><i class="fas fa-user"></i>  <?php echo $detail[0]->dosbing; ?>
                                  </small>
                                  <?php } ?>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <div>
                               <?php if(!is_null($detail[0]->admin_validate_date)) { ?>
                              <i class="fas fa-check bg-green"></i>
                            <?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                              <div class="timeline-item">
                                
                                <div class="timeline-body">
                                  Admin - Validasi<br/>
<?php if($is_admin && $detail[0]->dosbing_validate_date != null && $detail[0]->admin_validate_date == null) { ?>
            <button type="submit" value="submit" onclick="return confirm('Yakin memvalidasi pengajuan pendaftaran kelulusan mahasiswa ini?');"  name="btnvalidasiadmin" id="btnvalidasiadmin"  class="btn btn-primary">Validasi Admin</button>
                  <?php } ?>

                                  <?php if(!is_null($detail[0]->admin_validate_date)) { ?>
                                      <small><i class="fas fa-clock"></i>
                                    <?php echo strftime("%d %B %Y", strtotime($detail[0]->admin_validate_date)); ?>
                                  </small><br/>
                                  <small><i class="fas fa-user"></i> Admin
                                  </small>
                                  <?php } ?>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                             <div>
                               <?php if(!is_null($detail[0]->wd_validate_date)) { ?>
                              <i class="fas fa-check bg-green"></i>
                            <?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                              <div class="timeline-item">
                                
                                <div class="timeline-body">
                                  WD - Validasi<br/>
                                  <?php if($is_wd && $detail[0]->admin_validate_date != null && $detail[0]->wd_validate_date == null) { ?>
            <button type="submit" value="submit" onclick="return confirm('Yakin memvalidasi pengajuan pendaftaran kelulusan mahasiswa ini?');"  name="btnvalidasiwd" id="btnvalidasiwd"  class="btn btn-primary">Validasi Wakil Dekan</button>
                  <?php } ?>
                                  <?php if(!is_null($detail[0]->wd_validate_date)) { ?>
                                      <small><i class="fas fa-clock"></i>
                                    <?php echo strftime("%d %B %Y", strtotime($detail[0]->wd_validate_date)); ?>
                                  </small><br/>
                                  <small><i class="fas fa-user"></i> <?php echo  $detail[0]->wd; ?>
                                  </small>
                                  <?php } ?>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <div>
                               <?php if(!is_null($detail[0]->sk_created_date)) { ?>
                              <i class="fas fa-check bg-green"></i>
                            <?php } else { ?><i class="fas fa-clock bg-gray"></i><?php } ?>
                              <div class="timeline-item">
                                
                                <div class="timeline-body">
                                  Admin - Pengurusan Penerbitan SK Kelulusan<br/>
                                  <?php if($is_admin_st && $detail[0]->wd_validate_date != null && $detail[0]->sk_filename == null) { ?>
                        <div class="form-group ">
                          <label for="filesklulus" class="col-sm-12 col-form-label">File SK Lulus</label>
                          <div class="col-sm-12">
                            <input type="file"  name="filesklulus" class="form-control" accept="application/pdf" id="filesklulus" >
                          </div>
                        </div>
            <button type="submit" value="submit" disabled name="btnuploadsklulus" id="btnuploadsklulus"  class="btn btn-primary">Upload SK Lulus</button>
                  <?php } ?>
                                  <?php if(!is_null($detail[0]->sk_created_date)) { ?>
                                      <small><i class="fas fa-clock"></i>
                                    <?php echo strftime("%d %B %Y", strtotime($detail[0]->sk_created_date)); ?>
                                  </small><br/>
                                  <small><i class="fas fa-user"></i>  Admin
                                  </small>
                                  <?php } ?>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            </div> <!-- end timeline -->
                          </div>
                        </div>
                      </div>
                    </div> <!-- end card body -->
                  </div> <!-- end card -->
                </div>

          
        </div>
      </div><!-- /.container-fluid -->


          </form>
    </section>
    <!-- /.content -->
  </div> 

  