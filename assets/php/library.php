<?php
    session_start();
    error_reporting( E_ALL & ~E_NOTICE);
    $dbhost = "localhost";
    $dbuster = "root";
    $dbpass = "Pupu0405!";
    $dbname = "brickdash";
    $mysqli = mysqli_connect($dbhost, $dbuster, $dbpass, $dbname);
    if ( !$mysqli ){
        echo "connection failed: " . mysqli_connect_error();
        die();
    }

    function generateGroupCode(){
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
            .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            .'0123456789!');
        $rand = "";
        foreach (array_rand($seed, 6) as $k) $rand .= $seed[$k];
        return $rand;
    }

    function listPlayers($group, $mysql){
        $query = "SELECT * FROM users WHERE grouptoken = '" . $group . "'";
        $result = mysqli_query($mysql, $query);
        $num_rows = mysqli_affected_rows($mysql);
        if ($num_rows > 0){
            echo "<ul>";
            while ( $row = mysqli_fetch_assoc( $result ) ) {
                echo "<li>" . $row["name"]. "</li>";
            }
            echo "</ul>";
        }
    }

    function readQuestions($mysql) {
        $questiontypearray = array("words", "people", "initials", "movies", "laws");
        for ( $i = 0; $i <= 0; $i++ ) {
            $file = "../text/" . $questiontypearray[$i];
            $questionsFile = fopen($file, "r") or die("Unable to open file");
            $questiontype = $i + 1;
            while(!feof($questionsFile)) {
                $question = fgets($questionsFile);
                $answer = fgets($questionsFile);
                $query = "INSERT INTO questions SET question='" . $question . "', correctanswer='" . $answer . "', qtype='" . $questiontype . "'";
                $result = mysqli_query($mysql, $query);
                if ($result){
                    echo "Done";
                }
            }
        }
    }

?>