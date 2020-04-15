<?php
//echo "hello!";
require_once ("CheckingAccountDataService.php");
//echo "1";
require_once ("SavingsAccountDataService.php");
//echo "2";
$checkServ = new CheckingAccountDataService();
//echo "3";
$balA = $checkServ->getBalance();
//echo "4";
echo "<h1>check bal = " . $balA . "</h1>";
$balU = $balA + 100;
//echo "5";

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

//echo "<h1> Done with checking</h1><br/>";

$saveServ = new SavingsAccountDataService();
//echo "<h1>create new</h1><br/>";
$salA = $saveServ->getBalance();
//echo "Before save bal";
echo "<h1>" . $salA . "</h1> <br/>";
$salU = $salA + 100;

if ($saveServ->updateBalance($salU))
{
    echo "<h1>Succesful update</h1> <br/>";
}
else
{
    echo "<h1>Update Failed!</h1> <br/>";
}
$salB = $saveServ->getBalance();
//echo "<h1>test</h1>";
echo "<h1>" . $salB . "</h1>";