<?php
class User implements JsonSerializable
{
    private $id = 0;
    private $fName = "";
    private $lName = "";
    function __construct()
    {

    }
    function __construct($i, $first, $last)
    {
        $this->id = $i;
        $this->fName = $first;
        $this->lName = $last;
    }
    function jsonSerialize()
    {
        return get_object_vars($this);
    }
    function getID()
    {
        return $this->id;
    }
    function getFName()
    {
        return $this->fName;
    }
    function getLName()
    {
        return $this->lName;
    }
}

?>