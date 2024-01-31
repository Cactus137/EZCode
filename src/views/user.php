<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title><?= $data['title'] ?></title>
    <link rel="shortcut icon" href="<?= asset('img/user/Logo.png') ?>" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= asset('libs/animate/animate.css') ?>" rel="stylesheet" />
    <link href="<?= asset('libs/owlcarousel/assets/owl.carousel.css') ?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= asset('css/user/bootstrap.min.css') ?>" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="<?= asset('css/user/style.css') ?>" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
    <header>
        <?php include "partials/user/header.php" ?>
    </header>
    
    <main class="min-vh-100">
        <?php include $content ?>
    </main>


    <footer class="footer-section">
        <?php include "partials/user/footer.php" ?>
    </footer> 
    
    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= asset('libs/wow/wow.js') ?>"></script>
    <script src="<?= asset('libs/easing/easing.js') ?>"></script>
    <script src="<?= asset('libs/waypoints/waypoints.js') ?>"></script>
    <script src="<?= asset('libs/owlcarousel/owl.carousel.js') ?>"></script>

    <!-- Template Javascript -->
    <script src="<?= asset('js/user/main.js') ?>"></script>
</body>

</html>