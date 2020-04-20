<?php
/*
    Author: Carson Perry
    Date: 3/1/20
    addhandler.php

    This is supposed to let an admin edit  user on the site, without having to have direct access to the database. Not completed in it's entirety.
    $_GET the email to load the information to the form values then apply the changes
*/
?>
<html>
<head>

    <title>Edit Handler</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<?php

require_once "../../Classes/User.php";
if ($_POST && isset($_POST['credit'], $_POST['email'], $_POST['password']))
{
$card = $_POST['credit'];
$email = $_POST['email'];
$pass = $_POST['password'];
if ($_POST['customer'] == "cust")
{
    if($_POST ['admin'] == "adm")
    {
        $rights[] = {true, true};
    }
    else
    {
        $rights[] = {true, false};
    }
}
elseif ($_POST['admin'] == "adm")
{
    $rights[] = {false, true};
}
else
{
    $rights[] = {false, false};
}

echo "<p>$card</p>";

$user = new User($card, $email, $pass, $rights)
$user->addToTable();

echo "<h3>User edit successful</h3>";

header("Location: ../usersPage.php");
}
else
{
    echo "<p>Form submition failed</p>";
    header("Location: ../usersPage.php");
}
?>
</body>
</html>