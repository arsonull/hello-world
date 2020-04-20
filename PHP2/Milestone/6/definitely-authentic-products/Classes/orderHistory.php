<?php
require_once("order.php");
class orderHistory implements JsonSerializable{
    private $orders = array();
    
    public function __construct(){
        $orders = array();
    }
    
    //json serializable function
    public function jsonSerialize(){
        return get_object_vars($this);
    }
    
    public function addOrder($order){
        array_push($this->orders,$order);
    }
    public function getOrders(){
        return $this->orders;
    }
}

?>