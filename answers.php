<?php
    include_once "assets/php/library.php";
    if ( !empty( $_POST )) {
        $choice = $_POST["choice"];
        $query = "UPDATE answers
                          SET clicked = clicked + 1
                          WHERE userid='" . $choice . "'";
        mysqli_query($mysqli, $query);

        // Grant points for right answer
        $query = "SELECT * from answers
        WHERE userid='" . $choice ."'";
        $result = mysqli_query($mysqli, $query);
        $answer = mysqli_fetch_assoc( $result );
        if ($answer["username"] == "Correct Answer"){
            $username = $_SESSION["username"];
            $query = "UPDATE users
                          SET score = score + 2
                          WHERE name='" . $username . "'";
            mysqli_query($mysqli, $query);
        }
        header("Location: results.php");
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
<body id='answer_body'>
    <div class="container-fluid">
        <div class="col-md-12 text-center">
            <h1 id='question'> Question? </h1>
            <?php listAnswers($mysqli)?>
            <form method="post">
                <input type="text" name="choice" placeholder="Enter answer here" id="choice">
                <input type="submit" name="choose" id="choose" class="btn btn-default btn-lg" value="Submit">
            </form>
        </div>

    </div>
</body>
</html>
