<?php
namespace App\Models;

use Core;
use PDO;

class CartModel extends \Core\Model{

    public static function add($id_customer, $id_product, $quantity, $unit_price){
        $db = static::getDB();
        $query = "INSERT INTO bill_detail(id_customer, id_product, quantity, unit_price) VALUES (:id_customer, :id_product,
        :quantity, :unit_price)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id_customer", $id_customer, PDO::PARAM_INT);
        $stmt->bindParam(":id_product", $id_product, PDO::PARAM_INT);
        $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
        $stmt->bindParam(":unit_price", $unit_price, PDO::PARAM_INT);

        return  $stmt ->execute();
    }

    public static function getCartByCustomer($id_customer){
        $db = static::getDB();
        $query = "SELECT * FROM bill_detail JOIN products ON bill_detail.id_product = products.id WHERE id_customer =:id_customer";
        $stmt = $db ->prepare($query);
        $stmt->bindParam(':id_customer', $id_customer, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProductByCart($id){
        $db = static::getDB();
        $query = "SELECT * FROM bill_detail WHERE id=:id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function delete($id_cart){
        $db = static::getDB();
        $query = "DELETE FROM bill_detail WHERE id_cart =:id_cart";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_cart', $id_cart, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function checkout($id_customer, $total, $note){
        $db = static::getDB();
        $query ="INSERT INTO bills(id_customer, total, note) VALUES (:id_customer, :total, :note)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id_customer", $id_customer, PDO::PARAM_INT);
        $stmt->bindParam(":total", $total, PDO::PARAM_INT);
        $stmt->bindParam(":note", $note, PDO::PARAM_STR);
        return $stmt->execute();
    }


    public static function getAll(){
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM bills');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function deleteBill($id){
        $db = static::getDB();
        $query = "DELETE FROM bills WHERE id =:id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
