        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-text mx-3">ADMIN - SIPATA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen Informasi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- make active when access -->
            <li class="nav-item {{ request()->is('admin/curhat*') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Cerita</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manajemen Cerita</h6>
                        <a class="collapse-item" href="{{ route('admin.curhat.index') }}">Cerita Masuk</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item {{ request()->is('admin/blog*') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Blog</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manajemen Blog</h6>
                        <a class="collapse-item" href="{{ route('admin.blog.index') }}">Data Blog</a>
                        <a class="collapse-item" href="{{ route('admin.category.index') }}">Kategori</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- only admin can access -->
            @if (Auth::user()->role == 'admin')
            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen User
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ request()->is('admin/user*') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                    <span>Siswa</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manajamen Siswa</h6>
                        <a class="collapse-item" href="{{ route('admin.users.index') }}">Data Siswa</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu Guru -->
            <li class="nav-item {{ request()->is('admin/guru*') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGuru"
                    aria-expanded="true" aria-controls="collapseGuru">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Guru</span>
                </a>
                <div id="collapseGuru" class="collapse" aria-labelledby="headingGuru" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manajemen Guru</h6>
                        <a class="collapse-item" href="{{ route('admin.users.guru') }}">Data Guru BK</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu Admin -->
            <li class="nav-item {{ request()->is('admin/admin*') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin"
                    aria-expanded="true" aria-controls="collapseAdmin">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Admin</span>
                </a>
                <div id="collapseAdmin" class="collapse" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manajemen Admin</h6>
                        <a class="collapse-item" href="{{ route('admin.users.admin') }}">Data Admin</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            @endif

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->