<?php

namespace App\Routes;

use App\Controllers\AuthController;

class Auth
{
    public static function route()
    {
        Router::get('/login', function () {
            $auth = new AuthController();
            $auth->login();
        });

        Router::post('/login', function () {
            $auth = new AuthController();
            $auth->loginPost();
        });
    }
}
