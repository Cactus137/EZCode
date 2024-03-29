<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\PageLayout;

class HomeControllerAdmin extends Controller
{
    public function index()
    {

        $data = [
            'title' => "Dashboard",
        ];

        view('admin', [
            'content' => PageLayout::admin('home'),
            'data' => $data,
        ]);
    }
}
