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
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">

                      <img class="profile-user-img img-fluid img-circle"
                      src="<?= base_url('assets/data/foto/user/img/guru/'.$user->foto_user);?>"
                      alt="User profile picture">

                    </div>

                    <h3 class="profile-username text-center"><?= $user->nama_user?></h3>

                    <p class="text-muted text-center"><?= $user->level?></p>

                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#detailProfile" data-toggle="tab">Detail Profile</a></li>
                      <li class="nav-item"><a class="nav-link" href="#EditProfile" data-toggle="tab">Update Profile</a></li>
                      <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Password</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="active tab-pane" id="detailProfile">
                        <form>
                          <div class="form-group row">
                            <label for="profileUsername" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control" value="<?php echo $user->username; ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="profileUserFullname" class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control" value="<?php echo $user->nama_user; ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="profileUserEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control" value="<?php echo $user->email; ?>">
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="EditProfile">
                       <?php echo form_open_multipart('guru/editProfile');?>
                       <input type="hidden" name="z" readonly value="<?php echo $user->id_user;?>"  class="form-control" >
                       <div class="form-group row">
                        <label for="inputProfileUsrename" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $user->username?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputProfileFullname" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="fullname" class="form-control" value="<?php echo $user->nama_user?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputProfilEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" name="email" class="form-control" id="inputProfilEmail" placeholder="Email" value="<?php echo $user->email; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-2">
                         <label for="inputProfilAddress"  class="col-form-label">Picture</label>
                       </div>
                       <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-3">
                              <img class="img-thumbnail"
                              src="<?= base_url('assets/data/foto/user/img/guru/'.$user->foto_user);?>"
                              alt="User profile picture">
                            </div>
                            <div class="col-sm-9">
                              <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-warning btn-sm float-left"><i class="fas fa-edit"></i>&ensp;Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="<?= base_url('guru/changepassword');?>" method="post">
                      <input type="hidden" name="dd" readonly value="<?= $user->id_user;?>"  class="form-control" >
                      <div class="form-group row">
                        <label for="inputNewPass" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-6">
                          <input type="password" name="bb" class="form-control" placeholder="New Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputRepeatPass" class="col-sm-3 col-form-label">Repeat Password</label>
                        <div class="col-sm-6">
                          <input type="password" name="cc" class="form-control" placeholder="Repeat Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-3 col-sm-10">
                          <button type="submit" class="btn btn-danger btn-sm">Change</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>