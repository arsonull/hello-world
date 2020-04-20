<?php
require_once "../Scripts/myFuncs.php";

public class User
{
    //$creditcard;
    $id = 0;
    $email = '';
    $password = '';
    $roles[];

    public function __construct($email, $pass, $r)
    {
        //$this->creditcard = $card;
        $this->email = $email;
        $this->password = $pass;
        $this->roles = $r;
    }

    public function addToTable()
    {
        //$card = $this->creditcard;
        $mail = $this->email;
        $pass = $this->password;
        $perm = $this->roles;
        $DB = connect("NotAScam");
        if ($DB)
        {
            include('../Scripts/utility.php');
            $emailTest = "SELECT email FROM users WHERE email = $this->email";
            $emailCheck = $DB->query($emailTest);
            $emailRows = $emailCheck->num_rows;
            if ($emailRows > 0)
            {
                echo "<p>A user is already registered with this email</p>";
            }
            else
            {
                $sql = "INSERT INTO users (email, password, roles) VALUES ($mail', '$pass', '$perm')";
                $DB->query($sql);
            }
        }
    }
}
?>