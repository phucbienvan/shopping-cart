<?php

namespace App\Controllers;


use App\Models\Admin;
use App\Models\User;
use Core\View;
use http\Header;
use MongoDB\Driver\Session;

class UserController extends \Core\Controller{

    public function viewAction() {
        Admin::checkAdmin();
        View::render('admin/index.php');
    }

    public function actionRegister(){
        $full_name = '';
        $email = '';
        $password = '';

        if(isset($_POST['submit'])){
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = User::register($full_name, $email, $password);
        }
        View::render('admin/');
    }

    public function loginAction(){
        $email = '';
        $password = '';
        if (isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userId = User::checkUserData($email, $password);
            if ($userId == false){
//                $error= 'Thong tin dang nhap khong chinh xac';
                header("Location:/admin/login");
            }else{
                User::auth($userId);
                header("Location:/admin/");
            }
        }else{
            View::render('admin/login.php');
        }
    }

    public function logoutAction(){
        session_destroy();
        header("Location: /admin/login");
    }

}