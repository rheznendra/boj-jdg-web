<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Battle Of Java &mdash; Admin</title>
    @include('admin.partials.stylesheet')
</head>

<body>
    <div class="main-wrapper main-wrapper-1">
        @include('admin.partials.navbar')
        @include('admin.partials.sidebar')
        <div class="main-content">
            @yield('content')
        </div>
        @include('admin.partials.footer')
    </div>
    @include('admin.partials.javascript')
</body>
</html>