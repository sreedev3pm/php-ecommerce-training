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
              
            $id=$_GET["id"];
            $model = new product($id);
            $result =$model->productcollection;
            if(isset($_GET["id"])) {
              $products = new Product($_GET["id"]);?>
              <a href="index.php">go back</a>
              <?php
           } else {
              $products = new Product();
           }?>
           
            
            <?php
          

            if ($result->num_rows > 0) {
                
                // output data of each row
                while($row = $result->fetch_assoc()) { ?>
                   <div class="item">
            <div class="imagecontainer">
                 <img src="<?php echo $row["image"] ?>" alt="">
            </div>
            <h3><?php echo $row["name"] ?></h3>
            <p><?php echo isset($row["description"]) ? $row["description"] : ""  ?></p>
            <h5><?php echo $row["price"] ?></h5>
            <form action="index.php"  method="get">
            <input type="hidden" name="id" value="<?=$row["entity_id"];?>" />

            <input type="submit" value="view product">
            </form>
            <input data-id="<?php echo $row["entity_id"] ?>" class="add-to-cart" type="button" value="Add to Cart" />
        </div> 
            
        <?php     
        
            }
              } else {
                echo "0 results";
              }
        ?>
       
      
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $(".add-to-cart").click(function(){
            let id = $(this).data("id");
            $.post("controllers/CartController.php",
            {
                entity_id: id
            },
            function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
            });
        });
    });

    </script>
</html>