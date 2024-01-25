<?php

namespace App\Controllers;

use App\Controllers\Controller;

class ExceptionController extends Controller
{

    public function notFound()
    {
        view('errors/404');
    }

    public function notAllowed()
    {
        view('errors/405');
    }
}
