<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pilih Topik</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('proposal/student'); ?>">Proposal</a></li>
              <li class="breadcrumb-item active">Pilih Topik</li>
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
              <div class="card card-primary collapsed-card">
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
                    <label for="nrp" class="col-sm-3 col-form-label">Lab</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="filterlab">
                        <option value="all">Semua Lab</option>
                        <?php 
                          $selectedlab = '';
                          if($this->input->get('filterlab')) {
                            $selectedlab = $this->input->get('filterlab');
                          } else {
                            $selectedlab = $info[0]->lab_id;
                          }
                        ?>
                        <?php foreach($lab as $l) { ?>
                          <option value="<?php echo $l->id; ?>" <?php if($selectedlab == $l->id) { echo 'selected'; } ?>><?php echo $l->nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                 <div class="form-group row">
                    <label for="pilihdosenpembuat" class="col-sm-3 col-form-label">Dosen Pembuat</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="pilihdosenpembuat">
                        <option value="all" <?php if($this->input->get('pilihdosenpembuat') == 'all') { echo 'selected'; } ?>>Semua dosen</option>
                        <?php foreach($lecturer as $value) { ?>
                        <option value="<?php echo $value->npk; ?>" <?php if($this->input->get('pilihdosenpembuat') == $value->npk) { echo 'selected'; } ?>><?php echo $value->nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                 </div>
                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('lecturer/topic'); ?>" class="btn btn-default">Reset</a>
                    <button type="submit" name="btncari" value="btncari" class="btn btn-primary">Cari</button>
                  </div>
              </div>
            </form>
          </div>  

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-12">
                    <h3 class="card-title">Data Topik</h3>
                  </div>                 
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <div class="callout callout-info">
                  <h5>Mata Kuliah Prasyarat</h5>

                  <p>Jika bewarna merah, maka artinya anda belum lulus mata kuliah tersebut</p>
                </div>
               
               <form method="post" action="<?php echo base_url('proposal/pilihtopik'); ?>">
               <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Topik</th>
                    <th>MK Prasyarat 1</th>
                    <th>MK Prasyarat 2</th>
                    <th>Lab</th>
                    <th>Pembuat</th>
                    <th>Kuota</th>
                    <th>Pilih Topik</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($topik)) { 
                      foreach($topik as $idx => $row) { 
                        $eligiblepilih = true;
                      ?>
                  <tr>
                    <td><?php echo $row->nama; ?></td>
                    <td <?php 
                      if(isset($prasyarat_transcript[$idx][0])) { 
                        if($prasyarat_transcript[$idx][0] == false) { echo 'style="color:red;"'; $eligiblepilih = false; } 
                      } 
                    ?>><?php if(isset($prasyarat[$idx][0])) { echo $prasyarat[$idx][0]->nama.' <br/>(min '.$prasyarat[$idx][0]->minimum_mark.')';  } ?></td>
                    <td <?php 
                      if(isset($prasyarat_transcript[$idx][1])) { 
                        if($prasyarat_transcript[$idx][1] == false) { echo 'style="color:red;"'; $eligiblepilih = false; } 
                      } 
                    ?>><?php if(isset($prasyarat[$idx][1])) { echo $prasyarat[$idx][1]->nama.' <br/>(min '.$prasyarat[$idx][1]->minimum_mark.')'; } ?></td>
                    <td><?php echo $row->namalab; ?></td>
                    <td><?php echo $row->pembuat; ?></td>
                    <td><?php echo $kuota[$idx].'/'.$row->kuota; ?></td>
                    <td>
                      <?php if($eligiblepilih) { ?>
                      <button name="btnpilih" onclick="return confirm('Yakin pilih topik ini?');" value="<?php echo $row->id; ?>" class="btn btn-primary">Pilih</button>
                    <?php }?>
                    </td>
                  </tr>

                    <?php } }  ?>
                  </tfoot>
                </table>
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
  