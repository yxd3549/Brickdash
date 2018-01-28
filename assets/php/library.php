<script>
    function chooseAnswer( choice ){
        document.getElementById("choice").value = choice;
    }
</script>

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

    function listScores($group, $mysql){
        $query = "SELECT * FROM users WHERE grouptoken = '" . $group . "'";
        $result = mysqli_query($mysql, $query);
        $num_rows = mysqli_affected_rows($mysql);
        if ($num_rows > 0){
            echo "<ul>";
            while ( $row = mysqli_fetch_assoc( $result ) ) {
                echo "<li>" . $row["name"] . " - " .$row["score"] . "</li>" ;
            }
            echo "</ul>";
        }
    }
    function listPlayers($group, $mysql){
        $query = "SELECT * FROM users WHERE grouptoken = '" . $group . "'";
        $result = mysqli_query($mysql, $query);
        $num_rows = mysqli_affected_rows($mysql);
        if ($num_rows > 0){
            echo "<ul class='gen_list'>";
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

    function displayQuestion($question){
        $type = $question["qtype"];
        $prompt = $question["question"];
        if ($type == 1){
            return "What's the definition of " . $prompt . "?";
        }
        else if ($type == 2){
            return "Who is " . $prompt . "?";
        }
        else if ($type == 3){
            return "What does " . $prompt . " stand for?";
        }
        else if ($type == 4){
            return "What is the movie " . $prompt . " about?";
        }
        else if ($type == 5){
            return $prompt;
        }
        else{
            return "WTF";
        }
    }

    function listAnswers($mysql){
        $query = "SELECT * FROM answers";
        $result = mysqli_query($mysql, $query);
        $num_rows = mysqli_affected_rows($mysql);

        if ($num_rows > 0){
            $i = 0;
            while ( $row = mysqli_fetch_assoc( $result ) ) {
                echo "<div class=\"answer_choices\" onmouseover=\"style='cursor: pointer; background-color: red '\"
                onmouseleave=\"style= 'cursor: auto; background-color: ffcaca'\"
                onclick=\"chooseAnswer($i)\"><p>" . $row['answer'] . "</p></div>";
                $i++;
            }
        }
    }
?>

