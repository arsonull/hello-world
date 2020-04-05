<?php
require_once ("CheckingAccountDataService.php");
require_once ("SavingsAccountDataService.php");

$checkServ = new CheckingAccountDataService();
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

$saveServ = new SavingsAccountDataService();
$salA = $saleServ->getBalance();
echo "<h1>" . $salA . "</h1> <br/>";
$salU = $salA + 100;

if ($saleServ->updateBalance($salU))
{
    echo "<h1>Succesful update</h1> <br/>";
}
else
{
    echo "<h1>Update Failed!</h1> <br/>";
}
$salB = $saleServ->getBalance();
echo "<h1>" . $salB . "</h1>";