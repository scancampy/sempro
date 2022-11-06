<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Tata Usaha</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Master</li>
              <li class="breadcrumb-item active">Admin TU</li>
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
                    <h3 class="card-title">Data Admin Tata Usaha</h3>
                  </div>
                  <div class="col-3 text-right">
                    <button type="button"  class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#modal-add">Tambah Admin TU</button>                    
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                     if(isset($admintu)) { 
                      foreach($admintu as $row) { 
                      ?>
                  <tr>
                    <td><?php echo $row->username; ?></td>
                    <td><?php echo $row->nama; ?></td>
                    <td >
                      <button targetusername="<?php echo $row->username; ?>" targetnama="<?php echo $row->nama; ?>" class="btn btn-xs btn-info editbtnadmintu"  data-toggle="modal" data-target="#modal-edit-admintu" >Edit</button>
                       <a href="<?php echo base_url('master/admintu/del/'.$row->username); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a> </td>
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

  <div class="modal fade" id="modal-edit-admintu">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('master/admintu'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data Admin TU</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="usernameedit" class="col-sm-4 col-form-label">Username</label>
              <div class="col-sm-8">
                <input type="text" name="usernameedit" readonly class="form-control" id="usernameedit" >
              </div>
            </div>
           <div class="form-group row">
              <label for="namaedit" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" name="namaedit" class="form-control" id="namaedit" >
              </div>
            </div>
            <div class="form-group row">
              <label for="passwordedit" class="col-sm-4 col-form-label">Ubah Password</label>
              <div class="col-sm-8">
                <input type="text" name="passwordedit" class="form-control" id="passwordedit" >
                 <small id="passwordhelp" class="form-text text-muted">Hanya diisi jika ingin mereset password admin TU ini.</small>
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
          <form method="post" action="<?php echo base_url('master/admintu'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Admin TU Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="usernamenew" class="col-sm-4 col-form-label">Username</label>
              <div class="col-sm-8">
                <input type="text" name="usernamenew" class="form-control" id="usernamenew" >
              </div>
            </div>
           <div class="form-group row">
              <label for="namanew" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" name="namanew" class="form-control" id="namanew" >
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
   