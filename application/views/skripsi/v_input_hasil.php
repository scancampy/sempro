<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Input Hasil Sidang Skripsi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Input Hasil Sidang Skripsi</li>
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
                    <label for="nrp" class="col-sm-3 col-form-label">Periode Sidang</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="filtersemester">
                        <option value="all">Pilih Periode</option>                        
                        <?php foreach($periode as $l) { ?>
                          <option value="<?php echo $l->id; ?>" <?php if($l->id == $this->input->get('filtersemester')) { echo 'selected'; } else if(empty($this->input->get('filtersemester')) && $l->is_active == 1) { echo 'selected';  } ?> ><?php echo strftime("%d %B %Y", strtotime($l->date_start)).' - '.strftime("%d %B %Y", strtotime($l->date_end)); if($l->is_active==1) { echo ' (Periode Aktif)'; } ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>       
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('skripsi/inputhasil'); ?>" class="btn btn-default">Reset</a>
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
                    <h3 class="card-title">Data Sidang Skripsi</h3>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <form method="post" id="formceklulus" action="<?php echo current_url(); ?>">
                  <?php if(isset($sempro) && @$sempro !='') { ?>
                  <div class="text-right mb-2">
                    <input type="submit" name="btnUpdateLulus"  class="btn btn-primary" value="Simpan Status Lulus" />
                  </div>
                <?php } ?>
                
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Mahasiswa</th>
                    <th>Judul</th>
                    <th>Tanggal Sidang</th>
                    <th>Jam Sidang</th>
                    <th>Ruang Sidang</th>
                    <th><div class="form-check">
                          <input class="form-check-input" id="checkall" type="checkbox">
                          <label>Lulus Skripsi</label>
                        </div>
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($sempro) && @$sempro !='') {
                      //print_r($sempro);
                      foreach($sempro as $row) { 
                      ?>
                  <tr>                   
                    <td>
                      <span class="d-block"><?php echo $row->nama.' / '.$row->nrp; ?></span>
                    </td>
                    <td>
                      <span class="d-block"><?php echo $row->judul; ?></span>
                    </td>
                    <td><?php if($row->sidang_date != null && $row->ruang_id != null) { 
                      echo strftime("%d %B %Y", strtotime($row->sidang_date));
                     } else { echo '<span class="badge badge-secondary">belum tersedia</span>'; } ?></td>
                    
                    <td><?php if($row->sidang_date != null && $row->ruang_id != null) { 
                      echo $row->label;
                     } else { echo '<span class="badge badge-secondary">belum tersedia</span>'; } ?></td>
                     <td><?php if($row->sidang_date != null && $row->ruang_id != null) { 
                      echo $row->roomlabel;
                     } else { echo '<span class="badge badge-secondary">belum tersedia</span>'; } ?></td>
                    <td >
                       <div class="form-check">
                          <input type="hidden" name="sidangid[]" value="<?php echo $row->id; ?>"/>
                          <input class="form-check-input" name="luluscek[]" value="<?php echo $row->id; ?>" type="checkbox" <?php if($row->is_lulus == 1) { echo 'checked'; } ?>>
                        </div>                     
                    </td>
                    
                  </tr>

                    <?php } } else { ?><tr>
                      <td colspan="6" class="text-center">Belum ada data sidang</td>
                    </tr> <?php }  ?>
                  </tfoot>
                </table>

                <?php if(isset($sempro) && @$sempro !='') { ?>                  
                <div class="text-right mt-2">
                    <input type="submit" name="btnUpdateLulus" class="btn btn-primary" value="Simpan Status Lulus" />
                  </div>
                  <?php } ?>

                  <?php if(!empty($this->input->get('filtersemester'))) { ?>
                    <input type="hidden" name="hid_filter_semester" value="<?php echo $this->input->get('filtersemester'); ?>">
                  <?php } ?>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>