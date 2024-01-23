<?php

namespace App\Controllers\User;

use App\Controllers\Controller;
use App\Models\Course;
use App\Models\PageLayout;

class CourseController extends Controller
{
    public function index()
    {
    }

    public function show($id)
    {
        $course = new Course();
        $courses = $course->find([
            'id' => $id,
        ]);

        $data = [
            'title' => $courses[0]['course_name'],
            'courses' => $courses
        ];

        view('user', [
            'content' => PageLayout::user('course'),
            'data' => $data
        ]);
    }

    public function learn($id, $lessonId)
    {
        $course = new Course();
        $courses = $course->find([
            'id' => $id
        ]);

        $data = [
            'title' => $courses[0]['course_name'],
            'courses' => $courses
        ];

        view('user', [
            'content' => PageLayout::user('learn'),
            'data' => $data
        ]);
    }
}
