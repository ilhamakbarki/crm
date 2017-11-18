<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Menu</title>
  <?php $this->load->view('componentlte'); ?>
  <?php $this->load->view('componentjslte'); ?>
  <link rel="stylesheet" href="<?=base_url()?>/assets/lte/dist/css/skins/_all-skins.min.css">
</head>
<body id="loading-template" class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="<?=base_url('admin')?>" class="logo">
        <span class="logo-mini"><b>Menu</b></span>
        <span class="logo-lg"><img src="<?=base_url('assets/img/kusuma.png')?>"></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Loading -->
    <div id="overlay">
      <div id="progstat"></div>
      <div id="progress"></div>
    </div>
    <!-- End Loading -->
    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?=base_url('assets/profile/').'/'.'avatar.png'?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull info">
            <?="Ilham Akbar"?>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN MENU</li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Distributor</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?=base_url('admin/distributor')?>"><i class="fa fa-list"></i>Daftar Distributor</a></li>
              <li><a href="<?=base_url('admin/distributorgroup')?>"><i class="fa fa-users"></i>Level Distributor</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user-circle"></i> <span>Akun Login</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?=base_url('admin/user')?>"><i class="fa fa-list"></i>Daftar Akun</a></li>
              <li><a href="<?=base_url('admin/usergroup')?>"><i class="fa fa-users"></i>Level Akun</a></li>
            </ul>
          </li>
          <li>
            <a href="<?=base_url('admin/admin')?>">
              <i class="fa fa-address-card"></i> <span>Admin</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('admin/item')?>">
              <i class="fa fa-product-hunt"></i> <span>Produk</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('admin/transaction')?>">
              <i class="fa fa-university"></i> <span>Invoice</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-bar-chart"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?=base_url('admin/transactionreport')?>"><i class="fa fa-money"></i>Laporan Invoice</a></li>
              <li><a href="<?=base_url('admin/transactionpayreport')?>"><i class="fa fa-credit-card-alt"></i>Daftar Pembayaran</a></li>
            </ul>
          </li>
          <!-- <li>
            <a href="#">
              <i class="fa fa-product-hunt"></i> <span>Produk</span>
            </a>
          </li> -->
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?=$judul_menu?>
          <small><?=$desk_menu?></small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php $this->load->view($content); ?>
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        Kusuma Group
      </div>
      <strong>Copyright &copy; 2014-2016 Almsaeed Studio.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-user"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane" id="control-sidebar-home-tab">
          <ul class="control-sidebar-menu">
            <li>
              <a href="<?=base_url('admin/profile')?>">
                <i class="menu-icon fa fa-user bg-primary"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Profile</h4>
                </div>
              </a>
            </li>
            <li>
              <a href="<?=base_url('logout')?>">
                <i class="menu-icon fa fa-sign-out bg-primary"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Sign Out</h4>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </aside>
    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<script type="text/javascript">
  $(document).ready(function(e) {
    $('.sidebar-menu').tree();
  });
</script>
</body>
</html>
