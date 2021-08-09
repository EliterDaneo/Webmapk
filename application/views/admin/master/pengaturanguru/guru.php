<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title1 ?></h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title1 ?></li>
          </ol>
      </div>
  </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="<?=base_url('admin/tambahGuru')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah Data</a>
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
                        <th>NIK</th>
                        <th>Nama Guru</th>
                        <th>Tanggal Lahir</th>
                        <th>Mapel</th>
                        <th>Pendidikan</th>
                        <th>Foto Guru</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($guru as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nik ?></td>
                            <td><?= $value->nama_guru ?></td>
                            <td><?= $value->tanggal_lahir ?></td>
                            <td><?= $value->nama_mapel ?></td>
                            <td><?= $value->pendidikan ?></td>
                            <td> <img src="<?= base_url('assets/data/foto/user/img/guru/'. $value->foto_guru) ?>" width="100px"> </td>
                            <td>
                                <a href="<?= base_url('admin/editGuru/'.$value->id_guru) ?>" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('admin/deleteGuru/' .$value->id_mapel) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus?')" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>