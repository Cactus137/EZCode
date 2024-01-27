<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Models\Course;

class CourseControllerApi extends Controller
{
    public function index()
    {
        $course = new Course;
        $courses = $course->all();
        return $this->json($courses, 200);
    }

    public function show($id)
    {
        $course = new Course;
        $detailCourse = $course->find(['id_course' => $id]);
        return $this->json($detailCourse, 200);
    }
}
