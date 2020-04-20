<?php
define('HOSTNAME', "localhost");
define('USERNAME', "root");
define('PASSWORD', "root");
define('EMPTY_STRING', "");

/**
 * 
 * @param unknown $DBName
 * @return mysqli
 */

function connect($DBName)
{
    // stores the resource
    $DBConnect = new mysqli(HOSTNAME, USERNAME, PASSWORD, $DBName);
    if ($DBConnect -> connect_error) {
        echo "<h2><p>ERROR: FAILURE TO CONNECT:  " . $DBConnect -> error . "</p></h2>";
    }else{
        return $DBConnect;
    }
}

function setUserID($id){
    session_start();
    $_SESSION['USER_ID'] = $id;
    return;
}
function getUserID(){
    session_start();
    $_SESSION['USER_ID'];
    return $_SESSION['USER_ID'];
}
?>
