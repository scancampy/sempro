<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Setting Jabatan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Master</li>
              <li class="breadcrumb-item active">Setting Jabatan</li>
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
                    <h3 class="card-title">Setting Jabatan</h3>
                  </div>
                  <div class="col-2">
                    <button type="button"  class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-add">Tambah</button>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>NPK</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($lab)) { 
                      foreach($lab as $row) { 
                      ?>
                  <tr>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->nama_pendek; ?></td>
                    <td ><button targetid="<?php echo $row->id; ?>" targetnama="<?php echo $row->nama; ?>" targetnamapendek="<?php echo $row->nama_pendek; ?>" class="btn btn-xs btn-primary editbtn"  data-toggle="modal" data-target="#modal-edit" >Edit</button> <a href="<?php echo base_url('master/lab/del/'.$row->id); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a> </td>
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
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('master/roles'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Jabatan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="form-group row">
              <label for="npk" class="col-sm-2 col-form-label">Dosen</label>
              <div class="col-sm-10">
                <select class="form-control" name="npk" id="npk">
                  <?php foreach($lecturer as $row) { ?>
                  <option><?php echo $row->nama; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
               <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
              <div class="col-sm-10" style="padding-top:8px;">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jabatan" id="jabatankalab" checked="">
                  <label class="form-check-label">Kalab</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jabatan" id="jabatanwd" checked="">
                  <label class="form-check-label">Wakil Dekan</label>
                </div>
              </div>
            </div>
            <div class="form-group row" id="divlab" style="display:none;">
              <label for="lab" class="col-sm-2 col-form-label">Lab</label>
              <div class="col-sm-8">
                <select class="form-control" name="lab" id="lab">
                  <?php foreach($lab as $row) { ?>
                  <option><?php echo $row->nama; ?></option>
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

    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('master/lab'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Edit Lab</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="form-group row">
              <label for="namaedit" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" name="namaedit" class="form-control" id="namaedit" >
                <input type="hidden" name="idedit" id="idedit" >
              </div>
            </div>
            <div class="form-group row">
              <label for="namapendekedit" class="col-sm-4 col-form-label">Singkatan</label>
              <div class="col-sm-8">
                <input type="text" name="namapendekedit" class="form-control" id="namapendekedit" >
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
  