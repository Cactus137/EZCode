<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $course = new Course;
        $courses = $course->all();
        return $this->json($courses, 200);
    }

    public function show($id)
    {
        echo "Course $id";
    }
}
