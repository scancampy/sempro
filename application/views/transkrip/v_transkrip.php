<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Transkrip</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Transkrip</li>
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
                    <h3 class="card-title">Transkrip</h3>
                  </div>
                  
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <div class="col-12">
                  <dl class="row">
                    <dt class="col-sm-4 text-right">Jumlah SKS dengan nilai D:</dt>
                    <dd class="col-sm-8"><?php echo $nilai_d; ?> sks</dd>
                  </dl>
                  <dl class="row">
                    <dt class="col-sm-4 text-right">Jumlah SKS dengan nilai E:</dt>
                    <dd class="col-sm-8"><?php echo $nilai_e; ?> sks</dd>
                  </dl>
                  <dl class="row">
                    <dt class="col-sm-4 text-right">Jumlah SKS tanpa nilai E:</dt>
                    <dd class="col-sm-8"><?php echo $tanpa_e; ?> sks</dd>
                  </dl>
                   <dl class="row">
                    <dt class="col-sm-4 text-right">Total SKS:</dt>
                    <dd class="col-sm-8"><?php echo $totalsks; ?> sks</dd>
                  </dl>
                </div>

                <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Kode MK</th>
                    <th>Nama MK</th>
                    <th>Semester</th>
                    <th>Sks</th>
                    <th>Nisbi</th>
                  </tr>
                  </thead>
                  <tbody>
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
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>  