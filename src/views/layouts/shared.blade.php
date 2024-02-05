<!doctype html>
<html lang="en">

<head>
    <title>EZCode</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="{{ asset('img/shared/logo.png')}}" type="image/x-icon">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS libraries -->
    <link href="{{ asset('css/admin/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin/tabler-flags.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin/tabler-payments.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin/tabler-vendors.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin/demo.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('libs/apexcharts/dist/apexcharts.js') }}" defer></script>
    <script src="{{ asset('libs/jsvectormap/dist/js/jsvectormap.js') }}" defer></script>
    <script src="{{ asset('libs/jsvectormap/dist/maps/world.js') }}" defer></script>
    <script src="{{ asset('libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('js/tabler.js') }}" defer></script>
    <script src="{{ asset('js/demo.js') }}" defer></script> 
</body>

</html>
