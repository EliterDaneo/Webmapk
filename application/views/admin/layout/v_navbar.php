<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <div class="user-panel pb-3 mb-5 d-flex">
              <div class="image">
								<?php if(file_exists(FCPATH . './assets/data/foto/user/img/admin/'.$user->foto_user) || $user->foto_user !== 'default.jpg') : ?>
									<img class="img-circle elevation-2"
									src="<?= base_url('assets/data/foto/user/img/admin/'.$user->foto_user)?>"
									alt="User profile picture">
								<?php else :?>
									<img class="img-circle elevation-2"
									src="<?= base_url('assets/data/foto/user/img/admin/default.jpg')?>"
									alt="User profile picture">
								<?php endif;?>
              </div>
            </div>
            <!-- <span class="d-none d-md-inline"><?= $this->session->userdata('username');?></span> -->
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-info">
              <div class="card-body box-profile">
                <div class="text-center">
								<?php if(file_exists(FCPATH . './assets/data/foto/user/img/admin/'.$user->foto_user) || $user->foto_user !== 'default.jpg') : ?>
									<img class="profile-user-img img-fluid img-circle"
									src="<?= base_url('assets/data/foto/user/img/admin/'.$user->foto_user)?>"
									alt="User profile picture">
								<?php else :?>
									<img class="profile-user-img img-fluid img-circle"
									src="<?= base_url('assets/data/foto/user/img/admin/default.jpg')?>"
									alt="User profile picture">
								<?php endif;?>
                </div>
                <h3 class="profile-username text-center text-white"></h3>
                <p class="text-muted text-center"></p>
              </div>
              <p>
                <!-- <?= $this->session->userdata('username');?>
                <small> <?= $this->session->userdata('level');?></small> -->
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="<?= base_url('Admin/profile')?>" class="btn btn-info btn-sm"><i class="fas fa-user"></i>&ensp;Profile</a>
              <a href="#" class="btn btn-danger float-right btn-sm" data-toggle="modal" data-target="#logOutModal" data-backdrop="static" data-keyboard="true"><i class="fas fa-sign-out-alt"></i>&ensp;Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->


    <!-- Logout Modal-->
    <div class="modal fade" id="logOutModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header card-outline">
            <h5 class="modal-title">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Select "Logout" below if you are ready to end your current session.</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>&ensp;Close</button>
            <a class="btn btn-sm btn-danger" href="<?= base_url('login/logout') ;?>"><i class="fas fa-sign-out-alt"></i>&ensp;Logout</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
