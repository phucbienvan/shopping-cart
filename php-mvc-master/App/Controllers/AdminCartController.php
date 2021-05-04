<?php


namespace App\Controllers;


use App\Models\Admin;
use App\Models\CartModel;
use Core\View;

class AdminCartController extends \Core\Controller{

    public function viewAction(){
        Admin::checkAdmin();
        $carts = CartModel::getAll();

        View::render("admin/cartlist.php", ['carts' => $carts]);
    }
//    public function deletebillAction(){
//        Admin::checkAdmin();
//        $id= $this->route_params['id'];
//        CartModel::deleteBill($id);
//        header("Location:/admin/cartlist");
//    }

}