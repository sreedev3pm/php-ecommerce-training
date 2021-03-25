<?php 
  include('./models/Cart.php');
 $cartObject = new Cart();
?>
<div class="cart">
    <h3>Shopping Cart: </h3>
    <?php 
    if($cartObject->cart) {
        foreach ($cartObject->cart as $item) { ?>
            <div class="cart-item">
                <img src="<?php echo $item["image"]?>" alt="">
                <h3><?php echo $item["name"] ?></h3>
                <h3>Qty: <?php echo $item["row_qty"] ?> No</h3>
                <h3>price: <?php echo $item["row_price"] ?> RS</h3> 
                <input data-id="<?php echo $item["item_id"] ?>" class="delete-from-cart" type="button" value="   " />
            </div>
    <?php }
    } else { ?>
        <p>You have no items in your cart.</p>
    <?php }
    ?>
     <script>
   $(document).ready(function(){
        $(".delete-from-cart").click(function(){
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
    });

    </script> 
</div>