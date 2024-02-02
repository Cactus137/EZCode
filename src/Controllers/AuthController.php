<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Account;

class AuthController extends BaseController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accounts = new Account();
            $usernameInput = $_POST['username'];
            $passwordInput = $_POST['password'];

            foreach ($accounts->all() as $account) {
                if ($account['username'] === $usernameInput && $account['password'] === $passwordInput && $account['status'] === 0) {
                    $_SESSION['user'] = $account;
                }
            }
        }
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) {
            header('Location: /admin');
        } else {
            header('Location: /');
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accounts = new Account();
            $usernameInput = trim($_POST['username']);
            $passwordInput = trim($_POST['password']);
            $emailInput = trim($_POST['email']);

            $checkValidate = true;
            $regex_username = '/^[A-Za-z][A-Za-z0-9]{5,31}$/';
            $regex_password = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';
            $regex_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

            if (!preg_match($regex_username, $usernameInput)) {
                $checkValidate = false;
            }
            if (!preg_match($regex_password, $passwordInput)) {
                $checkValidate = false;
            }
            if (!preg_match($regex_email, $emailInput)) {
                $checkValidate = false;
            }

            if ($checkValidate) {
                $accounts->create(
                    [
                        'username' => $usernameInput,
                        'password' => $passwordInput,
                        'email' => $emailInput,
                    ]
                );
            }
        }
        header('Location: /');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}
