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
        <div class="row">
          
             <div class="col-12">
              <form method="post" action="<?php echo base_url('lulus/detail/'.$id); ?>" enctype="multipart/form-data">
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
                  <div class="col-12">
                    <p class="text-sm"><strong>Judul</strong>
                      <input type="text" readonly class="form-control" disabled value="<?php echo strtoupper($detail[0]->judul); ?>" />
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
                    <div class="col-3"><a href="<?php echo base_url('uploads/lulus/'.$detail[0]->filekartuwali); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span> Download Kartu Perwalian</a></div>
                    <div class="col-3">
                      <a href="<?php echo base_url('uploads/lulus/'.$detail[0]->filebebaspakai); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span> Download Bukti Bebas Pakai</a>
                    </div>
                    <div class="col-3">
                      <a href="<?php echo base_url('uploads/lulus/'.$detail[0]->filenaskahfinal); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span> Download Naskah Final</a>
                    </div>

                    <div class="col-6" style="margin-top:30px;">
                    <p class="text-sm"><strong>Validasi Dosbing</strong>
                       <?php if($detail[0]->dosbing_validate_date == null) { echo '<br/>Belum Validasi'; } ?>
                       <?php if($detail[0]->dosbing_validate_date != null) { ?> 
                        <br/>
                      <small><i class="fas fa-clock"></i>
                        <?php echo strftime("%d %B %Y", strtotime($detail[0]->dosbing_validate_date)); ?>
                      </small><br/>
                      <small><i class="fas fa-user"></i>
                        <?php echo $detail[0]->dosbing; ?>
                      </small>
                    <?php } ?>
                    </p>
                   
                  </div>

                  <div class="col-6" style="margin-top:30px;">
                    <p class="text-sm"><strong>Validasi Wakil Dekan</strong>
                       <?php if($detail[0]->wd_validate_date == null) { echo '<br/>Belum Validasi'; } ?>
                       <?php if($detail[0]->wd_validate_date != null) { ?>
                     <br/>
                      <small><i class="fas fa-clock"></i>
                        <?php echo strftime("%d %B %Y", strtotime($detail[0]->wd_validate_date)); ?>
                      </small><br/>
                      <small><i class="fas fa-user"></i>
                        <?php echo $detail[0]->wd; ?>
                      </small>
                    <?php } ?>
                    </p>
                   
                  </div>
                  <div class="col-12">
                    <p class="text-sm"><strong>SK Lulus</strong>
                      <?php if($detail[0]->sk_filename == null) { ?>
                        <br/>Belum Tersedia 
                        <?php if($is_admin) { ?>
                        <div class="form-group ">
                          <label for="filesklulus" class="col-sm-12 col-form-label">File SK Lulus</label>
                          <div class="col-sm-12">
                            <input type="file"  name="filesklulus" class="form-control" accept="application/pdf" id="filesklulus" >
                          </div>
                        </div>
                      <?php } ?>
                      <?php } else {  ?>
                        <br/>
                      <small><i class="fas fa-clock"></i>
                        <?php echo strftime("%d %B %Y", strtotime($detail[0]->sk_created_date)); ?>
                      </small><br/>
                      <small><i class="fas fa-user"></i> Admin
                      </small>
                      <hr/>
                       <a href="<?php echo base_url('uploads/lulus/'.$detail[0]->sk_filename); ?>" target="_blank" class="color-red btn btn-outline-danger btn-flat btn-sm"><span class="fa fa-file-pdf"></span> Download SK Lulus</a>
                      <?php } ?>
                    </p>
                  </div>              
                  
                </div>  

              </div>
              <div class="card-footer">
                <div class="col-12">
                    <input type="hidden" name="hid_lulus_id" value="<?php echo $detail[0]->id; ?>">
                    
                    <?php if($is_dosbing && $detail[0]->dosbing_validate_date == null) { ?>
                    <button type="submit" value="submit" name="btnvalidasidosbing" id="btnvalidasidosbing" onclick="return confirm('Yakin memvalidasi pengajuan pendaftaran kelulusan mahasiswa ini?');"  class="btn btn-primary">Validasi Dosbing</button>
                  <?php } ?>
                  <?php if($is_wd && $detail[0]->dosbing_validate_date != null && $detail[0]->wd_validate_date == null) { ?>
            <button type="submit" value="submit" onclick="return confirm('Yakin memvalidasi pengajuan pendaftaran kelulusan mahasiswa ini?');"  name="btnvalidasiwd" id="btnvalidasiwd"  class="btn btn-primary">Validasi Wakil Dekan</button>
                  <?php } ?>

                  <?php if($is_admin && $detail[0]->wd_validate_date != null && $detail[0]->sk_filename == null) { ?>
            <button type="submit" value="submit" disabled name="btnuploadsklulus" id="btnuploadsklulus"  class="btn btn-primary">Upload SK Lulus</button>
                  <?php } ?>
                  </div>
                </div> 
              <!-- /.card-body -->
            </div>
          </form>
          </div>

          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div> 

  