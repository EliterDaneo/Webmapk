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
	</section>


	<!-- Main content -->
	<section class="content ">
		<div class="container-fluid">
			<!-- Default box -->
			<div class="card card-outline card-info">
			<div class="card-header">
				<h4 class="card-title " text-align="center"><strong><?= $title; ?></strong></h4>
				<a class="btn btn-secondary btn-sm float-right" href="<?php echo base_url('Guru/listSiswa');?>">
				<i class="fas fa-arrow-left"></i>&ensp;Back
				</a>
			</div>
			<form action="<?=base_url('guru/editNilai/'. $editNilai->id_nilai)?>" method="POST">
			<div class="card-body">
					<div class="form-group">
						<label for="EditSiswaNama">Nama Mapel <?= $editNilai->id_mapel?></label>
						<?php if($mapel == NULL) :?>
							<input class="form-control" type="text" name="id_mapel" value="Mapel telah Dihapus" placeholder="Nilai" required readonly></input>
						<?php else: ?>
							<input class="form-control" type="hidden" value=<?= $mapel->id_mapel?> name="id_mapel" placeholder="Nilai" required readonly></input>
							<input class="form-control" type="text" value=<?= $mapel->nama_mapel?> placeholder="Nilai" required readonly></input>
						<?php endif;?>
					</div>
					<div class="form-group">
						<label for="EditSiswaNama">Nama Siswa</label>
						<select class="form-control" name="nis">
						<?php foreach($siswa as $value) : ?>
							<?php if($value->nis == $editNilai->nis) :?>
								<option value="<?= $value->nis?>" selected><?= $value->nis.' -- '.$value->nama_siswa?></option>
							<?php else :?>
								<option value="<?= $value->nis?>"><?= $value->nis.' -- '.$value->nama_siswa?></option>
							<?php endif;?>
						<?php endforeach;?>
						</select>
					</div>
					<div class="form-group">
						<label for="EditSiswaNama">Nama Kelas</label>
						<select class="form-control" name="id_kelas">
						<?php foreach($kelas as $value) : ?>
							<?php if($value->nis == $editNilai->id_kelas) :?>
								<option value="<?= $value->id_kelas?>" selected><?= $value->id_kelas.' -- '.$value->nama_kelas?></option>
							<?php else :?>
								<option value="<?= $value->id_kelas?>"><?= $value->id_kelas.' -- '.$value->nama_kelas?></option>
							<?php endif;?>
						<?php endforeach;?>
						</select>
					</div>
					<div class="form-group">
						<label for="EditSiswaNama">Nama Siswa</label>
						<input type="text" name="nilai" value="<?= $editNilai->nilai?>" class="form-control">
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
			</div>
			<!-- /.card -->
			</form>
		</div>
		<!-- /.Container Fluid -->
	</section>
	<!-- /.content -->
</div>
