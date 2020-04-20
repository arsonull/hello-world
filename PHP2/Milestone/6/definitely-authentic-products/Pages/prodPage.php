<html lang="en">
    <?php require_once "../Classes/Database.php";
    require_once "../Scripts/utility.php";?>
<head>
  <title>A Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
    <?php 
    include("fragments/header.php");
    if(isset($_SESSION["admin"]))
        include("fragments/adminNavbar.php");
    else
        include("fragments/navbar.php");
    $product = $_GET['product_ID'];
    $db = new Database();
    $conn = $db->getConnected();
    $sql = "SELECT * FROM products WHERE product_ID = $product";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $info = array($row['name'], $row['price'], $row['description'], $row['desc_image']);
    ?>
    <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1><?php echo "$info[0]"?></h1>
                    <hr>
                    <h2><?php echo "$info[2]"?></h2>
                </div>
                <div class="col-sm-6" style="border-style: solid; border-width: 1px;">
                    <?//php echo $info[3];?>
                    <h2><?php echo "$".$info[1];?></h2>
                    <hr>
                    <img style = "-ms-interpolation-mode: bicubic; width: 500px; height: 500px;" src="<?php echo $info[3];?>">
                    
                </div>
                <p>Amount you buy: <span id="productCount"></span></p>
                <div class="slidecontainer">
                  <input type="range" min="1" max="5000" value="3666" class="slider" id="myRange">
                </div>
                
                
                <form method="POST" action="Handlers/addToCartHandler.php?product_ID=<?php echo $_GET['product_ID']?>">
                    <input type="hidden" name="quantity" id="quantity">
                    <br/>
                    <input class="btn btn-primary" type="submit" value="+ Cart">
                </form>
                
                <Script>
                    var slider = document.getElementById("myRange");
                    var output = document.getElementById("productCount");
                    var textField = document.getElementById("quantity");
                    
                    
                    output.innerHTML = slider.value; 
                    textField.innerHTML = slider.value;// Display the default slider value
                
                    // Update the current slider value (each time you drag the slider handle)
                    slider.oninput = function() {
                        output.innerHTML = this.value;
                        textField.innerHTML = this.value;
                        textField.value = this.value;
                    } 
                </Script>
            </div>
        </div>
    </body>
</html>
    