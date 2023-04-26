<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Plot Ruang Sidang Skripsi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Plot Ruang Sidang Skripsi<</li>
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
                    <h3 class="card-title">Plot Ruang Sidang Skripsi</h3>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <?php // print_r($detail); ?>
                <div class="row">
                  <div class="col-6">
                    <p class="text-sm"><b>Pilih Periode Skripsi</b>
                      <span class="d-block">
                        <select class="form-control">
                          <?php foreach($periodeall as $value) { ?>
                            <option value="<?php echo $value->id; ?>" <?php if($value->is_active == 1) { echo 'selected';  } ?> ><?php echo strftime("%d %B ", strtotime($value->date_start)).'- '.strftime("%d %B %Y", strtotime($value->date_end));  if($value->is_active ==1) { echo ' (AKTIF)'; } ?></option>
                          <?php } ?>
                        </select>
                      </span>
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

                      //print_r($sempro);
                    ?>                                          
                  </tr>
                  <?php foreach($sidang_time as $st) { ?>
                    <tr style="vertical-align: top; border-bottom: 1px solid lightgray; ">
                      <td style="padding: 10px; position: absolute;  width: 100px; "><b><?php echo $st->label; ?></b> &nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-chevron-right"></span></td>

                      <?php 
                      $curdate = strtotime($periodeaktif->date_start);
                      $dayidx = 1; 
                      while($curdate <= strtotime($periodeaktif->date_end)) {
                        $adasidang = null; ?>

                            <td  style="text-align:center;">
                        <?php
                        $simpan ='';
                        $jml = 0;
                        $needplotting = false;
                        if(!empty($sempro)) {
                        foreach($sempro as $smp) {
                          if($smp->sidang_date == strftime("%Y-%m-%d", $curdate) && $smp->sidang_time == $st->id) {
                            $adasidang = $smp; 
                            $jml++;

                           $simpan .= '
                          <input data-toggle="modal" data-target="#modal-pilih" type="button" tanggalsidang="'.strftime("%Y-%m-%d", $curdate).'" 
                          judul="'.$adasidang->judul.'" nrp="'.$adasidang->nrp.'" nama="'.$adasidang->nama.'" dosbing1="'.$adasidang->dosbing1.'"  dosbing2="'.$adasidang->dosbing2.'" namapenguji1="'.$adasidang->namapenguji1.'"  namapenguji2="'.$adasidang->namapenguji2.'" sempro_id="'.$adasidang->id.'" ruanglabel="'.$adasidang->roomlabel.'"
                          tanggalsidanglabel="'.strftime("%d-%m-%Y", $curdate).'" sidangtimeid="'.$st->id.'" sidangtimelabel="'.$st->label.'" class=" dropdown-item btnplot  btn-';
                           if($adasidang->roomlabel != '') { $simpan .= 'info"'; } else { $simpan .= 'primary bg-danger"'; $needplotting = true; }

                           $simpan .= ' value="'.character_limiter($adasidang->nama, 10,'...'); 
                           if($adasidang->roomlabel != '') { $simpan .= ' ('.$adasidang->roomlabel.')'; } 
                           $simpan .= '"/>'; 
                          }
                        }
                      }

                        if($adasidang == null) { 
                       ?><input type="button" data-toggle="modal" data-target="#modal-pilih" tanggalsidang="<?php echo strftime("%Y-%m-%d", $curdate); ?>" tanggalsidanglabel="<?php echo strftime("%d-%m-%Y", $curdate); ?>" sidangtimeid="<?php echo $st->id; ?>" sidangtimelabel="<?php echo $st->label; ?>" class="btn btnplot btn-block btn-outline-secondary disabled" disabled value="-" />
                        <?php
                        } else { ?>
<div class="dropdown" >
  <button class="btn btn-secondary dropdown-toggle <?php if($needplotting) { echo 'btn-danger'; } ?> " style="width:100%;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo $jml; ?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php echo $simpan; ?>
  </div>
</div>
                        <?php
                          
                        } 
                        
                        $curdate = strtotime($periodeaktif->date_start.' +'.$dayidx.' day');
                        $dayidx++;
                        ?> </td>
                        <?php
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
          <form method="post" action="<?php echo base_url('skripsi/plotruang'); ?>" enctype="multipart/form-data" method="post">
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
                 <input type="text" id="judul" readonly class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label for="nrpedit" class="col-sm-2 col-form-label">Mahasiswa</label>
              <div class="col-sm-10">
                 <input type="text" id="mahasiswa" readonly class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label for="nrpedit" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
              <div class="col-sm-5">
                 <input type="text" id="dosbing1" readonly class="form-control">
              </div>
              <div class="col-sm-5">
                 <input type="text" id="dosbing2" readonly class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label for="nrpedit" class="col-sm-2 col-form-label">Dosen Penguji</label>
             <div class="col-sm-5">
                 <input type="text" id="namapenguji1" readonly class="form-control">
              </div>
              <div class="col-sm-5">
                 <input type="text"  id="namapenguji2" readonly class="form-control">
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
              <label for="nrpedit" class="col-sm-2 col-form-label">Ruang Sidang</label>
              <div class="col-sm-10" id="ruangsidang">
                <select class="form-control" name="ruang" id="ruang">                 
                </select>
              </div>
            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <input type="hidden" name="sempro_id" id="sempro_id"/>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" value="submit" name="btnsubmit" id="btnsubmit" disabled class="btn btn-primary">Simpan Plot Ruangan</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  