<?php
//This is to connect to the database

class db_connect
{
    //Make all props private
    private $dbhost = '';
    private $dbuser = '';
    private $dbpass = '';
    private $dbname = '';
    private $dbport = '';

    //create a protected function
    protected function connect()
    {
        //Set all props
        $this->dbhost = 'localhost';
        $this->dbuser = 'root';
        $this->dbpass = 'root';
        $this->dbname = 'assign2';
        $this->dbport = '3306';

        //Connect to db
        $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname, $this->dbport);
        if ($this->conn->connect_error)
        {
            die('Failed to connect to MySQL = ' . $this->conn->connect_error);
        }
        else
        {
            //return connection status
            return $this->conn;
        }
        
    }
}

?>