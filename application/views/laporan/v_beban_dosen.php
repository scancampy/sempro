<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Beban Dosen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Laporan Beban Dosen</li>
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
                    <div class="col-4">
                      <div class="form-group ">
                        <label for="filtersemester" class="col-sm-4 col-form-label">Semester</label>
                        <div class="col-sm-12">
                           <?php 
                              $aktif_str = '';
                              $selectedsemester = '';
                              if($this->input->get('filtersemester')) {

                                $selectedsemester = $this->input->get('filtersemester');
                              } else {
                                $selectedsemester = $active_semester; 
                                                              }
                            ?>

                          <select class="form-control" name="filtersemester">
                            <?php foreach($semester as $l) {  ?>
                              <option value="<?php echo $l->id; ?>" <?php if($selectedsemester == $l->id) { echo 'selected';  }  ?>><?php echo $l->nama.'/'.($l->tahun+1); if($l->is_active == 1) { echo ' (Semester Aktif)'; } ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <label for="nrp" class="col-sm-3 col-form-label">Lab </label>
                      <div class="col-sm-9">
                        <select class="form-control" name="filterlab">
                          <option value="all">Semua Lab</option>
                          <?php 
                            $selectedlab = '';
                            if($this->input->get('filterlab')) {

                              $selectedlab = $this->input->get('filterlab');
                            } 
                          ?>
                          <?php foreach($lab as $l) { ?>
                            <option value="<?php echo $l->id; ?>" <?php if($selectedlab == $l->id) { echo 'selected'; } ?>><?php echo $l->nama; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div> 
                </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('laporan/bebandosen'); ?>" class="btn btn-default">Reset</a>
                    <button type="submit" name="btncari" value="btncari" class="btn btn-primary">Cari</button>
                  </div>
              </div>
            </form>
          </div>
          
             <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="row">
                  <div class="col-12">
                    <h3 class="card-title">Laporan Beban Dosen</h3>
                    <div class="" style="text-align:right;">Export to: 
                      <a target="_blank" href="<?php echo base_url('laporan/excelbeban?'.$_SERVER['QUERY_STRING']); ?>" class="btn btn-tool"><i class="fas fa-file-excel"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <div class="callout callout-info">
                  <h5>Periode Semester <strong><?php echo $periode[0]->nama.'/'.($periode[0]->tahun+1); ?></strong></h5>

                  <p><?php  echo strftime("%d-%m-%Y", strtotime($periode[0]->date_start)).' sampai '.strftime("%d-%m-%Y", strtotime($periode[0]->date_end));  ?></p>
                </div>
                
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>NPK</th>
                    <th>Nama</th>
                    <th>Lab</th>
                    <th>Pemb. 1</th>
                    <th>Pemb. 2</th>
                    <th>Ketua Sempro</th>
                    <th>Sek. Sempro</th>
                    <th>Ketua Skripsi</th>
                    <th>Sek. Skripsi</th>
                    <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(@$beban != '') { 
                      $k = 0;
                      foreach($beban as $row) { 
                      ?>
                      <tr>
                        <td><?php echo $row->npk; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->namalab; ?></td>
                        <td><?php echo $row->beban1; ?></td>
                        <td><?php echo $row->beban2; ?></td>
                        <td><?php echo $row->sempro1; ?></td>
                        <td><?php echo $row->sempro2; ?></td>
                        <td><?php echo $row->skripsi1; ?></td>
                        <td><?php echo $row->skripsi2; ?></td>
                        <td><strong><?php echo $row->beban1+$row->beban2+$row->sempro1+$row->sempro2+$row->skripsi1+$row->skripsi2; ?></strong></td>
                       
                      </tr>
                    <?php  $k++; } }  ?>
                  </tfoot>
                </table>
              </div>
              <div class="card-footer">
                <p>Catatan:</p>
                <dl class="row">
                  <dt class="col-sm-2">Jumlah Bimbingan</dt>
                  <dd class="col-sm-10">Dihitung dari bimbingan mahasiswa aktif yang belum memiliki SK kelulusan</dd>
                  <dt class="col-sm-2">Jumlah Menguji Sempro</dt>
                  <dd class="col-sm-10">Dihitung dari peranan dosen sebagai ketua dan/atau sekretaris hingga lulus sidang sempro</dd>
                  <dt class="col-sm-2">Jumlah Menguji Skripsi</dt>
                  <dd class="col-sm-10">Dihitung dari peranan dosen sebagai ketua dan/atau sekretaris hingga mahasiswa memiliki SK kelulusan</dd>
                </dl>
              </div>

              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>  