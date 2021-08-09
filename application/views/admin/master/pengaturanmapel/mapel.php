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
					<a data-toggle="modal" data-target="#tambahMapel" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah Data</a>
				</div>
				<div class="card-body">

					<table id="myTable" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Mata Pelajaran</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($mapel as $key => $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->nama_mapel ?></td>
									<!-- <td>
										<button class="btn btn-sm btn-info" class="btn btn-success" style="margin-right:2px; height: 30px; width: 30px;" data-toggle="modal" data-target="#detail<?= $value->id_mapel ?>"><i title="Detail"><i class="fa fa-info"></i>
										</button>
										<button class="btn btn-sm btn-warning" class="btn btn-warning" style="margin-right:2px; height: 30px; width: 30px;" data-toggle="modal" data-target="#edit<?= $value->id_mapel ?>"><i title="Edit"><i class="fa fa-edit"></i>
										</button>
										<a class="btn btn-sm btn-danger" style="margin-right:2px; height: 30px; width: 30px;" href="<?= base_url('admin/deleteMapel/' .$value->id_mapel) ?>" onclick="deletedata('Apakah Data Ini Akan Dihapus?')" class="btn btn-danger"><i title="Delete"><i class="fa fa-trash"></i></a>
									</td> -->
									<td>
										<a style="margin-right:10px" href="#" data-toggle="modal" data-target="#detailMapel<?= $value->id_mapel?>" title="Detail"><i class="fas fa-info-circle text-info"></i></a>
										<a style="margin-right:10px" href="#" data-toggle="modal" data-target="#editMapel<?= $value->id_mapel?>"  title="Edit"><i class="fas fa-edit text-warning"></i></a>
										<a href="#" data-toggle="modal" data-target="#deleteMapel<?= $value->id_mapel ?>" title="Delete"><i class="fas fa-trash text-danger"></i></a>
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

		<!-- Modal Add-->
		<div class="modal fade" id="tambahMapel">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header card-outline card-primary">
					<h5 class="modal-title">Tambah MataPelajaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php echo form_open('admin/tambahMapel'); ?>
					<div class="modal-body">
					<div class="form-group">
						<label>Nama Mapel</label>
						<input type="text" name="nama_mapel" class="form-control" placeholder="Nama Mapel">
					</div>
					</div>
					<div class="modal-footer justify-content-between">
					<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary btn-sm"><i class="fas fa-times"></i>&ensp;Close</button>
					<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&ensp;Add</button>
					</div>
					<?php echo form_close(); ?>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->

		<!-- ROle Detail Modal -->
		<?php $i=0; foreach($mapel as $value) : $i++; ?>
			<div class="modal fade" id="detailMapel<?= $value->id_mapel?>">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header card-outline card-info">
					<h5 class="modal-title">Detail Mapel "<?= $value->nama_mapel;?>"</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form>
					<div class="modal-body">
					<div class="form-group">
						<label id="detailRoleName">Nama Mapel</label>
						<input type="text" disabled class="form-control" for="detailRoleName" placeholder="Role Name" value="<?= $value->nama_mapel;?>">
					</div>
					</div>
					<div class="modal-footer" style='clear:both'>
					<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary btn-sm"><i class="fas fa-times"></i>&ensp;Close</button>
					</div>
					<?php echo form_close(); ?>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
			</div>
		<?php endforeach; ?>
		<!-- /.modal -->

		<!-- Role Edit Modal -->
		<?php $i=0; foreach($mapel as $value) : $i++; ?>
		<div class="modal fade" id="editMapel<?= $value->id_mapel?>">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header card-outline card-warning">
				<h5 class="modal-title">Edit Mapel "<?= $value->nama_mapel;?>"</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<?php echo form_open('admin/editMapel/'.$value->id_mapel); ?>
				<div class="modal-body">

					<input type="hidden" readonly value="<?= $value->id_mapel ;?>" name="b" class="form-control" >

					<div class="form-group">
					<label id="editRoleName">Nama Mapel</label>
					<input type="text" name="nama_mapel" class="form-control" for="editRoleName" placeholder="Role Name" value="<?= $value->nama_mapel;?>" required>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary btn-sm"><i class="fas fa-times"></i>&ensp;Close</button>
					<button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>&ensp;Update</button>
				</div>
				</form>
			</div>
			<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<?php endforeach; ?>
		<!-- /.modal -->

		<!-- Barang Hapus Modal-->
		<?php $i=0; foreach($mapel as $value) :  $i++;?>
		<div class="modal fade" id="deleteMapel<?php echo $value->id_mapel;?>">
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
				<a class="btn btn-danger btn-sm" href="<?= base_url('admin/deleteMapel/' .$value->id_mapel) ?>"><i class="fas fa-trash"></i>&ensp;Hapus</a>
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
