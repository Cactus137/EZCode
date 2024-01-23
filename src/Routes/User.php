<?php

namespace App\Routes;

use App\Controllers\PaymentController;
use App\Controllers\User\CourseController;
use App\Controllers\User\HomeController;
use App\Controllers\User\EnrollmentController;
use App\Controllers\User\PostController;

class User
{
    public static function route()
    {
        Router::get('/', function () {
            $home = new HomeController();
            $home->index();
        });

        Router::get("/course/{id}", function ($id) {
            $course = new CourseController();
            $course->show($id);
        });
        
        Router::get('/checkout/{id}', function ($id) {
            $course = new PaymentController();
            $course->checkout($id);
        });

        Router::get('/invoice/{transactionId}', function ($transactionId) {
            $invoice = new PaymentController();
            $invoice->showInvoce($transactionId);
        });

        Router::get('/enrollment', function () {
            $enrollment = new EnrollmentController();
            $enrollment->index();
        });

        Router::get('/course/{id}/learn/lesson-{lessonId}', function ($id, $lessonId) {
            $course = new CourseController();
            $course->learn($id, $lessonId);
        });

        Router::get('/teacher', function () {
        });

        Router::get('/post', function () {
            $post = new PostController();
            $post->index();
        });

        Router::get('/post/{id}', function ($id) {
            $post = new PostController();
            $post->show($id);
        });

    }
}
