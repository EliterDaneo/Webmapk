<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $title ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?= $title ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
		<?php echo $this->session->flashdata('pesan'); ?>
	 	<?php if(validation_errors()) : ?>
			<div class="alert alert-danger" role="alert">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif?>
	</section>

		<!-- Main content -->
		<section class="content ">
		<div class="container-fluid">
			<!-- Default box -->
			<div class="card card-outline card-info">
				<div class="card-header">
				<a href="<?=base_url('admin/tambahSiswa')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah Data</a>
				</div>
				<div class="card-body">

				<table id="myTable" class="table table-striped table-bordered table-hover">
				<thead>
				  <tr>
					<th>No</th>
					<th>NIS</th>
					<th>Nama Siswa</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>Kelas</th>
					<th>wali_siswa</th>
					<th>Foto Siswa</th>
					<th>Aksi</th>
				  </tr>
				</thead>
				<tbody>
				  <?php $no=1; foreach ($siswa as $key => $value) { ?>
					<tr>
					 <td><?= $no++ ?></td>
					 <td><?= $value->nis ?></td>
					 <td><?= $value->nama_siswa ?></td>
					 <td><?= $value->tempat_lahir ?></td>
					 <td><?= $value->tanggal_lahir ?></td>
					 <td><?= $value->jenis_kelas .' '. $value->nama_kelas ?></td>
					 <td><?= $value->wali_siswa ?></td>
					 <td> <img src="<?= base_url('./assets/data/foto/user/img/siswa/'. $value->foto_siswa) ?>" width="100px"> </td>
					 <td>
					  <a href="<?= base_url('admin/editSiswa/'.$value->id_siswa) ?>" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
					  <a href="#" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#siswaDeleteModal<?= $value->id_siswa;?>"><i class="fa fa-trash"></i></a>
					</td>
				  </tr>
				<?php } ?>
			  </tbody>
			</table>

				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.Container Fluid -->

		<!-- Barang Hapus Modal-->
		<?php $i=0; foreach($siswa as $value) :  $i++;?>
		<div class="modal fade" id="siswaDeleteModal<?php echo $value->id_siswa;?>">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header bg-danger">
				<h6 class="modal-title">Hapus <?= $title;?> "<?php echo $value->nama_siswa;?>" </h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Pilih "Hapus" dibawah untuk menghapus <?= $title;?> <b><?php echo $value->nama_siswa;?></b>.</p>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i>&ensp;Close</button>
				<a class="btn btn-danger btn-sm" href="<?= base_url('admin/deleteSiswa/' .$value->id_siswa) ?>"><i class="fas fa-trash"></i>&ensp;Hapus</a>
			</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
	<?php endforeach; ?>

	</section>
	<!-- /.content -->
</div>
