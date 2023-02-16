<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Plot Tanggal dan Jam Sidang Skripsi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Plot Tanggal dan Jam Sidang Skripsi<</li>
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
                    <h3 class="card-title">Plot Tanggal dan Jam Sidang Skripsi</h3>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <?php // print_r($detail); ?>
                <div class="row">
                  <div class="col-12">
                    <p class="text-sm"><b>Judul</b>
                      <span class="d-block"><?php echo $detail->judul; ?></span>
                    </p>
                  </div>
                  <div class="col-6">
                    <p class="text-sm"><b>Pembimbing 1</b>
                      <span class="d-block"><?php echo $detail->dosbing1; ?></span>
                    </p>
                  </div>
                  <div class="col-6">
                    <p class="text-sm"><b>Pembimbing 2</b>
                      <span class="d-block"><?php echo $detail->dosbing2; ?></span>
                    </p>
                  </div>
                  <div class="col-6">
                    <p class="text-sm"><b>Ketua</b>
                      <span class="d-block"><?php echo $penguji1[0]->nama; ?></span>
                    </p>
                  </div>
                  <div class="col-6">
                    <p class="text-sm"><b>Sekretaris</b>
                      <span class="d-block"><?php echo $penguji2[0]->nama; ?></span>
                    </p>
                  </div>
                </div>

                <?php
                  $curdate = strtotime($periodeaktif->date_start);
                  $dayidx = 1; 
                  while($curdate <= strtotime($periodeaktif->date_end)) {                   
                    $curdate = strtotime($periodeaktif->date_start.' +'.$dayidx.' day');
                    $dayidx++;
                  } 
                ?>

                <table class="" style="border: 1px solid lightgray; width:<?php echo $dayidx * 150; ?>px;">
                 <tr>
                    <td style="padding: 10px;  border: 1px solid lightgray; width: 100px; "><b>Jam</b></td>
                    <?php 
                      $curdate = strtotime($periodeaktif->date_start);
                      $dayidx = 1; 
                      while($curdate <= strtotime($periodeaktif->date_end)) {
                        echo '<td style="width:150px;padding: 10px; border: 1px solid lightgray;"><b>'.strftime("%d-%m-%Y", $curdate).'</b></td>'; 
                        $curdate = strtotime($periodeaktif->date_start.' +'.$dayidx.' day');
                        $dayidx++;
                      }
                    ?>                                          
                  </tr>
                  <?php foreach($sidang_time as $st) { ?>
                    <tr>
                      <td style="padding: 10px; position: absolute; background-color: white; width: 100px; "><b><?php echo $st->label; ?></b> &nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-chevron-right"></span></td>

                      <?php 
                      $curdate = strtotime($periodeaktif->date_start);
                      $dayidx = 1; 
                      while($curdate <= strtotime($periodeaktif->date_end)) { 
                        // cek apakah tanggal ini ada yg ngeplot nggak
                        $adasidang = null;
                        $bolehplot = true;
                        $jmlroom = 0;  ?>
                        <td style="text-align:center; vertical-align: top;">
                          <?php 

                        foreach($sempro as $smp) {
                           if($smp->sidang_date == strftime("%Y-%m-%d", $curdate) && $smp->sidang_time == $st->id) { //echo $smp->sidang_date.'<br/>'.$smp->sidang_time;
                           //echo '<br/>';
                            $adasidang = $smp; 
                            $jmlroom++;

                            // cek dosbing dan penguji ga boleh di jam yg sama
                            //print_r($smp);
                           /* echo 'P1:'.$smp->pembimbing1;
                            echo '<br/>P2:'.$smp->pembimbing2;
                            echo '<br/>Peng1:'.$smp->penguji1;
                            echo '<br/>Peng2:'.$smp->penguji2;

                            echo '<br/><br/>P1:'.$detail->lecturer1_npk;
                            echo '<br/>P2:'.$detail->lecturer2_npk;
                            echo '<br/>Peng1:'.$penguji1[0]->npk;
                            echo '<br/>Peng2:'.$penguji2[0]->npk;*/
                            
                            if($detail->lecturer1_npk == $smp->pembimbing1 || $detail->lecturer1_npk == $smp->pembimbing2 || $detail->lecturer1_npk == $smp->penguji1 || $detail->lecturer1_npk == $smp->penguji2) {
                              $bolehplot = false; break;
                            }

                            if($detail->lecturer2_npk == $smp->pembimbing1 || $detail->lecturer2_npk == $smp->pembimbing2 || $detail->lecturer2_npk == $smp->penguji1 || $detail->lecturer2_npk == $smp->penguji2) {
                              $bolehplot = false; break;
                            }

                            if($penguji1[0]->npk == $smp->pembimbing1 || $penguji1[0]->npk == $smp->pembimbing2 || $penguji1[0]->npk == $smp->penguji1 || $penguji1[0]->npk == $smp->penguji2) {
                              $bolehplot = false; break;
                            }

                            if($penguji2[0]->npk == $smp->pembimbing1 || $penguji2[0]->npk == $smp->pembimbing2 || $penguji2[0]->npk == $smp->penguji1 || $penguji2[0]->npk == $smp->penguji2) {
                              $bolehplot = false; break;
                            }
                           } 
                        }


                        if(!is_null($adasidang)) { ?>
<a data-toggle="modal" bolehplot="<?php echo $bolehplot; ?>" data-target="#modal-tampil" sidangtimeid="<?php echo $st->id; ?>" sidangtimelabel="<?php echo $st->label; ?>"  tanggalsidang="<?php echo strftime("%Y-%m-%d", $curdate); ?>"  tanggalsidanglabel="<?php echo strftime("%d-%m-%Y", $curdate); ?>"  class="btn btnplotshow  bg-lightblue <?php if($jmlroom <= count($room) && $bolehplot) { echo 'col-5'; } else { echo 'btn-block'; } ?>" style="<?php if($jmlroom <= count($room) && $bolehplot) { echo 'max-width: 48%;'; }  ?>" ><i class="fa fas fa-users"></i> <?php echo $jmlroom; ?></a>
                      <?php }

                        if($jmlroom <= count($room) && $bolehplot) {
                      ?>
                        <input type="button" tanggalsidang="<?php echo strftime("%Y-%m-%d", $curdate); ?>" data-toggle="modal" data-target="#modal-pilih" tanggalsidanglabel="<?php echo strftime("%d-%m-%Y", $curdate); ?>" sidangtimeid="<?php echo $st->id; ?>" sidangtimelabel="<?php echo $st->label; ?>" class="btn btnplot  btn-outline-primary <?php if(!is_null($adasidang)) { echo 'col-6'; } else { echo 'btn-block'; }  ?>" style="<?php if(!is_null($adasidang)) { echo 'max-width: 49%;'; }  ?>" value="Plot" />
                    
                        <?php
                        
                      } ?>  
                      </td>
                      <?php
                      $curdate = strtotime($periodeaktif->date_start.' +'.$dayidx.' day');
                        $dayidx++;
                    }
                    ?>       
                      
                                                              
                    </tr>
                  <?php } ?>
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
  <div class="modal fade" id="modal-pilih">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('skripsi/plot/'.$detail->id.'/'.$p1.'/'.$p2); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Plot Tanggal dan Jam Sidang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="nrpedit" class="col-sm-2 col-form-label">Judul</label>
              <div class="col-sm-10">
                 <input type="text" value="<?php echo $detail->judul; ?>" readonly class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label for="nrpedit" class="col-sm-2 col-form-label">Mahasiswa</label>
              <div class="col-sm-10">
                 <input type="text" value="<?php echo $detail->nama.' / '.$detail->nrp; ?>" readonly class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label for="nrpedit" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
              <div class="col-sm-5">
                 <input type="text" value="<?php echo $detail->dosbing1; ?>" readonly class="form-control">
              </div>
              <div class="col-sm-5">
                 <input type="text" value="<?php echo $detail->dosbing2; ?>" readonly class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label for="nrpedit" class="col-sm-2 col-form-label">Dosen Penguji</label>
             <div class="col-sm-5">
                 <input type="text" value="<?php echo $penguji1[0]->nama; ?>" readonly class="form-control">
              </div>
              <div class="col-sm-5">
                 <input type="text" value="<?php echo $penguji2[0]->nama; ?>" readonly class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label for="nrpedit" class="col-sm-2 col-form-label">Tanggal Sidang</label>
              <div class="col-sm-10">
                 <input type="text" value="" id="txt_tanggal_sidang" readonly class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label for="nrpedit" class="col-sm-2 col-form-label">Jam Sidang</label>
              <div class="col-sm-10">
                 <input type="text" value="" id="txt_jam_sidang" readonly class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label for="cekhasilplot" class="col-sm-4 col-form-label">Cek Hasil Plot</label>
              <div class="col-12">
                <div class="form-check">
                  <input type="hidden" name="tglsidang" id="tglsidang"/>
                  <input type="hidden" name="jamsidang" id="jamsidang"/>
                  <input class="form-check-input" id="cekhasilplot" name="cekhasilplot" value="valid" type="checkbox">
                  <label class="form-check-label" for="cekhasilplot">Saya telah memeriksa tanggal dan jam sidang telah diplot dengan benar</label>
                </div>
              </div>
            </div>
           

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" value="submit" name="btnsubmit" id="btnsubmit" disabled class="btn btn-primary">Simpan Hasil Plot</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  

   <!-- /.modal -->
  <div class="modal fade" id="modal-tampil">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          
          <div class="modal-header">
            <h4 class="modal-title">Jadwal Sidang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-12">
                    <p class="text-sm"><b>Tanggal Sidang</b>
                      <span class="d-block" id="span_tgl_sidang"></span>
                    </p>
                  </div>
            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Mahasiswa</th>
                      <th>Pembimbing</th>
                      <th>Penguji</th>
                      <th>Ruang</th>
                      <th>Jam</th>
                    </tr>
                  </thead>
                  <tbody id="tbody-sidang">
                  </tbody>
                </table>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  