<?php

use App\Routes\Admin;
use App\Routes\Api;
use App\Routes\Auth;
use App\Routes\Exception;
use App\Routes\User;
use App\Routes\Router;

require_once 'vendor/autoload.php';
require_once 'config.php';

Api::route();
Exception::route();
Auth::route();
User::route();
Admin::route();

$current = $_SERVER['REQUEST_URI'];
Router::run($current);
