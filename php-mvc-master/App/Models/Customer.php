<?php

namespace App\Models;
use Core;
use PDO;

class Customer extends \Core\Model{
    public static function checkCustomer(){

        $customerId = self::checkLogged();  //kiem tra id cua customer
        $customer = self::getCustomerById($customerId);
        if ($customer){
            return true;
        }else{
            header("Location:/login");
        }
    }

    // tao tai khoan nguoi dung moi
    public static function createCustomer($name, $gender, $email, $password, $address, $phone, $note){
        $db = static::getDB();
        $query = "INSERT INTO customers (name, gender, email, password, address, phone, note) VALUES (:name, :gender, :email, :password :address, :phone, :note)";
        $stmt = $db->prepare($query);
        $stmt ->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt ->bindParam(":gender", $gender, PDO::PARAM_STR);
        $stmt ->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt ->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt ->bindParam(":address", $address, PDO::PARAM_STR);
        $stmt ->bindParam(":phone", $phone, PDO::PARAM_INT);
        $stmt ->bindParam(":note", $note, PDO::PARAM_STR);

        return $stmt->execute();
    }


//    neu co 1 phien thi tra ve id customer
    public static function checkLogged(){
        if (isset($_SESSION['customer'])) {
            return $_SESSION['customer'];
        }else{
            //khong co customer thi chuyen ve trang login
            header("Location:/login");
        }

    }

//    gan session cho customer
    public static function auth($customerId){
        $_SESSION['customer'] = $customerId;
    }

//    kiem tra ton tai session customer hay khong
    public static function isGuest(){
        if (isset($_SESSION['customer'])) {
            return false;
        }
        return true;
    }



    //  lay id theo nguoi dung
    public static function getCustomerById($id){
        //kiem tra co id ko
        if ($id){
            $db = static ::getDB();
            $query = "SELECT * FROM customers WHERE id = $id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            return $stmt->fetch();
        }
    }


    //  dang nhap tai khoan
    public static function checkCustomerData($email, $password){
        $db = static::getDB();
        $query = "SELECT * FROM customers WHERE email = :email AND password = :password";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt ->execute();

        $customer = $stmt->fetch();
        if($customer){
            return $customer['id'];
        }
        return false;
    }

}