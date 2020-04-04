<?php

class SavingsAccountDataService
{
    function __construct()
    {
        
    }
    function getBalance()
    {
        $database = new Database();
        $connection = $database->getConnected();
        $sql = "SELECT BALANCE FROM saving WHERE SAVE_ID = 1";

        $bal = connection->query($sql);
        return $bal;
    }

    function updateBalance($bal)
    {
        $database = new Database();
        $connection = $database->getConnected();
        $sql = "INSERT INTO BALANCE (SAVE_ID, BALANCE) VALUES (NULL, '$bal')";

        if ($connection->query($sql))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}

?>