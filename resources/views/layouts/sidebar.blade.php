<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="bi bi-house-door"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        @if(auth()->user()->role == 'masyarakat')
        <li class="nav-item">
            <a class="nav-link" href="/ajukan-surat">
                <i class="bi bi-file-earmark-text"></i>
                <span>Pengajuan Surat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/riwayat">
                <i class="bi bi-clock-history"></i>
                <span>Riwayat Pengajuan</span>
            </a>
        </li>
        @endif

        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'kepala_desa' || auth()->user()->role == 'sekretaris_desa')
        <li class="nav-item">
            <a class="nav-link" href="/admin/pengajuan-surat">
                <i class="bi bi-envelope"></i>
                <span>Pengajuan Surat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/dokumen">
                <i class="bi bi-archive"></i>
                <span>Dokumen Pengajuan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/tampil-surat">
                <i class="bi bi-tag"></i>
                <span>Jenis Surat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/laporan">
                <i class="bi bi-clipboard-data"></i>
                <span>Laporan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/users">
                <i class="bi bi-people"></i>
                <span>Manajemen Pengguna</span>
            </a>
        </li>
        @endif

        @if(Auth::check())
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </li>
        @endif
    </ul>
</aside>
