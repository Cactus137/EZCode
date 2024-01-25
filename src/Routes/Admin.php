<?php

namespace App\Routes;

use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\CoursesController;
use App\Controllers\Admin\InvoiceController;
use App\Controllers\Admin\AccountController;
use App\Controllers\Admin\CommentController;
use App\Controllers\Admin\RevenueController;

class Admin
{
    private static $routes;

    public static function route()
    {
        Router::get('/admin', function () {
            $home = new HomeController();
            $home->index();
        });

        Router::get('/admin/category', function () {
            $category = new CategoryController();
            $category->index();
        }); 

        Router::get('/admin/course', function () {
            $courses = new CoursesController();
            $courses->index();
        }); 

        // Create new category
        Router::post('/admin/category/add-category', function () {
            $category = new CategoryController();
            $category->add();
        });

        Router::get('/admin/invoice', function () {
            $invoice = new InvoiceController();
            $invoice->index();
        });

        Router::get('/admin/account', function () {
            $account = new AccountController();
            $account->index();
        });
    }
}
