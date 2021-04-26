<?php
namespace App\Models;

use Core;
use PDO;
class OrderModel extends \Core\Model{
    public static function getOrderById($id){
        $db = static::getDB();
        $query = 'SELECT * FROM bill_detail WHERE id = $id';
        $result = $db ->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    public static function add($id, $id_customer, $date_order, $total, $payment, $note){
        $db = static::getDB();
        $query = "INSERT INTO bill(id_customer, date_order, total, payment, note) VALUES(:id_customer, :date_order, :total, :payment, :note)";
        $stmt = $db ->prepare($query);
        $stmt ->bindParam(":id_type", $id_customer, PDO::PARAM_INT);
    }

}
