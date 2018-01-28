<?php
    require_once "assets/php/library.php";
    if (isset($_POST["leave"]))
    {
        $query = "DELETE FROM users WHERE name='" . $_SESSION["username"] . "'";
        mysqli_query($mysqli, $query);
        header("Location: index.php");
        exit();
    }
    else if (isset($_POST["refresh"])){
        header("Location: wait.php");
        exit();
    }
    else if (isset($_POST["start"])){
        header("Location: home.php");
        exit();
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
    <body id="wait_body">
        <div class="container-fluid text-center">
            <div class="col-md-12" id="meh">
                <span id="access_size">Access Code: <?= $_SESSION["group"]?></span>
                <div class="col-md-12" id="playerlist">
                    <!--<script>
                    /*    function showWaiting() {
                            //onload //= "showWaiting()"
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                                if(xmlhttp.readystate==4 && xmlhttp.status==200) {
                                    document.getElementById("waitingPlayers").innerHTML = this.responseText;
                                }=
                            };
                            //xmlhttp.open("GET", "assets/php/library.php?list=" + $_SESSION["group"], true);
                            //xmlhttp.send();
                            //setTimeout(showWaiting, 10000);
                            //location.reload();
                        }*/
                    </script> -->
                    <?php listPlayers($_SESSION["group"], $mysqli) ?>
                </div>
                <form method="post" id="form_access2">
                    <div class="col-md-12">
                        <input type="submit" name="refresh" id="refresh" class="btn btn-default"  value="Refresh Page">
                        <input type="submit" name="start" id="start" class="btn btn-default" value="Start Game">
                        <input type="submit" name="leave" id="leave" class="btn btn-default" value="Leave Game">
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>