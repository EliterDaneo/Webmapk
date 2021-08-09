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
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo form_open_multipart('admin/tambahSiswa'); ?>
                <div class="card-body">
					<div class="form-group">
						<label>NIS</label>
						<input class="form-control" type="text" name="nis" placeholder="NIS" required>
					</div>
					<div class="form-group">
						<label>Nama Siswa</label>
						<input class="form-control" type="text" name="nama_siswa" placeholder="Nama siswa" required>
					</div>
					<div class="form-group">
						<label>Tempat Lahir</label>
						<input class="form-control" type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input class="form-control" type="text" name="tanggal_lahir" id="tanggal" placeholder="tanggal Lahir" required>
					</div>
					<div class="form-group">
						<label for="addSiswaWali">Orang Tua / Wali</label>
						<input class="form-control" type="text" name="wali_siswa" placeholder="Nama Wali" required>
					</div>
					<div class="form-group">
						<label>Nomor  HP</label>
						<input class="form-control" type="text" name="hp" placeholder="Nomor HP" required>
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>Alamat</label>
						<input class="form-control" type="text" name="alamat" placeholder="Alamat Rumah" required>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label>Kategori Kelas</label>
							<select name="id_kelas" class="form-control">
								<option value="">----Pilih Jenis kelas----</option>
								<?php foreach ($kelas as $key => $value) { ?>
									<option value="<?= $value->id_kelas ?>"><?= $value->jenis_kelas.' / '. $value->nama_kelas ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label>Foto Siswa</label>
							<input type="file" class="form-control" type="text" name="foto_siswa">
						</div>
					</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
					<div class="form-group" type="text-center">
						<a href="<?= base_url('admin/pengaturanSiswa')?>"  class="btn btn-danger">Kembali</a>
						<button type="reset" class="btn btn-success">Reset</button>
						<button type="submit" class="btn btn-primary float-right">Simpan</button>
					</div>
                </div>
              </form>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
