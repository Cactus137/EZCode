<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EZCode | Course Learning</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/Logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="shadow sticky-top py-2" style="background-color: #29303b;">
        <div class="row m-0 p-0">
            <div class="col-1 pe-0">
                <a href="index.php" class="d-flex align-items-center px-4 py-2 text-decoration-none pe-0">
                    <img src="img/icons/left-arrow.png" alt="" width="10px" class="me-2">
                    <div class="my-0 me-3 text-light pe-4" style="border-right: 1px solid white;">Home</div>
                </a>
            </div>
            <div class="col-9 text-light d-flex align-items-center ps-0">
                Lorem ipsum dolor sit amet
            </div>
            <div class="col text-light pe-4 text-end align-middle d-flex align-items-center justify-content-end">
                <p class="course-content m-0" style="cursor: pointer; display: none">Course content</p>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    <!-- Container Start -->
    <div class="container-fluid p-0 m-0 position-relative">
        <div class="row m-0 p-0 position-relative">
            <div class="content-main col-md-9 p-0 m-0" style="min-height: 100vh;">
                <div class="w-100 h-100">
                    <iframe style="width: 100%; height: 700px;" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                    <div class="info-course ms-3">
                        <h5 class="my-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, molestias.</h5>
                        <p class="content pe-4"> sed voluptates velit temporibus vitae.
                            Quasi quaerat, at, fugit, natur, eius quas?</p>
                    </div>
                </div>
            </div>
            <div class="content-extra col-md-3 p-0 m-0 position-fixed end-0" style="overflow-y: auto; max-height: 100vh;">
                <div class="top border-bottom d-flex align-items-center justify-content-between sticky-top" style="background-color: #e2e2e2">
                    <p class="py-3 m-0 ms-3">Course content</p>
                    <i id="closeNavMenu" class="fa-solid fa-xmark pe-2"></i>
                </div>
                <ul class="list-group list-group-flush">
                    <?php for ($i = 0; $i < 100; $i++) : ?>
                        <li class="list-group-item py-3">1.&emsp;An item</li>
                        <li class="list-group-item py-3">2.&emsp;A second item</li>
                        <li class="list-group-item py-3">3.&emsp;A third item</li>
                        <li class="list-group-item py-3">4.&emsp;A fourth item</li>
                        <li class="list-group-item py-3">5.&emsp;And a fifth one</li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Container End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.js"></script>
    <script src="lib/easing/easing.js"></script>
    <script src="lib/waypoints/waypoints.js"></script>
    <script src="lib/owlcarousel/owl.carousel.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        var closeNavMenu = document.getElementById('closeNavMenu');
        var contentExtra = document.querySelector('.content-extra');
        var contentMain = document.querySelector('.content-main');
        var courseContent = document.querySelector('.course-content');

        closeNavMenu.addEventListener('click', function() {
            contentExtra.style.display = 'none';
            contentMain.classList.remove('col-md-9');
            contentMain.classList.add('col-md-12');
            courseContent.style.display = 'block';
        })

        courseContent.addEventListener('click', function() {
            contentExtra.style.display = 'block';
            contentMain.classList.remove('col-md-12');
            contentMain.classList.add('col-md-9');
            courseContent.style.display = 'none';
        })
    </script>
</body>

</html>