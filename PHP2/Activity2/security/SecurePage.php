<?php
include_once "header.php";

if (isset($_SESSION["principle"] || $_SESSION["principle"] == NULL || $_SESSION["principle"] == false))
{
    header("Location: Login.html");
}