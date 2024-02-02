<?php

namespace App\Controllers;

class ExceptionController  
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
