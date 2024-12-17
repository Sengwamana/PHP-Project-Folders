<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bookstore System CI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontastic.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page"">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="#" class="navbar-brand">
                  <div class="brand-text brand-big"><span>Bookstore System</span></div>
                  <div class="brand-text brand-small">Bookstore System</div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item"><a href="<?php echo base_url('index.php/admin/logout') ?>" class="nav-link logout">Logout<i class="fa fa-power-off"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo base_url(); ?>assets/img/user-icn-min.png" alt="User Icon" class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4"><?= $this->session->userdata('nama_user') ?></h1>
              <p><?= $this->session->userdata('level') ?></p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Navigation</span>
          <ul class="list-unstyled">
            <li>
                <a class="active" href="<?php echo base_url('index.php/dashboard');?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a></li>
                <?php 
                    if ($this->session->userdata('level') == 'admin') {
                        echo'
                        
                          <li>
                              <a href="'.base_url('index.php/Kategori').'">
                                  <i class="fa fa-bookmark"></i>
                                  <span>Books Category</span>
                              </a>
                          </li>
                          <li>
                            <a href="'.base_url('index.php/buku').'">
                                <i class="fa fa-book"></i>
                                <span>Books Section </span>
                            </a>
                        </li>
                          <li>
                            <a href="'.base_url('index.php/transaksi').'">
                                <i class="fa fa-dollar"></i>
                                <span>Manage Sales</span>
                            </a>
                          </li>
                          <li>
                            <a href="'.base_url('index.php/riwayat').'">
                                <i class="fa fa-history"></i>
                                <span>Transaction History</span>
                            </a>
                          </li>
                          
                          <li>
                            <a href="'.base_url('index.php/user').'">
                                <i class="fa fa-user-secret"></i>
                                <span>User Management</span>
                            </a>
                          </li>';
                              } elseif ($this->session->userdata('level') == 'cashier') {
                                 echo'<li>
                              <a href="'.base_url('index.php/transaksi').'">
                                  <i class="fa fa-dollar"></i>
                                  <span>Manage Sales</span>
                              </a>
                          </li>';                            
                    }
                ?>
          </ul>
        </nav>
        <div class="content-inner">
            <?php

                $this->load->view($konten);

            ?>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="<?php echo base_url(); ?>assets/js/front.js"></script>
  </body>
</html>