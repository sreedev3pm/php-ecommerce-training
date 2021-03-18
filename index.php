<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>phpecommercetraining</title>
</head>
<body>
        <?php
            $fruitcollection=array(
                array(
                    "name" => " apple 1 kg",
                    "image"=> "img/apple.jpg",
                    "price"=> "70 rs"

                ),
                array(
                    "name" => " orange 1 kg",
                    "image"=> "img/orange.jpg",
                    "price"=> "60 rs"

                )

                );


        foreach ($fruitcollection as $fruit) { ?>
        <div class="item">
            <div class="imagecontainer">
                 <img src="<?php echo $fruit["image"] ?>" alt="">
            </div>
            <h3><?php echo $fruit["name"] ?></h3>
            <h5><?php echo $fruit["price"] ?></h5>
            <input type="button" value="Add To Cart">
        </div>
        <?php } 
        ?>
</body>
</html>