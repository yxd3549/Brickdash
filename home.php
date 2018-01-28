<?php
require_once "assets/php/library.php";
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<<<<<<< Updated upstream
=======
<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">

>>>>>>> Stashed changes

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1.0" />
    <title>Brickdash</title>
</head>
<body>
<div class="container-fluid">
<<<<<<< Updated upstream
    <div class="row">
        <div class="col-md-4">
            <p id="players_title">Players</p>
            <?php listScores($_SESSION["group"], $mysqli)?>
=======
    <div class="row" id="homebod">
        <div class="col-md-12">
            <p id="players_title" class="text-center">Brick Dash</p>
            <ul class="text-center" id="player_list">
                <li id="home_play"> Player 1 <span> score </span> </li>
                <li id="home_play"> Player 2 <span>score </span> </li>
            </ul>
>>>>>>> Stashed changes
        </div>
    </div>
    <div class="col-md-12 text-center">
        <button type="button" class="btn btn-default"> Next Round </button>
        <button type="button" class="btn btn-default"> Finish Game </button>
    </div>
</div>
</body>
</html>
