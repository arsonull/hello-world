<?php

public class UserDataService
{
    public function findByFirstName($pattern)
    {
    $db = new dbConnect();
    $data = $db->connect();
    $index = 0;
    $users = array();
    if ($data)
    {
        $sql = "SELECT * FROM users WHERE full_name = $pattern";
        $result = $data->query($sql);
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $users[index] = array($row["ID"]), $row["full_name"], $row["last_name"];
                ++$index;
                //echo $row["ID"]. " " . $row["full_name"] . " " . $row["last_name"] . "<br>";
            }
            
            return $users;
        }
        else
        {
            echo "No records";
        }
    }
    $data->close();
    }
    
}
?>