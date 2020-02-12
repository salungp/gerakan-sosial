<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit user</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/user'); ?>">Admin user</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <?php echo $this->session->flashdata('message'); ?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit data</h3>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url('admin/user/update/'.$data['id']); ?>" method="POST">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo $data['username']; ?>">
                </div>
                <div class="form-group">
                  <label for="level">Level</label>
                  <select name="level" id="level" class="form-control">
                    <option value="">-pilih-</option>
                    <option value="1" <?php if($data['level'] == 1) { echo 'selected'; } ?>>Admin</option>
                    <option value="2" <?php if($data['level'] == 2) { echo 'selected'; } ?>>Editor</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="password">New password?</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                </div>
                <a href="<?php echo base_url('admin/user'); ?>" class="btn btn-light">Kembali</a>
                <button class="btn btn-primary" type="submit">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>