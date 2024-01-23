<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="./src/views/static/logo-small.svg" type="image/x-icon">
    <title><?= $data['title'] ?></title>
    <!-- CSS files -->
    <link href="<?= asset('css/admin/tabler.css') ?>" rel="stylesheet" />
    <link href="<?= asset('css/admin/tabler-flags.css') ?>" rel="stylesheet" />
    <link href="<?= asset('css/admin/tabler-payments.css') ?>" rel="stylesheet" />
    <link href="<?= asset('css/admin/tabler-vendors.css') ?>" rel="stylesheet" />
    <link href="<?= asset('css/admin/demo.css') ?>" rel="stylesheet" />
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
    <link href="<?= asset('js/demo-theme.js') ?>" rel="stylesheet" />
    <header>
        <?php include "partials/admin/header.php" ?>
    </header>
    <main class="min-vh-100">
        <?php include $content ?>
    </main>
    <footer class="footer-section">
        <?php include "partials/admin/footer.php" ?>
    </footer>

</body>

</html>