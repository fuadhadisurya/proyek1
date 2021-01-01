<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASEURL; ?>/Dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-box-open"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PEMINJAMAN LOGISTIK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($data['judul'] == 'Dashboard') echo 'active'; ?>">
        <a class="nav-link" href="<?= BASEURL; ?>/Dashboard">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <!-- Nav Item - Data Barang -->
      <li class="nav-item <?php if($data['judul'] == 'Data barang') echo 'active'; ?>">
        <a class="nav-link" href="<?= BASEURL; ?>/Barang">
          <i class="fas fa-fw fa-boxes"></i>
          <span>Data Barang</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaksi
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($data['judul'] == 'Formulir Peminjaman') echo 'active'; ?>">
        <a class="nav-link" href="<?= BASEURL ?>/Transaksi/tambah">
        <i class="fas fa-fw fa-file-medical"></i>
          <span>Form Peminjaman</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($data['judul'] == 'Data Peminjaman Aktif') echo 'active'; ?>">
        <a class="nav-link" href="<?= BASEURL ?>/Transaksi/dataAktif">
        <i class="fas fa-fw fa-file-contract"></i>
          <span>Data Peminjaman Aktif</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($data['judul'] == 'Data Peminjaman') echo 'active'; ?>">
        <a class="nav-link" href="<?= BASEURL ?>/Transaksi">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Data Peminjaman Selesai</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
