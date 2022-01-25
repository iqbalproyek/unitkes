<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
      <div class="sidebar-brand-icon">
        <i class="fas fa-user-md"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Unit Kesehatan Polibatam</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    @if(Auth::user()->role == "admin")
            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ (request()->is('pengumuman')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pengumuman.index') }}">
                <i class="fas fa-home"></i>
                <span>Pengumuman</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item {{ (request()->is('petugas')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('petugas.index') }}">
                <i class="fas fa-id-card-alt"></i>
                <span>Data petugas</span></a>
            </li>

        @elseif(Auth::user()->role == "medis")
            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ (request()->is('medis')) || request()->is('laporan/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('dashboard.medis') }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item {{ (request()->is('pasien')) || (request()->is('pasien/filter/Dosen')) || (request()->is('pasien/filter/Mahasiswa')) || (request()->is('pasien/filter/pegawai')) || (request()->is('pasien/*')) || (request()->is('periksa/*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pasien.index') }}">
                  <i class="fas fa-id-card-alt"></i>
                  <span>Data Pasien</span></a>
              </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item {{ (request()->is('surat/izin')) || (request()->is('surat/izin/*')) ? 'active' : '' }}">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
                <i class="fa fa-envelope"></i>
                <span>Data Surat Keluar</span>
              </a>
              <div id="collapsePages2" class="collapse {{ (request()->is('surat/izin')) || (request()->is('surat/izin/*')) || (request()->is('surat/kesehatan')) || (request()->is('surat/kesehatan/*')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item {{ (request()->is('surat/izin')) || (request()->is('surat/izin/*')) ? 'active' : '' }}" href="/surat/izin">Surat Izin Sakit</a>
                  <a class="collapse-item {{ (request()->is('surat/kesehatan')) || (request()->is('surat/kesehatan/*')) ? 'active' : '' }}" href="/surat/kesehatan">Surat Keterangan sehat</a>
                </div>
              </div>
            </li>

        @elseif(Auth::user()->role == "farmasi")
        <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ (request()->is('farmasi')) || (request()->is('laporan/obat/*')) ? 'active' : '' }}">
                <a class="nav-link" href="/farmasi">
                <i class="fas fa-home"></i>
                <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->

            <li class="nav-item {{ (request()->is('obat/stok') || request()->is('obat/stok/*/*')) ? 'active' : '' }}">
                <a class="nav-link" href="/obat/stok">
                <i class="fas fa-medkit"></i>
                <span>Stok Obat</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <li class="nav-item {{ (request()->is('obat/masuk')) ? 'active' : '' }}">
                <a class="nav-link" href="/obat/masuk">
                <i class="fas fa-sign-in-alt"></i>
                <span>Obat Masuk</span></a>
            </li>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <li class="nav-item {{ (request()->is('obat/keluar')) ? 'active' : '' }}">
                <a class="nav-link" href="/obat/keluar">
                <i class="fas fa-sign-out-alt"></i>
                <span>Obat Keluar</span></a>
            </li>
        @endif

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
