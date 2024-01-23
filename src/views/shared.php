<!doctype html>
<html lang="en">

<head>
    <title>Admin - Trang quản trị</title>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="./src/views/static/logo-small.svg" type="image/x-icon">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS libraries -->
    <link href="<?= asset('css/tabler.css') ?>" rel="stylesheet" />
    <link href="<?= asset('css/tabler-flags.css') ?>" rel="stylesheet" />
    <link href="<?= asset('css/tabler-payments.css') ?>" rel="stylesheet" />
    <link href="<?= asset('css/tabler-vendors.css') ?>" rel="stylesheet" />
    <link href="<?= asset('css/demo.css') ?>" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    <script src="<?= asset('js/demo-theme.js') ?>"></script>
    <main>
        <?php include $content ?>
    </main>
    <script src="<?= asset('libs/apexcharts/dist/apexcharts.js') ?>" defer></script>
    <script src="<?= asset('libs/jsvectormap/dist/js/jsvectormap.js') ?>" defer></script>
    <script src="<?= asset('ibs/jsvectormap/dist/maps/world.js') ?>l" defer></script>
    <script src="<?= asset('libs/jsvectormap/dist/maps/world-merc.js') ?>" defer></script>
    <!-- Tabler Core -->
    <script src="<?= asset('js/tabler.js') ?>" defer></script>
    <script src="<?= asset('js/demo.js') ?>" defer></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>