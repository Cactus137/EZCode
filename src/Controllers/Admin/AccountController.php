<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\PageLayout;
use App\Models\Account;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = (new Account())->all();

        $data = [
            'title' => "Account",
            'accounts' => $accounts,
        ];

        view('admin', [
            'content' => PageLayout::admin('accounts'),
            'data' => $data
        ]);
    }

    public function add()
    {
        if (isset($_POST['btn-add-account'])) {
            $username_add = trim($_POST['username-add']);
            $fullname_add = trim($_POST['fullname-add']);
            $password_add = trim($_POST['password-add']);
            $email_add = trim($_POST['email-add']);
            $role_add = $_POST['role-add'];
            $status_add = $_POST['status-add'];

            $account = new Account();

            $checkValidate = true;
            $regex_username = '/^[A-Za-z][A-Za-z0-9]{5,31}$/';
            $regex_password = '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/';
            $regex_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

            if (!preg_match($regex_username, $username_add)) {
                $checkValidate = false;
            }
            if (!preg_match($regex_password, $password_add)) {
                $checkValidate = false;
            }
            if (!preg_match($regex_email, $email_add)) {
                $checkValidate = false;
            }

            if ($checkValidate == true) {
                if ($_FILES['avatar-add']['name']) {
                    $target_dir = getcwd() . DIRECTORY_SEPARATOR . asset('img/accounts/');
                    $target_file = $target_dir . basename($_FILES["avatar-add"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $uploadOk = true;
                    // Check file size
                    if (($_FILES["avatar-add"]["size"] > 500000)) {
                        $uploadOk = false;
                    }
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        $uploadOk = false;
                    }
                    if ($uploadOk) {
                        move_uploaded_file($_FILES["avatar-add"]["tmp_name"], $target_file);

                        $dataAdd = [
                            'username' => $username_add,
                            'fullname' => $fullname_add,
                            'password' => $password_add,
                            'email' => $email_add,
                            'avatar' => $_FILES['avatar-add']['name'],
                            'role' => $role_add,
                            'status' => $status_add,
                        ];

                        $account->create($dataAdd);
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify-account'] = [0, 'success', 'Add account successfully!'];
                        header('Location: /admin/account');
                    } else {
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify-account'] = [1, 'danger', 'Add account failed!'];
                        header('Location: /admin/account');
                    }
                } else {
                    $dataAdd = [
                        'username' => $username_add,
                        'fullname' => $fullname_add,
                        'password' => $password_add,
                        'email' => $email_add,
                        'avatar' => 'profile.jpg',
                        'role' => $role_add,
                        'status' => $status_add,
                    ];

                    $account->create($dataAdd);
                    // Notion: [0: success, 1: fail]
                    $_SESSION['notify-account'] = [0, 'success', 'Add account successfully!'];
                    header('Location: /admin/account');
                }
            } else {
                // Notion: [0: success, 1: fail]
                $_SESSION['notify-account'] = [1, 'danger', 'Add account failed!'];
                header('Location: /admin/account');
            }
        }
    }
    public function update()
    {
        if (isset($_POST['btn-update-account'])) {
            $id_update = $_POST['id-update'];
            $username_update = trim($_POST['username-update']);
            $fullname_update = trim($_POST['fullname-update']);
            $password_update = trim($_POST['password-update']);
            $email_update = trim($_POST['email-update']);
            $role_update = $_POST['role-update'];
            $status_update = $_POST['status-update'];

            $account = new Account();

            $checkValidate = true;
            $regex_username = '/^[A-Za-z][A-Za-z0-9]{5,31}$/';
            $regex_password = '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/';
            $regex_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

            if (!preg_match($regex_username, $username_update)) {
                $checkValidate = false;
            }
            if (!preg_match($regex_password, $password_update)) {
                $checkValidate = false;
            }
            if (!preg_match($regex_email, $email_update)) {
                $checkValidate = false;
            }

            if ($checkValidate == true) {
                if ($_FILES['avatar-update']['name']) {
                    $target_dir = getcwd() . DIRECTORY_SEPARATOR . asset('img/accounts/');
                    $target_file = $target_dir . basename($_FILES["avatar-update"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $uploadOk = true;
                    // Check file size
                    if (($_FILES["avatar-update"]["size"] > 500000)) {
                        $uploadOk = false;
                    }
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        $uploadOk = false;
                    }
                    if ($uploadOk) {
                        // Remove file image in folder
                        $thumbnail_old = $account->find(['id' => $id_update])[0]['avatar'];
                        unlink($target_dir . $thumbnail_old);
                        // Upload new file image
                        move_uploaded_file($_FILES["avatar-update"]["tmp_name"], $target_file);

                        $dataUpdate = [
                            'username' => $username_update,
                            'fullname' => $fullname_update,
                            'password' => $password_update,
                            'email' => $email_update,
                            'avatar' => $_FILES['avatar-update']['name'],
                            'role' => $role_update,
                            'status' => $status_update,
                        ];

                        $account->update($dataUpdate, $id_update);
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify-account'] = [0, 'success', 'Update account successfully!'];
                        header('Location: /admin/account');
                    } else {
                        // Notion: [0: success, 1: fail]
                        $_SESSION['notify-account'] = [1, 'danger', 'Update account failed!'];
                        header('Location: /admin/account');
                    }
                } else {
                    $avatar_old = $account->find(['id' => $id_update])[0]['avatar'];
                    $dataUpdate = [
                        'username' => $username_update,
                        'fullname' => $fullname_update,
                        'password' => $password_update,
                        'email' => $email_update,
                        'avatar' => $avatar_old,
                        'role' => $role_update,
                        'status' => $status_update,
                    ];

                    $account->update($dataUpdate, $id_update);
                    // Notion: [0: success, 1: fail]
                    $_SESSION['notify-account'] = [0, 'success', 'Update account successfully!'];
                    header('Location: /admin/account');
                }
            } else {
                // Notion: [0: success, 1: fail]
                $_SESSION['notify-account'] = [1, 'danger', 'Update account failed!'];
                header('Location: /admin/account');
            }
        }
    }
    public function delete()
    {
        if (isset($_POST['btn-delete-account'])) {
            $id_delete = $_POST['id-delete'];
            $account = new Account();

            // Remove file image in folder
            $avatar_delete = $account->find(['id' => $id_delete])[0]['avatar'];
            $target_dir = getcwd() . DIRECTORY_SEPARATOR . asset('img/accounts/');
            $target_file = $target_dir . $avatar_delete;
            unlink($target_file);
            $account->destroy($id_delete);
            // Notion: [0: success, 1: fail]
            $_SESSION['notify-account'] = [0, 'success', 'Delete account successfully!'];
            header('Location: /admin/account');
        }
    }
}
