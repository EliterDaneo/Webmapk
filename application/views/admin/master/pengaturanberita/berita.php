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
		<section class="content ">
		<div class="container-fluid">
			<!-- Default box -->
			<div class="card card-outline card-info">
				<div class="card-header">
								<a href="<?=base_url('admin/tambahBerita')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah Data</a>
							</div>
							<!-- /.card-header -->
							<div class="panel-body">
								<?php 
								if ($this->session->flashdata('pesan')) {
									echo '<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
									echo $this->session->flashdata('pesan');
									echo '</div>';
								}
								?>

								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th>No</th>
											<th>Judul Berita</th>
											<th>Slug Berita</th>
											<th>Gambar Berita</th>
											<th>tanggal_berita</th>
											<th>User ID</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($berita as $key => $value) { ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->judul_berita ?></td>
												<td><?= $value->slug_berita ?></td>
												<td><img src="<?= base_url('assets/data/foto/gambar_berita/'. $value->gambar_berita) ?>" width="100px"></td>
												<td><?= $value->tanggal_berita ?></td>
												<td><?= $value->nama_user ?></td>
												<td>
													<a href="<?= base_url('admin/editBerita/'.$value->id_berita) ?>" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
													<a href="<?= base_url('admin/deleteBerita/' .$value->id_berita) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus?')" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
								</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

								