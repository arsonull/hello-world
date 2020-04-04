<?php
require_once ("CheckingAccountDataService.php");
require_once ("SavingsAccountDataService.php");

$checkServ = CheckingAccountDataService();
$balA = $checkServ->getBalance();
echo "<h1>" . $balA . "</h1> <br/>";
$balU = $balA + 100;

if ($checkServ->updateBalance($balU))
{
    echo "<h1>Succesful update</h1> <br/>";
}
else
{
    echo "<h1>Update Failed!</h1> <br/>";
}

$balB = $checkServ->getBalance();
echo "<h1>" . $balB . "</h1> <br/>";