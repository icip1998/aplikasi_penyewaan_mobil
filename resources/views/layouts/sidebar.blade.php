<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PRM <sup>App</sup></div>
    </a>


    <!-- Divider -->

    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('cars') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Mobil</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('bookings') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Peminjaman</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('returns') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Pengembalian</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/profile">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
