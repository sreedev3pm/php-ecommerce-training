<?php
include('../models/products.php');

$id = $_POST["id"];

$productObject = new product();

    if($productObject->deleteItem($id)) {

        echo "success";
    } else {
        echo "error";
    }


?>