<?php

class db
{
    // protected means a descendant of the class can access the values
    protected $connection;
    protected $query;
    public $query_count = 0;
    private $dbhost = '';
    private $dbuser = '';
    private $dbpass = '';
    private $dbname = '';
    private $charset = '';
    private $port = '';

    public function __construct($dbname = '')
    {
        
        
        // Set all the variables to there constant values
        $this->dbhost = 'localhost';
        $this->dbuser = 'root';
        $this->dbpass = 'root';
        $this->dbname = 'assign2';
        $this->charset = 'utf8';
        $this->port = '3306';

        // mysqli is a relational database driver
        $this->connection = new mysqli(dbhost, dbuser, dbpass, dbname, port);
        //$this->connection = new mysqli(mysqli_init(), dbhost, dbuser, dbpass, dbname, port);
        // Always test for errors when connecting to a db
        if ($this->connection->connect_error)
        {
            // IF the connection fails make sure it dies.
            die('Failed to connect to MySQL - ' . $this->connection->connect_error);
        }
        $this->connection->set_charset(charset);
        
    }
    
    
    public function read_all_rows($query)
    {
        echo ("<br>Connection: " . $this->connection . "<br>");
        $sql = $query;
        $result = $this->connection->query($sql);
        echo ("<br>Results: " . $result->num_rows . "<br>");
    }
    
    // Define the query
    public function query($query)
    {
        echo ("testing11..query: " . $this->connection->prepare($query) . "<br>");
        if ($this->query = $this->connection->prepare($query))
        {
            echo ("testing22..query: " . $query);
            // Get the number of arguments and make sure they are greater than 1
            if (func_num_args() > 1)
            {
                // returns an array of the arg list
                $x = func_get_args();
                // extrace a slice of the array with an offset of 1 so return all elements of the array except the first item in the array
                $args = array_slice($x, 1);
                $types = '';
                $args_ref = array();
                // => is used as an access mechanism for arrays (double arrow operator)
                foreach ($args as $k => &$arg)
                {
                    if (is_array($args[$k]))
                    {
                        foreach ($args[$k] as $j => &$a)
                        {
                            $types .= $this->_gettype($args[$k][$j]);
                            $args_ref[] = &$a;
                        }
                    } else 
                    {
                        $types .= $this->_gettype($args[$k]);
                        $args_ref[] = &$arg;
                    }
                }
                array_unshift($args_ref, $types);
                call_user_func(array($this->query, 'bind_param'), $args_ref);
            }
            $this->query->execute();
            if ($this->query->errno)
            {
                die ('Unable to process MySQL query (check your params) - ' . $this->query->error);
            }
            $this->query_count++;
        } else
        {
            echo ("here22........." . $query);
            die('Unable to prepare statement (check your syntax) - ' . $this->connection->error);
        }
        return $this;
    }
    public function fetchAll() {
        echo ("here in fetchAll........." .  "<br>");
        $params = array();
        $meta = $this->query->result_metadata();
        while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
        }
        call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            $r = array();
            foreach ($row as $key => $val) {
                $r[$key] = $val;
            }
            $result[] = $r;
        }
        $this->query->close();
        return $result;
    }
    
    public function fetchArray() {
        $params = array();
        $meta = $this->query->result_metadata();
        while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
        }
        call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            foreach ($row as $key => $val) {
                $result[$key] = $val;
            }
        }
        $this->query->close();
        return $result;
    }
    
    public function numRows() {
        $this->query->store_result();
        return $this->query->num_rows;
    }
    
    public function close() {
        return $this->connection->close();
    }
    
    public function affectedRows() {
        return $this->query->affected_rows;
    }
    
    private function _gettype($var) {
        if(is_string($var)) return 's';
        if(is_float($var)) return 'd';
        if(is_int($var)) return 'i';
        return 'b';
    }
    
}
?>
