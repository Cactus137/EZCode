<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>405</title>
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

<body class=" border-top-wide border-primary d-flex flex-column">
    <link href="<?= asset('js/demo-theme.js') ?>" rel="stylesheet" />
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="empty">
                <div class="empty-header">405</div>
                <p class="empty-title">Đã có lỗi xảy ra</p>
                <p class="empty-subtitle text-secondary">
                    Bạn không có quyền truy cập trang này.
                    Liên hệ với quản trị viên để được hỗ trợ.
                </p>
                <div class="empty-action">
                    <a href="./" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M5 12l6 6" />
                            <path d="M5 12l6 -6" />
                        </svg>
                        Quay lại trang chủ
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <link href="<?= asset('js/tabler.js') ?>" rel="stylesheet" />
    <link href="<?= asset('js/demo.js') ?>" rel="stylesheet" />
</body>

</html>