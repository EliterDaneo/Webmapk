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

	
	<section class="content">
      <div class="container-fluid">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $title?></h3>
              </div>
							<!-- /.card-header -->
							<div class="panel-body">
								<?php echo form_open_multipart('admin/tambahBerita'); ?>	
								<form role="form">
									<div class="card-body">	
										<div class="form-group">
											<label>Judul Berita</label>
											<input class="form-control" type="text" name="judul_berita" placeholder="Judul Berita" required>
										</div>
										<div class="form-group">
											<label>Foto Berita</label>
											<input class="form-control" type="file" name="gambar_berita" placeholder="Foto Berita" required>
										</div>
										<div class="form-group">
											<label>Isi Berita</label>
											<textarea id="editor" type="text" name="isi_berita" placeholder="Isi Berita" required></textarea>
										</div>
										<div class="form-group" type="text-center">
											<button type="submit" class="btn btn-primary">Simpan</button>
											<a href="<?= base_url('admin/pengaturanBerita')?>" class="btn btn-danger">Kembali</a>
										</div>
										<?php echo form_close(); ?>		
									</div>
								</form>
								</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
