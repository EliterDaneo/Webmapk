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
							<?php echo form_open_multipart('admin/editGalery/'.$galery->id_galery); ?>		
							<form role="form">
								<div class="card-body">	
									<div class="form-group">
										<label>Nama Galery</label>
										<input class="form-control" value="<?= $galery->nama_galery ?>" type="text" name="nama_galery" required>
									</div>

									<div class="form-group">
										<img src="<?= base_url('assets/data/foto/sampul/'.$galery->sampul) ?>" width="300px">
									</div>
									<div class="form-group">
										<label>Ganti Sampul Berita</label>
										<input class="form-control" type="file" name="sampul" placeholder="Foto Sampul">
									</div>
									<div class="form-group" type="text-center">
										<button type="submit" class="btn btn-primary">Simpan</button>
										<button type="reset" class="btn btn-success">Reset</button>
									</div>
									<?php echo form_close(); ?>			
								</div>
							</form>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
