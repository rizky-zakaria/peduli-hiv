<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img src="{{ asset('stisla/dist/assets/img/hiv.png') }}" alt="" width="50"><br>
                <h6>SIMKES HIV-AIDS</h6>
            </a>
        </div>
        {{-- <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div> --}}
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            {{-- SideBar Admin --}}
            @if (auth()->user()->role == 'dikes')
                <li class="{{ request()->is('dikes/home') ? 'active' : '' }}">
                    <a href="{{ route('dikes.home') }}" class="nav-link"><i
                            class="fas fa-home"></i><span>Home</span></a>
                </li>

                <li class="menu-header">Data Master </li>
                <li class="{{ request()->is('dikes/faskes') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('faskes.index') }}"><i class="fas fa-users"></i>
                        <span>Data
                            Faskes</span>
                    </a>
                </li>
                <li class="menu-header">Laporan</li>
                <li class="{{ request()->is('dikes/data-master/art') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('art-dikes.index') }}"><i class="fas fa-chart-bar"></i>
                        <span>ART</span>
                    </a>
                </li>
                <li class="{{ request()->is('dikes/data-master/laporan/pasien') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('data.pasien') }}"><i class="fas fa-file"></i>
                        <span>Pasien</span>
                    </a>
                </li>
                {{-- <li class="{{ request()->is('dikes/pasien') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pasien.index') }}"><i class="fas fa-user-injured"></i>
                        <span>Data Pasien</span>
                    </a>
                </li>
                <li class="{{ request()->is('dikes/obat') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('obat.index') }}"><i class="fas fa-medkit"></i> <span>Data
                            Obat</span>
                    </a>
                </li> --}}
            @elseif(auth()->user()->role == 'faskes')
                <li class="{{ request()->is('faskes/home') ? 'active' : '' }}">
                    <a href="{{ route('faskes.home') }}" class="nav-link"><i
                            class="fas fa-home"></i><span>Home</span></a>
                </li>
                <li class="menu-header">Konsultasi</li>
                {{-- <li class="{{ request()->is('dikes/obat') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('konsultasi.index') }}"><i class="fas fa-cogs"></i>
                        <span>Manajemen</span>
                    </a>
                </li> --}}
                <li class="{{ request()->is('faskes/konsultasi') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('faskes.konsultasi') }}"><i class="fas fa-comment"></i>
                        <span>Ruang
                            Konsultasi</span>
                    </a>
                </li>
                <li class="menu-header">Data Master</li>
                <li class="{{ request()->is('faskes/pasien') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pasien.index') }}"><i class="fas fa-user-injured"></i>
                        <span>Pasien</span>
                    </a>
                </li>
                <li class="{{ request()->is('faskes/obat') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('obat.index') }}"><i class="fas fa-medkit"></i>
                        <span>Obat</span>
                    </a>
                </li>
                <li class="menu-header">Laporan</li>
                <li class="{{ request()->is('faskes/data-master/art') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('art.index') }}"><i class="fas fa-chart-bar"></i>
                        <span>ART</span>
                    </a>
                </li>
                <li class="{{ request()->is('faskes/konsumsi-obat') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('konsumsi-obat.index') }}"><i class="fas fa-file"></i>
                        <span>Konsumsi Obat</span>
                    </a>
                </li>
                <li class="{{ request()->is('faskes/kesehatan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kesehatan.index') }}"><i class="fas fa-file"></i>
                        <span>Kesehatan</span>
                    </a>
                </li>
                <li class="{{ request()->is('faskes/perjalanan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('perjalanan.index') }}"><i class="fas fa-file"></i>
                        <span>Perjalanan</span>
                    </a>
                </li>
            @elseif(auth()->user()->role == 'pasien')
                <li class="{{ request()->is('pasien/home') ? 'active' : '' }}">
                    <a href="{{ route('dikes.home') }}" class="nav-link"><i
                            class="fas fa-home"></i><span>Home</span></a>
                </li>
            @endif
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            {{-- <a href="https://getstisla.com/docs" class="btn btn-danger btn-lg btn-block btn-icon-split">
                <i class="fas fa-power-off"></i> Logout
            </a> --}}
            <a class="btn btn-danger btn-lg btn-block btn-icon-split" href=" {{ route('logout') }} "
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-power-off text-light text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Logout</span>
            </a>
        </div>
    </aside>
</div>
