<?php
require_once "assets/php/library.php";
if ( !empty( $_POST )) {
    $code = $_POST["code"];
    $username = $_POST["username"];

    // Check if the group exists
    $query = "SELECT * FROM groups WHERE grouptoken = '" . $code . "'";
    $result = mysqli_query($mysqli, $query);
    $num_rows = mysqli_affected_rows($mysqli);
    if ($num_rows > 0){
        $message = "You have successfully joined a group!";
        // If so, insert user into the database with the correct group
        $query = "INSERT INTO users
                          SET name='" . $username . "', 
                          grouptoken='" . $code . "'";
        $result = mysqli_query($mysqli, $query);
        $num_rows = mysqli_affected_rows($mysqli);
        if ($result && $num_rows > 0) {
            header("Location: wait.php");
        }
    }
    else{
        $message = "No group with this code exists";
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
    <div class="col-md-12" id="meh">
        <span>Access Code: </span>
        <div class="col-md-12">
            <ul id='playerlist' class="text-left">
                <li> Player 1 </li>
                <li> Player 2 </li>
            </ul>
        </div>
    </div>
    <div class="col-md-12">
        <button> Start Game </button>
        <button> Leave Game </button>
    </div>
</div>
</div>
</body>
</html>
