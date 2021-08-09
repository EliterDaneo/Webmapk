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
		<div class="card-body">
			<div class="form-group">
				<label for="EditSiswaNama">Nama Mapel</label>
				<select class="form-control">
				<?php foreach($mapel as $value) : ?>
					<?php if($value->id_mapel == $editNilai->id_mapel) :?>
						<option selected><?= $value->nama_mapel?></option>
					<?php else :?>
						<option><?= $value->nama_mapel?></option>
					<?php endif;?>
				<?php endforeach;?>
				</select>
			</div>
		</div>
		<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.Container Fluid -->
	</section>
	<!-- /.content -->
</div>
