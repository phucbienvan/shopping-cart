<?php


namespace App\Controllers;

use App\Models\Customer;
use App\Models\User;
use Core\View;

class CustomerController extends \Core\Controller{

    public function loginAction() {
        $email = '';
        $password = '';
        if (isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $customerId = Customer::checkCustomerData($email, $password);
            if ($customerId == false){
//                $error= 'Thong tin dang nhap khong chinh xac';
                header("Location:/login");
            }else{
                Customer::auth($customerId);
                header("Location:/");
            }
        }else{
            View::render('Home/login.php');
        }

    }

    public function registerAction(){

        $full_name = '';
        $email = '';
        $password = '';
        $phone = '';

        if(isset($_POST['submit'])){
            $name = $_POST['full_name'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $note = $_POST['note'];

            $customer = Customer::createCustomer($name, $gender, $email, $password, $address, $phone, $note);
//            var_dump($user);
//            die();
            header('Location:/Cart');
        }
        View::render('Home/register.php');
    }

//    public function logoutAction(){
//        session_destroy();
//        header("Location: /login");
//    }

    public function viewAction(){
        View::render("Home/contact.php");
    }
}