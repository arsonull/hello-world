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
      //$category_ID = $_GET['category'];
      //echo $category;
      $uid = $_POST['user_ID'];
      $cards = getCards(1);
      $id = 1;
      foreach ($cards as $card)
      {
      ?>
        <!-- This is where we put in the html code to show the products -->
        <div class="col-sm-3 box_color">
          
          <div Style="height: 200px;" class="thumbnail">
            <h3><?php echo "Number: " . $card[2]; ?></h3>
            <a href="addressPage.php?card_ID = <?php echo $id?>" class="btn btn-info" role="button">Next</a>
          </div>
        </div>
  
   <?php    
      $id++;
    }
  
    ?>
    </div>
  </div>
  <a href="addCreditPage.php" class="btn btn-success" role="button">Add Card</a>
</div>

</body>
</html>