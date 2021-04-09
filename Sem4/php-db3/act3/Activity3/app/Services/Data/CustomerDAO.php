<?php
namespace App\Services\Data;

use League\Flysystem\Exception;

class CustomerDAO
{
    private $conn;
    
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }
    
    public function addCustomer($fName, $lName)
    {
        try
        {            
            if (mysqli_query($this->conn, "INSERT INTO customers (first_name, last_name) VALUES ('{$fName}', '{$lName}')"))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
}

