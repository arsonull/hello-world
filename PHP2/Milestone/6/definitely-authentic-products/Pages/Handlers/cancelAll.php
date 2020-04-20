<!--Written by Aiden Yoshioka
This deletes all items from the current cart
creates a new orderbusiness service, then uses a sql query to empty the cart
-->
<?php
require("../../Classes/OrderBusinessService.php");

$service = new orderBusinessService();
$service->endItAll(1);


header("Location: /definitely-authentic-products/Pages/kartPage.php");
?>