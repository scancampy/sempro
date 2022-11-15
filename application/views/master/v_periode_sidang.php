<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Periode Sidang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Master</li>
              <li class="breadcrumb-item active">Periode Sidang</li>
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
                    <h3 class="card-title">Data Periode Sidang</h3>
                  </div>
                  <div class="col-3">
                    <button type="button"  class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-add">Tambah Periode Sidang</button>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Aktif</th>
                    <th width="15%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($periode)) { 
                      foreach($periode as $row) { 
                      ?>
                  <tr>
                    <td><?php echo strftime("%d-%m-%Y", strtotime($row->date_start)); ?></td>
                    <td><?php echo strftime("%d-%m-%Y", strtotime($row->date_end)); ?></td>
                    <td><?php if($row->is_active == 1) { echo ' <i class="green text-success nav-icon fas fa-check-square"></i>'; }  ?></td>
                    <td ><button targetid="<?php echo $row->id; ?>" targetstart="<?php echo strftime("%m/%d/%Y", strtotime($row->date_start)); ?>" targetactive="<?php echo $row->is_active; ?>"  targetend="<?php echo strftime("%m/%d/%Y", strtotime($row->date_end)); ?>" class="btn btn-xs btn-primary editbtn"  data-toggle="modal" data-target="#modal-edit" >Edit</button> <a href="<?php echo base_url('master/periodesidang/del/'.$row->id); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a> </td>
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
          <form method="post" action="<?php echo base_url('master/periodesidang'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Periode Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Date -->
            <div class="form-group row">
              <label>Tanggal Mulai</label>
                <div class="input-group date" id="date_start" data-target-input="nearest">
                    <input type="text" name="date_start" required class="form-control datetimepicker-input" data-target="#date_start"/>
                    <div class="input-group-append" data-target="#date_start" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <!-- Date -->
            <div class="form-group row">
              <label>Tanggal Akhir</label>
                <div class="input-group date" id="date_end" data-target-input="nearest">
                    <input type="text" name="date_end" required class="form-control datetimepicker-input" data-target="#date_end"/>
                    <div class="input-group-append" data-target="#date_end" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8">
                  <div class="form-check">
                    <input type="checkbox" checked class="form-check-input" id="is_active" value="1" name="is_active">
                    <label class="form-check-label" for="is_active" >Set sebagai periode aktif sehingga mahasiswa dapat mendaftar sidang</label>
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
          <form method="post" action="<?php echo base_url('master/periodesidang'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Edit Periode Sidang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <!-- Date -->
            <div class="form-group row">
              <label>Tanggal Mulai</label>
                <div class="input-group date" id="date_start_edit" data-target-input="nearest">
                    <input type="text" name="date_start_edit" id="date_start_edit_id" required class="form-control datetimepicker-input" data-target="#date_start_edit"/>
                    <div class="input-group-append" data-target="#date_start_edit" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <!-- Date -->
            <div class="form-group row">
              <label>Tanggal Akhir</label>
                <div class="input-group date" id="date_end_edit" data-target-input="nearest">
                    <input type="text" name="date_end_edit" id="date_end_edit_id"  class="form-control datetimepicker-input" data-target="#date_end_edit"/>
                    <div class="input-group-append" data-target="#date_end_edit" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8">
                  <div class="form-check">
                    <input type="hidden" name="hidedit" id="hidedit">
                    <input type="checkbox" class="form-check-input" id="is_active_edit" value="1" name="is_active_edit">
                    <label class="form-check-label" for="is_active_edit" >Set sebagai periode aktif sehingga mahasiswa dapat mendaftar sidang</label>
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
  