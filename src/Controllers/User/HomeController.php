<?php

namespace App\Controllers\User;

use App\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\PageLayout;

class HomeController extends Controller
{
    public function index()
    {
        $course = new Course;
        $category = new Category;

        $courses = $course->all();
        $categories = $category->find([
            'status' => 1
        ]);

        $data = [
            'title' => 'Home',
            'courses' => $courses,
            'categories' => $categories,
        ];

        view('user', [
            'content' => PageLayout::user('home'),
            'data' => $data
        ]);
    }

    public function about()
    {
        $data = [
            'title' => 'About',
        ];

        view('user', [
            'content' => PageLayout::user('about'),
            'data' => $data
        ]);
    }

}
