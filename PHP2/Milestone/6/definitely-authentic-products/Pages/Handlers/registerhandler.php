<!--
     Author: Aiden Yoshioka 
     Date: 09-08-2019
     registerhandler.php 
          
     This is the php code to handle the data from the html registration page.
     The code takes that data and sends it to the correct database and table (milestone1 , users)
     I wanted to make the framework for creating a functional account in the near future.
-->


<html>
<head>
    <title>Register Handler</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
<?php
//requires and includes
require_once('../Scripts/myFuncs.php');

#global login variables for mysql
define('EMPTY_STRING' , "");
$DBName = "NotAScam";
$tableName = "users";

//traps if there is no data
#failure no data
if(!isset($_POST["submitButton"])){
    die("<p style='color: red;'>Submission Failed, no data</p>");
}
#success
else{
    #global variables holding the registration data from the registration page
    $email = $_POST['email'];
    //$userName = $_POST['username'];
    $password = $_POST['password'];
}
#stores the resource 
$DBConnect = connect($DBName);
if($DBConnect){
    #Testing for valid data
    include('../Scripts/utility.php');

    $emails = "SELECT email FROM $tableName WHERE email='$email'";
    $emailCheck = $DBConnect->query($emails);
    $emailRows = $emailCheck->num_rows;
    
    //If you aren't an admin, then register a user as usual with the role of 1, customer
    if (!isset($_SESSION['admin']) || !$_SESSION['admin'])
    {
    //echo $userRows;
    if($email === null || $email === EMPTY_STRING){
    //if($firstName === NULL || $firstName == str_replace(" ", "" , $firstName)){
        echo "<p style = 'color: red;'>The <strong>Email</strong> is a required field
            and cannot be blank.</p>";
    }
    else if($password == null || $password == EMPTY_STRING){
        echo "<p style = 'color: red;'>The <strong>Password</strong> is a required field
            and cannot be blank.</p>";
    }
    /*else if($userRows > 0){
        echo "A user has already registered with this username";
    }*/
    else if($emailRows > 0){
        echo "A user has already been registered with this email.";
    }
    else{
        echo "<h2>Thank you for registering!</h2>";
        //echo "<p>" . $username ." </p>";

        $sql = "INSERT INTO $tableName (email, password, roles) VALUES ('$email' , '$password' , 1";
        $DBConnect->query($sql);  

    }
    }
    else
    {
        //if you are a user, then either update(for editting) or insert (for creating a new user) into the database.
        //the role system is like linux permissions. 1 = customer, 2 = admin, 4 = super user. 3 would be customer and admin (1+2), 5 would be super user customer, and so on
        $roles = 0;
        if($_POST['cust'])
        {
            $roles += 1;
        }
        if($_POST['adm'])
        {
            $roles += 2;
        }
        if($email === null || $email === EMPTY_STRING)
        {
                echo "<p style = 'color: red;'>The <strong>Email</strong> is a required field
                    and cannot be blank.</p>";
            }
            else if($password === null || $password === EMPTY_STRING)
            {
                echo "<p style = 'color: red;'>The <strong>Password</strong> is a required field
                    and cannot be blank.</p>";
            }
            else if($emailRows > 0)
            {
                $sql = "UPDATE $tableName SET password = $password, roles = $roles WHERE email = $email";
            }
            else{
                echo "<h2>Thank you for registering!</h2>";
        
                $sql = "INSERT INTO $tableName (email, password, roles) VALUES ('$email' , '$password', '$roles')";
                $DBConnect->query($sql);  
        
            }
    }
        
    echo "<h2><p>Database Closing</p></h2>";
    $DBConnect->close();
}
?>
        <ul>
            <li><a href=index.html>Main Menu</a></li>
        </ul>
<hr>
</body>
</html>