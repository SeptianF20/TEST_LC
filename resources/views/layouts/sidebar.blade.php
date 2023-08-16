<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{  asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Kamus LC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= asset('assets/dist/img/avatar5.png') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- <li class="nav-item">
                    <a href="/" class="nav-link {{ request()->is('/') ? "active" : "" }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li> --}}
                <li class="nav-header">Kamus</li>
                <li class="nav-item">
                    <a href="/search" class="nav-link {{ request()->is('search') ? "active" : "" }}">
                        <i class="fas fa-search nav-icon"></i>
                        <p>Pencarian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/history" class="nav-link {{ request()->is('history') ? "active" : "" }}">
                        <i class="fas fa-file nav-icon"></i>
                        <p>Riwayat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/favorit" class="nav-link {{ request()->is('favorit') ? "active" : "" }}">
                        <i class="fas fa-heart nav-icon"></i>
                        <p>Favorit</p>
                    </a>
                </li>
                {{-- @if(Auth::user()->role == "isAdmin")
                <li class="nav-item">
                    <a href="/mahasiswa" class="nav-link {{ request()->is('lokasi') ? "active" : "" }}">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>
                @endif --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
