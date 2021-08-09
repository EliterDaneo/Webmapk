<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						
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
					<h1><?= $title ?></h1>
				</div>
				<div class="card-body">

					<table id="myTable" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>No</th>
								<th>Nama Guru</th>
								<th>Nama Mapel</th>
								<th>Nama Siswa</th>
								<th>kelas</th>
								<th>Nilai</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($nilai as $key => $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->id_nilai ?></td>
									<td><?= $value->nama_guru ?></td>
									<td><?= $value->nama_mapel ?></td>
									<td><?= $value->nama_siswa ?></td>
									<td><?= $value->nama_kelas ?></td>
									<td><?= $value->nilai ?></td>
									<td>
										<a href="#" data-toggle="modal" data-target="#requestModal<?= $value->id_nilai;?>" title="Request Nilai"><i class="fas fa-arrow-right text-success"></i></a>
										<a href="#" data-toggle="modal" data-target="#deleteNilai<?= $value->id_nilai ?>" title="Delete" <i class="fas fa-trash text-danger"></i></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.Container Fluid -->

		<!-- Logout Modal-->
		<?php $i=0; foreach($nilai as $value) :  $i++;?>
		<div class="modal fade" id="requestModal<?php echo $value->id_nilai;?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header card-outline card-danger">
						<h5 class="modal-title">Nilai Siswa Perlu Di Update</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php echo form_open_multipart('admin/requestNilai'); ?>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label">Siswa</label>
							<input class="form-control" value="<?= $value->nama_siswa ?>" type="text" placeholder="Siswa" readonly></input>
							<input class="form-control" value="<?= $value->id_siswa ?>" type="hidden" name="nis" placeholder="Siswa" readonly></input>
						</div>
						<div class="form-group">
							<label class="col-form-label">Mapel</label>
							<input class="form-control" value="<?= $value->nama_mapel ?>" type="text" name="nama_mapel" placeholder="Mapel" readonly></input>
							<input class="form-control" value="<?= $value->id_nilai ?>" type="hidden" name="id_nilai" placeholder="Mapel" readonly></input>
						</div>
						<div class="form-group">
							<label class="col-form-label">Guru</label>
							<input class="form-control" value="<?= $value->nama_guru ?>" type="text" placeholder="Guru" readonly></input>
							<input class="form-control" value="<?= $value->id_guru ?>" type="hidden" name="id_guru" placeholder="Guru" readonly></input>
						</div>
						<div class="form-group">
							<label class="col-form-label">Keterangan</label>
							<textarea type="text" rows="3" class="form-control" name="keterangan" placeholder="Keterangan" required></textarea>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>&ensp;Close</button>
						<!-- <a class="btn btn-sm btn-danger" href="<?= base_url('admin/requestNilai') ;?>"><i class="fas fa-sign-out-alt"></i>&ensp;Logout</a> -->
						<button type="submit" class="btn btn-sm btn-danger float-right">Simpan</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.Logout Modal-->
<?php endforeach; ?>


<!-- Barang Hapus Modal-->
<?php $i=0; foreach($nilai as $value) :  $i++;?>
<div class="modal fade" id="deleteNilai<?php echo $value->id_nilai;?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h6 class="modal-title">Hapus <?= $title;?> "<?php echo $value->nama_mapel;?>" </h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Pilih "Hapus" dibawah untuk menghapus <?= $title;?> <b><?php echo $value->nama_mapel;?></b>.</p>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i>&ensp;Close</button>
				<a class="btn btn-danger btn-sm" href="<?= base_url('admin/deleteNilai/' .$value->id_nilai) ?>"><i class="fas fa-trash"></i>&ensp;Hapus</a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endforeach; ?>


</section>
<!-- /.content -->
</div>
