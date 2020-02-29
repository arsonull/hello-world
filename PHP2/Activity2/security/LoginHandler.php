<?php
session_start();
require_once "AutoLoader.php";
public class LoginHandler
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == NULL || trim($username) == "")
    {
        exit("Username is a required field");
    }
    if ($password == NULL || trim($password) == "")
    {
        exit("Password is a required field");
    }
    $service = new SecurityService($username, $password);
    $ok = $service->login();
    
    if($ok == true)
    {
        $_SESSION["principle"] = true;
        return "LoginPass.php";
    }
    else
    {
        $_SESSION["principle"] = false;
        return "LoginFailed.php";
    }
}
?>