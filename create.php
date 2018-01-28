<?php
    require_once "assets/php/include.php";

    if(!empty($_POST)){

        $username = htmlentities(mysqli_real_escape_string($mysqli, strip_tags($_POST["username"])));
        $password = htmlentities(mysqli_real_escape_string($mysqli, strip_tags($_POST["password"])));
        $hashed_password = sha1($password);

        $query = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $hashed_password ."';";

        $result = mysqli_query($mysqli, $query);
        if (!$result){
            die("Database query failed.");
        }

        $num_rows = mysqli_affected_rows($mysqli);
        if ($num_rows > 0){
            $message = "You have successfully logged in!";
        }
        else{
            $message = "Your credentials do not match our records";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1.0" />
    <title>Brickdash</title>
</head>
<body>
<div class="container-fluid text-center">
    <div class="container-fluid text-center">
        <form method="post">
            <input type="text" name="username" placeholder="Enter name" id="username">
            <div class="col-md-12">
                <button id='create'> Create </button>
                <button id='back'> Back </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
