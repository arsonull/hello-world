<?php
require_once "AutoLoader.php";

public class UserBusinessService
{
    public function searchByFirstName($pattern)
    {
        $service = new UserDataService();
        return $service->findFirstName($pattern);
    }
}
?>