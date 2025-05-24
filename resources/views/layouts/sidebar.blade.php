        @if (auth()->user()->role == 'admin')
            <div class="sidebar sidebar-style-2" data-background-color="dark">
                <div class="sidebar-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="{{ asset('assets/img/logojatimm.png') }}" alt="navbar brand"
                                class="navbar-brand" height="40" />
                        </a>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <ul class="nav nav-secondary">
                            <li class="nav-item ">
                                <a href="/dashboard" class="nav-link" aria-expanded="false">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Components</h4>
                            </li>

                            <li class="nav-item {{ Request::is('admin/pengajuan-surat') ? 'active' : '' }}">
                                <a href="/admin/pengajuan-surat">
                                    <i class="fas fa-file-alt"></i>
                                    <p>Pengajuan Surat Masuk</p>
                                </a>

                            </li>

                            <li class="nav-item {{ Request::is('dokumen') ? 'active' : '' }}">
                                <a href="/dokumen">
                                    <i class="fas fa-file-import"></i>
                                    <p>Dokumen Pengajuan</p>
                                </a>

                            </li>
                            <li class="nav-item {{ Request::is('tampil-surat') ? 'active' : '' }}">
                                <a href="/tampil-surat">
                                    <i class="fas fa-file"></i>
                                    <p>Jenis Surat</p>
                                </a>

                            </li>
                            <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
                                <a href="/users">
                                    <i class="fas fa-user-alt"></i>
                                    <p>Manajemen Pengguna</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('profile') ? 'active' : '' }}">
                                <a href="/profile">
                                    <i class="fas fa-user-edit"></i>
                                    <p>Edit Profil</p>
                                </a>
                            </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        @if ( auth()->user()->role == 'kepala_desa' ||
                auth()->user()->role == 'sekretaris_desa')
            <div class="sidebar sidebar-style-2" data-background-color="dark">
                <div class="sidebar-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="{{ asset('assets/img/logojatimm.png') }}" alt="navbar brand"
                                class="navbar-brand" height="40" />
                        </a>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <ul class="nav nav-secondary">
                            <li class="nav-item ">
                                <a href="/dashboard" class="nav-link" aria-expanded="false">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Components</h4>
                            </li>
                            <li class="nav-item {{ Request::is('/pengajuan-surat/kadsek') ? 'active' : '' }}">
                                <a href="/pengajuan-surat/kadsek">
                                    <i class="fas fa-file-alt"></i>
                                    <p>Pengajuan Surat Masuk</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('tampil-surat') ? 'active' : '' }}">
                                <a href="/tampil-surat">
                                    <i class="fas fa-file"></i>
                                    <p>Jenis Surat</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('profile') ? 'active' : '' }}">
                                <a href="/profile">
                                    <i class="fas fa-user-edit"></i>
                                    <p>Edit Profil</p>
                                </a>
                            </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        @if (auth()->user()->role == 'masyarakat')
            <div class="sidebar sidebar-style-2" data-background-color="dark">
                <div class="sidebar-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">

                            <img src="{{ asset('assets/img/logojatimm.png') }}" alt="navbar brand"
                                class="navbar-brand" height="40" />
                        </a>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <ul class="nav nav-secondary">
                            <li class="nav-item ">
                                <a href="/userdashboard" class="nav-link" aria-expanded="false">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Components</h4>
                            </li>
                            <li class="nav-item {{ Request::is('ajukan-surat') ? 'active' : '' }}">
                                <a href="/ajukan-surat">
                                    <i class="fas fa-file-signature"></i>
                                    <p>Pengajuan Surat</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('tampil-surat*') ? 'active' : '' }}">
                                <a href="{{ route('surat.index') }}">
                                    <i class="fas fa-file"></i>
                                    <p>Jenis Surat</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('pengajuan_terkirim') ? 'active' : '' }}">
                                <a href="/pengajuan_terkirim">
                                    <i class="fas fa-address-card"></i>
                                    <p>Pengajuan Terkirim</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('biodata') ? 'active' : '' }}">
                                <a href="/biodata">
                                    <i class="fas fa-address-card"></i>
                                    <p>Biodata</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('riwayat') ? 'active' : '' }}">
                                <a href="/riwayat">
                                    <i class="fas fa-file-contract"></i>
                                    <p>Riwayat Pengajuan Surat</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('profile') ? 'active' : '' }}">
                                <a href="/profile">
                                    <i class="fas fa-user-edit"></i>
                                    <p>Edit Profil</p>
                                </a>
                            </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
