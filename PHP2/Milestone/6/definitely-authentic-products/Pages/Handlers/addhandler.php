<?php
/*
    Author: Carson Perry
    Date: 2/29/20
    addhandler.php

    This is supposed to let an admin add a new user to the site without going through the register page
*/
?>
<html>
<head>

    <title>Add Handler</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<?php

require_once "../../Classes/User.php";
//Check if POST values are set
if ($_POST && isset($_POST['credit'], $_POST['email'], $_POST['password']))
{
//insantiate values for the 3 simple parts of a user
$card = $_POST['credit'];
$email = $_POST['email'];
$pass = $_POST['password'];
//Choosing which permissions the user has
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

//echo "<p>$card</p>";
//instantiating a user as well as calling it's add to table method to add the user's information to the database
$user = new User($card, $email, $pass, $rights);
$user->addToTable();

//showing that the addition was successful and taking back to the users page.
echo "<h3>New user created succesfully</h3>";

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