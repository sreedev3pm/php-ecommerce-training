<?php
session_start();
include_once('database.php');

class Cart {
    public $cart;
    function __construct() {
        $s_id =session_id();
        $this->getCartItems($s_id);
    }

    public function addToCart($id) {
        $db = new database();
        if($id) {
            $s_id =session_id();
            $testsql="SELECT qty FROM cart2 WHERE item_id=$id";
            $qty1=$db->query($testsql);
            #$qty1=$result1->fetch_assoc();
            if(isset($qty1)){
                $sql="UPDATE cart2
                SET qty=qty+1
                WHERE php_session_id=\"$s_id\" AND item_id=$id"; 
            }
            else{
                $sql="INSERT INTO cart2 (php_session_id,item_id,qty)
            VALUES(\"$s_id\",$id,1)";
            }
           
            return $db->runQuery($sql);
        } 
    }
    public function removeFromCart($id) {
        $db = new database();
        if($id) {
            $s_id =session_id();
            $sql = "DELETE FROM cart2 WHERE php_session_id=\"$s_id\" AND item_id=$id";

            return $db->runQuery($sql);
        } 
    }
    protected function getCartItems($s_id) {
        $db = new database();
        if($s_id) {
            $sql = "SELECT
            cart2.item_id,
            catalog.image,
            catalog.name,
            SUM(cart2.qty) AS row_qty,
            (SUM(cart2.qty)*catalog.price) AS row_price
          FROM `cart2`
        LEFT JOIN `catalog`
        ON cart2.item_id = catalog.entity_id
        WHERE cart2.php_session_id = \"$s_id\"
        GROUP BY item_id";
            $this->cart = $db->query($sql);
        }
        return $this->cart;
    }

}
?>