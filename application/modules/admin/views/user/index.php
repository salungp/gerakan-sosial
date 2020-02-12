<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Lists admin user</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Admin user</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <?php echo $this->session->flashdata('message'); ?>
          <div class="card">
            <div class="card-header">
              <?php if ($user['level'] == 1) : ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                  <i class="fa fa-plus"></i>
                </button>
              <?php endif; ?>

              <div class="card-tools">
                <form action="<?php echo base_url('admin/user/search'); ?>" method="GET">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="s" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <?php if ($user['level'] == 1) : ?>
                      <th>Action</th>
                    <?php endif; ?>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Created at</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach($data as $key) : ?>
                  <tr>
                    <td><?php echo $i++; ?>.</td>
                    <?php if ($user['level'] == 1) : ?>
                      <td>
                        <div class="btn-group">
                          <a href="<?php echo base_url('admin/user/edit/'.$key['id']); ?>" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                          </a>
                          <?php if (count($data) > 1) : ?>
                          <a onclick="return window.confirm('Yakin mau dihapus?')" href="<?php echo base_url('admin/user/delete/'.$key['id']); ?>" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                          </a>
                          <?php endif; ?>
                        </div>
                      </td>
                    <?php endif; ?>
                    <td><?php echo $key['username']; ?></td>
                    <td>********</td>
                    <td>
                      <?php
                        switch($key['level'])
                        {
                          case 1 :
                            echo '<span class="badge badge-primary">Admin</span>';
                          break;

                          case 2 :
                            echo '<span class="badge badge-success">Editor</span>';
                          break;

                          case 3 :
                            echo '<span class="badge badge-warning">Visitor</span>';
                          break;
                        }
                      ?>
                    </td>
                    <td><?php echo date('M, d Y', strtotime($key['created_at'])); ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php if ($user['level'] == 1) : ?>
  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah user</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('admin/user/create'); ?>" method="POST">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text"
                     id="username"
                     name="username"
                     class="form-control"
                     placeholder="Username"
                     required
              />
            </div>
            <div class="form-group">
              <label for="level">Level</label>
              <select name="level" id="level" class="form-control">
                <option value="">-pilih-</option>
                <option value="1">Admin</option>
                <option value="2">Editor</option>
              </select>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password"
                     id="password"
                     name="password"
                     class="form-control"
                     placeholder="Password"
                     required
              />
            </div>
            <div class="form-group">
              <label for="password_confirmation">Konfirmasi password</label>
              <input type="password"
                     id="password_confirmation"
                     name="password_confirmation"
                     class="form-control"
                     placeholder="Konfirmasi password"
                     required
              />
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php endif; ?>