<?php
//echo "User Data Service loaded<br>";
require_once("Database.php");

class userDataService{
    function __construct(){
        //echo "new user DataService object<br>";
    }
    function findAllUsers(){
        $database = new Database();
        $connection = $database->getConnected();
        $users = [];
        $sql = "SELECT * FROM users";
        if ($result = $connection->query($sql)) {
            $nbrRows = $result->num_rows;
            echo "<p style=\"color: #green;\"><h3>Users</h3></p>";
            if($result->num_rows === 0)
                return null;
            else{
                //echo "<p>" . $result->num_rows . " users are registered.</p>";
                while($row = $result->fetch_assoc()){
                    $users[$index] = array($row['user_ID'] , $row ['email'] , $row['username'] , $row['password']);
                    ++$index;
                }
                return $users;
            }
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
            return null;
        }
        disconnect();
    }
    
    //passes in a user id
    function removeUser($id){
        $database = new Database();
        $connection = $database->getConnected();
        $users = [];
        $sql = "DELETE FROM `users` WHERE user_ID=" . $id;
        if ($result = $connection->query($sql)) {
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
        }
    }
}
?>