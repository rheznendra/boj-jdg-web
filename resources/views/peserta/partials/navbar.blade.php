<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <a href="{!! route('home') !!}" class="navbar-brand sidebar-gone-hide">BOJ</a>
    <a href="javascript:;" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="javascript:;">
            <i class="fas fa-ellipsis-v"></i>
        </a>
    </div>
    <ul class="navbar-nav navbar-right ml-auto">
        <li class="dropdown">
            <a href="javascript:;" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block">Kelompok {!! auth()->user()->nomor !!}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{!! route('logout') !!}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>