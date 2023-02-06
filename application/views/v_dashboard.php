<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Timelime example  -->
        <div class="row">
          <?php if(@$need_create_st && $need_create_st >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('admintu/stskripsi'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><?php echo $need_create_st; ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Proposal</strong><br/>Perlu Dibuatkan ST</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } ?>

        <?php if(@$needcreatestkelulusan && $needcreatestkelulusan >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('lulus'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><?php echo count($needcreatestkelulusan); ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Pengajuan Pendaftaran Kelulusan</strong><br/>Perlu Dibuatkan SK</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } ?>

        <?php if(@$need_room_plot && $need_room_plot >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('sempro/plotruang'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><?php echo $need_room_plot; ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Sidang Sempro</strong><br/>Belum Diplot Ruangannya</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } ?>

        <?php if(@$need_room_plot_skripsi && $need_room_plot_skripsi >0) { ?>
            <div class="col-md-4 col-sm-6 col-12">
              <a href="<?php echo base_url('skripsi/plotruang'); ?>">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><?php echo $need_room_plot_skripsi; ?></span>

                  <div class="info-box-content" style="line-height: 14px;">
                    <span ><strong>Sidang Skripsi</strong><br/>Belum Diplot Ruangannya</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            <!-- /.info-box -->
          </div>
        <?php } ?>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  