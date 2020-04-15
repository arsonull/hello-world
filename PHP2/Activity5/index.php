<?php
//echo "hello!";
require_once ("CheckingAccountDataService.php");
//echo "1";
require_once ("SavingsAccountDataService.php");
//echo "2";
require_once ("BankBusinessService.php");
//echo "3";

$service = new BankBusinessService();
echo "<h1>" . $service->getCheckBalance() . "</h1><br/>";
echo "<h1>" . $service->getSaveBalance() . "</h1><br/>";
$service->transaction();
echo "<h1>" . $service->getCheckBalance() . "</h1><br/>";
echo "<h1>" . $service->getSaveBalance() . "</h1><br/>";