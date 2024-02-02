<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Course;
use App\Models\Category;

class CoursesControllerAdmin extends BaseController
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

        $this->render('admin.courses', compact('data'));
    }

    // Add Course
    public function add()
    {
        if (isset($_POST['btn-add-course'])) {
            $name_add = trim($_POST['name-add']);
            $price_add = trim((int)$_POST['price-add']);
            $author_add = trim($_POST['author-add']);
            $title_add = trim($_POST['title-add']);
            $description_add = trim($_POST['description-add']);
            $category_add = $_POST['category-add'];
            $status_add = $_POST['status-add'];

            $course = new Course();

            $checkValidate = true;
            if (empty($name_add) || empty($author_add) || empty($title_add)) {
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
                    $target_dir = getcwd() . DIRECTORY_SEPARATOR . asset('img/courses/');
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
            $name_update = trim($_POST['name-update']);
            $price_update = trim((int)$_POST['price-update']);
            $author_update = trim($_POST['author-update']);
            $title_update = trim($_POST['title-update']);
            $description_update = trim($_POST['description-update']);
            $category_update = $_POST['category-update'];
            $status_update = $_POST['status-update'];

            $course = new Course();

            $checkValidate = true;
            if (empty($name_update) || empty($author_update) || empty($title_update)) {
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
                    $target_dir = getcwd() . DIRECTORY_SEPARATOR . asset('img/courses/');
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
                        $thumbnail_old = $course->find(['id' => $id_update])[0]['thumbnail'];
                        unlink($target_dir . $thumbnail_old);
                        // Upload new file image
                        move_uploaded_file($_FILES["thumbnail-update"]["tmp_name"], $target_file);

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

            // Remove file image in folder
            $thumbnail_delete = $course->find(['id' => $id_delete])[0]['thumbnail'];
            $target_dir = getcwd() . DIRECTORY_SEPARATOR . asset('img/courses/');
            $target_file = $target_dir . $thumbnail_delete;
            unlink($target_file);
            $course->destroy($id_delete);
            // Notion: [0: success, 1: fail]
            $_SESSION['notify-course'] = [0, 'success', 'Delete course successfully!'];
            header('Location: /admin/course');
        }
    }
}
