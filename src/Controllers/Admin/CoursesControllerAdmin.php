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
            if (empty($name_add) || empty($author_add) || empty($title_add) || empty($description_add)) {
                $checkValidate = false;
            }
            if (empty($price_add) || is_numeric($price_add) == false) {
                $checkValidate = false;
            }
            // Check category
            if (empty($category_add) || $category_add == "-1") {
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
                        move_uploaded_file($_FILES["thumbnail-add"]["tmp_name"], $target_file);

                        $dataAdd = [
                            'name' => $name_add,
                            'price' => $price_add,
                            'author' => $author_add,
                            'title' => $title_add,
                            'description' => $description_add,
                            'id_category' => $category_add,
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
                        'id_category' => $category_add,
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

    // Update Course
    public function update()
    {
        if (isset($_POST['btn-update-course'])) {
            $id_update = $_POST['id-update'];
            $name_update = $_POST['name-update'];
            $price_update = (int)$_POST['price-update'];
            $author_update = $_POST['author-update'];
            $title_update = $_POST['title-update'];
            $description_update = $_POST['description-update'];
            $category_update = $_POST['category-update'];
            $status_update = $_POST['status-update'];

            $course = new Course();

            $checkValidate = true;
            if (empty($name_update) || empty($author_update) || empty($title_update) || empty($description_update)) {
                $checkValidate = false;
            }
            if (empty($price_update) || is_numeric($price_update) == false) {
                $checkValidate = false;
            }
            if (empty($category_update) || $category_update == "-1") {
                $checkValidate = false;
            }
            if ($checkValidate == true) {
                if ($_FILES['thumbnail-update']['name']) {
                    $target_dir = 'http://localhost:8000/public/';
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
                        move_uploaded_file($_FILES["thumbnail-update"]["tmp_name"], $target_file);  
                        var_dump(move_uploaded_file($_FILES["thumbnail-update"]["tmp_name"], $target_file));
                        die;
                        $dataUpdate = [
                            'name' => $name_update,
                            'price' => $price_update,
                            'author' => $author_update,
                            'title' => $title_update,
                            'description' => $description_update,
                            'id_category' => $category_update,
                            'thumbnail' => $_FILES['thumbnail-update']['name'],
                            'created_at' => date('Y-m-d'),
                            'status' => $status_update,
                        ];

                        $course->update($dataUpdate, $id_update);
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify-course'] = [0, 'success', 'Update course successfully!'];
                        header('Location: /admin/course');
                    } else {
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify-course'] = [1, 'danger', 'Update course failed!'];
                        header('Location: /admin/course');
                    }
                } else {
                    $thumbnail_old = $course->find(['id' => $id_update])[0]['thumbnail'];
                    $dataUpdate = [
                        'name' => $name_update,
                        'price' => $price_update,
                        'author' => $author_update,
                        'title' => $title_update,
                        'description' => $description_update,
                        'id_category' => $category_update,
                        'thumbnail' => $thumbnail_old,
                        'created_at' => date('Y-m-d'),
                        'status' => $status_update,
                    ];

                    $course->update($dataUpdate, $id_update);
                    // Notion: [0: success, 1: fail]
                    $_SESSION['notify-course'] = [0, 'success', 'Update course successfully!'];
                    header('Location: /admin/course');
                }
            }
        }
    }

    // Delete Course
    public function delete()
    {
        if (isset($_POST['btn-delete-course'])) {
            $id_delete = $_POST['id-delete'];
            $course = new Course();

            $course->destroy($id_delete);
            // Notion: [0: success, 1: fail]
            $_SESSION['notify-course'] = [0, 'success', 'Delete course successfully!'];
            header('Location: /admin/course');
        }
    }
}
