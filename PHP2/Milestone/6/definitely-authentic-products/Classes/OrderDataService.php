<?php
//echo "User Data Service loaded<br>";
require_once("Database.php");

class orderDataService{
    function __construct(){
        //echo "new user DataService object<br>";
    }
    function findCurrentOrder($id){
        $database = new Database();
        $connection = $database->getConnected();
        $orderItems = [];
        $order_id = 0;
        
        //getting the order id
        $sql = "SELECT * FROM orders WHERE active = true AND user_ID = $id";
        if ($result = $connection->query($sql)) {
            $nbrRows = $result->num_rows;
            //echo "<p style=\"color: #green;\"><h3>Users</h3></p>";
            if($result->num_rows === 0){
                //echo "empty";
                return null;
            }
            else{
                //echo "<p>" . $result->num_rows . " users are registered.</p>";
                $order_id = $result->fetch_assoc();
                $order_id = $order_id['order_ID'];
            }
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
            return null;
        }
        
        //getting all order items
        $sql = "SELECT products.name, order_info.quantity,products.price FROM order_info INNER JOIN products ON order_info.product_ID=products.product_ID WHERE order_info.order_ID = $order_id";
        if ($result = $connection->query($sql)) {
            $nbrRows = $result->num_rows;
            $index = 0;
            //echo "<p style=\"color: #green;\"><h3>Users</h3></p>";
            if($result->num_rows === 0)
                return null;
            else{
                //echo "<p>" . $result->num_rows . " users are registered.</p>";
                while($row = $result->fetch_assoc()){
                    $orderItems[$index] = array($row['name'] , $row ['quantity'] , $row['price']);
                    ++$index;
                }
                return $orderItems;
            }
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
            return null;
        }
        disconnect();
    }
    
   function addItem($user_id,$id,$num){
        $database = new Database();
        $connection = $database->getConnected();
        $order_id = 0;
        
        //getting the order id
        $sql = "SELECT * FROM orders WHERE active = true AND user_ID = $user_id";
        if ($result = $connection->query($sql)) {
            $nbrRows = $result->num_rows;
            //echo "<p style=\"color: #green;\"><h3>Users</h3></p>";
            if($result->num_rows === 0){
                //echo "empty";
                return null;
            }
            else{
                //echo "<p>" . $result->num_rows . " users are registered.</p>";
                $order_id = $result->fetch_assoc();
                $order_id = $order_id['order_ID'];
                //echo $order_id;
            }
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
            return null;
        }
        //echo $order_id;
        
        $sql = "INSERT INTO order_info(`order_ID`,`product_ID`, `quantity`) VALUES ($order_id,$id,$num)";
        if ($result = $connection->query($sql)) {
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
        }
    }
    
    //passes in a user id
    function removeOrder($id){
        $database = new Database();
        $connection = $database->getConnected();
        $users = [];
        $sql = "DELETE FROM `users` WHERE user_ID=" . $id;
        if ($result = $connection->query($sql)) {
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
        }
    }
    

    function getOrderID($id){
        $database = new Database();
        $connection = $database->getConnected();
        $order_id = 0;
        
        //getting the order id
        $sql = "SELECT * FROM orders WHERE active = true AND user_ID = $id";
        if ($result = $connection->query($sql)) {
            $nbrRows = $result->num_rows;
            //echo "<p style=\"color: #green;\"><h3>Users</h3></p>";
            if($result->num_rows === 0){
                //echo "empty";
                return null;
            }
            else{
                //echo "<p>" . $result->num_rows . " users are registered.</p>";
                $order_id = $result->fetch_assoc();
                $order_id = $order_id['order_ID'];
                return $order_id;
            }
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
            return null;
        }
    }

    function checkout($id)
    {
        $database = new Database();
        $connection = $database->getConnected();
        $sql = "UPDATE orders SET active = false WHERE order_ID = " . $id;
        $connection->query($sql);
    }

    function addAddress($id, $oid)
    {
        //echo "Hello ID" . $id;
        //echo ". Hello OID" . $oid;
        $database = new Database();
        $connection = $database->getConnected();
        $sql = "UPDATE orders SET add_ID = $id WHERE order_ID = $oid";
        $connection->query($sql);
    }

