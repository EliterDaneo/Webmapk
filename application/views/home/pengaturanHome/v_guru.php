<div class="all-title-box">
	<div class="container text-center">
		<h1><?= $parent ?><span class="m_1">Beberapa daftar guru yang dapat ditampilkan di menu ini.</span></h1>
	</div>
</div>

<div id="overviews" class="section lb">
	<div class="container">
		<div class="col-16">
			<div class="card card-primary">
				<div class="card-body">
					<div class="row">
						<?php foreach ($guru as $key => $value) { ?>
							<div class="col-sm-4">
								<a href="<?= base_url ('assets/data/foto/user/img/guru/'.$value->foto_guru)?>" data-toggle="lightbox" data-title="<?= $value->nama_guru ?>" data-gallery="gallery">
									<img src="<?= base_url ('assets/data/foto/user/img/guru/'.$value->foto_guru)?>" class="img-fluid mb-2" alt="white sample"/>
									<div class="text-center">
										<h3><?= $value->nama_guru ?></h3>
										<label><?= $value->nik ?></label>
									</div>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- /.container-fluid -->