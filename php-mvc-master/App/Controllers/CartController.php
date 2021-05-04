<?php
namespace App\Controllers;
use App\Models\CartModel;
use App\Models\Customer;
use App\Models\ProductModel;

use \Core\View;


class CartController  extends \Core\Controller {
    public function indexAction(){
        Customer::checkCustomer(); // kiem tra nguoi dung dang nhap chua
        if (isset($_SESSION['customer'])){
            $cart = CartModel::getCartByCustomer((int)$_SESSION['customer']);
            View::render('Home/cart.php', ['cart' => $cart]);

        }else{
            header("Location:/login");
        }

    }
    public function checkoutAction(){

        $customer = Customer::getCustomerById($_SESSION['customer']);
        $cart = CartModel::getCartByCustomer((int)$_SESSION['customer']);
        if (isset($_POST['submit'])){
            $note = $_POST['note'];
            $total = $_POST['total'];
            $bill = CartModel::checkout((int)$_SESSION['customer'], $total, $note);
//            var_dump($bill);
//            die();
            header("Location:/index");
        }
        View::render("Home/checkout.php", compact("customer", "cart"));
    }

    public function deleteAction(){
        $id= $this->route_params['id'];
        CartModel::delete($id);
        header("Location:/cart");
    }


}
