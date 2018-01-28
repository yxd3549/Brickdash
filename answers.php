<?php
    include_once "assets/php/library.php";

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
            <input type="text" name="choice" placeholder="Enter answer here" id="choice">
            <input type="submit" name="choose" id="choose" class="btn btn-default btn-lg" value="Submit">
        </div>

    </div>
</body>
</html>
