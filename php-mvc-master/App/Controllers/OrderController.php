<?php
namespace App\Controllers;
use \Core\View;
use App\Models\OrderModel;
class OrderController extends \Core\Controller{

    // them san pham vao gio hang
    public function actionOrder(){

        if (isset($_POST['submit'])){

        }else{
            View::render("Home/details.php");
        }

    }
}
