<?php

namespace App\Routes;

use App\Controllers\PaymentController;
use App\Controllers\User\CourseController;
use App\Controllers\User\HomeController;
use App\Controllers\User\EnrollmentController;
use App\Controllers\User\PostController;
use Phroute\Phroute\Route;

class User
{
    public static function route()
    {
        Router::get('/', function () {
            $home = new HomeController();
            $home->index();
        });

        Router::get('/course', function () {
            $course = new CourseController();
            $course->index();
        });

        Router::get("/course/{id}", function ($id) {
            $course = new CourseController();
            $course->show($id);
        });

        Router::get('/my-course', function () {
            $course = new CourseController();
            $course->myCourse();
        });
        
        Router::get('/about', function () {
            $home = new HomeController();
            $home->about();
        });

        // Router::get('/checkout/{id}', function ($id) {
        //     $course = new PaymentController();
        //     $course->checkout($id);
        // });

        // Router::get('/invoice/{transactionId}', function ($transactionId) {
        //     $invoice = new PaymentController();
        //     $invoice->showInvoce($transactionId);
        // });

        // Router::get('/enrollment', function () {
        //     $enrollment = new EnrollmentController();
        //     $enrollment->index();
        // });

        Router::get('/course/{id}/learn/lesson-{lessonId}', function ($id, $lessonId) {
            $course = new CourseController();
            $course->learn($id, $lessonId);
        });

        // Router::get('/teacher', function () {
        // });

        // Router::get('/post', function () {
        //     $post = new PostController();
        //     $post->index();
        // });

        // Router::get('/post/{id}', function ($id) {
        //     $post = new PostController();
        //     $post->show($id);
        // });

    }
}
