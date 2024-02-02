<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Course;
use App\Models\Category;

class HomeControllerUser extends BaseController
{
    public function index()
    {
        $course = new Course;
        $category = new Category;

        $courses = $course->all();
        $categories = $category->find([
            'status' => 0
        ]);

        $data = [
            'title' => 'Home',
            'courses' => $courses,
            'categories' => $categories,
        ];

        $this->render('user.home', compact('data'));
    }

    public function about()
    {
        $data = [
            'title' => 'About',
        ];

        $this->render('user.about', compact('data'));
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact',
        ];

        $this->render('user.contact', compact('data'));
    }

    public function blog()
    {
        $data = [
            'title' => 'Blog',
        ];

        $this->render('user.blog', compact('data'));
    }
}
