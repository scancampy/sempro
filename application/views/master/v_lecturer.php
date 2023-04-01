<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dosen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Master</li>
              <li class="breadcrumb-item active">Dosen</li>
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
                  <div class="col-9">
                    <h3 class="card-title">Data Dosen</h3>
                  </div>
                  <div class="col-3 text-right">
                    <button type="button"  class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#modal-add">Tambah Dosen</button>
                    <button type="button"  class="btn  btn-default btn-sm" data-toggle="modal" data-target="#modal-default">Upload CSV</button>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>NPK</th>
                    <th>Nama</th>
                    <th>Lab</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                     if(isset($lecturer)) { 
                      foreach($lecturer as $row) { 
                      ?>
                  <tr>
                    <td><?php echo $row->npk; ?></td>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->namalab; ?></td>
                    <td >
                      <button targetnpk="<?php echo $row->npk; ?>" targetnama="<?php echo $row->nama; ?>" targetlab="<?php echo $row->lab_id; ?>" class="btn btn-xs btn-info editbtnlecturer"  data-toggle="modal" data-target="#modal-edit-lecturer" >Edit</button>
                      <button targetnpk="<?php echo $row->npk; ?>" targetnama="<?php echo $row->nama; ?>" class="btn btn-xs btn-warning editbtn"  data-toggle="modal" data-target="#modal-edit" >Reset</button> <a href="<?php echo base_url('master/lecturer/del/'.$row->npk); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a> </td>
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
          <form method="post" action="<?php echo base_url('master/lecturer'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Upload CSV</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Upload file CSV yang berisi data dosen dengan dua judul kolom yakni <strong>NPK dan Nama</strong></p>
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
          <form method="post" action="<?php echo base_url('master/lecturer'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Reset Password Dosen</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="npkedit" class="col-sm-4 col-form-label">NPK</label>
              <div class="col-sm-8">
                <input type="text" name="npkedit" readonly class="form-control" id="npkedit" >
              </div>
            </div>
           <div class="form-group row">
              <label for="namaedit" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" name="namaedit" disabled class="form-control" id="namaedit" >
              </div>
            </div>

            <div class="form-group row">
              <label for="passwordedit" class="col-sm-4 col-form-label">Ubah Password</label>
              <div class="col-sm-8">
                <input type="text" name="passwordedit" class="form-control" id="passwordedit" >
                 <small id="passwordhelp" class="form-text text-muted">Hanya diisi jika ingin mereset password dosen ini.</small>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" name="btnedit" value="btnedit" class="btn btn-primary">Reset Password</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  
  <div class="modal fade" id="modal-edit-lecturer">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('master/lecturer'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data Dosen</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="npkeditlecturer" class="col-sm-4 col-form-label">NPK</label>
              <div class="col-sm-8">
                <input type="text" name="npkeditlecturer" readonly class="form-control" id="npkeditlecturer" >
              </div>
            </div>
           <div class="form-group row">
              <label for="namaeditlecturer" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" name="namaeditlecturer" class="form-control" id="namaeditlecturer" >
              </div>
            </div>

           <div class="form-group row">
              <label for="editlab" class="col-sm-4 col-form-label">Lab</label>
              <div class="col-sm-8">
                <select class="form-control" id="editlab" name="edit_lab_id">
                  <option value="0">[Pilih Lab]</option>
                  <?php foreach($lab as $l) { ?>
                    <option value="<?php echo $l->id; ?>"><?php echo $l->nama; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" name="btnubah" value="btnubah" class="btn btn-primary">Ubah</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

   <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('master/lecturer'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Dosen Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="npknew" class="col-sm-4 col-form-label">NPK</label>
              <div class="col-sm-8">
                <input type="text" name="npknew" class="form-control" id="npknew" >
              </div>
            </div>
           <div class="form-group row">
              <label for="namanew" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" name="namanew" class="form-control" id="namanew" >
              </div>
            </div>
           <div class="form-group row">
              <label for="lab" class="col-sm-4 col-form-label">Lab</label>
              <div class="col-sm-8">
                <select class="form-control" id="lab" name="lab_id">
                  <option value="0">[Pilih Lab]</option>
                  <?php foreach($lab as $l) { ?>
                    <option value="<?php echo $l->id; ?>"><?php echo $l->nama; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" name="btntambah" value="btntambah" class="btn btn-primary">Tambah</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  