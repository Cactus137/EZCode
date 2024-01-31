<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\Comment;

class CourseControllerApi extends Controller
{
    // public function index()
    // {
    //     $course = new Course;
    //     $courses = $course->all();
    //     return $this->json($courses, 200);
    // }

    public function show($id)
    {
        $course = (new Course)->find(['id' => $id]);
        $course[0]['category'] = (new Category)->find(['id' => $course[0]['id_category']])[0]['name'];
        $course[0]['number_of_participants'] = count((new Comment)->find(['id_course' => $id, 'status' => 0]));
        echo $this->json($course, 200);
    }
}
