<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
class HomeControllerAdmin extends BaseController
{
    public function index()
    {

        $data = [
            'title' => "Dashboard",
        ];

        $this->render('admin.home', compact('data'));
    }
}
