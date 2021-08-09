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
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" id="notif" data-toggle="dropdown" href="#" >
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge count"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

					</div>
				</li>
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#logOutModal" data-backdrop="static" data-keyboard="true" title="Logout">
						<i class="fas fa-sign-out-alt"></i>

						<text>Logout</text>

					</a>
				</li>
			</ul>
		</nav>

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
