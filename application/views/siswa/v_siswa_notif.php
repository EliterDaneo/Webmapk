<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $page?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('siswa/notif')?>"><small><?= $page ;?></small></a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section> 
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Default box -->
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h4 class="card-title " text-align="center"><strong><?= $page; ?></strong></h4>
          <div class="card-tools">
            <!-- button with a dropdown -->
            <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-info btn-sm" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

          <div class="timeline timeline-inverse ml-2">
            <?php if($allnotif == NULL) : ?>

              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-primary">
                  <?= date('d M Y')?>
                </span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="far fa-clock bg-gray"></i>

                <div class="timeline-item">

                  <h3 class="timeline-header">No Notifation Found</h3>
                </div>
              </div>
              <!-- END timeline item -->

              <?php else :?>

                <?php foreach($allnotif as $row) : ?>


                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-gray">
                      <?= date('d M Y', strtotime($row->request_date))?>
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-envelope bg-success"></i>

                    <div class="timeline-item">
                      <span class="time"><a href="#" data-toggle="modal" data-target="#notifDelete<?= $row->id_request?>"><i class="fas fa-times"></i></a></span>

                      <h3 class="timeline-header">
                        <text class="text-primary"><b>Administrator</b></text> Mengajukan pengUpdate data Nilai Sesuai Laporan..

                      </h3>

                      <div class="timeline-body">
                        <?= $row->request_keterangan;?>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->


                <?php endforeach;?>

              <?php endif;?>

            </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer justify-content-between">
            <a class="btn btn-secondary btn-sm" href="<?= base_url('siswa');?>">
              <i class="fas fa-arrow-left"></i>&ensp;Back 
            </a>
          </div>

        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->

      <!-- /.content -->
      <!-- Role Hapus Modal-->
      <?php $i=0; foreach ($allnotif as $notif) : $i++; ?>
      <div class="modal fade" id="notifDelete<?= $notif->id_request ;?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header card-outline card-danger">
              <h5 class="modal-title">Delete Notif </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Pilih "Delete" dibawah untuk menghapus Notif.</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i>&ensp;Close</button>
              <a class="btn btn-danger btn-sm" href="<?= base_url('siswa/deleteNotif/').$this->encrypt->encode($notif->id_request).'';?>"><i class="fas fa-trash"></i>&ensp;Delete</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <?php endforeach; ?>
    <!-- /.modal -->

  </section>
  