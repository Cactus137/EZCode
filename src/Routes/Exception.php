<?php
namespace App\Routes;

use App\Controllers\ExceptionController;

class Exception {
    public static function route()
    {
        Router::get('/404', function () {
            $exception = new ExceptionController();
            $exception->notFound();
        });

        Router::get('/405', function () {
            $exception = new ExceptionController();
            $exception->notAllowed();
        });
    }
}
