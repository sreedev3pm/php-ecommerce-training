<?php 
include('../models/Cart.php');


$id = $_POST["item_id"];
try {
    $cartObject = new Cart();
} catch (\Exception $th) {
    echo $th->getMessage();
}


if($cartObject->removeFromCart($id)) {
    echo "success";
} else {
    echo "error";
}
?>