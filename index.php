<?php
 include('./models/products.php');

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
            if(isset($_GET["id"])) {
                $id=$_GET["id"];
            }
            else{
                $id=null;
            }
            $model = new product($id);
            $result =$model->productcollection;
            if(isset($_GET["id"])) {
                $flag=1;
              $products = new Product($_GET["id"]);?>
              <a href="index.php">go back</a>
              <?php
           } else {
              $products = new Product();
           }?>
           
            <div class="items">
            <?php
          

            if ($result->num_rows > 0) {
                

                while($row = $result->fetch_assoc()) { ?>
                   <div class="item">
            <div class="imagecontainer">
                 <img src="<?php echo $row["image"] ?>" alt="">
            </div>
            <h3><?php echo $row["name"] ?></h3>
            <p><?php echo isset($row["description"]) ? $row["description"] : ""  ?></p>
            <h5><?php echo $row["price"] ?></h5>
            <?php if (isset($row["description"])){
                echo " ";
            }
            
            else
            {?>
            <form action="index.php"  method="get">
            <input type="hidden" name="id" value="<?=$row["entity_id"];?>" />
            <input type="submit" value="view product"/>

            </form>
            <?php } ?>
            <input data-id="<?php echo $row["entity_id"] ?>" class="add-to-cart" type="button" value="Add to Cart" />
        </div> 
            
        <?php     
        
            }
              } else {
                echo "0 results";
              }
        ?>
        </div>
       <div id="cartContainer">
        <?php 
        include('./cart.php') ;
        ?>
    </div>
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
                if(data == "success") {
                    $.get("cart.php", function(data){
                        document.getElementById("cartContainer").innerHTML = data;
                    });
                }
            });
        });
        
    });

    $( document ).on( "click", ".delete-from-cart", function() {
            let id = $(this).data("id");
            $.post("controllers/DeleteController.php",
            {
                item_id: id
            },
            function(data, status){
                if(data == "success") {
                    $.get("cart.php", function(data){
                        document.getElementById("cartContainer").innerHTML = data;
                    });
                }
            });
        });
  // $(document).ready(function(){
     
    //});

    </script> 
</body>

</html>