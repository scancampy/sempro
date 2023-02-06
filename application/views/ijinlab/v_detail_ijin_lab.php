<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajukan Ijin Pemakaian Fasilitas Laboratorium</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Ajukan Ijin Pemakaian Fasilitas Laboratorium</li>
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
                    <h3 class="card-title">Data Mahasiswa &amp; Skripsi</h3>
                  </div>
                  
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body ">
                <div class="col-12">
                  <dl class="row">
                    <dt class="col-sm-2 text-right">Nama:</dt>
                    <dd class="col-sm-10"><?php echo $sempro[0]->nama; ?></dd>
                  </dl>
                  <dl class="row">
                    <dt class="col-sm-2 text-right">NRP:</dt>
                    <dd class="col-sm-10"><?php echo $sempro[0]->nrp; ?></dd>
                  </dl>
                  <dl class="row">
                    <dt class="col-sm-2 text-right">Judul Skripsi:</dt>
                    <dd class="col-sm-10"><?php echo $sempro[0]->judul; ?></dd>
                  </dl>
                   <dl class="row">
                    <dt class="col-sm-2 text-right">Nama Dosbing:</dt>
                    <dd class="col-sm-10"><?php echo '(1) '.$sempro[0]->dosbing1; ?>
                      <?php echo '<br/>(2) '.$sempro[0]->dosbing2; ?>
                    </dd>
                  </dl>
                 
                </div>

                
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <?php //print_r($sempro); ?>
          <div class="col-12">
            <div class="card">
              <form method="post" action="<?php echo base_url('ijinlab/baru'); ?>">
                <input type="hidden" name="hid_sempro_id" value="<?php echo $sempro[0]->student_topik_id; ?>"/>
              <div class="card-header">
               <div class="row">
                  <div class="col-10">
                    <h3 class="card-title">Data Perijinan Lab</h3>
                  </div>
                  <div class="col-2">
                   <a href="" id="tambahijinlab" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-tampil" >Tambah Ijin Lab</a>
                  </div>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                 <p>Mengajukan permohonan ijin menggunakan fasilitas instrumen/alat/almari praktikum berikut ini:</p>
                 <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Nama Lab</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody id="body_table_ijin">
                    <?php if(isset($transkrip)) { 
                      foreach($transkrip as $row) { 
                      ?>
                      <tr>
                        <td><?php echo $row->kode_mk; ?></td>
                        <td><?php echo $row->namamk; ?></td>
                        <td><?php echo $row->semester.' '.$row->academic_year; ?></td>                    
                        <td><?php echo $row->sks; ?></td>
                        <td><?php echo $row->nisbi; ?></td>
                      </tr>
                    <?php } }  ?>
                  </tfoot>
                </table>
              </div>
              <div class="card-footer">
                <div class="col-12 text-right">
                   <button type="submit" value="submit" class="btn btn-primary" disabled name="btnajukan" id="btnajukan" >Ajukan Ijin Pemakaian Lab</a>
                  </div>
              </div>
            </form>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div> 

  <!-- /.modal -->
  <div class="modal fade" id="modal-tampil">
      <div class="modal-dialog modal-lg ">
        <div class="modal-content">
          
          <div class="modal-header">
            <h4 class="modal-title">Ijin Pemakaian Fasilitas Laboratorium</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <div class="form-group row">
              <label for="nrpedit" class="col-sm-3 col-form-label text-right" >Lingkup Peminjaman</label>
              <div class="col-sm-9" style="padding-top:8px;">
                 <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio_lingkup" id="radio_lingkup_internal" value="internal" checked>
                      <label class="form-check-label" for="radio_lingkup_internal">Internal</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio_lingkup" id="radio_lingkup_eksternal" value="eksternal">
                      <label class="form-check-label" for="radio_lingkup_eksternal">Eksternal</label>
                    </div>
                  </div>
              </div>
            </div>
             <div class="form-group row" id="divlab">
              <label for="ruang_lab" class="col-sm-3 col-form-label text-right">Laboratorium</label>
              <div class="col-sm-9">
                <select name="ruang_lab" id="ruang_lab" class="form-control">
                  <option value="-">[Pilih Laboratorium]</option>
                  <?php foreach($lab as $value) { ?>
                    <option value="<?php echo $value->id; ?>"><?php echo $value->ruang_lab; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div> 

            <div class="form-group row" id="divnamalab">
              <label for="ruang_lab" class="col-sm-3 col-form-label text-right">Nama Lab</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="txt_namalab" id="txt_namalab"/>
              </div>
            </div>
            <div class="form-group row" id="divalamatlab">
              <label for="ruang_lab" class="col-sm-3 col-form-label text-right">Alamat Lab</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="txt_alamatlab" id="txt_alamatlab"></textarea>
              </div>
            </div>            
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
             <button type="button" value="submit" name="btnsubmit" id="btnsubmit" disabled class="btn btn-primary">Tambah Lab</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  