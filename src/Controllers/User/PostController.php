<?php

namespace App\Controllers\User;

use App\Controllers\Controller;
use App\Models\PageLayout;

class PostController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Blog'
        ];

        view('user', [
            'content' => PageLayout::user('post'),
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $data = [
            'title' => 'Blog'
        ];

        view('user', [
            'content' => PageLayout::user('post-detail'),
            'data' => $data
        ]);
    }
}
