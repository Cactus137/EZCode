<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\PageLayout;
use App\Models\Account;

class AccountController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Account",
        ];
        
        view('admin', [
            'content' => PageLayout::admin('accounts'),
            'data' => $data
        ]);
    }
}
