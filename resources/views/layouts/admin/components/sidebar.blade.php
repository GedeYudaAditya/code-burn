<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('/admin_user') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistem Perawat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- @if (auth()->user()->foto == null) --}}
                <img src="{{ asset('/images/default-user.png') }}" class="img-circle elevation-2"
                    style="width: 30px; height: 30px; object-fit: cover; object-position: center;" alt="User Image">
                {{-- @else
                    <img src="{{ asset('/storage/foto/' . auth()->user()->foto) }}"
                        style="width: 30px; height: 30px; object-fit: cover; object-position: center;"
                        class="img-circle elevation-2" alt="User Image">
                @endif --}}
            </div>
            <div class="info">
                <a href="#" class="d-block">Name</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Route::is('admin.manajemen-user.*') ? 'menu-open' : '' }}"> <!-- menu-open -->
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Manajemen User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Route::is('admin.manajemen-user.admin*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Route::is('admin.manajemen-user.perawat*') ? 'active' : '' }}">
                                <!-- active -->
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Perawat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Route::is('admin.manajemen-user.klien*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Route::is('admin.manajemen-keuangan.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Manajemen Keuangan
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Route::is('admin.manajemen-keuangan.transaksi-masuk.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transaksi Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Route::is('admin.manajemen-keuangan.transaksi-terkonfirmasi.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transaksi Terkonfirmasi</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.manajemen-keuangan.pendapatan.index') }}"
                                class="nav-link {{ Route::is('admin.manajemen-keuangan.pendapatan.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendapatan</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Route::is('admin.manajemen-keuangan.pendapatan.*') ? 'active' : '' }}">
                        <i class="far fa-money-bill-alt nav-icon"></i>
                        <p>Pendapatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Route::is('admin.pengaturan.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Pengaturan Biaya Jasa
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Route::is('admin.web-setting.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Pengaturan Web
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
