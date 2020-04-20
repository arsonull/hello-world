<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
  //start sessions
  include("fragments/header.php");
  //including our navbar
  include("fragments/adminNavbar.php"); 
  //adding our search methods, in the future we hope to add these to a new class instead of the utility file
  require_once("../Scripts/utility.php");
  //includes for the table
  //echo "Hello!";
  require_once ("fragments/_displayOrderHistory.php");
  //echo "Goodbye";

?>

<div class="container">
    <h3>Orders:</h3>
      <div class="container box_color">
      <div class="row">
      <?php
        $date1 = $_GET['sqlDate'];
        $date2 = $_GET['cDate'];

        //$businessService = new orderBusinessService();
        //$orders = $businessService->getOrder($date1, $date2);
        //print_r($kart);
        displayOrder($date1, $date2);
      ?>
    </div>
    <div class="col-sm-4 box_color">
    <a href="ordersPage.php" class="btn btn-success" role="button">Back</a>
    </div>
    <div class="col-sm-4 box_color">
    </div>
    <div class="col-sm-4 box_color">
    <a href="../api/getOrders.php?start=<?php echo $date1;?>" class="btn btn-success" role="button">Get all as Json</a>
    </div>
  </div>
</div>

</body>
</html>