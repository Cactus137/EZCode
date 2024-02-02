<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Category;

class CategoryController extends BaseController
{
    // Show Category
    public function index()
    {
        $categories = (new Category())->all();
        $data = [
            'title' => 'Category',
            'categories' => $categories,
        ];

        $this->render('admin.categories', compact('data')); 
    }

    // Add Category
    public function add()
    {
        if (isset($_POST['btn-add-category'])) {
            $name_add = trim($_POST['name-add']);
            $category = new Category();

            $checkValidate = true;
            if (empty($name_add)) {
                $checkValidate = false;
            } else {
                $cats = $category->all();
                foreach ($cats as $cat) {
                    if ($cat['name'] == $name_add) {
                        $checkValidate = false;
                    } else {
                        $checkValidate = true;
                    }
                }
            }

            if ($checkValidate == true) {
                if ($_FILES['thumbnail-add']['name']) {
                    $target_dir = getcwd() . DIRECTORY_SEPARATOR . asset('img/categories/');
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
                        move_uploaded_file($_FILES["thumbnail-add"]["tmp_name"], $target_dir . $_FILES['thumbnail-add']['name']);

                        $dataAdd = [
                            'name' => $name_add,
                            'thumbnail' => $_FILES['thumbnail-add']['name'],
                            'created_at' => date('Y-m-d'),
                            'status' => $_POST['status-add'],
                        ];

                        $category->create($dataAdd);
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify'] = [0, 'success', 'Add category successfully!', $target_file];
                        header('Location: /admin/category');
                    } else {
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify'] = [1, 'danger', 'Add category failed!'];
                        header('Location: /admin/category');
                    }
                } else {
                    $dataAdd = [
                        'name' => $name_add,
                        'thumbnail' => 'default.png',
                        'created_at' => date('Y-m-d'),
                        'status' => $_POST['status-add'],
                    ];

                    $category->create($dataAdd);
                    // Notion: [0: success, 1: fail]
                    $_SESSION['notify'] = [0, 'success', 'Add category successfully!'];
                    header('Location: /admin/category');
                }
            } else {
                // Notion: [0: success, 1: fail]
                $_SESSION['notify'] = [1, 'danger', 'Add category failed!'];
                header('Location: /admin/category');
            }
        }
    }

    // Update Category
    public function update()
    {
        if (isset($_POST['btn-update-category'])) {
            $id_update = $_POST['id-update'];
            $name_update = trim($_POST['name-update']);
            $status_update = $_POST['status-update'];

            $category = new Category();

            $checkValidate = true;
            if (empty($name_update)) {
                $checkValidate = false;
            } else {
                $checkValidate = true;
            }

            if ($checkValidate == true) {
                if ($_FILES['thumbnail-update']['name']) {
                    $target_dir = getcwd() . DIRECTORY_SEPARATOR . asset('img/categories/');
                    $target_file = $target_dir . basename($_FILES["thumbnail-update"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $uploadOk = true;
                    // Check file size
                    if (($_FILES["thumbnail-update"]["size"] > 500000)) {
                        $uploadOk = false;
                    }
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        $uploadOk = false;
                    }
                    if ($uploadOk) {
                        // Remove file image in folder
                        $thumbnail_old = $category->find(['id' => $id_update])[0]['thumbnail'];
                        unlink($target_dir . $thumbnail_old);
                        // Upload new file image
                        move_uploaded_file($_FILES["thumbnail-update"]["tmp_name"], $target_file);
                        $dataUpdate = [
                            'name' => $name_update,
                            'thumbnail' => $_FILES['thumbnail-update']['name'],
                            'created_at' => date('Y-m-d'),
                            'status' => $status_update,
                        ];

                        $category->update($dataUpdate, $id_update);
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify'] = [0, 'success', 'Update category successfully!'];
                        header('Location: /admin/category');
                    } else {
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify'] = [1, 'danger', 'Update category failed!'];
                        header('Location: /admin/category');
                    }
                } else {
                    $thumbnail_old = $category->find(['id' => $id_update])[0]['thumbnail'];
                    $dataUpdate = [
                        'name' => $name_update,
                        'thumbnail' => $thumbnail_old,
                        'created_at' => date('Y-m-d'),
                        'status' => $status_update,
                    ];

                    $category->update($dataUpdate, $id_update);
                    // Notion: [0: success, 1: fail]
                    $_SESSION['notify'] = [0, 'success', 'Update category successfully!'];
                    header('Location: /admin/category');
                }
            } else {
                // Notion: [0: success, 1: fail]
                $_SESSION['notify'] = [1, 'danger', 'Update category failed!'];
                header('Location: /admin/category');
            }
        }
    }

    // Delete Category
    public function delete()
    {
        if (isset($_POST['btn-delete-category'])) {
            $id_delete = $_POST['id-delete'];
            $category = new Category();

            // Remove file image in folder
            $thumbnail_delete = $category->find(['id' => $id_delete])[0]['thumbnail'];
            $target_dir = getcwd() . DIRECTORY_SEPARATOR . asset('img/categories/');
            $target_file = $target_dir . $thumbnail_delete;
            unlink($target_file);
            $category->destroy($id_delete);
            // Notion: [0: success, 1: fail]
            $_SESSION['notify'] = [0, 'success', 'Delete category successfully!'];
            header('Location: /admin/category');
        }
    }
}
