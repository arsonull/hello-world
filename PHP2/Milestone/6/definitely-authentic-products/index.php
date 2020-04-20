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
   include "Pages/fragments/header.php";
    if(isset($_SESSION["admin"])){
        include("Pages/fragments/adminNavbar.php");
    }
    else{
        include("Pages/fragments/navbar.php");
    }
    if(isset($_SESSION["ID"]))
      echo "ID:" . $_SESSION["ID"];
  ?>
  
<div class="container">
  <h3>We Are Not Scamming You Inc.</h3>
  <p>We are here to meet all of your needs.
  <p>Always at your service.</p>
</div>

</body>
</html>
