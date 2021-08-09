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
	<section class="content">
      <div class="container-fluid">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $title?></h3>
              </div>

								<!-- /.card-body -->
								<?php echo form_open_multipart('admin/editGuru/'.$guru->id_guru); ?>	   
								<!-- form start -->
								<form role="form">
									<div class="card-body">
										<div class="form-group">
											<label>NIK</label>
											<input class="form-control" type="text" name="nik" placeholder="NIK" value="<?= $guru->nik ?>" required>
										</div>
										<div class="form-group">
											<label>Nama guru</label>
											<input class="form-control" type="text" name="nama_guru" placeholder="Nama Guru" value="<?= $guru->nama_guru ?>" required>
										</div>
										<div class="form-group">
											<label>Tempat Lahir</label>
											<input class="form-control" type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= $guru->tempat_lahir ?>" required>
										</div>
										<div class="form-group">
											<label>Tanggal Lahir</label>
											<input class="form-control" type="text" name="tanggal_lahir" id="tanggal" placeholder="tanggal Lahir" value="<?= $guru->tanggal_lahir ?>" required>
										</div>
										<div class="form-group">
											<label>Mata Pelajaran</label>
											<select name="id_mapel" class="form-control">
												<option value="<?= $guru->id_mapel ?>"><?= $guru->nama_mapel ?></option>
												<?php foreach ($mapel as $key => $value) { ?>
													<option value="<?= $value->id_mapel ?>"><?= $value->nama_mapel ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label>Jenis Pendidikan</label>
											<select name="pendidikan" class="form-control">
												<option value="<?= $guru->pendidikan ?>"><?= $guru->pendidikan ?></option>
												<option value="D3">D3</option>
												<option value="D4">D4</option>
												<option value="S1">S1</option>
												<option value="S2">S2</option>
												<option value="s3">S3</option>
											</select>
										</div>
										<div class="form-group">
											<img src="<?= base_url('assets/data/foto/user/img/guru/'.$guru->foto_guru) ?>" width="150px">
										</div>
										<div class="form-group">
											<label>Ganti Foto</label>
											<input class="form-control" type="file" name="foto_guru" placeholder="Foto Guru">
										</div>
										<!-- /.card-body -->

										<div class="card-footer">
											<div class="form-group" type="text-center">
												<button type="submit" class="btn btn-primary">Simpan</button>
												<button type="reset" class="btn btn-success">Reset</button>
												<a href="<?= base_url('admin/pengaturanGuru')?>"  class="btn btn-danger">Kembali</a>
											</div>
										</div>
									</form>
								</div>
								<!-- /.card -->           
								<?php echo form_close(); ?>     
							</div>
							</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
