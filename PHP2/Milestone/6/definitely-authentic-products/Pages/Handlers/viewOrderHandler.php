<?php

date_default_timezone_set("America/Phoenix");
$date = $_POST['date'];
//
$arr = explode('/', $date);
$month = $arr[0];
$day = $arr[1];
$year = $arr[2];
$sqlDate = $year . '-' . $month . '-' . $day;
echo $sqlDate;
$cDate = date("Y-m-d");
echo $cDate;
//MYSQL Syntax for dates is Year/month/day

header("Location: /definitely-authentic-products/Pages/viewOrdersPage.php?sqlDate=$sqlDate&cDate=$cDate");
?>