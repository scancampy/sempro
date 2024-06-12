<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My SIGA | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
   <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jqvmap/jqvmap.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css'); ?>">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bs-stepper/css/bs-stepper.min.css'); ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
  
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.css'); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url('assets/img/AdminLTELogo.png'); ?>" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">My SIGA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/img/default_avatar.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('user')->info[0]->nama; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard'); ?>" class="nav-link <?php if($this->uri->segment(1) == 'dashboard') { echo  'active'; } ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php 
          $roles = $this->session->userdata('user')->roles;
          foreach($roles as $role) {
            if($role->roles == 'admin') { ?>
              <li class="nav-item ">
            <a href="#" class="nav-link <?php //active ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('master/periode'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'periode') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periode/Semester</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('master/periodesidang'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'periodesidang') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periode Ujian Sempro</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('master/periodesidangskripsi'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'periodesidangskripsi') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periode Sidang Skripsi</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('master/room'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'room') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ruang</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="<?php echo base_url('master/student'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'student') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('master/lecturer'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lecturer') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dosen</p>
                </a>
              </li>                           
              <li class="nav-item">
                <a href="<?php echo base_url('master/lab'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lab') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lab</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('master/ruanglab'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'ruanglab') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ruang Lab</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="<?php echo base_url('master/roles'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'roles') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Setting Jabatan</p>
                </a>
              </li>            
              <li class="nav-item">
                <a href="<?php echo base_url('master/eligibility'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'eligibility') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Setting Eligibility</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('master/mklulus'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'mklulus') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Setting MK Kelulusan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('master/course'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'course') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mata Kuliah</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('master/admintu'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'admintu') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Tata Usaha</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php if($this->uri->segment(1) == 'penyesuaian') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($this->uri->segment(1) == 'penyesuaian') { echo 'active'; } ?> ">
              <i class="nav-icon fas fa-exclamation-triangle"></i>
              <p>
                Penyesuaian Manual
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('penyesuaian/statussempro'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'statussempro' && $this->uri->segment(1) == 'penyesuaian' ) { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status Sempro</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('penyesuaian/statusskripsi'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'statusskripsi' && $this->uri->segment(1) == 'penyesuaian' ) { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status Skripsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('penyesuaian/statuslulus'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'statuslulus' && $this->uri->segment(1) == 'penyesuaian' ) { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status Kelulusan</p>
                </a>
              </li>
            </ul>
          </li>
            <?php } else if($role->roles == 'adminst') { ?>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link <?php //active ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Admin TU
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admintu/stskripsi'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'stskripsi') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ST Skripsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('sempro/plotruang'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'plotruang' && $this->uri->segment(1) == 'sempro') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Plot Ruang Sempro
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('skripsi/plotruang'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'plotruang' && $this->uri->segment(1) == 'skripsi') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Plot Ruang Skripsi
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('skripsi/inputhasil'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'inputhasil') { echo  'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Input Hasil Skripsi
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('lulus'); ?>" class="nav-link <?php if($this->uri->segment(1) == 'lulus') { echo  'active'; } ?>">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                    Daftar Kelulusan
                  </p>
                </a>
              </li>
            </ul>
          </li>       
            <?php } else if($role->roles == 'lecturer') { ?>
          <li class="nav-item">
              <a href="<?php echo base_url('lecturer/topic'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'topic' || $this->uri->segment(2) == 'add_topic') { echo  'active'; } ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Topik</p>
              </a>              
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('lecturer/proposal'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'proposal') { echo  'active'; } ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Proposal
              </p>
            </a>
          </li>

          

           <li class="nav-item">
                <a href="<?php echo base_url('sempro'); ?>" class="nav-link <?php if($this->uri->segment(1) == 'sempro') { echo  'active'; } ?>">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Sidang Sempro
                  </p>
                </a>
              </li>

               <li class="nav-item">
                <a href="<?php echo base_url('skripsi'); ?>" class="nav-link <?php if($this->uri->segment(1) == 'skripsi') { echo  'active'; } ?>">
                  <i class="nav-icon fas fa-user-graduate"></i>
                  <p>
                     Sidang Skripsi
                  </p>
                </a>
              </li>

               <li class="nav-item">
                <a href="<?php echo base_url('lulus'); ?>" class="nav-link <?php if($this->uri->segment(1) == 'lulus') { echo  'active'; } ?>">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                    Daftar Kelulusan
                  </p>
                </a>
              </li>
             <?php } else if($role->roles == 'student') { ?>
               <li class="nav-item">
                <a href="<?php echo base_url('proposal/student'); ?>" class="nav-link <?php if($this->uri->segment(1) == 'proposal') { echo  'active'; } ?>">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Proposal
                  </p>
                </a>
              </li>

               <li class="nav-item">
                <a href="<?php echo base_url('sempro'); ?>" class="nav-link <?php if($this->uri->segment(1) == 'sempro') { echo  'active'; } ?>">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Daftar Sidang Sempro
                  </p>
                </a>
              </li>

              

               <li class="nav-item">
                <a href="<?php echo base_url('skripsi'); ?>" class="nav-link <?php if($this->uri->segment(1) == 'skripsi') { echo  'active'; } ?>">
                  <i class="nav-icon fas fa-user-graduate"></i>
                  <p>
                    Daftar Sidang Skripsi
                  </p>
                </a>
              </li>

               <li class="nav-item">
                <a href="<?php echo base_url('lulus'); ?>" class="nav-link <?php if($this->uri->segment(1) == 'lulus') { echo  'active'; } ?>">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                    Daftar Kelulusan
                  </p>
                </a>
              </li>

               



              <li class="nav-item">
                <a href="<?php echo base_url('transkrip/student'); ?>" class="nav-link <?php if($this->uri->segment(1) == 'transkrip') { echo  'active'; } ?>">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    Transkrip
                  </p>
                </a>
              </li>
            <?php }
          }
          ?>
          
          <?php if($role->roles != 'student') { ?>
           <li class="nav-item <?php if($this->uri->segment(1) == 'laporan') { echo  'menu-open'; } ?>">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('laporan/topik'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'topik') { echo  'active'; } ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Topik</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('laporan/proposal'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'proposal') { echo  'active'; } ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Proposal</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="<?php echo base_url('laporan/sempro'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'sempro') { echo  'active'; } ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Sidang Sempro</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('laporan/skripsi'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'skripsi') { echo  'active'; } ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Sidang Skripsi</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('laporan/kelulusan'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'kelulusan') { echo  'active'; } ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelulusan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('laporan/bebandosen'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'bebandosen') { echo  'active'; } ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Beban Dosen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('laporan/statusmahasiswa'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'statusmahasiswa') { echo  'active'; } ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Status Mahasiswa</p>
              </a>
            </li>
          </ul>
          <?php } ?>
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="<?php echo base_url('password'); ?>" class="nav-link <?php if($this->uri->segment(1) == 'password') { echo  'active'; } ?>">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard/logout'); ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  