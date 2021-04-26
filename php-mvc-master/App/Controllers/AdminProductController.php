<?php

namespace App\Controllers;
use App\Models\Admin;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Core\Controller;
use Core\View;

class AdminProductController extends \Core\Controller{

    public function viewAction(){
        // kiem tra quyen admin
        Admin::checkAdmin();

        $products = ProductModel::getAll();
        View::render('/admin/productlist.php', ['products' => $products]);
    }

    // chinh sua san pham
    public function updateAction(){
        //kiem tra quyen admin
        Admin::checkAdmin();
        $categories = CategoryModel::getAll();
        $id= $this->route_params['id'];
//        var_dump($id);
//        die();
        $product = ProductModel::getProductById($id);
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $id_type = $_POST['id_type'];
            $description = $_POST['description'];
            $unit_price = $_POST['unit_price'];
            $image = $_POST['image'];
            $promotion_price = $_POST['promotion_price'];
            $unit = $_POST['unit'];
            ProductModel::update($id, $id_type, $name, $description, $unit_price, $image, $promotion_price, $unit);
//            var_dump($name);
//            die();
            header("Location:/admin/productlist");
        }else{
            View::render('admin/productadd.php', compact('categories', 'product'));
        }
    }

    //  them san pham moi
    public function addAction(){
        Admin::checkAdmin();
        $categories = CategoryModel::getAll();
        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $id_type = $_POST['id_type'];
            $description = $_POST['description'];
            $unit_price = $_POST['unit_price'];
            $image = $_POST['image'];
            $promotion_price = $_POST['promotion_price'];
            $unit = $_POST['unit'];
            ProductModel::create($name,$id_type, $description, $unit_price, $image, $promotion_price, $unit);
            header("Location:/admin/productlist");
        }else{
            View::render("/admin/productadd.php", ['categories' => $categories]);
        }
    }

    // xoa san pham
    public function deleteAction(){
        $id= $this->route_params['id'];
        ProductModel::delete($id);
        header("Location:/admin/productlist");
    }

}