<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Topik</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Kalab</li>
              <li class="breadcrumb-item active">Topik</li>
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
                    <label for="nrp" class="col-sm-2 col-form-label">Lab</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="filterlab">
                        <option value="">Semua Lab</option>
                        <?php foreach($lab as $l) { ?>
                          <option value="<?php echo $l->id; ?>"><?php echo $l->nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                 <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Kuota</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="pilihkuota">
                        <option value="all">Semua kuota</option>
                        <option value="sedia">Kuota tersedia</option>
                        <option value="habis">Kuota habis</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('kalab/topic'); ?>" class="btn btn-default">Reset</a>
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
                    <h3 class="card-title">Data Topik</h3>
                  </div>
                  <div class="col-2">
                    <a href="<?php echo base_url('kalab/add_topic'); ?>" class="btn  btn-primary btn-sm">Tambah Topik</a>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Topik</th>
                    <th>Kuota</th>
                    <th>Lab</th>
                    <th width="15%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($topik)) { 
                      foreach($topik as $row) { 
                      ?>
                  <tr>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo '0/'.$row->kuota; ?></td>
                    <td><?php echo $row->namalab; ?></td>
                    <td >
                      <?php if(isset($id_lab)) { 
                        if($id_lab ==$row->id_lab) {
                        ?>
                      <button targetid="<?php echo $row->id; ?>" targetnama="<?php echo $row->nama; ?>" targetkuota="<?php echo $row->kuota; ?>" targetidlab="<?php echo $row->id_lab; ?>" class="btn btn-xs btn-primary editbtn"  data-toggle="modal" data-target="#modal-edit" >Edit</button> <a href="<?php echo base_url('kalab/topic/del/'.$row->id); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a>
                      <?php } } ?> 
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

  <div class="modal fade" id="modal-add">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form method="post" action="<?php echo base_url('kalab/topic'); ?>" enctype="multipart/form-data" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Topik</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="nama" class="col-sm-4 col-form-label">Topik</label>
              <div class="col-sm-8">
                <input type="text" name="nama" class="form-control" id="nama" >
              </div>
            </div>

            <div class="form-group row">
              <label for="lab" class="col-sm-4 col-form-label">Lab</label>
              <div class="col-sm-8">
                <input type="hidden" name="hid_lab_id" id="hid_lab_id" value="<?php echo $id_lab; ?>">
                <input type="text" readonly disabled value="<?php echo $namalab; ?>" name="lab" class="form-control" id="lab" >
              </div>
            </div>

            <div class="form-group row">
              <label for="kuota" class="col-sm-4 col-form-label">Kuota</label>
              <div class="col-sm-8">
                <input type="number" value="1" min="1" name="kuota" class="form-control" id="kuota" >
              </div>
            </div>

            <div class="form-group row">
                <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="3"  name="deskripsi" placeholder=""></textarea>
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
  