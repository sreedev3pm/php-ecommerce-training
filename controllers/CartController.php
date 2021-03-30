<?php 
include('../models/Cart.php');


$id = $_POST["id"];
$action = $_POST["action"];
$cartObject = new Cart();
if($action=="add"){
    if($cartObject->addToCart($id)) {
        echo "success";
    } else {
        echo "error";
    }
}
if($action=="delete")
{
    if($cartObject->removeFromCart($id)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>