<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Periode / Semester</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Master</li>
              <li class="breadcrumb-item active">Periode / Semester</li>
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
                    <h3 class="card-title">Data Periode / Semester</h3>
                  </div>
                  <div class="col-3">
                    <button type="button"  class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-add">Tambah Periode / Semester</button>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Periode</th>
                    <th>Aktif</th>
                    <th width="15%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($periode)) { 
                      foreach($periode as $row) { 
                      ?>
                  <tr>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php if($row->is_active == 1) { echo ' <i class="green text-success nav-icon fas fa-check-square"></i>'; }  ?></td>
                    <td ><button targetid="<?php echo $row->id; ?>" targetnama="<?php echo $row->nama; ?>" targetactive="<?php echo $row->is_active; ?>" class="btn btn-xs btn-primary editbtn"  data-toggle="modal" data-target="#modal-edit" >Edit</button> <a href="<?php echo base_url('master/periode/del/'.$row->id); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a> </td>
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

 
   <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('master/periode'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Periode Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="form-group row">
              <label for="nama" class="col-sm-4 col-form-label">Nama Periode</label>
              <div class="col-sm-8">
                <input type="text" name="nama" class="form-control" id="nama" >
              </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-4 col-sm-8">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" value="1" name="is_active">
                    <label class="form-check-label" for="is_active" >Set sebagai periode aktif</label>
                  </div>
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

    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('master/periode'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Edit Periode</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="form-group row">
              <label for="namaedit" class="col-sm-4 col-form-label">Nama Periode</label>
              <div class="col-sm-8">
                <input type="text" name="namaedit" class="form-control" id="namaedit" >
                <input type="hidden" name="idedit" id="idedit" >
              </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-4 col-sm-8">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active_edit" value="1" name="is_active_edit">
                    <label class="form-check-label" for="is_active_edit" >Set sebagai periode aktif</label>
                  </div>
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
  