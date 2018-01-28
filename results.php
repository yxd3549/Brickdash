<?php
    include_once "assets/php/library.php";
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
<body>
<div class="container-fluid" id="results_bod">
    <div class="col-md-12">
        <h1 id='question' class="text-center"> Question? </h1>
        <div class='row rounded' >
        <?php listResults($mysqli) ?>

        </div>
        <div class = "text-center">
            <button type="button" class="btn btn-default large"> Next Round </button>
            <button type="button" class="btn btn-default large"> Finish Game </button>
        </div>
    </div>
</div>
</body>
</html>
