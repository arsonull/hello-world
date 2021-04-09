<?php
namespace App\Services\Data;

use App\Models\UserModel;
use League\Flysystem\Exception;

class SecurityDAO
{
    //Connection settings
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "cst256act2";
    private $port = "";
    private $dbQuery;
    
    public function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    }
    
    public function findByUser(UserModel $cred)
    {
        try
        {
            $query = "SELECT Username, Password FROM users WHERE Username = '{$cred->getUsername()}' AND Password='{$cred->getPassword()}'";
            
            $result = mysqli_query($this->conn, $query);
            
            if(mysqli_num_rows($result) > 0)
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return true;
            }
            else
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return false;
            }
            /*$query = "SELECT * FROM users";
            $query = "SELECT Username, Password FROM users WHERE Username = '{$cred->getUserName()}' AND Password = '{$cred->getPassword()}'";
            //$result = mysqli_query($this->conn, $query);
            if ($result = mysqli_query($this->conn, $query))
            {
                print_r($cred->getUsername());
                print_r($cred->getPassword());
                /*while ($row = mysqli_fetch_array($result))
                {
                    print_r($row);
                }
                return true;
            }
            else 
            {
                echo '<h2> failed <h2>';
                return false;
            }*/
        } 
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
}