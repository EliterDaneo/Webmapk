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
								<?php echo form_open_multipart('admin/editSiswa/'.$siswa->id_siswa); ?>	   
								<!-- form start -->
								<form role="form">
									<div class="card-body">
										<div class="form-group">
											<label>NIS</label>
											<input class="form-control" type="text" value="<?= $siswa->nis ?>" name="nis" placeholder="NIP" required>
										</div>
										<div class="form-group">
											<label>Nama Siswa</label>
											<input class="form-control" type="text" value="<?= $siswa->nama_siswa ?>" name="nama_siswa" placeholder="Nama siswa" required>
										</div>
										<div class="form-group">
											<label>Tempat Lahir</label>
											<input class="form-control" type="text" value="<?= $siswa->tempat_lahir ?>" name="tempat_lahir" placeholder="Tempat Lahir" required>
										</div>
										<div class="form-group">
											<label>Tanggal Lahir</label>
											<input class="form-control" type="text" value="<?= $siswa->tanggal_lahir ?>" name="tanggal_lahir" id="tanggal" placeholder="tanggal Lahir" required>
										</div>
										<div class="form-group">
											<label>Jenis Pendidikan</label>
											<select name="kelas" class="form-control">
												<option value="<?= $siswa->kelas ?>"><?= $siswa->kelas ?></option>
												<option value="">----Pilih Kelas----</option>
												<option value="Kelas-x-IPA">Kelas-x-IPA</option>
												<option value="Kelas-x-IPS">Kelas-x-IPS</option>
												<option value="Kelas-x-AKUNTANSI">Kelas-x-AKUNTANSI</option>
												<option value="Kelas-xi-IPA">Kelas-xi-IPA</option>
												<option value="Kelas-xi-IPS">Kelas-xi-IPS</option>
												<option value="Kelas-xi-AKUNTANSI">Kelas-xi-AKUNTANSI</option>
												<option value="Kelas-xi-IPA">Kelas-xi-IPA</option>
												<option value="Kelas-xi-IPS">Kelas-xi-IPS</option>
												<option value="Kelas-xi-AKUNTANSI">Kelas-xi-AKUNTANSI</option>
											</select>
										</div>
										<div class="form-group">
											<img src="<?= base_url('./assets/data/foto/user/img/siswa/'.$siswa->foto_siswa) ?>" width="150px">
										</div>
										<div class="form-group">
											<label>Ganti Foto</label>
											<input class="form-control" type="file" name="foto_siswa" placeholder="Foto Siswa">
										</div>
										<!-- /.card-body -->

										<div class="card-footer">
											<div class="form-group" type="text-center">
												<button type="submit" class="btn btn-primary">Simpan</button>
												<button type="reset" class="btn btn-success">Reset</button>
												<a href="<?= base_url('admin/pengaturanSiswa')?>"  class="btn btn-danger">Kembali</a>
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
