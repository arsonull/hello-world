<?php
session_start();
require_once "AutoLoader.php";
public class LoginHandler
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == NULL || trim($username) == "")
    {
        exit("Username is a required field")
    }
    if ($password == NULL || trim($password) == "")
    {
        exit("Password is a required field")
    }
    $service = new SecurityService($username, $password);
    $ok = $service->login();
    
    if($ok)
    {
        $_SESSION["Admin"] = true;
        echo("You are authenticated");
    }
    else
    {
        $_SESSION["Admin"] = false;
        echo("Your information is wrong");
    }
}
?>