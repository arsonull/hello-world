<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
	<!--<h2 style="color: #0099ff;"> Login was successful: <?php echo " " . $userName ;?></h2><br>-->
    <?php
        $_SESSION["admin"] = true;
        $_SESSION["loggedIn"] = true;
        header("Location: ../../index.php");
    ?>
    <ul>
        <a style="display: inline;" href="whoami.php"> Who AM I?</a>
        <a style="display: inline;" href="blogpost.html">Create a post</a>
        <a style="display: inline;" href="makeBlogRequest.php">List Blogs</a>
    </ul>
</body>
</html>

