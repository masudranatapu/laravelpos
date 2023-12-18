<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MRT Application</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('admin.layout.header')
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('admin.layout.sidebar')
        </aside>

        <div class="content-wrapper">
            <router-view></router-view>
        </div>
        <footer class="main-footer">
            @include('admin.layout.footer')
        </footer>
    </div>
</body>

</html>
