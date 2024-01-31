<style>
    .course_text {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* number of lines to show */
        line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Courses</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Courses</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Courses Start -->
<div class="container-xxl mb-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section_title text-center">
                        <h2>Choose your course</h2>
                    </div>
                    <div class="section_subtitle">Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam. Nullam bibendum interdum dui, ac tempor lorem convallis ut</div>
                </div>
            </div>
        </div>
        <form class="row w-100 my-5">
            <div class="col">
                <input type="password" class="form-control" id="inputPassword2" placeholder="Course">
            </div>
            <div class="col">
                <select class="form-select">
                    <option selected>-- Category --</option>
                    <?php
                    foreach ($data['categories'] as $key => $category) :
                        extract($category);
                    ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <select class="form-select">
                    <option selected>-- Sorting by --</option>
                    <option value="1">Number of participants</option>
                    <option value="2">Newest</option>
                    <option value="3">Price high to low</option>
                    <option value="4">Price low to high</option>
                    <option value="5">Rating</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Search course</button>
            </div>
        </form>
        <!-- Course Search -->
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
            <?php
            $courses = $data['courses'];
            foreach ($courses as $course) :
                extract($course);
            ?>
                <div class="col">
                    <div class="card h-100">
                        <a href="/course/<?= $id ?>" class="text-decoration-none">
                            <img src="<?= asset('img/courses/' . $thumbnail) ?>" class="card-img-top" style="min-height: 170px;">
                        </a>
                        <div class="card-body">
                            <div class="course_header d-flex flex-row align-items-center justify-content-start">
                                <a href="payment.php" class="btn btn-primary me-3">Join now</a>
                                <div class="course_price ml-auto fs-5">Price: <span class="price_after me-2 text-success fs-6">$<?= number_format($price) ?></span></div>
                            </div>
                            <div class="course_title mt-3">
                                <a href="/course/<?= $id ?>" class="text-decoration-none">
                                    <h5 class="card-title my-0 fs-5"><?= $name; ?></h5>
                                </a>
                                <p class="course_author_name m-0 text-secondary fs-6"><?= $author ?></p>
                            </div>
                            <div class="course_text">
                                <?= $title ?>
                            </div>
                            <div class="course_footer align-items-center justify-content-start mt-3">
                                <div class="rating d-flex">
                                    <p class="percent my-0 me-2 p-0"><?= $rating ?></p>
                                    <?php
                                    for ($j = 0; $j < 5; $j++) :
                                    ?>
                                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                            <path fill="#FFD43B" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                                    <?php endfor; ?>
                                    <p class="number-rating my-0 ms-2 p-0">(<?= $number_of_participants ?>)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Pagination -->
        <nav aria-label="Page navigation example" class="d-flex justify-content-end">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</div>
<!-- Courses End -->