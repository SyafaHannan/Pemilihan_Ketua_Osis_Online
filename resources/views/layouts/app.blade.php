<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Import AdminLTE CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        @include('partials.main-header')

        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        @include('partials.main-footer')
    </div>
    <!-- Import AdminLTE JS -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>