<?php

namespace App\Models;
use Core;
use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//    tao tai khoan moi
    public static function register($full_name, $email, $password, $phone){
        $db = static ::getDB();
        $query="INSERT INTO users (full_name, email, password, phone) VALUES (:full_name, :email, :password, :phone)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':full_name', $full_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);

        return $stmt->execute();
    }

//    lay tai khoan theo id
    public static function getUSerById($id){
        //kiem tra co id ko
        if ($id){
            $db = static ::getDB();
            $query = "SELECT * FROM users WHERE id = $id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            return $stmt->fetch();
        }
    }

//    neu co 1 phien thi tra ve id admin
    public static function checkLogged(){
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        //khong co admin thi chuyen ve trang login
        header("Location: /admin/login");
    }

//    gan session cho admin
    public static function auth($userId){
        $_SESSION['user'] = $userId;
    }

//    kiem tra ton tai session admin hay khong
    public static function isGuest(){
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

//    dang nhap
    public static function checkUserData($email, $password){
        $db = static::getDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt ->execute();

        $users = $stmt->fetch();
        if($users){
            return $users['id'];
        }
        return false;
    }

//    kiem tra quyen admin
    public static function isAdmin(){
        $isAdmin = false;
        if(!User::isGuest()){
            $idUser = User::checkLogged();
            $user = User::getUserById($idUser);
            if ($user['role'] == 'admin') {
                $isAdmin = true;
            }
        };
        return $isAdmin;
    }


}
