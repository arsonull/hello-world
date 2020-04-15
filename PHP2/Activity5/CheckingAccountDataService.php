<?php
require_once ("Database.php");

class CheckingAccountDataService extends Database
{
    function __construct()
    {

    }
    function getBalance($conn)
    {
        //$database = new Database();
        //$connection = $database->getConnected();
        $sql = "SELECT BALANCE FROM CHECKING";

        //$bal = $connection->query($sql);
        //$bal = $this->getConnected()->query($sql);
        $bal = $conn->query($sql);
        //echo $bal;
        $numRows = $bal->num_rows;
        //echo $numRows;
        $row = $bal->fetch_assoc();
        $acBal = $row["BALANCE"];

        //$this->disconnect();
        //$conn->close;
        /*if ($bal = $connection->query($sql))
        {

        }*/
        return $acBal;
    }

    function updateBalance($conn, $bal)
    {
        $sql = "UPDATE CHECKING SET BALANCE = '$bal' WHERE CHECK_ID = 1 ";

        if ($conn->query($sql))
        {
            $conn->query($sql);
            return 1;
        }
        else
        {
            return 0;
        }
        //return $conn->query($sql);
        
    }
}

?>