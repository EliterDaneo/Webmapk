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

								<?php echo form_open_multipart('admin/editKelas/'.$kelas->id_kelas); ?>	 

								<!-- form-group -->
								<form role="form">
									<div class="card-body">
										<div class="form-group">
											<label>Jenis Kelas</label>
											<input class="form-control" type="text" name="nama_kelas" placeholder="Nama Kelas" value="<?= $kelas->jenis_kelas ?>" readonly>
										</div>
										<!-- /.form-group -->

										<!-- form-group -->
										<div class="form-group">
											<label>Nama Kelas</label>
											<input class="form-control" type="text" name="nama_kelas" placeholder="Nama Kelas" value="<?= $kelas->nama_kelas ?>" readonly>
										</div>
										<!-- /.form-group -->

										<!-- form-group -->
										<div class="form-group">
											<label>Total Siswa</label>
											<input class="form-control" type="text" name="total_siswa" placeholder="Total Siswa" value="<?= $kelas->total_siswa ?>" required>
										</div>
										<!-- /.form-group -->

										<!-- form-group -->
										<div class="form-group">
											<label>Wali Kelas</label>
											<select name="wali_kelas" class="form-control">
												<?php foreach ($guru as $key => $value) { ?>
													<option value="<?= $value->id_guru ?>"><?= $value->nama_guru ?></option>
												<?php } ?>
											</select>
										</div>
										<!-- /.form-group -->

										<div class="form-group text-right">
											<a class="btn btn-danger btn-sm" href="<?= base_url('admin/tambahKelas');?>"><i class="fa fa-undo"></i>&ensp;Reset</a>
											<button type="submit" class="btn btn-primary btn-sm ">Submit &ensp;<i class="fas fa-arrow-right"></i></button>
										</div> 
									</div>
								</form>

								<?php echo form_close(); ?>  

							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.Container Fluid -->
				</section>
				<!-- /.content -->


			</div>
