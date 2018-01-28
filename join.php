<?php
    require_once "assets/php/library.php";
    if ( !empty( $_POST )) {
        $code = $_POST["code"];
        $username = $_POST["username"];
        $_SESSION["username"] = $username;
        // Check if the group exists
        $query = "SELECT * FROM groups WHERE grouptoken = '" . $code . "'";
        $result = mysqli_query($mysqli, $query);
        $num_rows = mysqli_affected_rows($mysqli);
        if ($num_rows > 0){
            $group = mysqli_fetch_assoc( $result );
            $message = "You have successfully joined a group!";
            $_SESSION["group"] = $code;
            // If so, insert user into the database with the correct group
            $query = "INSERT INTO users
                          SET name='" . $username . "', 
                          userid='" . $group["size"] . "',
                          score='" . '0' . "',
                          grouptoken='" . $code . "'";
            $result = mysqli_query($mysqli, $query);
            $num_rows = mysqli_affected_rows($mysqli);
            if ($result && $num_rows > 0) {
                $_SESSION["score"][$username] = 0;
                //increase the size
                $query = "UPDATE groups
                          SET size = size + 1 
                          WHERE grouptoken='" . $code . "'";
                mysqli_query($mysqli, $query);
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
<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1.0" />
    <title>Brickdash</title>
</head>
<body id="join_bod">
<div class="container-fluid text-center">
    <?=$message?>
    <form method="post" id="form_access">
        <input type="text" name="code" placeholder="Enter access code" id="code"><br>
        <input type="text" name="username" placeholder="Enter name" id="username">
        <div class="col-md-12">
            <input type="submit" name="Join" id="join" class="btn btn-default">
            <button class="btn btn-default"> Back </button>
        </div>
    </form>
</div>
</body>
</html>
