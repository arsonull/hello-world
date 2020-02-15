<?php
public class SecurityService
{
    private $username = "";
    private $password = "";
    
    
    public function __construct($username, $password)
    {
        
        $this->username = $username;
        $this->password = $password;
    }
    //Authenticate a user
    //@return bool true if pass, false if not
    public function login()
    {
        //return false if credentials are empty
        if (this->username == "" || this->password == "")
        {
            return false;
        }
        //true if credentials are correct
        if(this->username == "Arson" && this->password == "password")
        {
            return true;
        }
        //false if credentials are not empty, but still incorrect
        else
        {
            return false;
        }
    }
}
?>