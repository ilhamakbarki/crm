<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equsiv="X-UA-Compatible" content="IE=edge">
  <title>Distributor Menu</title>
  <?php $this->load->view('componentlte'); ?>
  <?php $this->load->view('componentjslte'); ?>
  
  <link rel="stylesheet" href="<?=base_url()?>/assets/lte/dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="<?=base_url('distributor')?>" class="logo">
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
            <img src="<?=base_url('assets/profile/').'/'.'distributor.png'?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull info">
            <p><?="Nama Distributor"?></p>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN MENU</li>
          <li>
            <a href="<?=base_url('distributor/item')?>">
              <i class="fa fa-archive"></i> <span>Barang</span>
            </a>
          </li>
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
      Copyright &copy; 2014-2016 Almsaeed Studio. All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane" id="control-sidebar-home-tab">
          <ul class="control-sidebar-menu">
            <li>
              <a href="<?=base_url('distributor/profile')?>">
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
