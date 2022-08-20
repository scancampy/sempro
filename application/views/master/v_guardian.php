<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dosen Wali</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Master</li>
              <li class="breadcrumb-item active">Dosen Wali</li>
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
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Filter Data</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="nrp" class="col-sm-2 col-form-label">NRP</label>
                    <div class="col-sm-10">
                      <input type="text" name="nrp" class="form-control" id="nrp" placeholder="NRP" value="<?php echo $this->input->get('nrp'); ?>">
                    </div>
                  </div>
                 <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?php echo $this->input->get('nama'); ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                    <div class="col-sm-10">
                      <input type="text" name="angkatan" class="form-control" id="angkatan" placeholder="Angkatan" value="<?php echo $this->input->get('angkatan'); ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="angkatan" class="col-sm-2 col-form-label">Dosen Wali</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="doswal" name="doswal">
                        <option value="">Semua Dosen</option>
                        <?php foreach($doswal as $row) { ?>
                          <option <?php if($this->input->get('doswal') == $row->npk) { echo 'selected'; } ?> value="<?php echo $row->npk; ?>"><?php echo $row->nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('master/guardian'); ?>" class="btn btn-default">Reset</a>
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
                    <h3 class="card-title">Data Dosen Wali dan Mahasiswa</h3>
                  </div>
                  <div class="col-2">
                    <button type="button"  class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">Upload CSV</button>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Dosen Wali</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($guardian)) { 
                      foreach($guardian as $row) { 
                      ?>
                  <tr>
                    <td><?php echo $row->nrp; ?></td>
                    <td><?php echo $row->namastudent; ?></td>
                    <td><?php echo $row->namalecturer; ?></td>
                    <td width="15%"><button targetnrp="<?php echo $row->nrp; ?>" targetnpk="<?php echo $row->npk; ?>" targetnama="<?php echo $row->namastudent; ?>" targetnamalecturer="<?php echo $row->namalecturer; ?>" class="btn btn-xs btn-primary editbtn"  data-toggle="modal" data-target="#modal-edit" >Edit</button> <a href="<?php echo base_url('master/guardian/del/'.$row->nrp); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a> </td>
                  </tr>

                    <?php } }  ?>
                  </tfoot>
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

  <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('master/guardian'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Upload CSV</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Upload file CSV yang berisi data mahasiswa dan dosen wali dengan dua judul kolom yakni <strong>NRP dan NPK dosen wali</strong></p>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="filecsv"  accept=".csv">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" name="btnupload" value="btnupload" class="btn btn-primary">Upload</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('master/guardian'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Edit Dosen Wali</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="nrpedit" class="col-sm-4 col-form-label">NRP</label>
              <div class="col-sm-8">
                <input type="text" name="nrpedit" readonly class="form-control" id="nrpedit" >
              </div>
            </div>
           <div class="form-group row">
              <label for="namaedit" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" name="namaedit" disabled class="form-control" id="namaedit" >
              </div>
            </div>

            <div class="form-group row">
              <label for="passwordedit" class="col-sm-4 col-form-label">Dosen Wali</label>
              <div class="col-sm-8">
                 <select class="form-control" id="doswaledit" name="doswaledit">
                    <?php foreach($doswal as $row) { ?>
                      <option value="<?php echo $row->npk; ?>"><?php echo $row->nama; ?></option>
                    <?php } ?>
                  </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" name="btnedit" value="btnedit" class="btn btn-primary">Ubah</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  