<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Form Pendaftaran Kelulusan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Form Pendaftaran Kelulusan</li>
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
              <form method="post" action="<?php echo base_url('lulus/baru'); ?>" enctype="multipart/form-data">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-10">
                    <h3 class="card-title">Form Pendaftaran</h3>
                  </div>
                  
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body ">
                <div class="row">
                  <?php 
                  $alasan = '';
                  if(!$dataskripsi) { $alasan .= '<li>Nilai Skripsi belum terinput pada transkrip</li>'; }
                  if(!$eligible_prasyarat) { $alasan .= '<li>Nilai minimum mata kuliah syarat kelulusan belum terpenuhi</li>'; } ?>
                  
                  <?php if(!$dataskripsi) { ?>
                  <div class="col-12">
                    <div class="callout callout-danger">
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                      Anda tidak dapat mengajukan pendaftaran kelulusan dengan alasan:
                      <ul>
                        <?php echo $alasan; ?>
                      </ul>
                    </div>
                  </div>
                  <?php } else if(!$eligible_prasyarat) { ?>
                  <div class="col-12">
                    <div class="callout callout-danger">
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                      Anda tidak dapat mengajukan pendaftaran kelulusan dengan alasan:
                      <ul>
                        <?php echo $alasan; ?>
                      </ul>
                    </div>
                  </div>
                  <?php } ?>
                  <div class="col-4">
                    <p class="text-sm"><strong>NRP</strong>
                      <input type="text" readonly class="form-control" disabled value="<?php echo $sempro[0]->nrp; ?>" />
                    </p>
                  </div>
                  <div class="col-8">
                    <p class="text-sm"><strong>Nama</strong>
                      <input type="text" readonly class="form-control" disabled value="<?php echo $sempro[0]->nama; ?>" />
                    </p>
                  </div>
                  <div class="col-12">
                    <p class="text-sm"><strong>Judul</strong>
                      <input type="text"  class="form-control" name="judul" value="<?php echo strtoupper($sempro[0]->judul); ?>" />
                    </p>
                  </div>
                  <div class="col-3">
                    <p class="text-sm"><strong>Nilai Ujian</strong>
                      <input type="text" readonly class="form-control" disabled value="<?php if($dataskripsi) { echo $dataskripsi->nisbi; } else { echo 'Belum ada di transkrip'; } ?>" />
                    </p>
                  </div>

                  <div class="col-3">
                    <p class="text-sm"><strong>Jumlah SKS Nilai D</strong>
                      <input type="text" readonly class="form-control" disabled value="<?php echo $skskum; ?>" />
                      <small id="" class="form-text text-muted">Maksimal 30 sks, tanpa nilai E*</small>
                    </p>
                  </div>
                  <div class="col-3">
                    <p class="text-sm"><strong>IPK Kum</strong>
                      <input type="text" readonly class="form-control" disabled value="<?php echo number_format($ipkkum,2,'.','.'); ?>" />
                    </p>
                  </div>
                  <div class="col-3">
                    <p class="text-sm"><strong>Transkrip</strong>
                      <a  href="<?php echo base_url('transkrip/student/'.$info[0]->nrp); ?>" class="btn btn-outline-primary form-control">Lihat Transkrip</a>
                    </p>
                  </div>
                  <div class="col-12">
                     <p class="text-sm"><strong>Nilai Mata Kuliah</strong></p>
                     <table id="example2" class="table table-bordered table-hover" style="width:100%;">
                      <thead>
                        <tr>
                          <th>Kode Mata Kuliah</th>
                          <th>Nama Mata Kuliah</th>
                          <th>Nisbi Minimal</th>
                          <th>Nilai Mhs</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php echo $table_prasyarat; ?>
                      </tbody>
                     </table>
                  </div>

                  <!--
                  <div class="col-12 ">
                    <p class="text-sm"><strong>Upload Kartu Perwalian</strong>
                       <input type="file"  name="filekartuwali" class="form-control" accept="application/pdf" id="filekartuwali" >
                    </p>
                  </div>
                -->
                  <div class="col-12 ">
                    <p class="text-sm"><strong>Upload Bukti Bebas Pemakaian Alat dan Bahan Lab</strong>
                       <input type="file"  name="filebebaspakai" class="form-control" accept="application/pdf" id="filebebaspakai" >
                    </p>
                  </div>
                
                  <div class="col-12 ">
                    <p class="text-sm"><strong>Upload Naskah Final</strong>
                       <input type="file"  name="filenaskahfinal" class="form-control" accept="application/pdf" id="filenaskahfinal" >
                       <small id="" class="form-text text-muted">Naskah lengkap dan final yang sudah selesai revisi</small>
                    </p>
                  </div>

                  <div class="col-12 ">
                    <p class="text-sm"><strong>Upload Sertifikasi TOEFL</strong>
                       <input type="file"  name="filetoefl" class="form-control" accept="application/pdf" id="filetoefl" >
                    </p>
                  </div>

                  <?php if($alasan == "") { ?>
                  <div class="col-12">
                    <input type="hidden" name="hid_sempro_id" value="<?php echo $sempro[0]->student_topik_id; ?>">
                    <button type="submit" value="submit" class="btn btn-primary" name="btnajukan" id="btnajukan" >Submit Form Pendaftaran</button>
                  </div>
                <?php } ?>
                </div>                
              </div>
              <!-- /.card-body -->
            </div>
          </form>
          </div>

          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div> 

  