    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?= $title ;?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/pengaturanPenggunaAdd')?>"><small><?= $title ;?></small></a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <?php if(validation_errors()) : ?>
            <!-- Row Note -->
            <div class="row">
              <div class="col-12">
                <div class="alert callout callout-info bg-danger" role="alert">
                  <h5><i class="fas fa-info"></i> Note:</h5>
                  <?= validation_errors(); ?>
                </div>
              </div>
              <!--/. Col -->
            </div>
          <?php endif ;?>
          <?php if($this->session->flashdata('message') == TRUE) : ?>
            <!-- Row Note -->
            <div class="row">
              <div class="col-12">
                <div class="alert callout callout-info bg-danger" role="alert">
                  <h5><i class="fas fa-info"></i> Note:</h5>
                  <?= $this->session->flashdata('message'); ?>
                </div>
              </div>
              <!--/. Col -->
            </div>
          <?php endif ;?>             
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a href="<?=base_url('admin/tambahPengguna')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah Data</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <?php 
                  if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                  }
                  ?>

                  <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                        <!-- <th>Foto User</th> -->
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach ($pengguna as $key => $value) { ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $value->nama_user ?></td>
                          <td><?= $value->username ?></td>
                          <td><?= $value->password ?></td>
                          <td><?= $value->level ?></td>
                          <!-- <td> <img src="<?= base_url('assets/data/foto/user/img/guru/'. $value->foto_user) ?>" width="100px"> </td>
                          <td> -->
                            <td>
                              <a href="<?= base_url('admin/pengaturanPenggunaEdit/'.$value->id_user) ?>" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                              <a href="<?= base_url('admin/pengaturanPenggunaDelete/'.$value->id_user) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus?')" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>