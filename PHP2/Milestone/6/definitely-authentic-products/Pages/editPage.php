<!DOCTYPE html>
<?php
    
?>
<html>
<head>
<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../CSS/styles.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include("fragments/navbar.php"); ?>
	<div class="jumbotron text-center">
		<h1>Create new user</h1>
	</div>

	<div class="container">
		<div class="row">
			<form action="Handlers/edithandler.php" method="POST">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="credit">Credit Card:</label> <input type="tel"
							class="form-control" id="credit" name="credit" value="<?php?>">
					</div>
					<div class="form-group">
						<label for="email">Email address:</label> <input type="text"
							class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="password">Password:</label> <input type="password"
							class="form-control" id="password" name="password">
					</div>
					<div class="form-group">
						<label for="customer">Customer:</label> <input type="checkbox" id="customer" name="customer" checked="checked"
						value="cust">
					</div>
					<div class="form-group">
						<label for="admin">Admin:</label> <input type="checkbox" id="admin" name="admin" value="adm">
					</div>
					<input name = "submitButton" type="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</body>
</html>