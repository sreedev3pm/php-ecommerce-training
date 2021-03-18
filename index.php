<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce</title>
</head>
<body>
<div class="items">
<?php 
$fruitcollection=array[
  array[
    "name"=>"apple 1kg"
    "image"=>"img/apple.jpg"
    "price"=>"70"
],
  array[
    "name"=>"orange 1kg"
    "image"=>"img/orange.jpg"
    "price"=>"60"
],
];
foreach ($fruitcollection as $fruit){?>
  <div class="item">
    <img src="<?php echo $fruit["image"]?>" alt="">
    <h1><?php echo $fruit["name"]?></h1>
    <h4><?php echo $fruit["price"]?></h4>
    <button>Add to cart</button>
    <h1>hello</h1>
  </div>
<?php }
?>
</div>
</body>
</html>
