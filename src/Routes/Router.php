<?php

use Phroute\Phroute\RouteCollector;

use App\Controllers\User\CourseController;
use App\Controllers\User\HomeControllerUser;

use App\Controllers\Admin\HomeControllerAdmin;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\CoursesController;
use App\Controllers\Admin\InvoiceController;
use App\Controllers\Admin\AccountController;
use App\Controllers\Admin\CommentController;
use App\Controllers\Admin\RevenueController;

use App\Controllers\ExceptionController;
use App\Controllers\AuthController;
use App\Controllers\Api\CourseControllerApi;

$router = new RouteCollector();

// Check Auth
// $router->filter('auth', function () {
//     if (!isset($_SESSION['user'])) {
//         header('Location: /login');
//         exit();
//     }
// });


// Grouping Route

// Group Route for User
$router->get('/', function () {
    $home = new HomeControllerUser();
    $home->index();
});

$router->get('/course', function () {
    $course = new CourseController();
    $course->index();
});

$router->get("/course/{id}", function ($id) {
    $course = new CourseController();
    $course->show($id);
});

$router->get('/my-course', function () {
    $course = new CourseController();
    $course->myCourse();
});

$router->get('/course/category/{id}', function ($id) {
    $course = new CourseController();
    $course->category($id);
});

$router->get('/course/{id}/learn/lesson-{lessonId}', function ($id, $lessonId) {
    $course = new CourseController();
    $course->learn($id, $lessonId);
});

$router->get('/about', function () {
    $home = new HomeControllerUser();
    $home->about();
});

$router->get('/contact', function () {
    $home = new HomeControllerUser();
    $home->contact();
});

$router->get('/blog', function () {
    $home = new HomeControllerUser();
    $home->blog();
});

// Group Route for Admin
// $router->group(['prefix' => 'admin', 'before' => 'auth'], function ($router) {
$router->get('/admin', function () {
    $home = new HomeControllerAdmin();
    $home->index();
});

$router->get('/admin/category', function () {
    $category = new CategoryController();
    $category->index();
});

$router->get('/admin/course', function () {
    $courses = new CoursesController();
    $courses->index();
});

$router->get('/admin/invoice', function () {
    $invoice = new InvoiceController();
    $invoice->index();
});

$router->get('/admin/account', function () {
    $account = new AccountController();
    $account->index();
});
// });


// If not url return 404
// $router->get('/{any}', function () {
//     $exception = new ExceptionController();
//     $exception->notFound();
// });

$router->get('/404', function () {
    $exception = new ExceptionController();
    $exception->notFound();
});

$router->get('/405', function () {
    $exception = new ExceptionController();
    $exception->notAllowed();
});

$router->get('/login', function () {
    $auth = new AuthController();
    $auth->login();
});

$router->post('/login', function () {
    $auth = new AuthController();
    $auth->loginPost();
});

$router->get('/api/courses', function () {
    $course = new CourseControllerApi();
    $course->index();
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
