<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Category;
use App\Models\PageLayout;

class CategoryController extends Controller
{
    public function index()
    {
        view('admin', [
            'content' => PageLayout::admin('categories')
        ]);
    } 
}
