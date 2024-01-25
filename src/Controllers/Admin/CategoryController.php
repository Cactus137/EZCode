<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Category;
use App\Models\PageLayout;

class CategoryController extends Controller
{
    public function index()
    {
        $category = new Category();
        $categories = $category->all();
        $data = [
            'title' => 'Category',
            'categories' => $categories,
        ];

        view('admin', [
            'content' => PageLayout::admin('categories'),
            'data' => $data,
        ]);
    }

    public function add()
    {
        if (isset($_POST['btn-add-category'])) {
            $category = new Category();

            $checkValidate = true;
            if (empty($_POST['name-add']) || $_POST['name-add'] == '') {
                $checkValidate = false;
            } else {
                $cats = $category->all();
                foreach ($cats as $cat) {
                    if ($cat['name'] == $_POST['name-add']) {
                        $checkValidate = false;
                    } else {
                        $checkValidate = true;
                    }
                }
            }

            if ($checkValidate == true) {
                if ($_FILES['thumbnail-add']['name']) {
                    $target_dir = asset('img/categories/');
                    $target_file = $target_dir . basename($_FILES["thumbnail-add"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $uploadOk = true;
                    // Check file size
                    if (($_FILES["thumbnail-add"]["size"] > 500000)) {
                        $uploadOk = false;
                    }
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        $uploadOk = false;
                    }
                    if ($uploadOk) {
                        move_uploaded_file($_FILES["thumbnail-add"]["tmp_name"], $target_file);
                        $dataAdd = [
                            'name' => $_POST['name-add'],
                            'thumbnail' => $_FILES['thumbnail-add']['name'],
                            'created_at' => date('Y-m-d'),
                            'status' => $_POST['status-add'],
                        ];

                        $category->create($dataAdd);
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify'] = 0;
                        header('Location: /admin/category');
                    } else {
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify'] = 1;
                        header('Location: /admin/category');
                    }
                } else {
                    $dataAdd = [
                        'name' => $_POST['name-add'],
                        'thumbnail' => 'default.png',
                        'created_at' => date('Y-m-d'),
                        'status' => $_POST['status-add'],
                    ];

                    $category->create($dataAdd);
                    // Notion: [0: success, 1: fail]
                    $_SESSION['notify'] = 0;
                    header('Location: /admin/category');
                }
            } else {
                // Notion: [0: success, 1: fail]
                $_SESSION['notify'] = 1;
                header('Location: /admin/category');
            }
        }
    }
}
