<!-- Start header -->
	<header class="top-navbar">
	<?php echo $this->session->flashdata('pesan'); ?>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo-hosting.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="<?= base_url('home') ?>">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('home/galery') ?>">Galery</a></li>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('home/download') ?>">Download </a></li>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('home/berita') ?>">Berita </a></li>
						<li class="nav-item"><a class="nav-link" href="features.html">Tentang </a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Sekolah </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="<?= base_url('home/guru') ?>">Guru </a>
								<a class="dropdown-item" href="hosting.html">WordPress Hosting </a>
								<a class="dropdown-item" href="hosting.html">Cloud Server </a>
								<a class="dropdown-item" href="hosting.html">Reseller Package </a>
								<a class="dropdown-item" href="hosting.html">Dedicated Hosting </a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>">Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
