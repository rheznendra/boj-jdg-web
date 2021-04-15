<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item{!! request()->routeIs('home') ? ' active' : null !!}">
                <a href="{!! route('home') !!}" class="nav-link">
                    <i class="fa fa-home"></i><span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="https://meet.google.com/{!! auth()->user()->kode_google_meet !!}" class="nav-link" target="_blank">
                    <i class="fa fa-video"></i><span>Google Meet</span>
                </a>
            </li>
            <li class="nav-item{!! request()->routeIs('ketentuan-peraturan') ? ' active' : null !!}">
                <a href="{!! route('ketentuan-peraturan') !!}" class="nav-link">
                    <i class="fa fa-question-circle"></i><span>Ketentuan & Peraturan</span>
                </a>
            </li>
        </ul>
    </div>
</nav>