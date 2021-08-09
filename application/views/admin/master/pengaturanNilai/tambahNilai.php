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
			<?php 
			
			if (isset($error_upload)) {
				echo '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</di>';
			}

			echo validation_errors('<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</di>');
			
			?>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title"><?= $title .' / '. str_replace("guru","", $this->session->userdata('username')) ?></h3>
							</div>
							<!-- /.card-header -->
							<div class="panel-body">
								<?php echo form_open_multipart('Admin/tambahNilai');?>	
								<form role="form">
									<div class="card-body">	
										<div class="form-group">
											<label>Nama Mapel</label>
											<input class="form-control" value="<?= $mapelList->id_mapel?>" type="hidden" name="id_mapel" placeholder="Nilai" readonly></input>
											<input class="form-control" value="<?= $mapel->nama_mapel?>" type="text" placeholder="Nilai" readonly></input>
										</div>
										<div class="form-group">
											<label>Nama Siswa</label>
											<select name="nis" class="form-control">

												<?php foreach ($siswa as $key => $value) { ?>
													<option value="<?= $value->nis ?>"><?= $value->nis .' --- '. $value->nama_siswa ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label>Nama Kelas</label>
											<select name="id_kelas" class="form-control">

												<?php foreach ($kelas as $key => $value) { ?>
													<option value="<?= $value->id_kelas ?>"><?= $value->jenis_kelas .' -- '.$value->nama_kelas ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label>Nilai</label>
											<input class="form-control" type="text" name="nilai" placeholder="Nilai" required></input>
										</div>
										<div class="form-group" type="text-center">
											<button type="submit" class="btn btn-primary">Simpan</button>
											<a href="<?= base_url('admin/pengaturanBerita')?>" class="btn btn-danger">Kembali</a>
										</div>
										<?php echo form_close(); ?>		
									</div>
								</form>
