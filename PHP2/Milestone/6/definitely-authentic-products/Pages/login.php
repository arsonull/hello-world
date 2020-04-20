<html lang='eng'>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            img{
                width: 140px;
                height: 800px;
            }
            body{
                font-family: "Comic sans MS";
            }
        </style>
    </head>
    <body>
        <?php include("fragments/navbar.php");?>
        <div class="jumbotron text-center">
            <h1>Login</h1>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <img src="https://static-cdn.jtvnw.net/ttv-boxart/Raid%3A%20Shadow%20Legends.jpg" >
                </div>
                <div class="col-sm-8" style="border-style: solid; border-width: 1px;">
                    <form action="Handlers/loginhandler.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email address*:</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password*:</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                        <button name="submitButton" type="submit" class="btn btn-info" value="Submit">Submit</button>
                    </form>

                </div>
                <div class="col-sm-2">
                    <img src="https://i.redd.it/7fneh737oox21.png" >
                </div>
            </div>
        </div>

    </body>
</html>