    function newOrder($id)
    {
        $database = new Database();
        $connection = $database->getConnected();
        $sql = "INSERT INTO `orders` (`order_ID`, `user_ID`, `active`, `add_ID`) VALUES (NULL, $id, '1', NULL);";
        $connection->query($sql);
    }
    function removeItems($user_id){
        $user_id = 1;
        $database = new Database();
        $connection = $database->getConnected();
        $order_id = 0;
        
        //getting the order id
        $sql = "SELECT * FROM orders WHERE active = true AND user_ID = $user_id";
        if ($result = $connection->query($sql)) {
            $nbrRows = $result->num_rows;
            //echo "<p style=\"color: #green;\"><h3>Users</h3></p>";
            if($result->num_rows === 0){
                //echo "empty";
                return null;
            }
            else{
                //echo "<p>" . $result->num_rows . " users are registered.</p>";
                $order_id = $result->fetch_assoc();
                $order_id = $order_id['order_ID'];
                //echo $order_id;
            }
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
            return null;
        }
        
        //deleting all items from the cart
         $sql = "DELETE FROM `order_info` WHERE order_ID = $order_id";
        if ($result = $connection->query($sql)) {
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
        }
        
    }

//this is for committing to the order history table
    function commit($user_ID, $order_ID , $address_ID , $date)
    {
        $database = new Database();
        $connection = $database->getConnected();
        
        //the sql query
        
        $sql = "INSERT  INTO order_history (user_ID , order_ID , address_ID , date) VALUES('$user_ID' , '$order_ID , '$address_ID' , '$date')";
        //turning off the autocommit
        $connection->autocommit(FALSE);
        
        //inserting into the history table
        $connection->query($sql);
        
        //committing
        if(!$connection->commit()){
            echo "Commit failed";
            exit();
        }
        
        $connection -> close();
    }
//create a new order if there is none
    function checkOrder($uid)
    {
        $database = new Database();
        $connection = $database->getConnected();

        $sql = "SELECT * FROM orders WHERE user_ID = $uid AND active = 1";

        if ($result = $connection->query($sql)){
            $nbrRows = $result->num_rows;

            if ($nbrRows === 0){
                //create new order
                $insrt = "INSERT INTO orders (order_ID, user_ID, active, add_ID) VALUES(NULL, '$uid', 1, NULL)";
                $connection->query(insrt);
            }
        }
    }
//get orders between two dates
    function getOrder($date1, $date2)
    {
        $database = new Database();
        $connection = $database->getConnected();
        //sql to get all order_id's between the two dates
        $orderSQL = "SELECT order_ID FROM order_history WHERE order_date BETWEEN '$date1' AND '$date2'";
        if ($result = $connection->query($orderSQL))
        {
            $nbrRows = $result->num_rows;
            $count = 0;
            if ($nbrRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    //add the orderid's to the orderID array
                    $oidArr[$count] = $row["order_ID"];
                    $count++;
                }
                return $oidArr;
            }
        }
    }
    function getPrice($oid)
    {
        $database = new Database();
        $connection = $database->getConnected();
        //Select the quantity and price of products in the order
        $sql = "SELECT products.name, products.price, order_info.quantity FROM order_info INNER JOIN products ON order_info.product_ID = products.product_ID WHERE order_info.order_ID = '$oid[0]'";
        $total = 0;
        if ($result = $connection->query($sql))
        {
            $nbrRows = $result->num_rows;

            if ($nbrRows > 0)
            {
                $index = 0;
                while($row = $result->fetch_assoc())
                {
                    //calculate the total of each product and their quantity, and add that to the total
                    $prodTotal = $row['quantity'] * $row['price'];
                    $prod_info[$index] = array($row['name'] , $row ['quantity'] , $row['price'], $prodTotal);
                    ++$index;
                }
                return $prod_info;
            }
        }
    }
    function getDate($oid)
    {
        $database = new Database();
        $connection = $database->getConnected();
        //Select the quantity and price of products in the order
        $sql = "SELECT order_date FROM order_history WHERE order_ID = '$oid[0]'";
        if ($result = $connection->query($sql))
        {
            $nbrRows = $result->num_rows;

            if ($nbrRows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    //calculate the total of each product and their quantity, and add that to the total
                    return row['order_date'];
                }
            }
        }
    }
    function getOrderInfo($date1, $date2)
    {
        $database = new Database();
        $connection = $database->getConnected();
        //Select the quantity and price of products in the order
        $sql = "SELECT order_info.order_ID, products.name, order_info.quantity, products.price, order_history.order_date FROM order_history INNER JOIN order_info ON 
            order_history.order_ID = order_info.order_ID INNER JOIN products ON order_info.product_ID=products.product_ID WHERE order_history.user_ID = 1 AND 
            order_history.order_date BETWEEN '$date1' AND '$date2' ORDER BY order_history.order_date DESC";
        $total = 0;
        if ($result = $connection->query($sql))
        {
            $nbrRows = $result->num_rows;

            if ($nbrRows > 0)
            {
                $index = 0;
                while($row = $result->fetch_assoc())
                {
                    //calculate the total of each product and their quantity, and add that to the total
                    $prodTotal = $row['quantity'] * $row['price'];
                    $prod_info[$index] = array($row['order_ID'], $row['name'] , $row ['quantity'] , $row['price'], $prodTotal, $row['order_date']);
                    ++$index;
                }
                return $prod_info;
            }
        }
    }
    //this is for api data acquisition
    function getapi($date1,$date2){
        $db = new Database();
        $connection = $db->getConnected();
        $index = 0;
        
        //this retrieves all the order items between the two given dates and joins a couple table items together.
        $sql = "SELECT products.name, order_info.quantity, products.price, order_history.order_date FROM order_history INNER JOIN order_info ON order_history.order_ID = order_info.order_ID INNER JOIN products ON order_info.product_ID=products.product_ID WHERE order_history.user_ID = 1 AND order_history.order_date BETWEEN '$date1' AND '$date2' ORDER BY order_history.order_date DESC";
        
        if ($result = $connection->query($sql)) {
            $nbrRows = $result->num_rows;
            //echo "<p style=\"color: #green;\"><h3>Users</h3></p>";
            if($result->num_rows === 0){
                //$db->disconnect();
                return null;
            }
            else{
                //echo "<p>" . $result->num_rows . " users are registered.</p>";
                while($row = $result->fetch_assoc()){
                    $orderItems[$index] = array($row['name'] , $row ['quantity'] , $row['price'], $row['order_date']);
                    $index++;
                }
                //$db->disconnect();
                return $orderItems;
            }
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
            return null;
        }
    }
}
?>