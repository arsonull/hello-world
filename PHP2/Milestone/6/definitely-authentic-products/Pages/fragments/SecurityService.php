<?php
class SecurityService{
    private $username;
    private $password;
    
    function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
    }
    
    //checks whether the username and password match
    function VerifyLogin($username , $password){
        //checks if the username matches
        if(strcmp($this->username,$username) != 0){
            echo "<p>Usernames do not match<p><br>";
            return false;
        }
        else{
            //checks if the password matches the root password
            if(strcmp($this->password,$password) != 0){
                //echo $this->password ."==".$password.": ".strcmp($this->password,$password);
                echo "<p>Passwords do not match<p><br>";
                return false;
            }
            else{
                echo "<p>Login has been verified<p><br>";
                return true;
            }
        }
    }
    
}
?>