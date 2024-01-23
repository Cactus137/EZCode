<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        view('pages/login');
    }

    public function loginPost()
    {
        $user = new User();
        $users = $user->find([
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ]);

        if ($users) {
            echo 'Login success';
        } else {
            echo 'Login failed';
        }
    }
}
