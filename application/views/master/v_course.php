<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mata Kuliah</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Master</li>
              <li class="breadcrumb-item active">Mata Kuliah</li>
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
                    <h3 class="card-title">Data Mata Kuliah</h3>
                  </div>
                  <div class="col-2">
                    <button type="button"  class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">Upload CSV</button>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Kode Mata Kuliah</th>
                    <th>Kode Lama 1</th>
                    <th>Kode Lama 2</th>
                    <th>Kode Lama 3</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($course)) { 
                      foreach($course as $row) { 
                      ?>
                  <tr>
                    <td><?php echo $row->kode_mk; ?></td>
                    <td><?php echo $row->old_kode_mk1; ?></td>
                    <td><?php echo $row->old_kode_mk2; ?></td>
                    <td><?php echo $row->old_kode_mk3; ?></td>
                    <td><?php echo $row->nama; ?></td>
                    <td ><button targetid="<?php echo $row->id; ?>"  targetkode="<?php echo $row->kode_mk; ?>" targetkode1="<?php echo $row->old_kode_mk1; ?>" targetkode2="<?php echo $row->old_kode_mk2; ?>" targetkode3="<?php echo $row->old_kode_mk3; ?>"  targetnama="<?php echo $row->nama; ?>" class="btn btn-xs btn-primary editbtn"  data-toggle="modal" data-target="#modal-edit" >Edit</button> <a href="<?php echo base_url('master/course/del/'.$row->id); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a> </td>
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
          <form method="post" action="<?php echo base_url('master/course'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Upload CSV</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Upload file CSV yang berisi data mata kuliah dengan dua judul kolom yakni <strong>KodeBaru, KodeLama1, KodeLama2, KodeLama3, dan Nama
</strong></p>
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
          <form method="post" action="<?php echo base_url('master/course'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Edit Mata Kuliah</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="kode_mk_edit" class="col-sm-4 col-form-label">Kode MK</label>
              <div class="col-sm-8">
                <input type="text" name="kode_mk_edit" readonly class="form-control" id="kode_mk_edit" >
                <input type="hidden" name="hid_mk_id" id="hid_mk_id" />
              </div>
            </div>

            <div class="form-group row">
              <label for="kode_mk_lama1_edit" class="col-sm-4 col-form-label">Kode MK Lama 1</label>
              <div class="col-sm-8">
                <input type="text" name="kode_mk_lama1_edit" class="form-control" id="kode_mk_lama1_edit" >                
              </div>
            </div>

            <div class="form-group row">
              <label for="kode_mk_lama2_edit" class="col-sm-4 col-form-label">Kode MK Lama 2</label>
              <div class="col-sm-8">
                <input type="text" name="kode_mk_lama2_edit" class="form-control" id="kode_mk_lama2_edit" >                
              </div>
            </div>
            <div class="form-group row">
              <label for="kode_mk_lama3_edit" class="col-sm-4 col-form-label">Kode MK Lama 3</label>
              <div class="col-sm-8">
                <input type="text" name="kode_mk_lama3_edit" class="form-control" id="kode_mk_lama3_edit" >                
              </div>
            </div>
           <div class="form-group row">
              <label for="namaedit" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" name="namaedit" class="form-control" id="namaedit" >
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
  