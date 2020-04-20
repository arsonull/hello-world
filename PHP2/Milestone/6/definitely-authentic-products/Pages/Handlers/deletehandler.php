<?php
require_once "../../Classes/UserBusinessService.php";
$id = $_GET['ID'];
$businessService = new userBusinessService();
$businessService->deleteUser($id);
header("Location: ../usersPage.php");
?>