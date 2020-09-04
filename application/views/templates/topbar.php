<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><b>Selamat Datang!</b></span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('user')?>" class="dropdown-item">
            <i class="fas fa-user"></i> Profile
            <span class="float-right text-muted text-sm"><?php echo strtoupper($this->session->userdata('name'));  ?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('auth/Logout')?>" class="dropdown-item">
            <i class=""></i><center> Log Out</center>
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->