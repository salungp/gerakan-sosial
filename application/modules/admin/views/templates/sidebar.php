<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo base_url(); ?>assets/img/logo-admin.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
    <span class="brand-text font-weight-light">Admin page</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url(); ?>assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $user['username']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>admin" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Beranda
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Content
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-money-bill-alt"></i>
            <p>
              Accounting
            </p>
            <i class="right fas fa-angle-left"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
  
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
          <i class="nav-icon fas fa-comments"></i>
            <p>
              Contact
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Admin user
            </p>
            <i class="right fas fa-angle-left"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/user'); ?>" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
                <p>
                  List users
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
                <p>
                  Tambah user
                </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>auth/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>