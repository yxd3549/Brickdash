<?php
    require_once "assets/php/library.php";

    //first place
    //$queryname = "SELECT name FROM users WHERE score = MAX(score)";
    //top 3 players
    $queryTopThree = "SELECT * FROM users ORDER BY score DESC LIMIT 3";
    $result = mysqli_query($mysqli, $queryTopThree);

    $num_rows = mysqli_affected_rows($mysqli);
    if ($num_rows > 0){
        $i = 1;
        while ( $row = mysqli_fetch_assoc( $result ) ) {
            if ($i == 1){
                $winner = $row["name"];
            }
            else if ($i == 2){
                $second = $row["name"];
            }
            else if ($i == 3){
                $third = $row["name"];
            }
            $i++;
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
<body id="finish2_body">
    <div class="container-fluid text-center ">
        <h1 id="winner"><?=$winner?> is the Winner!</h1>
        <div>
            <p>Thanks for playing!</p>
        </div>
        <div >
            <ul id="mentions"> Honorable Mentions!
                <li>Second place: <?=$second?></li>
                <li>Third place: <?=$third?></li>
            </ul>
        </div>
        <div class="container-fluid text-center ">
            <button type="button" class="btn btn-default" onclick="window.location='index.php'">Return to the Home Page</button>
        </div>

    </div>
</body>
</html>
