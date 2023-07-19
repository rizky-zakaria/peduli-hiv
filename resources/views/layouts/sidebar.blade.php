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
            @elseif(auth()->user()->role == 'kotagor')
                <li class="{{ request()->is('kotagor/home') ? 'active' : '' }}">
                    <a href="{{ route('kotagor.home') }}" class="nav-link"><i
                            class="fas fa-home"></i><span>Home</span></a>
                </li>

                <li class="menu-header">Data Master </li>
                <li class="menu-header">Laporan</li>
                <li class="{{ request()->is('kotagor/data-master/art') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('art-kotagor.index') }}"><i class="fas fa-chart-bar"></i>
                        <span>ART</span>
                    </a>
                </li>
                <li class="{{ request()->is('kotagor/data-master/laporan/pasien') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kotagor.pasien') }}"><i class="fas fa-file"></i>
                        <span>Pasien</span>
                    </a>
                </li>
            @elseif(auth()->user()->role == 'kabbonbol')
                <li class="{{ request()->is('kabbonbol/home') ? 'active' : '' }}">
                    <a href="{{ route('kabbonbol.home') }}" class="nav-link"><i
                            class="fas fa-home"></i><span>Home</span></a>
                </li>

                <li class="menu-header">Data Master </li>
                <li class="menu-header">Laporan</li>
                <li class="{{ request()->is('kabbonbol/data-master/art') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('art-kabbonbol.index') }}"><i class="fas fa-chart-bar"></i>
                        <span>ART</span>
                    </a>
                </li>
                <li class="{{ request()->is('kabbonbol/data-master/laporan/pasien') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kabbonbol.pasien') }}"><i class="fas fa-file"></i>
                        <span>Pasien</span>
                    </a>
                </li>
            @elseif(auth()->user()->role == 'kabgor')
                <li class="{{ request()->is('kabgor/home') ? 'active' : '' }}">
                    <a href="{{ route('kabgor.home') }}" class="nav-link"><i
                            class="fas fa-home"></i><span>Home</span></a>
                </li>

                <li class="menu-header">Data Master </li>
                <li class="menu-header">Laporan</li>
                <li class="{{ request()->is('kabgor/data-master/art') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('art-kabgor.index') }}"><i class="fas fa-chart-bar"></i>
                        <span>ART</span>
                    </a>
                </li>
                <li class="{{ request()->is('kabgor/data-master/laporan/pasien') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kabgor.pasien') }}"><i class="fas fa-file"></i>
                        <span>Pasien</span>
                    </a>
                </li>
            @elseif(auth()->user()->role == 'kabbol')
                <li class="{{ request()->is('kabbol/home') ? 'active' : '' }}">
                    <a href="{{ route('kabbol.home') }}" class="nav-link"><i
                            class="fas fa-home"></i><span>Home</span></a>
                </li>

                <li class="menu-header">Data Master </li>
                <li class="menu-header">Laporan</li>
                <li class="{{ request()->is('kabbol/data-master/art') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('art-kabbol.index') }}"><i class="fas fa-chart-bar"></i>
                        <span>ART</span>
                    </a>
                </li>
                <li class="{{ request()->is('kabbol/data-master/laporan/pasien') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kabbol.pasien') }}"><i class="fas fa-file"></i>
                        <span>Pasien</span>
                    </a>
                </li>
            @elseif(auth()->user()->role == 'kabpoh')
                <li class="{{ request()->is('kabpoh/home') ? 'active' : '' }}">
                    <a href="{{ route('kabpoh.home') }}" class="nav-link"><i
                            class="fas fa-home"></i><span>Home</span></a>
                </li>

                <li class="menu-header">Data Master </li>
                <li class="menu-header">Laporan</li>
                <li class="{{ request()->is('kabpoh/data-master/art') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('art-kabpoh.index') }}"><i class="fas fa-chart-bar"></i>
                        <span>ART</span>
                    </a>
                </li>
                <li class="{{ request()->is('kabpoh/data-master/laporan/pasien') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kabpoh.pasien') }}"><i class="fas fa-file"></i>
                        <span>Pasien</span>
                    </a>
                </li>
            @elseif(auth()->user()->role == 'kabgorut')
                <li class="{{ request()->is('kabgorut/home') ? 'active' : '' }}">
                    <a href="{{ route('kabgorut.home') }}" class="nav-link"><i
                            class="fas fa-home"></i><span>Home</span></a>
                </li>

                <li class="menu-header">Data Master </li>
                <li class="menu-header">Laporan</li>
                <li class="{{ request()->is('kabgorut/data-master/art') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('art-kabgorut.index') }}"><i class="fas fa-chart-bar"></i>
                        <span>ART</span>
                    </a>
                </li>
                <li class="{{ request()->is('kabgorut/data-master/laporan/pasien') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kabgorut.pasien') }}"><i class="fas fa-file"></i>
                        <span>Pasien</span>
                    </a>
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
