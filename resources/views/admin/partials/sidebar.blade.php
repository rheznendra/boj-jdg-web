<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.home') }}">Battle Of Java</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.home') }}">BOJ</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->routeIs('admin.home') ? 'active' : null }}"><a class="nav-link" href="{{ route('admin.home') }}">
                    <i class="fas fa-fire"></i> <span>Home</span></a>
            </li>
            <li class="dropdown{{ request()->segment(2) == 'master-data' ? ' active' : null }}">
                <a href="javascript:;" class="nav-link has-dropdown">
                    <i class="fas fa-database"></i><span>Master Data</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{!! request()->segment(2) == 'master-data' && request()->segment(3) == 'peserta' ? 'active' : null !!}">
                        <a class="nav-link" href="{!! route('admin.master-data.peserta.index') !!}">Data Peserta</a>
                    </li>
                    @if(Gate::check('master-admin'))
                    <li class="{!! request()->segment(2) == 'master-data' && request()->segment(3) == 'soal' ? 'active' : null !!}">
                        <a class="nav-link" href="{!! route('admin.master-data.soal.index') !!}">Data Soal</a>
                    </li>
                    <li class="{!! request()->segment(2) == 'master-data' && request()->segment(3) == 'ketentuan-peraturan' ? 'active' : null !!}">
                        <a class="nav-link" href="{!! route('admin.master-data.ketentuan-peraturan.index') !!}">Ketentuan & Peraturan</a>
                    </li>
                    @endif
                </ul>
            </li>
        </ul>
    </aside>
</div>