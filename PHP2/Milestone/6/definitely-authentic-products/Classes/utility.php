<?php
//This is a file just for reusable functions and queries
function query($dbName , $tableName , $query){
    $DBConnect = connect($dbName);
    if ($DBConnect->connect_error) {
        echo "<Connection error: " . $DBConnect->connect_error;
    } else {
        $sql = $query;
        if ($result = $DBConnect->query($sql)) {
            $nbrRows = $result->num_rows;
            echo "<p style=\"color: #green;\"><h3>Users</h3></p>";
            if($result->num_rows === 0)
                echo"<p>No results</p>";
            else{
                //echo "<p>" . $result->num_rows . " users are registered.</p>";
                while($row = $result->fetch_assoc()){
                    $users[$index] = array($row['ID'] , $row ['FirstName'] , $row['LastName'] , $rows['USERNAME']);
                    ++$index;
                }
                //print_r($users);
            }
            
        } else {
            echo "<p style=\"color:red;\">ERROR: " . $DBConnect->error . "</p>";
        }
    }
    


    $DBConnect->close;
    return $users;
}
?>