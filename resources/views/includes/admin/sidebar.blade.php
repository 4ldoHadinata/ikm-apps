<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-text mx-3">IKM Apps</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item{{ request()->is('admin/index') ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Berita -->
    <li class="nav-item{{ request()->is('admin/berita') ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('berita.index') }}">
        <i class="fas fa-fw fa-envelope"></i>
        <span>Berita</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Kuesioner -->
    <li class="nav-item{{ request()->is('admin/kuesioner') ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('kuesioner.index') }}">
        <i class="fas fa-fw fa-question-circle"></i>
        <span>Kuesioner</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Bidang -->
    <li class="nav-item{{ request()->is('admin/bidang') ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('bidang.index') }}">
        <i class="fas fa-fw fa-circle"></i>
        <span>Bidang</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Jenis Pelayanan -->
    <li class="nav-item{{ request()->is('admin/jenis_pelayanan') ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('jenis_pelayanan.index') }}">
        <i class="fas fa-fw fa-circle"></i>
        <span>Jenis Pelayanan</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Skala Likert -->
    <li class="nav-item{{ request()->is('admin/skala_likert') ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('skala_likert.index') }}">
        <i class="fas fa-fw fa-circle"></i>
        <span>Skala Likert</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Skala Likert -->
    <li class="nav-item{{ request()->is('admin/responden') ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('responden.index') }}">
        <i class="fas fa-fw fa-circle"></i>
        <span>Responden</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Hasil -->
    <li class="nav-item{{ request()->is('admin/hasil') ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('hasil.index') }}">
        <i class="fas fa-fw fa-check-circle"></i>
        <span>Hasil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>