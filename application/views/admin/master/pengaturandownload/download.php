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
 	<!-- Main content -->
	 <section class="content ">
		<div class="container-fluid">
			<!-- Default box -->
			<div class="card card-outline card-info">
				<div class="card-header">
              <a href="<?=base_url('admin/tambahDownload')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="myTable" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama File</th>
                    <th>Keterangan File</th>
                    <th>File</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($download as $key => $value) { ?>
                    <tr>
                     <td><?= $no++ ?></td>
                     <td><?= $value->nama_file ?></td>
                     <td><?= $value->ket_file ?></td>
                     <td><?= $value->file ?></td>
                     <td>
                      <a href="<?= base_url('admin/editDownload/'.$value->id_file) ?>" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                      <a href="<?= base_url('admin/deleteDownload/' .$value->id_file) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus?')" style="margin-right:2px; height: 30px; width: 30px;" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
					</section>
	<!-- /.content -->
</div>
