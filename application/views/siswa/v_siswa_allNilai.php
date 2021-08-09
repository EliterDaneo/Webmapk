<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $title?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?= $title?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
				  <tr>
                    <td>Nama</td>
                    <td colspan="2">: <?= $detailNilai->nis?></td>
                  </tr>
				  <tr>
                    <td>Kelas</td>
                    <td colspan="2">: <?= $detailNilai->nama_kelas?></td>
                  </tr>
                  <tr>
                    <th>No</th>
                    <th>MataPelajaran</th>
                    <th>Nilai</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php foreach ($allNilai as $value) { ?>
						<tr>
							<td><?= $value->id_nilai?></td>
							<td><?= $value->nama_mapel?></td>
							<td><?= $value->nilai?></td>
						</tr>
					<?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>MataPelajaran</th>
                    <th>Nilai</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
        </div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
