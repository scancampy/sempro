<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Setting Eligibility</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Master</li>
              <li class="breadcrumb-item active">Setting Eligibility</li>
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
                    <h3 class="card-title">Setting Eligibility</h3>
                  </div>
                </div> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($eligibility)) { 
                      foreach($eligibility as $row) { 
                      ?>
                  <tr>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->keterangan; ?></td>
                    <td><?php echo $row->nilai; ?></td>
                    <td ><button targetid="<?php echo $row->id; ?>" targetnama="<?php echo $row->nama; ?>" targetnamaalias="<?php echo $row->nama_alias; ?>" targetnilai="<?php echo $row->nilai; ?>" class="btn btn-xs btn-primary editbtn"  data-toggle="modal" data-target="#modal-edit" >Edit</button>
                    </td>
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

    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('master/eligibility'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Edit Setting Eligibility</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="form-group row">
              <label for="namaedit" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name="namaedit" class="form-control" readonly disabled id="namaedit" >
                <input type="hidden" name="hid_id" id="hid_id" >
              </div>
            </div>
            <div class="form-group row">
              <label for="nilaiedit" class="col-sm-2 col-form-label">Nilai</label>
              <div class="col-sm-10">
                <input type="text" name="nilaiedit" class="form-control" id="nilaiedit" >
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
  