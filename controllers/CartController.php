<?php 
include('../models/Cart.php');


$id = $_POST["entity_id"];
try {
    $cartObject = new Cart();
} catch (\Exception $th) {
    echo $th->getMessage();
}


if($cartObject->addToCart($id)) {
    echo "success";
} else {
    echo "error";
}
?>