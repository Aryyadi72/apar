@php
    $currentRoute = Route::currentRouteName();
@endphp
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Str::startsWith($currentRoute, 'dashboard') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a></li>

            {{-- <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class=active><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                </ul>
            </li> --}}

            <li class="menu-header">Lokasi</li>
            <li class="{{ Str::startsWith($currentRoute, 'divisi') ? 'active' : '' }}">
                <a href="{{ route('divisi') }}"><i class="fas fa-home"></i> <span>Divisi</span></a>
            </li>

            <li class="{{ Str::startsWith($currentRoute, 'lokasi') ? 'active' : '' }}">
                <a href="{{ route('lokasi') }}"><i class="fas fa-location-arrow"></i> <span>Lokasi</span></a>
            </li>

            <li class="menu-header">Apar</li>

            <li class="{{ Str::startsWith($currentRoute, 'merk') ? 'active' : '' }}">
                <a href="{{ route('merk') }}"><i class="fas fa-tag"></i> <span>Merk</span></a>
            </li>

            <li class="{{ Str::startsWith($currentRoute, 'tipe-apar') ? 'active' : '' }}">
                <a href="{{ route('tipe-apar') }}"><i class="fas fa-fire-extinguisher"></i> <span>Tipe Apar</span></a>
            </li>

            <li class="{{ Str::startsWith($currentRoute, 'apar') ? 'active' : '' }}">
                <a href="{{ route('apar') }}"><i class="fas fa-fire-extinguisher"></i> <span>Apar</span></a>
            </li>

            <li class="{{ Str::startsWith($currentRoute, 'refill') ? 'active' : '' }}">
                <a href="{{ route('refill') }}"><i class="fas fa-gas-pump"></i> <span>Refill</span></a>
            </li>

            <li class="{{ Str::startsWith($currentRoute, 'kondisi-apar') ? 'active' : '' }}">
                <a href="{{ route('kondisi-apar') }}"><i class="fas fa-check-circle"></i> <span>Kondisi Apar</span></a>
            </li>

            <li class="menu-header">Summary</li>

            <li class="{{ Str::startsWith($currentRoute, 'summary-kondisi-apar') ? 'active' : '' }}"><a
                    class="nav-link" href="{{ route('summary-kondisi-apar') }}"><i class="fas fa-chart-bar"></i>
                    <span>Summary Kondisi
                        Apar</span></a></li>

            <li class="{{ Str::startsWith($currentRoute, 'summary-tipe-apar') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('summary-tipe-apar') }}"><i class="fas fa-file-alt"></i>
                    <span>Summary Jenis
                        Apar</span></a>
            </li>

            <li class="{{ Str::startsWith($currentRoute, 'summary-merk-apar') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('summary-merk-apar') }}"><i class="fas fa-tasks"></i> <span>Summary Merk
                        Apar</span></a>
            </li>

            <li><a class="nav-link" href="blank.html"><i class="fas fa-clipboard-list"></i> <span>Kontrol
                        Apar</span></a></li>

            <li class="{{ Str::startsWith($currentRoute, 'checklist-apar') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('checklist-apar') }}"><i class="fas fa-th-list"></i> <span>Checklist Apar</span></a>
            </li>

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Logout
            </a>
        </div>
    </aside>
</div>
