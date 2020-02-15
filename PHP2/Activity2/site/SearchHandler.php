<?php
require_once "AutoLoader.php";
//require_once "UserBusinessService.php";
//require_once "UserDataService.php";
?>
<html>
<head>
    <title>Results</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php

echo "1 ";
$searchPattern = $_POST['full_name'];

//searchByFirstName($searchPattern);
echo "$searchPattern ";

echo "php sucks";

//$busService = new UserBusinessService();
$users = searchByFirstName($searchPattern);

echo "3";

/*include_once "__displayAllUsers.php";
echo "3";

foreach ($results['$data'] as $result)
{
    echo "Hello";
    echo $result['type'], '<br>';
}*/
?>
<table class="table">
    <?php include_once('__displayAllUsers.php')?>
</table>
</body>
</html>