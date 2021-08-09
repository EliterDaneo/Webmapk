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
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<a href="<?=base_url('admin/tambahKelas')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah Data</a>
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
										<th>Kelas</th>
										<th>Nama kelas</th>
										<th>Jumlah Siswa</th>
										<th>Wali Siswa</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($kelas as $key => $value) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->jenis_kelas ?></td>
											<td><?= $value->nama_kelas ?></td>
											<td><?= $value->total_siswa ?></td>
											<td><?= $value->nama_guru ?></td>
											<td>
												<a href="<?= base_url('admin/editKelas/'.$value->id_kelas) ?>" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
												<a href="<?= base_url('admin/deleteKelas/' .$value->id_kelas) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus?')" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>