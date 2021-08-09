<div class="all-title-box">
	<div class="container text-center">
		<h1><?= $parent ?><span class="m_1">Beberapa daftar Galery yang dapat ditampilkan di menu ini.</span></h1>
	</div>
</div>

<div id="overviews" class="section lb">
	<div class="container">
		<div class="col-16">
			<div class="card card-primary">
				<div class="card-body">
					<div class="row">
						<?php foreach ($galery as $key => $value) { ?>
							<div class="col-sm-4">
								<a href="<?= base_url ('assets/data/foto/sampul/'.$value->sampul)?>" data-toggle="lightbox" data-title="<?= $value->sampul ?>" data-gallery="gallery">
									<img src="<?= base_url ('assets/data/foto/sampul/'.$value->sampul)?>" class="img-fluid mb-2" alt="white sample"/>
									<div class="about_item_title"><a href="<?= base_url('home/detail_galery/'.$value->id_galery) ?>"><?= $value->nama_galery ?></a></div>
									<div class="about_item_text">
										jumlah : <?= $value->jml_foto ?> Foto
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