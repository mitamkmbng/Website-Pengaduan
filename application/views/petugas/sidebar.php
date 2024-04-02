<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('petugas') ?>">
    <img src="<?= base_url() ?>assets/img/unima.png" width="70px">
    <div class="sidebar-brand-text mx-3">Petugas</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?php echo (current_url() == base_url('petugas')) ? 'active' : ''; ?>">
    <a class="nav-link" href="<?= base_url('petugas') ?>">
      <i class="fas fa-fw fa-tv"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item <?php echo (current_url() == base_url('petugas/pengaduan')) ? 'active' : ''; ?>"">
    <a class="nav-link" href="<?= base_url('petugas/pengaduan') ?>">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Aduan Masuk 
        <?php if ($baru != null): ?>
        <span class="badge badge-info"><?= $baru ?></span>
        <?php endif ?>

      </span>
    </a>
  </li>
  <li class="nav-item <?php echo (current_url() == base_url('petugas/pengaduan_verif')) ? 'active' : ''; ?>"">
    <a class="nav-link" href="<?= base_url('petugas/pengaduan_verif') ?>">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Aduan Belum Diverifikasi 
        <?php if ($belumverif != null): ?>
        <span class="badge badge-info"><?= $belumverif ?></span>
        <?php endif ?>

      </span>
    </a>
  </li>
  <li class="nav-item <?php echo (current_url() == base_url('petugas/aduanselesai')) ? 'active' : ''; ?>">
    <a class="nav-link" href="<?= base_url('petugas/aduanselesai') ?>">
      <i class="fas fa-fw fa-clipboard-check"></i>
      <span>Aduan Dikirim</span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
<li class="nav-item">
    <a class="nav-link logout" href="">
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