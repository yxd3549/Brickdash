<?php
    include_once "assets/php/library.php";
    if ( !empty( $_POST )){
        print_r($_POST);
        $query = "SELECT * FROM answers";
        $result = mysqli_query($mysqli, $query);
        $num_rows = mysqli_affected_rows($mysqli);
        if ($num_rows > 0){
            $i = 0;
            while ( $row = mysqli_fetch_assoc( $result ) ) {
                $query = "UPDATE users
                          SET score = score +" . $row["clicked"] . "
                          WHERE name='" . $row["username"] . "'";
                mysqli_query($mysqli, $query);
            }
        }
        if (isset($_POST["next"])){
            header("Location: home.php");
        }
        else if (isset($_POST["finish"])){
            header("Location: finish.php");

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
<body>
<div class="container-fluid" id="results_bod">
    <div class="col-md-12">
        <h1 id='question' class="text-center"> Question? </h1>
        <div class='row rounded' >
        <?php listResults($mysqli) ?>

        </div>
        <div class = "text-center">
            <form method="post">
                <input type="submit" name="next" id="next" class="btn btn-default large" value="Next Round">
                <input type="submit" name="finish" id="finish" class="btn btn-default large" value="Finish Game">
            </form>
        </div>
    </div>
</div>
</body>
</html>
