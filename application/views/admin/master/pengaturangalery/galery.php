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

	<section class="content ">
		<div class="container-fluid">
			<!-- Default box -->
			<div class="card card-outline card-info">
				<div class="card-header">
              <a href="<?=base_url('admin/tambahGalery')?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <?php 
              if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
              }
              ?>

              <table id="myTable" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                   <th>No</th>
                   <th>Nama Galery</th>
                   <th>Sampul</th>
                   <th>Aksi</th>
                 </tr>
               </thead>
               <tbody>
                <?php $no=1; foreach ($galery as $key => $value) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nama_galery ?></td>
                    <td class="text-center">
                      <img src="<?= base_url('assets/data/foto/sampul/'. $value->sampul) ?>" width="150px"><br>
                      <i class="fa fa-image"><?= $value->jml_foto ?> Foto </i> <br>
                      <a href="<?= base_url('admin/tambahFotoGalery/'.$value->id_galery)?>" class="btn btn-success"><i class="fa fa-plus" ></i>Tambah Foto</a>
                    </td>
                    <td>
                      <a href="<?= base_url('admin/editGalery/'.$value->id_galery) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"> Edit</i></a>
                      <a href="<?= base_url('admin/deleteGalery/' .$value->id_galery) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"> Hapus</i></a>
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
