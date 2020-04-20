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
  //starting sessions
  include("fragments/header.php");
   include("fragments/header.php");
   //ini_set('display errors', true);
   //error_reporting(E_ALL);
  //loading navbars
    if(isset($_SESSION["admin"]))
        include("fragments/adminNavbar.php");
    else
        include("fragments/navbar.php");
  //adding our search methods, in the future we hope to add these to a new class instead of the utility file
  require_once("../Scripts/utility.php");

?>

<div class="container">
    <h3>Which credit card would you like to use to give us money?</h3>
      <div class="container box_color">
      <div class="row">
      <?php
      $uid = $_POST['user_ID'];

      $adds = getAdds(1);
      $id = 1;
      foreach ($adds as $add)
      {
      ?>
        <!-- This is where we put in the html code to show the products -->
        <div class="col-sm-3 box_color">
          
          <div Style="height: 320px; width: 400px;" class="thumbnail">
            <h3><?php echo "Address: " . $add; ?></h3>
            <p><img Style= "height: 200px; width: 200px;" alt="" src="../images/greathouse.jpg" width='350px' height='215px'></p>
            <a href="checkoutPage.php?add_ID=<?php echo $id?>" class="btn btn-info" role="button">Finish Checkout</a>
          </div>
        </div>
  
   <?php    
      $id++;
    }
  
    ?>
    </div>
  </div>
  <a href="addAddressPage.php" class="btn btn-success" role="button">Add Address</a>
</div>

</body>
</html>