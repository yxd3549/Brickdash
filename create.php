<?php
    require_once "assets/php/library.php";
    $username = $_POST["username"];
    if ( !empty( $_POST && isset($_POST["create"]))) {
        print_r($_POST);
        $code = generateGroupCode();

        $query = "INSERT INTO users
                      SET name='" . $username . "',
                      userid='" . '0' . "',
                      score='" . '0' . "',
                      grouptoken='" . $code . "'";
        $_SESSION["username"] = $username;
        $result = mysqli_query($mysqli, $query);
        $num_rows = mysqli_affected_rows($mysqli);

        $query2 = "INSERT INTO groups
                      SET grouptoken='" . $code . "',
                      questioned='" . '0' . "',
                      size='" . '1' . "'";
        echo $query2;
        $result2 = mysqli_query($mysqli, $query2);
        $num_rows2 = mysqli_affected_rows($mysqli);
        if ($result && $result2) {
            $_SESSION["group"] = $code;
            $_SESSION["score"] = array($username => 0);
            $_SESSION["size"] = 1;
            header("Location: wait.php");
        }
    }
    else if (!empty( $_POST && isset($_POST["back"]))){
        header("Location: index.php");
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
<body id="create_body">
    <div class="container-fluid text-center">
        <div class="container-fluid text-center"> <br>
            <form method="post">
                <input type="text" name="username" placeholder="Enter name" id="username">
                <div class="col-md-12">
                    <input type="submit" id='create' name="create" class="btn btn-default" value="Create">
                    <input type="submit" name="back" id='back' class="btn btn-default" value="Back">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
