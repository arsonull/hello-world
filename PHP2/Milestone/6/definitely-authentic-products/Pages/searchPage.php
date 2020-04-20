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
  include("fragments/navbar.php"); 
  include("../Scripts/utility.php");

?>

<div class="container">
    <h3>Here are the products! LOOK AT THEM!</h3>
    <form class="form-inline" action="searchPage.php" method = "GET">
      <input class="form-control" type="text" name="search" value="search">
      <button type="submit" name="searchButton" value="searchButton" class="btn btn-default">Search</button>
    </form>

    <?php
    if(isset($_GET['search']))
    {
      //echo "search set";
      searchButton();
    }
    function searchButton()
    {
      //echo "searchButton";
      ?>
      <div class="container box_color">
      <div class="row">
      <?php
      $search = $_GET['search'];
      //echo $search;
      $products = searchItems($search);
      //print_r($products);
      //echo "Hello";
      foreach ($products as $product)
      {
      ?>
        <!-- This is where we put in the html code to show the products -->
        <div class="col-sm-3 box_color">
          <h3><?php echo $product[1]; ?></h3>
          <p><?php echo "$" . $product[2]; ?></p>
          <div class="thumbnail">
            <p>
            <a href="prodPage.php?product_ID=<?php echo $product[0]; ?>">
            <img alt="" src="<?php echo $product[4]; ?>" width='350px' height='215px'>
            </a>
            </p>
          </div>
          <p><?php echo $product[3]; ?></p>
        </div>
  
   <?php    
      
    }
  
    ?>
    </div>
  </div>
  <?php
    }
    ?>
</div>

</body>
</html>