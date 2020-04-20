<!DOCTYPE html>
<html lang="en">
<head>
  <title>Legit Products</title>
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
  
  //loading navbars
    if(isset($_SESSION["admin"]))
        include("fragments/adminNavbar.php");
    else
        include("fragments/navbar.php");
  //adding our search methods, in the future we hope to add these to a new class instead of the utility file
  require_once("../Scripts/utility.php");
  
  //class imports
  require_once ("../Classes/product.php");
  //this is for displaying all products
  require ("fragments/_displayAllProducts.php");
?>

<div class="container">
    <h3>Here are the products! LOOK AT THEM!</h3>
      <div class="container box_color">
      <div class="row">
      <?php
      $category_ID = $_GET['category'];
      //echo $category;
      $products = getItems($category_ID);
        //print_r($products);
      $products = getProducts($products);
  
    ?>
    </div>
  </div>
</div>

</body>
</html>