<?php
include("./models/products.php");
?>
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
            $model = new product();
            $result =$productcollection;
            if ($result->num_rows > 0) {
                
                // output data of each row
                while($row = $newresult->fetch_assoc()) { ?>
                   <div class="item">
            <div class="imagecontainer">
                 <img src="<?php echo $row["image"] ?>" alt="">
            </div>
            <h3><?php echo $row["name"] ?></h3>
            <h5><?php echo $row["price"] ?></h5>
            <input type="button" value="Add To Cart">
        </div> 
        <?php     
        
            }
              } else {
                echo "0 results";
              }
        ?>
       
      
</body>
</html>