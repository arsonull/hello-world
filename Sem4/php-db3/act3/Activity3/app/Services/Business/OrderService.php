<?php
namespace App\Services\Business;

use App\Services\Data\CustomerDAO;
use App\Services\Data\OrdersDAO;

class OrderService
{
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "cst256act2";
    private $port = "";
    private $dbQuery;
    
    public function __construct()
    {
        $this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
    
    public function createOrder($fName, $lName, $product)
    {
        /*mysqli_autocommit($this->conn, FALSE);
        mysqli_begin_transaction($this->conn);*/
        $this->conn->autocommit(FALSE);
        $this->conn->begin_transaction();
        $cDao = new CustomerDAO($this->conn);
        if ($cDao->addCustomer($fName, $lName))
        {
            $id =  $this->conn->insert_id;
            $oDao = new OrdersDAO($this->conn);
            if ($oDao->addOrder($product, $id))
            {
                //mysqli_commit($this->conn);
                $this->conn->commit();
            }
            else 
            {
                echo "fail 1";
                //mysqli_rollback($this->conn);
                $this->conn->rollback();
            }
        }
        else
        {
            echo "fail 2";
            //mysqli_rollback($this->conn);
            $this->conn->rollback();
        }
        
    }
}

