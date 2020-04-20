<?php
require_once("product.php");


//this is mainly for the REST api -Aiden Yoshioka
class order implements JsonSerializable{
    //this is the array for products
    private $products = array();
    private $date = "01-01-2000";
    
    //the overloaded constructor for making one given a date
    public function __construct($date){
        $this->date = $date;    
    }
    
    //json serializable function
    public function jsonSerialize(){
        return get_object_vars($this);
    }
    
    public function addProduct($product){
        array_push($this->products, $product);
    }
    public function getProducts(){
        return $this->products;
    }
    public function getDate(){
        return $this->date;
    }
    
}

?>