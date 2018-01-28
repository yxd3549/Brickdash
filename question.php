<?php
    print_r($_POST);
    include_once "assets/php/library.php";

    if ( !empty( $_POST )) {
        $query = "SELECT * FROM users
            WHERE name ='". $_SESSION["username"]."'";
        $result = mysqli_query($mysqli, $query);
        $user = mysqli_fetch_assoc( $result );
        $userid = $user["userid"];
        $message = $_POST["ans"];
        $query = "INSERT INTO answers
                              SET userid='" . $userid . "', 
                              answer='" . $message . "',
                              username='" . $_SESSION["username"] . "',
                              clicked='" . '0' . "'";
        mysqli_query($mysqli, $query);
        header("Location: reveal.php");
    }
    else {

        $code = $_SESSION["group"];
        $query = "SELECT * FROM groups WHERE grouptoken = '" . $code . "'";
        $result = mysqli_query($mysqli, $query);
        $group = mysqli_fetch_assoc($result);
        if (!$group["questioned"]) {
            $query = "SELECT * FROM questions
            ORDER BY RAND()
            LIMIT 1";
            $result = mysqli_query($mysqli, $query);
            $question = mysqli_fetch_assoc($result);
            $query = "UPDATE groups
                          SET currentq = " . $question["quesid"] . ",
                          questioned = 1 
                          WHERE grouptoken='" . $code . "'";
            mysqli_query($mysqli, $query);
            $query = "INSERT INTO answers
                              SET userid='" . "0" . "',
                              clicked='" . '0' . "', 
                              username='Correct Answer',
                              answer='" . $question["correctanswer"] . "'";
            mysqli_query($mysqli, $query);
        } else {
            $query = "SELECT * FROM questions
            WHERE quesid =" . $group["currentq"];
            $result = mysqli_query($mysqli, $query);
            $question = mysqli_fetch_assoc($result);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1.0" />
    <title>Brickdash</title>
</head>
<body id="question_body">
<div class="container-fluid">
    <div class="col-md-12 text-center">
        <h1 id="headq"><?= displayQuestion($question)?></h1>
    </div>
    <div class="col-md-12 text-center">
        <form method="post">
            <input type="text" name="ans" placeholder="Enter answer here" id="answer">
            <input type="submit" name="go" id="go" class="btn btn-default btn-lg" value="Submit">
        </form>
    </div>
</div>
</body>
</html>
