<?php
// requires & includes
require_once ('myFuncs.php');
require_once("../Classes/Database.php");

// global login variables for mysql
//define('EMPTY_STRING', "");
$DBName = "milestone1";
$tableName = "users";
$message = "";

/**$testArray = getAllUsers($DBName, $tableName);
echo "<div style = 'border: 3px solid #555555;width: 1380px;margin: 13px;padding: 5px;height:640px;'>";
foreach($testArray as $arr){
    foreach($arr as $value){
        echo $value . " ";
    }
    echo "<br>";
}
echo "</div>";**/
/**
 *
 * @param
 *            DBName
 * @param
 *            tableName
 */
//getAllBlogs("activity1" , "posts");
function getAllUsers($DBName, $tableName)
{
    $users = array();
    $index = 0;
    $DBConnect = connect($DBName);
    if ($DBConnect->connect_error) {
        echo "<Connection error: " . $DBConnect->connect_error;
    } else {
        $sql = "SELECT user_ID, email , username FROM $tableName";
        if ($result = $DBConnect->query($sql)) {
            $nbrRows = $result->num_rows;
            echo "<p style=\"color: #green;\"><h3>Users</h3></p>";
            if($result->num_rows === 0)
                echo"<p>No Users are registered</p>";
            else{
                //echo "<p>" . $result->num_rows . " users are registered.</p>";
                while($row = $result->fetch_assoc()){
                    $users[$index] = array($row['user_ID'] , $row ['email'] , $row['username']);
                    ++$index;
                }
                //print_r($users);
            }
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
        }
    }
    


    $DBConnect->close;
    return $users;
}

function getAllBlogs($DBName, $tableName)
{
    $blogs = array();
    $index = 0;
    $DBConnect = connect($DBName);
    if ($DBConnect->connect_error) {
        echo "<Connection error: " . $DBConnect->connect_error;
    } else {
        $sql = "SELECT * FROM $tableName";
        if ($result = $DBConnect->query($sql)) {
            $nbrRows = $result->num_rows;
            echo "<p style=\"color: #green;\"><h3>Blogs</h3></p>";
            if($result->num_rows === 0)
                echo"<p>No blogs are filed</p>";
            else{
                //echo "<p>" . $result->num_rows . " users are registered.</p>";
                while($row = $result->fetch_assoc()){
                    $blogs[$index] = array($row['post_ID'],$row['users_IDPostBy'] , $row ['Title'] , $row['Content']);
                    ++$index;
                }
                //print_r($blogs);
            }
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
        }
    }
    


    $DBConnect->close;
    return $blogs;
}

function getItems($category){
    $database = new Database();
    $connection = $database->getConnected();
    $products = [];
    $sql = "SELECT * FROM products WHERE category_ID=".$category;
    if ($result = $connection->query($sql)) {
        $nbrRows = $result->num_rows;
        //echo "<p style=\"color: #green;\"><h3>Users</h3></p>";
        if($result->num_rows === 0)
            return null;
        else{
            //echo "<p>" . $result->num_rows . " users are registered.</p>";
            while($row = $result->fetch_assoc()){
                $products[$index] = array($row['product_ID'] , $row ['name'] , $row['price'] , $row['short_desc'] , $row['image'] , $row['category_ID'] , $row['description'] , $row['desc_image']);
                ++$index;
            }
            return $products;
        }
        
    } else {
        echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
        return null;
    }

}

function searchItems($pattern)
{
    $database = new Database();
    $connect = $database->getConnected();
    
    $products = [];
    $sql = "SELECT * FROM products WHERE name LIKE '%$pattern%'";
    //echo $sql;
    if ($result = $connect->query($sql))
    {
        $nbrRows = $result->num_rows;
        if($result->num_rows == 0)
        {
            return null;
        }
        else
        {
            while($row = $result->fetch_assoc())
            {
                $products[$index] = array($row['product_ID'], $row['name'], $row['price'], $row['short_desc'], $row['image']);
                $index++;
            }
            return $products;
        }
    }
    else 
    {
        echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
        return null;
    }
}

function getCards($pattern)
{
    $database = new Database();
    $connection = $database->getConnected();
    $cards = [];
    $sql = "SELECT cardNumber, nameOnCard, cvc, expiration, address FROM `cardinfo`  WHERE user_ID=".$pattern;
    //$sql = "SELECT * FROM products";
    if ($result = $connection->query($sql)) 
    {
        $nbrRows = $result->num_rows;
        //echo "<p style=\"color: #green;\"><h3>Users</h3></p>";
        if($result->num_rows === 0)
        return null;
        else
        {
            //echo "<p>" . $result->num_rows . " users are registered.</p>";
            while($row = $result->fetch_assoc())
            {
                //$products[$index] = array($row['product_ID'] , $row ['name'] , $row['price'] , $row['short_desc'] , $row['image'] , $row['category_ID'] , $row['description'] , $row['desc_image']);
                $cards[$index] = array($row['card_ID'], $row['user_ID'], $row['cardNumber'], $row['nameOnCard'], $row['cvc'], 
                $row['expiration'], $row['address']);
                ++$index;
            }
        //return $products;
        return $cards;
        }        
    }
    else 
    {
        echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
        return null;
    }
}

function getAdds($pattern)
{
    $database = new Database();
    $connection = $database->getConnected();
    $adds = [];
    $sql = "SELECT home FROM `addresses`  WHERE user_ID=".$pattern;
    //$sql = "SELECT * FROM products";
    if ($result = $connection->query($sql)) 
    {
        $nbrRows = $result->num_rows;
        //echo "<p style=\"color: #green;\"><h3>Users</h3></p>";
        if($result->num_rows === 0)
        return null;
        else
        {
            //echo "<p>" . $result->num_rows . " users are registered.</p>";
            while($row = $result->fetch_assoc())
            {
                //$products[$index] = array($row['product_ID'] , $row ['name'] , $row['price'] , $row['short_desc'] , $row['image'] , $row['category_ID'] , $row['description'] , $row['desc_image']);
                $cards[$index] = $row['home'];
                ++$index;
            }
        //return $products;
        return $cards;
        }        
    }
    else 
    {
        echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
        return null;
    }
}

?>
