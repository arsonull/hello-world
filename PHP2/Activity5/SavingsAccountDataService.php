<?php
require_once ("Database.php");

class SavingsAccountDataService extends Database
{
    function __construct()
    {

    }
    function getBalance($conn)
    {
        //$database = new Database();
        //$connection = $database->getConnected();
        //echo "getbalance";
        $sql = "SELECT BALANCE FROM SAVING";
        //echo "after sql";
        //$bal = $connection->query($sql);
        //$bal = $this->getConnected()->query($sql);
        $bal = $conn->query($sql);
        //echo "after connected";
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
        $sql = "UPDATE SAVING SET BALANCE = $bal WHERE SAVE_ID = 1 ";

        /*if ($conn->execute($sql))
        {
            return 1;
        }
        else
        {
            return 0;
        }*/
        return $conn->execute($sql);
    }
}

?>