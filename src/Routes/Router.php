<?php

use Phroute\Phroute\RouteCollector;

// User Controller
use App\Controllers\User\HomeControllerUser;
use App\Controllers\User\CourseController;
// Admin Controller
use App\Controllers\Admin\HomeControllerAdmin;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\CoursesControllerAdmin;
use App\Controllers\Admin\AccountController;
use App\Controllers\Admin\InvoiceController;
// Api Controller
use App\Controllers\Api\CourseControllerApi;
use App\Controllers\Api\CategoryControllerApi;
use App\Controllers\Api\AccountControllerApi;
// Exception Controller
use App\Controllers\ExceptionController;
// Auth Controller
use App\Controllers\AuthController;
// Payment Controller
use App\Controllers\PaymentController;

$router = new RouteCollector();

// Check Auth User
$router->filter('authUser', function () {
    if (!isset($_SESSION['user'])) {
        header('Location: /');
        exit();
    }
});

// Check Auth Admin
$router->filter('authAdmin', function () {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
        header('Location: /');
        exit();
    }
});


// Home
$router->get('/', function () {
    $home = (new HomeControllerUser())->index();
});
// Course
$router->get('/course', function () {
    $course = (new CourseController())->index();
});
// Detail Course
$router->get("/course/{id}", function ($id) {
    $course = (new CourseController())->show($id);
});
// My course
$router->get('/my-course', function () {
    $course = (new CourseController())->myCourse();
});
// Course by Category
$router->get('/course/category/{id}', function ($id) {
    $course = (new CourseController())->category($id);
});
// Learn Course
$router->get('/course/{id}/learn/lesson-{lessonId}', function ($id, $lessonId) {
    $course = (new CourseController())->learn($id, $lessonId);
});
// About
$router->get('/about', function () {
    $home = (new HomeControllerUser())->about();
});
// Contact
$router->get('/contact', function () {
    $home = (new HomeControllerUser())->contact();
});
// Blog
$router->get('/blog', function () {
    $home = (new HomeControllerUser())->blog();
});
$router->get('/invoice/{id}', function ($id) {
    $invoice = (new PaymentController())->showInvoce($id);
});
$router->get('/checkout/{id_course}', function ($id_course) {
    $invoice = (new PaymentController())->checkout($id_course);
});
// checkout handle
$router->post('/checkout/handle', function () {
    $invoice = (new PaymentController())->checkoutHandle();
}); 

// Group Route for Admin
$router->group(['before' => 'authAdmin', 'prefix' => 'admin'], function ($router) {
    // Dashboad
    $router->get('', function () {
        $home = (new HomeControllerAdmin())->index();
    });
    // Category Admin
    $router->get('/category', function () {
        $category = (new CategoryController())->index();
    });
    // Add Category
    $router->post('/category/add-category', function () {
        $category = (new CategoryController())->add();
    });
    // Update Category
    $router->post('/category/update-category', function () {
        $category = (new CategoryController())->update();
    });
    // Delete Category
    $router->post('/category/delete-category', function () {
        $category = (new CategoryController())->delete();
    });
    // Course Admin
    $router->get('/course', function () {
        $courses = (new CoursesControllerAdmin)->index();
    });
    // Add Course
    $router->post('/course/add-course', function () {
        $course = (new CoursesControllerAdmin())->add();
    });
    // Update Course
    $router->post('/course/update-course', function () {
        $course = (new CoursesControllerAdmin())->update();
    });
    // Delete Course
    $router->post('/course/delete-course', function () {
        $course = (new CoursesControllerAdmin())->delete();
    });
    // Account Admin
    $router->get('/account', function () {
        $account = (new AccountController())->index();
    });
    // Add Account
    $router->post('/account/add-account', function () {
        $account = (new AccountController())->add();
    });
    // Update Account
    $router->post('/account/update-account', function () {
        $account = (new AccountController())->update();
    });
    // Delete Account
    $router->post('/account/delete-account', function () {
        $account = (new AccountController())->delete();
    });
    $router->get('/invoice', function () {
        $invoice = (new InvoiceController())->index();
    });
});

$router->group(['before' => 'authAdmin'], function ($router) {
    // API Category
    $router->get('/api/category/{id}', function ($id) {
        $category = new CategoryControllerApi();
        $category->show($id);
    });
    // API Course
    $router->get('/api/course/{id}', function ($id) {
        $course = new CourseControllerApi();
        $course->show($id);
    });
    // API Account
    $router->get('/api/account/{id}', function ($id) {
        $account = new AccountControllerApi();
        $account->show($id);
    });
});


// Exception
$router->get('/404', function () {
    $exception = (new ExceptionController())->notFound();
});
$router->get('/405', function () {
    $exception = (new ExceptionController())->notAllowed();
});

// Login
$router->post('/login', function () {
    $auth = (new AuthController())->login();
});
// Register
$router->post('/register', function () {
    $auth = (new AuthController())->register();
});
// Logout
$router->get('/logout', function () {
    $auth = (new AuthController())->logout();
});



$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
