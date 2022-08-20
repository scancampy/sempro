<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Proposal</li>
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
                    <h3 class="card-title">Data Proposal</h3>
                  </div>
                  <div class="col-2">
                    <button type="button"  class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-pilih">Pilih Topik</button>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Topik</th>
                    <th>Tgl. Pengajuan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($student)) { 
                      foreach($student as $row) { 
                      ?>
                  <tr>
                    <td><?php echo $row->nrp; ?></td>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->ips; ?></td>
                    <td><?php echo $row->ipk; ?></td>
                    <td><?php echo $row->ipkm; ?></td>
                    <td ><button targetnrp="<?php echo $row->nrp; ?>" targetnama="<?php echo $row->nama; ?>" class="btn btn-xs btn-warning editbtn"  data-toggle="modal" data-target="#modal-edit" >Reset Password</button> <a href="<?php echo base_url('master/student/del/'.$row->nrp); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a> </td>
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
  