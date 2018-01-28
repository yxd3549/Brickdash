<?php
    require_once "assets/php/library.php";
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
<body id="index_body">
    <br>
    <div class="container-fluid text-center" id="welcome" id="text-index">
        <div id="logobox">
            <img id="logo" src="assets/Brickdash.png">
        </div>

        <h1>Welcome to Brickdash</h1>
        <div>
            <button type="button" class="btn btn-default" onclick="window.location='join.php'">Join Game</button>

            <button type="button" class="btn btn-default" onclick="window.location='create.php'">Create Game</button>
        </div>
        <div class="container-fluid " id="rules">
            <button type="button" class="btn btn-default" onclick="window.location='rules.php'">Click Here To Review Rules</button>
        </div>
    </div>

    <div  class="container-fluid text-center" id="basis">
        <h2>About the Brickdash</h2>
        <p id="descrip">
            Brickdash is a web based game that was based off the board game Balderdash. In our version of the game
            players will attempt to answer questions that are generated. Depending on who starts the game, players will
            go around taking turns reading out the questions as other players attempt to answer that question correctly.
            To learn more check out the rules page and remember to always have fun! Thanks for choosing Brickdash!
        </p>
    </div>
</body>
</html>
