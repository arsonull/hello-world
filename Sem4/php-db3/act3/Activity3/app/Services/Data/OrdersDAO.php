<?php
namespace App\Services\Data;

use League\Flysystem\Exception;

class OrdersDAO
{
    private $conn;
    
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }
    
    public function addOrder($product, $customerID)
    {
        try
        {
            echo $product . ' ' . $customerID;
            if (mysqli_query($this->conn, "INSERT INTO `orders` (`product`, `customer_ID`) VALUES ('{$product}', {$customerID})"))
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

