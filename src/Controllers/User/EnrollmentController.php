<?php

namespace App\Controllers\User;

use App\Controllers\Controller;
use App\Models\Course;
use App\Models\PageLayout;

class EnrollmentController extends Controller
{
    public function index()
    {
        $course = new Course;

        $courses = $course->all();

        $data = [
            'title' => 'Home',
            'courses' => $courses
        ];

        view('user', [
            'content' => PageLayout::user('enrollment'),
            'data' => $data
        ]);
    }
}
