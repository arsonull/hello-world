<?php
require_once "../Scripts/utility.php";

class product
{
    public $ID = '';
    public $name = '';
    public $price = '';
    public $short_desc = '';
    public $image = '';
    public $category_ID = '';
    public $desc = '';
    public $desc_image = '';
    
    /*The following variables are for creating orders on the products page
    I needed to find some way to relay the information frmo the products selection page to the orders page
    */
    public $quantity = 0;
    public $selected = true;
    
    //order of items in the products retrieval
    //array($row['product_ID'] , $row ['name'] , $row['price'] , $row['short_desc'] , $row['image'] , $row['category_ID'] , $row['description'] , $row['desc_image']);
    function __construct($ID,$name,$price,$short_desc,$image,$category_ID,$desc,$desc_image)
    {
        $this->ID = $ID;
        $this->name = $name;
        $this->price = $price;
        $this->short_desc = $short_desc;
        $this->image = $image;
        $this->category_ID = $category_ID;
        $this->desc = $desc;
        $this->desc_image = $desc_image;
    }
    
    function getQuantity(){
        return $this->quantity;
    }
    function setQuantity($quantity){
        $this->quantity = $quantity;
    }
    
    function getSelected(){
        return $this->selected;
    }
    function setSelected($selected){
        $this->selected = $selected;
    }
}
?>