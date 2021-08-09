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
            <a href="<?=base_url('admin/tambahpengumuman')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="myTable" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Pengumuman</th>
                        <th>Isi Pengumuman</th>
                        <th>Tanggal Di Terbitkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($pengumuman as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->judul_pengumuman ?></td>
                            <td><?= $value->isi_pengumuman ?></td>
                            <td><?= $value->tanggal_pengumuman ?></td>
                            <td>
                                <a href="<?= base_url('admin/editPengumuman/'.$value->id_pengumuman) ?>" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('admin/deletePengumuman/' .$value->id_pengumuman) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus?')" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
		</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

