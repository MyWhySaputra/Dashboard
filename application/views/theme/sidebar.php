<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark " id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('home/index');?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-book"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Perpus UMB</div>
  </a>
<li class="sidebar-user-panel">
            <div class="user-panel">
              <div class="pull-left image">
                <img src="<?=base_url()?>assets/img/admin.png" class="img-circle user-img-circle"
                  alt="User Image" />
              </div>
              <div class="pull-left info">
                <a href="<?php echo site_url('admin_ajax/read');?>">
                <p class="text-xl font-weight-bold text-light text mb-1">Admin</p>
                </a>
                <a href="<?php echo site_url('admin_ajax/read');?>"><i class="fa fa-circle user-online"></i><span class="txtOnline">
                    Online</span></a>
              </div>
            </div>

          </li>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <li class="nav-item ">
    <a class="nav-link" href="<?php echo site_url('home/index');?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
  <!-- Nav Item - Charts -->
  <li class="nav-item ">
    <a class="nav-link" href="<?php echo site_url('admin_ajax/read');?>">
      <i class="fas fa-fw fa-user"></i>
      <span>Admin</span></a>
  </li>
<!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnggota" aria-expanded="true" aria-controls="collapseAnggota">
      <i class="fas fa-fw fa-users"></i>
      <span>Anggota</span>
    </a>
    <div id="collapseAnggota" class="collapse" aria-labelledby="collapseAnggota" data-parent="#accordionSidebar">
      <div class="bg-info py-2 collapse-inner circle">
        <a class="collapse-item circle" href="<?php echo site_url('anggota_ajax/read');?>">List Anggota</a>
        <a class="collapse-item circle" href="<?php echo site_url('anggota/insert');?>">Tambah Anggota</a>
      </div>
    </div>
  </li>

 <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('penerbit_ajax/read');?>">
      <i class="fas fa-fw fa-edit"></i>
      <span>Penerbit</span></a>
  </li>


  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-book"></i>
      <span>Buku</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-info py-2 collapse-inner circle">
        <a class="collapse-item circle" href="<?php echo site_url('buku_ajax/read');?>">List Buku</a>
        <a class="collapse-item circle" href="<?php echo site_url('buku/insert');?>">Tambah Buku</a>
      </div>
    </div>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-table"></i>
          <span>Peminjaman</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-info py-2 collapse-inner circle">
            <a class="collapse-item circle" href="<?php echo site_url('peminjaman_ajax/read');?>">Data Peminjaman</a>
            <a class="collapse-item circle" href="<?php echo site_url('peminjaman/insert');?>">Tambah Peminjaman</a>
          </div>
        </div>
      </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
    aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-table"></i>
      <span>Pengembalian</span>
    </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-info py-2 collapse-inner circle">
         <a class="collapse-item circle" href="<?php echo site_url('pengembalian_ajax/read');?>">Data Pengembalian</a>
         <a class="collapse-item circle" href="<?php echo site_url('pengembalian/insert');?>">Tambah Pengembalian</a>
        </div>
      </div>
  </li>
  
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapeseChart"
    aria-expanded="true" aria-controls="collapeseChart">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Grafik</span>
    </a>
      <div id="collapeseChart" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-info py-2 collapse-inner circle">
         <a class="collapse-item circle" href="<?php echo site_url('chart/pie');?>">Pie</a>
         <a class="collapse-item circle" href="<?php echo site_url('chart/column');?>">Column</a>
        </div>
      </div>
  </li>
 

  <hr class="sidebar-divider d-none d-md-block">

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>