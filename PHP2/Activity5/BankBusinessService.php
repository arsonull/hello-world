<?php
require_once ("Database.php");
require_once ("CheckingAccountDataService.php");
require_once ("SavingsAccountDataService.php");

class BankBusinessService
{
    function getCheckBalance()
    {
        $service = new CheckingAccountDataService();
        $data = new Database();
        $conn = $data->getConnected();
        return $service->getBalance($conn);
    }
    function getSaveBalance()
    {
        $service = new SavingsAccountDataService();
        $data = new Database();
        $conn = $data->getConnected();
        return $service->getBalance($conn);
    }
    function updateCheckBalance($bal)
    {
        $service = new CheckingAccountDataService();
        $data = new Database();
        $conn = $data->getConnected();
        return $service->getBalance($conn, $bal);
    }
    function updateSaveBalance($bal)
    {
        $service = new SavingsAccountDataService();
        $data = new Database();
        $conn = $data->getConnected();
        return $service->getBalance($conn, $bal);
    }
    function transaction()
    {
        $data = new Database();
        $conn = $data->getConnected();
        $conn->autocommit(FALSE);
        $conn->begin_transaction();
        $balA = $this->getCheckBalance() - 100;
        $sBal = false;
        $sSav = false;
        if ($this->updateCheckBalance($balA))
        {
            echo "<h2>Checking balance update complete</h2><br/>";
            $sBal = true;
        }
        else
        {
            echo "<h2>Checking balance update failed</h2><br/>";
        }
        $savA = $this->getSaveBalance() + 100;
        if ($this->updateSaveBalance($savA))
        {
            echo "<h2>Savings balance update complete</h2><br/>";
            $sSav = true;
        }
        else
        {
            echo "<h2>Savings balance update failed</h2><br/>";
        }
        //echo "hi";
        if ($sBal && $sSav)
        {
            $conn->commit();
            echo "<h1>Transaction Succesfull!</h1>";
        }
        else
        {
            $conn->rollback();
            echo "<h1>Transaction Failed!</h1>";
        }
    }
}

?>