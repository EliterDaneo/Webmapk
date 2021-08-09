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
									<?php echo form_open_multipart('admin/tambahFotoGalery/'.$galery->id_galery); ?>	
									<form role="form">
										<div class="card-body">	
											<div class="form-group">
												<label>Keterangan Foto</label>
												<input class="form-control" type="text" name="ket_foto" placeholder="Keterangan Foto" required>
											</div>
											<div class="form-group">
												<label>Foto</label>
												<input class="form-control" type="file" name="foto" placeholder="Foto" required>
											</div>
											<div class="form-group" type="text-center">
												<button type="submit" class="btn btn-primary">Simpan</button>
												<a href="<?= base_url('admin/PengaturanGalery')?>" class="btn btn-success">Kembali</a>
											</div>
											<?php echo form_close(); ?>			
										</div>
									</form>
									<div class="col-12">
										<div class="card card-primary">
											<div class="card-header">
												<div class="card-title">
													List Foto
												</div>
											</div>
											<div class="card-body">
												<div class="row">
													<?php foreach ($foto as $key => $value) { ?>
														<div class="col-sm-2 text-center">
															<label><?= $value->ket_foto ?></label>
															<a href="<?= base_url('assets/data/foto/sampul/foto/'.$value->foto) ?>" data-toggle="lightbox" data-title="<?= $value->ket_foto ?>" data-gallery="gallery">
															<img src="<?= base_url('assets/data/foto/sampul/foto/'.$value->foto) ?>" class="img-fluid mb-2" alt="white sample"/>
															<br>
															<a href="<?= base_url('admin/deleteFoto/'.$value->id_galery. '/' .$value->id_foto)?>" onclick="return confirm('Apakah Data Ini Akan Dihapus?')" class="btn btn-danger btn-xs btn-block"><i class="fa fa-trash"></i></a>
														</div>
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- /.container-fluid -->
							</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

