<?php
<<<<<<< Updated upstream
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
=======
    echo"beginning";
    include_once "include.php";
    echo"ending";
    function generateGroupCode(){
>>>>>>> Stashed changes
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
            .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            .'0123456789!');
        $rand = "";
        foreach (array_rand($seed, 6) as $k) $rand .= $seed[$k];
        return $rand;
    }

    function createGroup($username) {
        $code = generateGroupCode();

    }

    function joinGroup($attempt, $groups) {
        #foreach ()
    }

    function readQuestions($filename) {
        $questionsFile = fopen($filename, "r") or die("Unable to open file");
        $questiontype = 0;
        $questiontypearray = array("word", "people", "initials", "movies", "laws");
        for ( $i = 0, $i <= 4, $i++ ) {
            if ( $filename == $questiontypearray[i] ) {
                $questiontype = i + 1;
            }
            $query = "";
            while(!feof($questionsFile)) {
                $question = fgets($questionsFile);
                fgets($questionsFile);
                $answer = fgets($questionsFile);
                fgets($questionsFile);

                $query = "INSERT INTO questions SET question='" . $question . "', correctanswer='" . $answer . "', qtype='" . $questiontype . "'";
                echo $query;
            }
        }
    }
?>