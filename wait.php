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
                <div class="col-md-12">
                    <button onclick="window.location='wait.php'"> Refresh Page </button>
                    <button onclick="window.location='home.php'"> Start Game </button>
                    <button onclick="window.location='index.php'" name="leaveBtn"> Leave Game </button>
                </div>
                <?php
                    if (isset($_POST["leaveBtn"]))
                    {
                        $query = "DELETE FROM users WHERE name='" . "HOW DO I GET NAME!" . "'";

                        echo $query;
                        echo "button 1 has been pressed";
                    }
                ?>
            </div>
        </div>
    </body>
</html>