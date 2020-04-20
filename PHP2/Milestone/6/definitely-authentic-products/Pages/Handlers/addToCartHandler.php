<!--Written by Aiden Yoshioka
This handles all the code to add an item to the cart-->
<?php
require("../../Classes/OrderBusinessService.php");
$quantity = $_POST['quantity'];
$product_ID = $_GET["product_ID"];

if($quantity > 0 ){
    $service = new orderBusinessService();
    $service->addToKart($product_ID,$quantity);
//echo $quantity;
}



header("Location: /definitely-authentic-products/Pages/prodPage.php?product_ID=$product_ID");
?>