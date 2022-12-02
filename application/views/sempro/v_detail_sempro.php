<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Sidang Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('sempro'); ?>">Sidang Proposal</a></li>
              <li class="breadcrumb-item active">Detail Sidang Proposal</li>
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
                <div class="card-title">Data Sidang Proposal</div>
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
                        <b class="d-block"><?php echo $detail->judul; ?></b>
                      </p>
                    </div>
                    <div class="col-12">
                      <p class="text-sm">Tanggal Pendaftaran
                        <b class="d-block"><?php echo strftime("%d %B %Y %H:%M:%S", strtotime($detail->registered_date)); ?></b>
                      </p>
                    </div>

                    <?php if($detail->sidang_date != null) { ?>
                    <div class="col-6">
                      <p class="text-sm">Tanggal Sidang
                        <b class="d-block"><?php echo strftime("%d %B %Y", strtotime($detail->sidang_date)); ?></b>
                      </p>
                    </div>
                    <div class="col-6">
                      <p class="text-sm">Jam Sidang
                        <b class="d-block"><?php echo $detail->label; ?></b>
                      </p>
                    </div>
                  <?php } ?>
                    
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
                            <span class="description">Dosen Penguji 1</span>
                          </div>
                                  <?php        
                                  } else { ?> 
                            <div class="user-block">
                            <span class="username"><a href="#">(Belum Tersedia)</a></span>
                            <span class="description">Dosen Penguji 1</span>
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
                            <span class="description">Dosen Penguji 2</span>
                          </div>
                                  <?php        
                                  } else { ?> 
                            <div class="user-block">
                            <span class="username"><a href="#">(Belum Tersedia)</a></span>
                            <span class="description">Dosen Penguji 2</span>
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
                        <b class="d-block"><?php echo $detail->sks_kum; ?></b>
                      </p>
                    </div>


                    <div class="col-4">
                      <p class="text-sm">IPK Kum
                        <b class="d-block"><?php echo $detail->ipk_kum; ?></b>
                      </p>
                    </div>

                    <div class="col-4">
                      <p class="text-sm">SKS Kum
                        <b class="d-block"><?php echo $detail->sks_ks; ?></b>
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
                <div class="card-title">Proses Pengajuan Pendaftaran Sidang Prooposal</div>
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
                              Mahasiswa Daftar Sidang Proposal<br/>
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
                              <div class="row" style="margin-top: 20px;">
                                <div class="col-4">
                                  <p class="text-sm">Jadwal Sidang
                                    <b class="d-block"><?php echo strftime('%d %B %Y', strtotime($detail->sidang_date)); ?></b>
                                  </p>
                                </div>
                                <div class="col-4">
                                  <p class="text-sm">Jam Sidang
                                    <b class="d-block"><?php 
                                      foreach($sidang_time as $st) {
                                        if($st->id == $detail->sidang_time) { echo $st->label; break; }
                                      }  ?></b>
                                  </p>
                                </div>

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
                                  <p class="text-sm">Penguji 1
                                    <b class="d-block"><?php echo $detail->namapenguji1; ?></b>
                                  </p>
                                </div>

                                <div class="col-6">
                                  <p class="text-sm">Penguji 2
                                    <b class="d-block"><?php echo $detail->namapenguji2; ?></b>
                                  </p>
                                </div>

                                <form method="post" action="<?php echo base_url('sempro/detail/'.$detail->id); ?>" >
                                  <div class="col-12 text-right">
                                      <div class="form-group ">
                                          <button type="submit" onclick="return confirm('Yakin batalkan plot ini?');" class="btn btn-outline-danger" id="btnbatalplot" name="btnbatalplot" value="batal">Batalkan Plot</button>
                                      </div>
                                    </div>
                                </form>
                              </div>

                              <?php } ?>
                              <?php
                              if(isset($kalab)) {
                                  if($kalab && is_null($detail->kalab_npk_verified)) { ?>
                                    <form method="post" action="<?php echo base_url('sempro/detail/'.$detail->id); ?>">
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
                                                 <input type="text" class="form-control" readonly value="<?php echo $detail->dosbing2; ?> / <?php echo $detail->lecturer2_npk; ?>" />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-12">
                                            <div class="form-group">
                                              <label for="penguji1" class="col-sm-4 col-form-label">Penguji 1</label>
                                                <select class="form-control select2bs4" name="penguji1" id="penguji1" style="width: 100%;">
                                                  <option selected="selected" value="0">[Pilih Penguji 1]</option>
                                                  <?php foreach($dosbing as $value) { ?>
                                                    <?php if($value->npk != $detail->lecturer1_npk && $value->npk != $detail->lecturer2_npk ) { ?> 
                                                  <option value="<?php echo $value->npk; ?>" ><?php echo $value->nama; ?></option>
                                                  <?php } } ?>
                                                </select>
                                            </div>
                                          </div>

                                          <div class="col-12">
                                            <div class="form-group">
                                              <label for="penguji2" class="col-sm-4 col-form-label">Penguji 2</label>
                                                <select class="form-control select2bs4" name="penguji2" id="penguji2" style="width: 100%;">
                                                  <option selected="selected" value="0">[Pilih Penguji 2]</option>
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
                            </div>
                          </div>
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

    <!-- /.modal -->
  <div class="modal fade" id="modal-pilih">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('sempro/detail/'.$data['detail']->id); ?>" enctype="multipart/form-data" method="post">
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
  