<?php $contents = $this->db->get('category')->result_array(); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Content list</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Content</li>
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                <i class="fa fa-plus"></i>
              </button>

              <div class="card-tools">
                <form action="<?php echo base_url('admin/content/search'); ?>" method="GET">
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
                    <th>Action</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Text</th>
                    <th>Category</th>
                    <th>Link</th>
                    <th>Icon</th>
                    <th>Image</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach($data as $key) : ?>
                  <?php $category = $this->db->get_where('category', ['id' => $key['category']])->row_array(); ?>
                  <tr>
                    <td><?php echo $i++; ?>.</td>
                    <td>
                      <div class="btn-group">
                        <a href="<?php echo base_url('admin/user/edit/'.$key['id']); ?>" class="btn btn-primary">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="return window.confirm('Yakin mau dihapus?')" href="<?php echo base_url('admin/user/delete/'.$key['id']); ?>" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                        </a>
                      </div>
                    </td>
                    <td><?php echo $key['title']; ?></td>
                    <td><?php echo $key['description']; ?></td>
                    <td><?php echo $key['text'] != '' ? $key['text'] : '-'; ?></td>
                    <td><?php echo $category['title']; ?></td>
                    <td><?php echo $key['link'] != '' ? $key['link'] : '-'; ?></td>
                    <td><?php echo $key['icon'] != '' ? $key['icon'] : '-'; ?></td>
                    <td>
                      <?php if ($key['image'] != '-') : ?>
                        <img style="width: 60px" src="<?php echo base_url($key['image']); ?>" alt="Image" />
                      <?php else : ?>
                        -
                      <?php endif; ?>
                    </td>
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
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah content</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/content/create'); ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                    id="title"
                    name="title"
                    class="form-control"
                    placeholder="Title"
                    required
            />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description"
                      id="description"
                      class="form-control"
                      required
                      placeholder="Description">
            </textarea>
          </div>
          <div class="form-group">
            <label for="text">Text(optional)</label>
            <input type="text"
                    id="text"
                    name="text"
                    class="form-control"
                    placeholder="Text"
            />
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control" required>
              <option value="">-pilih-</option>
              <?php foreach($contents as $k) : ?>
                <option value="<?php echo $k['id']; ?>">
                  <?php echo $k['title']; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="link">Link(optional)</label>
            <input type="text"
                    id="link"
                    name="link"
                    class="form-control"
                    placeholder="Link"
            />
          </div>
          <div class="form-group">
            <label for="icon">Icon(optional)</label>
            <input type="text"
                    id="icon"
                    name="icon"
                    class="form-control"
                    placeholder="icon"
            />
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <br>
            <input type="file"
                    id="image"
                    name="image"
                    class="file"
                    placeholder="Image"
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