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
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title"><?= $title ?></h3>
							</div>
							<!-- /.card-header -->
							<div class="panel-body">

								<!-- /.card-body -->
								<?php 

								echo validation_errors('<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

								if (isset($error_upload)) {
									echo '<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
								}

								echo form_open_multipart('admin/editDownload/'.$download->id_file);

								?>	   
								<!-- form start -->
								<form role="form">
									<div class="card-body">
										<div class="form-group">
											<label>Nama File</label>
											<input class="form-control" value="<?= $download->nama_file ?>" type="text" name="nama_file" required>
										</div>
										<div class="form-group">
											<label>Keterangan File</label>
											<input class="form-control" value="<?= $download->ket_file ?>" type="text" name="ket_file" required>
										</div>
										<div class="form-group">
											<label>Ganti File Download</label>
											<input class="form-control" type="file" name="file" placeholder="File Download">
										</div>
										<div class="form-group" type="text-center">
											<button type="submit" class="btn btn-primary">Simpan</button>
											<button type="reset" class="btn btn-success">Reset</button>
											<a href="<?= base_url('download')?>"  class="btn btn-danger">Kembali</a>
										</div>
									</form>
								</div>
								<!-- /.card -->           
								<?php echo form_close(); ?>     
							</div>