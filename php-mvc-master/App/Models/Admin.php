<?php
namespace App\Models;
use Core;
abstract class Admin {
    public static function checkAdmin(){
        //kiem tra nguoi dung co quyen admin hay ko

        $userId = User::checkLogged();      //kiem tra phien id admin
        $user = User::getUserById($userId);    // gan session cho admin
//        var_dump($user);
//        die();
        if ($user['role'] === 'admin'){
            return true;
        }else{
            die('khong duoc phep truy cap');
        }

    }
}
