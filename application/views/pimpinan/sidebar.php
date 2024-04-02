<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('pimpinan') ?>">
    <img src="<?= base_url() ?>assets/img/unima.png" width="70px">
    <div class="sidebar-brand-text mx-3">PIMPINAN</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?php echo (current_url() == base_url('pimpinan')) ? 'active' : ''; ?>">
    <a class="nav-link" href="<?= base_url('pimpinan') ?>">
      <i class="fas fa-fw fa-tv"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item <?php echo (current_url() == base_url('pimpinan/petugas')) ? 'active' : ''; ?>">
    <a class="nav-link" href="<?= base_url('pimpinan/petugas') ?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Data Petugas</span>
    </a>
  </li>
  <li class="nav-item <?php echo (current_url() == base_url('pimpinan/aduanBaru')) ? 'active' : ''; ?>">
    <a class="nav-link" href="<?= base_url('pimpinan/aduanBaru') ?>">
      <i class="fas fa-fw fa-envelope"></i>
      <span>Aduan Baru
        <?php if ($kirim != null): ?>
          <span class="badge badge-info"><?= $kirim ?></span>
        <?php endif ?>
      </span>
    </a>
  </li>
  <li class="nav-item <?php echo (current_url() == base_url('pimpinan/laporan')) ? 'active' : ''; ?><?php echo (current_url() == base_url('pimpinan/filterDataByDate')) ? 'active' : ''; ?>">
    <a class="nav-link" href="<?= base_url('pimpinan/laporan') ?>">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Laporan Pengaduan
      </span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <li class="nav-item">
    <a class="nav-link logout" href="#">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Keluar</span>
    </a>
  </li>
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline mt-5">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
    <!-- End of Sidebar -->