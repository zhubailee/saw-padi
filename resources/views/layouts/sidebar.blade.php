<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @guest
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('login') }}">
            <i class="fas fa-fw fa-sign-in-alt"></i>
            <span>login</span></a>
    </li>
    @endguest
    @auth
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ Request::is('alternatif*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('alternatif.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Alternatif</span></a>
    </li>
    <li class="nav-item {{ Request::is('kriteria*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kriteria.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Kriteria</span></a>
    </li>
    <li class="nav-item {{ Request::is('subkriteria*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('subkriteria.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Subkriteria</span></a>
    </li>
    <li class="nav-item {{ Request::is('hitung*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('hitung') }}">
            <i class="fas fa-fw fa-calculator"></i>
            <span>Input nilai matriks</span></a>
    </li>
    <li class="nav-item {{ Request::is('hasil*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('hasil') }}">
            <i class="fas fa-fw fa-square-root-alt"></i>
            <span>Matriks perhitungan</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    @endauth
    <!-- Divider -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>