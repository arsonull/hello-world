<!--
     Author: Aiden Yoshioka 
     Date: 09-08-2019
     loginhandler.php 
          
     This is the php code to handle the data from the html registration page.
     The code takes that data and sends it to the correct database and table (milestone1 , users)
     I wanted to make the framework for creating a functional account in the near future.
-->
<?php
include "../fragments/header.php";
?>
<html>
<head>

    <title>Login Handler</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            img{
                width: 140px;
                height: 800px;
            }
            body{
                font-family: "Comic sans MS";
                background-color:white;
            }
        </style>

</head>


<body>

<?php
//requires & includes
require_once('../../Scripts/myFuncs.php');


// global login variables for mysql
define('EMPTY_STRING', "");
$DBName = "NotAScam";
$tableName = "users";

// traps if there is no data
if (! isset($_POST["submitButton"])) {
    die("<p style='color: red;'>Submission Failed, no data</p>");
} // success
else {
    // global variables holding the registration data from the registration page
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    //echo "username = " . $_SESSION["username"];
}

$DBConnect = connect($DBName);
if($DBConnect){
    // Testing for valid data

    if ($email === NULL || $email === EMPTY_STRING) {
        echo "<p style = 'color: red;'>The <strong>email</strong> is a required field
                and cannot be blank.</p>";
    } elseif ($password === NULL || $password === EMPTY_STRING) {
        echo "<p style = 'color: red;'> The <strong>Lastname</strong> is a required field and must be filled in.";
    } else {
        $sql = "SELECT user_ID, email, username, password FROM $tableName WHERE email='$email' AND password='$password'";
        if ($result = $DBConnect -> query($sql)) {
            $nbrRows = $result -> num_rows;
            // echo $nbrRows;
            if ($nbrRows == 1) {
                echo "<p > Login was successful.</p>";
                $row = $result -> fetch_assoc();
                //setUserID($row['ID']);
                $_SESSION["ID"] = $row['ID'];
                //echo "<h1>Successfully signed into: " . $email . "</h1>";
                include('loginResponse.php');
                
            } else if ($nbrRows == 0) {
                //echo "<p>Login failure.</p>";
                $message = "no users found with the given username/password. Check your login and try again.";
                include('loginFailed.php');
            } else if($nbrRows > 1) {
                //echo "<p>There are multiple users registered with this username and password";
                $message = "There are multiple users with this login";
                include('loginFailed.php');
            }else{
                $message = "UNKNOWN";
                include('loginFailed.php');
            }
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect -> error . "</p>";
        }
    }
    // echo "<h2><p>Database Closing<?p></h2>";
    $DBConnect -> close;
}


?>
</body>
</html>
