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
  <section class="content">
    <div class="col-12">
      <div class="callout callout-danger">
        <h5><i class="fas fa-info"></i> Note:</h5>
        <text class="text-danger"><b>Selamat datang di Sistem Akademik MA PK MA'ARIF NGALIAN</b></text>
      </div>
    </div>

    <?php
    echo form_open_multipart('admin/pengaturanWebsite');
    if ($this->session->flashdata('pesan')) {
      echo '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
      echo $this->session->flashdata('pesan');
      echo '</div>';
    }
    ?>

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h3 class="my-3 text-center">Profile Sekolah</h3>
            <div class="col-12">
              <img src="<?= base_url('assets/data/foto/sekolah/foto_kapsek/'.$seting->foto_kapsek) ?>" class="product-image" alt="Product Image">
            </div>
            <div class="form-group">
              <label>Ganti Foto Kepala Sekolah</label>
              <input class="form-control" type="file" name="foto_kapsek" >
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label>Nama Sekolah</label>
              <input class="form-control" type="text" value="<?= $seting->nama_sekolah ?>" name="nama_sekolah" placeholder="Nama Sekolah">
            </div>
            <div class="form-group">
              <label>Alamat Sekolah</label>
              <input class="form-control" type="text" value="<?= $seting->alamat ?>" name="alamat" placeholder="Alamat Sekolah" >
            </div>
            <div class="form-group">
              <label>No Telepon</label>
              <input class="form-control" type="text" value="<?= $seting->telepon ?>" name="telepon" placeholder="Telepon Sekolah" >
            </div>
            <div class="form-group">
              <label>Email</label>
              <input class="form-control" type="text" value="<?= $seting->email ?>" name="email" placeholder="Telepon Sekolah" >
            </div>
            <div class="form-group">
              <label>Kepala Sekolah</label>
              <input class="form-control" type="text" value="<?= $seting->kepala_sekolah ?>" name="kepala_sekolah" placeholder="Kepala Sekolah" >
            </div>
            <div class="form-group">
              <label>NIP Kepala Sekolah</label>
              <input class="form-control" type="text" value="<?= $seting->nip ?>" name="nip" placeholder=" NIP Kepala Sekolah" >
            </div>
          </div>
        </div>
        <div class="col-sm-12 ">
          <div class="form-group">
            <label>Visi</label>
            <textarea id="" class="form-control" name="visi" placeholder="Visi Sekolah" rows="5"><?= $seting->visi ?></textarea>
          </div>
          <div class="form-group">
            <label>Misi</label>
            <textarea id="" class="form-control" name="misi" placeholder="Misi Sekolah" rows="5"><?= $seting->misi ?></textarea>
          </div>
          <div class="form-group">
            <label>Sejarah</label>
            <textarea id="" name="sejarah" class="form-control" placeholder="Sejarah Sekolah" rows="5"><?= $seting->sejarah ?></textarea>
          </div>
          <div class="form-group" type="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
        <?php echo form_close() ; ?>
        <div class="row mt-4">
          <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Penjelasan</a>
            </div>
          </nav>
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Foto dan semua yang berada di menu ini bisa diubah tergantung dari kepa sekolah </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>