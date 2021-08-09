 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
 	<!-- Brand Logo -->
 	<a href="<?= base_url('admin')?>" class="brand-link">
 		<img src="<?= base_url()?>assets/back-end/dist/img/AdminLTELogo.png"
 		alt="AdminLTE Logo"
 		class="brand-image img-circle elevation-3"
 		style="opacity: .8">
 		<span class="brand-text font-weight-light"><?= $title ?></span>
 	</a>

  <!-- Sidebar -->
  <div class="sidebar">
   <!-- Sidebar user (optional) -->
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


 <!-- Sidebar Menu -->
 <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-header">Main Navigation</li>
           <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url('admin')?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-header">Website Navigation</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-compact-disc"></i>
              <p>
                Data Master Website
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Admin/pengaturanGalery') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Admin/pengaturanPengumuman') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengumuman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Admin/pengaturanBerita') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaturan Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Admin/pengaturanDownload') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaturan Download</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">School Navigation</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-digital-tachograph"></i>
              <p>
                Data Master Sekolah
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Admin/pengaturanGuru') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Admin/pengaturanSiswa') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Admin/pengaturanMapel') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mata Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Admin/pengaturanKelas') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
							<li class="nav-item">
                <a href="<?= base_url('Admin/dashboardNilai') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nilai</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Settings Navigation</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Setings
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Admin/pengaturanWebsite') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Website</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Admin/pengaturanPengguna') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#logOutModal">
              <i class="nav-icon fa-fw fas fa-sign-out-alt"></i>
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
