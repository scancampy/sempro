<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Topik</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Dosen</li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('kalab/topic'); ?>">Topik</a></li>
              <li class="breadcrumb-item active">Tambah Topik</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form class="form-horizontal" method="post" action="<?php echo current_url(); ?>">
           
        <div class="row">    
        <?php for($i =1; $i<=3; $i++) { ?>     
          <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Topik #<?php echo $i; ?></h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="topik" class="col-sm-3 col-form-label">Topik</label>
                    <div class="col-sm-9">
                      <input type="text" name="topik[]" class="form-control" placeholder="Nama / Judul Topik" id="topik" >
                    </div>
                  </div>
                 <div class="form-group row">
                    <label for="kuota" class="col-sm-3 col-form-label">Kuota</label>
                    <div class="col-sm-9">
                      <input type="number" min="1" name="kuota[]" class="form-control" value="1" id="kuota" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="angkatan" class="col-sm-3 col-form-label">Dibuka untuk semester</label>
                    <div class="col-sm-9">
                      <?php foreach($periode as $row) {  ?>
                      <div class="form-check">
                        <input type="checkbox" <?php if($row->is_active == 1) { echo 'checked'; } ?> class="form-check-input" id="periodecheck_<?php echo $i; ?>_<?php echo $row->id; ?>" value="<?php echo $row->id; ?>" name="periodecheck<?php echo $i; ?>[]">
                        <label class="form-check-label" for="periodecheck_<?php echo $i; ?>_<?php echo $row->id; ?>" ><?php echo $row->nama; ?></label>
                      </div>
                      <?php } ?>                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kuota" class="col-sm-3 col-form-label">MK Prasyarat 1</label>
                    <div class="col-sm-6">
                        <select class="form-control select2bs4" name="course_id1[]">
                          <option selected="selected" value="">Pilih MK</option>
                          <?php foreach($course as $row) { ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->kode_mk.' - '.$row->nama; ;?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                       <select class="form-control" name="minimum_mark1[]">
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
                    <label for="kuota" class="col-sm-3 col-form-label">MK Prasyarat 2</label>
                    <div class="col-sm-6">
                        <select class="form-control select2bs4" name="course_id2[]">
                          <option selected="selected" value="">Pilih MK</option>
                            <?php foreach($course as $row) { ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->kode_mk.' - '.$row->nama; ;?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                       <select class="form-control" name="minimum_mark2[]">
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
              </div>
          </div>
        <?php } ?>
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-body text-right">
                <button type="submit" name="btnsubmit" value="btnsubmit" value="btnsubmit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
        </div>
        

            </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
