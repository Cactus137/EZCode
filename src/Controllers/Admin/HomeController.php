<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\PageLayout;

class HomeController extends Controller
{
    public function index()
    {
        view('admin', [
            'content' => PageLayout::admin('home')
        ]);
    } 
}
