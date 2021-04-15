<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Battle Of Java &mdash; JDG</title>
    @include('admin.partials.stylesheet')
</head>

<body class="layout-3">
    <div class="main-wrapper container">
        @include('peserta.partials.navbar')
        @include('peserta.partials.topmenu')
        <div class="main-content">
            @yield('content')
        </div>
        @include('admin.partials.footer')
    </div>
    @include('admin.partials.javascript')
</body>
</html>