<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Course;
use App\Models\PageLayout;

class CoursesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Course',
        ];
        
        view('admin', [
            'content' => PageLayout::admin('courses'),
            'data' => $data,
        ]);
    } 
}
