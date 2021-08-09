<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard Berisi Profile siswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
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
          <h4 class="card-title " text-align="center"><strong><?= $title .' / '. str_replace("guru","", $this->session->userdata('username')); ?></strong></h4>
        </div>
        <div class="card-body">

          <?= form_open_multipart('guru/profile/'.$profile->nik );?>

          <!-- form-group -->
          <div class="form-group text-center">
            <label  class="col-form-label">Picture</label>
            <div class="row">
              <div class="col-sm-12">
                <?php if(file_exists(FCPATH . './assets/data/foto/user/img/guru/'.$user->foto_user) || $user->foto_user !== 'default.jpg') : ?>
                  <img class="img-thumbnail"
                  src="<?= base_url('assets/data/foto/user/img/guru/'.$user->foto_user)?>"
                  alt="User profile picture">
                  <?php else : ?>
                    <img class="img-thumbnail"
                    src="<?= base_url('assets/data/foto/user/img/guru/default.jpg')?>"
                    alt="User profile picture">
                  <?php endif;?>
                </div>
              </div>
            </div>
            <!-- /.form-group -->
            <!-- form-group -->
            <div class="form-group">
              <label>NIK</label>
              <input name="nis" type="text" placeholder="NIK" class="form-control" value="<?= $profile->nik ;?>"  readonly>
            </div>
            <!-- /.form-group -->

            <!-- form-group -->
            <div class="form-group">
              <label>Nama Guru</label>
              <input name="nama_siswa" type="text" placeholder="Nama Guru" class="form-control" value="<?= $profile->nama_guru ;?>"readonly>
            </div>
            <!-- /.form-group -->

            <!-- form-group -->
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input name="tempat_lahir" type="text" placeholder="Tempat Lahir" class="form-control" value="<?= $profile->tempat_lahir ;?>"readonly>
            </div>
            <!-- /.form-group -->

            <!-- form-group -->
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input class="form-control" type="text" value="<?= $profile->tanggal_lahir ?>" name="tanggal_lahir" id="tanggal" placeholder="tanggal Lahir" readonly>
            </div>
            <!-- /.form-group -->

            <!-- form-group -->
            <div class="form-group">
              <label>Pendidikan Terakhir</label>
              <input name="wali_siswa" type="text" placeholder="Orang Tua / Wali" class="form-control" value="<?= $profile->pendidikan ;?>"readonly>
            </div>
            <!-- /.form-group -->

            <div class="row">

              <div class="col-sm-6">

                <!-- form-group -->
                <div class="form-group">
                  <label>Pelajaran Yang Diampu</label>
                  <input name="wali_siswa" type="text" placeholder="Orang Tua / Wali" class="form-control" value="<?= $profile->nama_mapel ;?>"readonly>
                </div>
                <!-- /.form-group -->

              </div>

              <div class="col-sm-6">

                <!-- form-group -->
                <!-- <div class="form-group">
                  <label>Wali Kelas</label>
                  <input type="text" class="form-control" placeholder="Nama Kelas" value="<?= $profile->nama_kelas?>" readonly>
                </div> -->
                <!-- /.form-group -->

              </div>

            </div>

            <!-- Alamat -->
            <!-- <div class="form-group">
              <label class="col-form-label">Alamat</label>
              <textarea type="text" name="alamat" class="form-control" placeholder="Alamat"><?= $profile->alamat ;?></textarea>
            </div> -->
            <!-- / Alamat -->

            <!-- form-group -->
            <!-- <div class="form-group">
              <label>No Telp / HP</label>
              <input name="hp" type="text" class="form-control" placeholder="Nomer HP Yang Bisa Di Hubungi(Utamakan Nomer HP Orang Tua)" value="<?= $profile->hp ;?>">
            </div> -->
            <!-- /.form-group -->
          </form>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.Container Fluid -->
  </section>
  <!-- /.content -->