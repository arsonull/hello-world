<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//requires
require_once("../Classes/order.php");
require_once("../Classes/orderHistory.php");
require_once("../Classes/OrderBusinessService.php");
require_once("../Classes/orderProduct.php");

//order history object
$history = new orderHistory();

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//date variables for searching 
$start = '2000-01-01';
$end = date("Y-m-d");

//checking if the getters exist
if(isset($_GET["start"])){
    $start = $_GET["start"];
}
if(isset($_GET["end"])){
    $end = $_GET["end"];
}


//database connection
$bs = new orderBusinessService();
$sqlData = $bs->apiData($start,$end);

//collecting all the different order dates
$orderDates = array();
foreach ($sqlData as $item){
    if(!in_array($item[3],$orderDates)){
        array_push($orderDates , $item[3]);
        $history->addOrder(new order($item[3]));
    }
}
foreach ($sqlData as $item){
    foreach($history->getOrders() as $order){
        if($item[3] == $order->getDate()){
            $order->addProduct(new orderProduct($item[0],$item[1],$item[2]));
        }
    }
}

$json = json_encode($history, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
?>