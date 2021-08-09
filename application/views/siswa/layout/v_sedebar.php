 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
 	<!-- Brand Logo -->
 	<a href="<?= base_url('admin')?>" class="brand-link">
 		<img src="<?= base_url()?>assets/data/foto/logo/logo.png"
 		alt="AdminLTE Logo"
 		class="brand-image img-circle elevation-3"
 		style="opacity: .8">
 		<span class="brand-text font-weight-light"><? ?></span>
 	</a>

 	<!-- Sidebar -->
   <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="card-body box-profile">
     <div class="text-center">
      <?php if(file_exists(FCPATH . './assets/data/foto/user/img/siswa/'.$user->foto_user) || $user->foto_user !== 'default.jpg') : ?>
       <img class="profile-user-img img-fluid img-circle"
       src="<?= base_url('assets/data/foto/user/img/siswa/'.$user->foto_user)?>"
       alt="User profile picture">
       <?php else :?>
         <img class="profile-user-img img-fluid img-circle"
         src="<?= base_url('assets/data/foto/user/img/siswa/default.jpg')?>"
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
              <a href="<?= base_url('siswa')?>" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
               <i class="nav-icon fas fa-cogs"></i>
               <p>
                Pengaturan Nilai
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <a href="<?= base_url('siswa/allNilai') ;?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lihat Semua Nilai</p>
              </a>
            </li>
          </ul>
        </li>
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
