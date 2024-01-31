<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\PageLayout;

class CoursesControllerAdmin extends Controller
{
    // Show Course 
    public function index()
    {
        $courses = (new Course())->all();
        $category = (new Category())->all();
        $data = [
            'title' => 'Course',
            'courses' => $courses,
            'categories' => $category,
        ];
        view('admin', [
            'content' => PageLayout::admin('courses'),
            'data' => $data,
        ]);
    }

    // Add Course
    public function add()
    {
        if (isset($_POST['btn-add-course'])) {
            $name_add = $_POST['name-add'];
            $price_add = (int)$_POST['price-add'];
            $author_add = $_POST['author-add'];
            $title_add = $_POST['title-add'];
            $description_add = $_POST['description-add'];
            $category_add = $_POST['category-add'];
            $status_add = $_POST['status-add'];

            $course = new Course();

            $checkValidate = true;
            if (empty($name_add) || $name_add == '' || empty($author_add) || $author_add == '' || empty($title_add) || $title_add == '' || empty($description_add) || $description_add == '') {
                $checkValidate = false;
            }
            if (empty($price_add) || is_numeric($price_add) == false) {
                $checkValidate = false;
            }
            // Check category
            if (empty($category_add) || $category_add == "#") {
                $checkValidate = false;
            }

            if ($checkValidate == true) {
                if ($_FILES['thumbnail-add']['name']) {
                    $target_dir = asset('img/courses/');
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
                            'price' => $price_add,
                            'author' => $author_add,
                            'title' => $title_add,
                            'description' => $description_add,
                            'category_id' => $category_add,
                            'thumbnail' => $_FILES['thumbnail-add']['name'],
                            'created_at' => date('Y-m-d'),
                            'status' => $status_add,
                        ]; 

                        $course->create($dataAdd);
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify-course'] = [0, 'success', 'Add course successfully!'];
                        header('Location: /admin/course');
                    } else {
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify-course'] = [1, 'danger', 'Add course failed!'];
                        header('Location: /admin/course');
                    }
                } else {
                    $dataAdd = [
                        'name' => $name_add,
                        'price' => $price_add,
                        'author' => $author_add,
                        'title' => $title_add,
                        'description' => $description_add,
                        'category_id' => $category_add,
                        'thumbnail' => 'df_course.png',
                        'created_at' => date('Y-m-d'),
                        'status' => $status_add,
                    ];

                    $course->create($dataAdd);
                    // Notion: [0: success, 1: fail]
                    $_SESSION['notify-course'] = [0, 'success', 'Add course successfully!'];
                    header('Location: /admin/course');
                }
            } else {
                // Notion: [0: success, 1: fail]
                $_SESSION['notify-course'] = [1, 'danger', 'Add course failed!'];
                header('Location: /admin/course');
            }
        }
    }

    // Update Category
    // public function update()
    // {
    //     if (isset($_POST['btn-update-category'])) {
    //         $id_update = $_POST['id-update'];
    //         $name_update = $_POST['name-update'];
    //         $status_update = $_POST['status-update'];

    //         $category = new Category();

    //         $checkValidate = true;
    //         if (empty($name_update) || $name_update == '') {
    //             $checkValidate = false;
    //         } else {
    //             $checkValidate = true;
    //         }

    //         if ($checkValidate == true) {
    //             if ($_FILES['thumbnail-update']['name']) {
    //                 $target_dir = asset('img/categories/');
    //                 $target_file = $target_dir . basename($_FILES["thumbnail-update"]["name"]);
    //                 $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //                 $uploadOk = true;
    //                 // Check file size
    //                 if (($_FILES["thumbnail-update"]["size"] > 500000)) {
    //                     $uploadOk = false;
    //                 }
    //                 if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    //                     $uploadOk = false;
    //                 }
    //                 if ($uploadOk) {
    //                     move_uploaded_file($_FILES["thumbnail-update"]["tmp_name"], $target_file);
    //                     $dataUpdate = [
    //                         'name' => $name_update,
    //                         'thumbnail' => $_FILES['thumbnail-update']['name'],
    //                         'created_at' => date('Y-m-d'),
    //                         'status' => $status_update,
    //                     ];

    //                     $category->update($dataUpdate, $id_update);
    //                     // Notion: [0: success, 1: fail]
    //                     $_SESSION['notify-course'] = [0, 'success', 'Update category successfully!'];
    //                     header('Location: /admin/category');
    //                 } else {
    //                     // Notion: [0: success, 1: fail]
    //                     $_SESSION['notify-course'] = [1, 'danger', 'Update category failed!'];
    //                     header('Location: /admin/category');
    //                 }
    //             } else {
    //                 $thumbnail_old = $category->find(['id' => $id_update])[0]['thumbnail'];
    //                 $dataUpdate = [
    //                     'name' => $name_update,
    //                     'thumbnail' => $thumbnail_old,
    //                     'created_at' => date('Y-m-d'),
    //                     'status' => $status_update,
    //                 ];

    //                 $category->update($dataUpdate, $id_update);
    //                 // Notion: [0: success, 1: fail]
    //                 $_SESSION['notify-course'] = [0, 'success', 'Update category successfully!'];
    //                 header('Location: /admin/category');
    //             }
    //         } else {
    //             // Notion: [0: success, 1: fail]
    //             $_SESSION['notify-course'] = [1, 'danger', 'Update category failed!'];
    //             header('Location: /admin/category');
    //         }
    //     }
    // }

    // Delete Category
    // public function delete()
    // {
    //     if (isset($_POST['btn-delete-category'])) {
    //         $id_delete = $_POST['id-delete'];
    //         $category = new Category();

    //         $category->destroy($id_delete);
    //         // Notion: [0: success, 1: fail]
    //         $_SESSION['notify-course'] = [0, 'success', 'Delete category successfully!'];
    //         header('Location: /admin/category');
    //     }
    // }
}
