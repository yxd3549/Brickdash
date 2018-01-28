<?php
    include_once "include.php";
    function generateGroupCode(){
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
        $questiontype = 5;
        if ($filename == "initials")
        {

        }
        $result = "";
        while(!feof($questionsFile)) {
            $question = fgets($questionsFile);
            fgets($questionsFile);
            $answer = fgets($questionsFile);
            fgets($questionsFile);

            $query = "question='" . $question . "', correctanswer='" . $answer . "', correctanswer='" . $answer . "'";
            echo $query;

            $result = mysqli_query($mysqli, $query);

            echo "<li><h5 style='font-weight: bold'>".$question . "</h5>" .  "<p>" . $answer . "</p></li>";
        }
        return $result;
    }
?>