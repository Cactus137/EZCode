<?php

namespace App\Routes;

use App\Controllers\Api\CourseController;

class Api
{
    public static function route()
    {
        Router::get('/api/courses', function () {
            $course = new CourseController();
            $course->index();
        });
    }
}
