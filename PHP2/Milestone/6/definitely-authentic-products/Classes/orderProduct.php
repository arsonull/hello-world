<?php

class orderProduct implements JsonSerializable{
    
    private $name = "";
    private $quantity = 0;
    private $price = 0;
    
    public function __construct($name, $quantity,$price){
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }
    //json serializable function
    public function jsonSerialize(){
        return get_object_vars($this);
    }
    
    //getters
    public function getName(){
        return $this->name;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function getPrice(){
        return $this->price;
    }
}
?>