<div class="all-title-box">
	<div class="container text-center">
		<h1><?= $title ?><span class="m_1">Kebutuhan data yang berkaitan dengan sekolah dan bersifat umum bisa di download di sini.</span></h1>
	</div>
</div>

<div id="support" class="section wb">
	<div class="container-fulid">
		<div class="section-title text-center">
			<div class="card-body">
				<table class="table table-striped table-bordered table-hover" id="myTable">
					<thead>
						<tr>
							<th class="text-center" width="50px">NO</th>
							<th class="text-center">Keterangan File</th>
							<th class="text-center" width="100px">Download</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($download as $key => $value) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $value->ket_file?></td>
								<td class="text-center"><a href="<?= base_url('assets/data/foto/file/'.$value->file)?>" class="btn btn-success"><i class="fa fa-download"></i> Download</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div><!-- end title -->
	</div><!-- end container -->
</div><!-- end section -->