<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Account;

class AuthController extends Controller
{
    public function login()
    {
        if (isset($_POST['btn-login'])) {
            $accounts = new Account();
            $usernameInput = $_POST['username'];
            $passwordInput = $_POST['password'];
            $acceptTerms = $_POST['acceptTerms'];

            if ($acceptTerms == 'on') {
                foreach ($accounts->all() as $account) {
                    if ($account['username'] === $usernameInput && $account['password'] === $passwordInput && $account['status'] === 0) {
                        $_SESSION['user'] = $account;
                    }
                }
            }
        }
        header('Location: /');
    }

    public function register()
    {
        if (isset($_POST['btn-register'])) {
            $accounts = new Account();
            $usernameInput = trim($_POST['username']);
            $passwordInput = trim($_POST['password']);
            $emailInput = trim($_POST['email']);
            $acceptTerms = $_POST['acceptTerms'];

            if ($acceptTerms == 'on') {

                $checkValidate = true;
                $regex_username = '/^[A-Za-z][A-Za-z0-9]{5,31}$/';
                $regex_password = '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/';
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
        }
        header('Location: /');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}
