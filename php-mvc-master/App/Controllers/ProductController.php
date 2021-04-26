<?php
namespace App\Controllers;
use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\Customer;
use \Core\View;
use App\Models\ProductModel;


class ProductController  extends \Core\Controller {
    public function indexAction()
    {
        $products = ProductModel::getAll();

        View::render('Home/products.php', ['products' => $products]);
    }


    public function previewAction(){

        Customer::checkCustomer(); // kiem tra nguoi dung dang nhap chua

        $id= $this->route_params['id'];
        $productById = ProductModel::getProductById($id);

        $category = CategoryModel::getCategoryById($productById['id_type']);

        if (isset($_POST['submit'])){
            $quantity = $_POST['quantity'];
            $cart = CartModel::add((int)$_SESSION['customer'], (int)$id, (int)$quantity, (int)$productById['unit_price']);
//            var_dump($cart);
//            die();
            header("Location:/cart");
        }else{
            View::render('Home/details.php', compact("productById", "category"));

        }

    }

}
