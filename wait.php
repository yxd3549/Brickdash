<?php
require_once "assets/php/library.php";
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
        <span>Access Code: <?= $_SESSION["group"]?></span>
        <div class="col-md-12" id="playerlist">
            <?php listPlayers($_SESSION["group"], $mysqli) ?>
        </div>
    </div>
    <div class="col-md-12">
        <button onclick="window.location='home.php'"> Start Game </button>
        <button> Leave Game </button>
    </div>
</div>
</div>
</body>
</html>
