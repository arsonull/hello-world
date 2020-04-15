<?php
//echo "Database.php loaded<br>";
class Database{
    function getConnected(){
        //echo "Database->getconnected invoked";
        $this->dbhost = 'localhost';
        $this->dbuser = 'root';
        $this->dbpass = 'root';
        $this->dbname = 'act5';
        $this->port = '3306';
        
        //connect to the db
        //echo "hello from getConnected";
        $this->dbconnect = new mysqli($this->dbhost , $this->dbuser , $this->dbpass,$this->dbname, $this->port);
        
        if($this->dbconnect->connect_error){
            die('Failed to connect to MySQL: ' . $this->dbconnect->connect_error);
        }
        //return the connection
        //echo "connected";
        return $this->dbconnect;
    }
    function disconnect(){
        //echo "disconnecting";
        $this->close;
    }
}
?>