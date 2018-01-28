<?php
    require_once "assets/php/library.php";
    if ( !empty( $_POST )) {
        $code = generateGroupCode();
        $username = $_POST["username"];
        $query = "INSERT INTO users
                      SET name='" . $username . "', 
                      grouptoken='" . $code . "'";
        echo $query;
        $result = mysqli_query($mysqli, $query);
        $num_rows = mysqli_affected_rows($mysqli);

        $query2 = "INSERT INTO groups
                      SET grouptoken='" . $code . "'";
        echo $query2;
        $result2 = mysqli_query($mysqli, $query2);
        $num_rows2 = mysqli_affected_rows($mysqli);
        if ($result && $result2) {
            $r = new HttpRequest('http://example.com/form.php', HttpRequest::METH_POST);
            $r->addPostFields(array('code' => $code));
            try {
                $r->send();
            } catch (HttpException $ex) {
                echo $ex;
            }
            header("Location: wait.php");
        }
    }
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
    <div class="container-fluid text-center"> <br>
        <form method="post">
            <input type="text" name="username" placeholder="Enter name" id="username">
            <div class="col-md-12">
                <input type="submit" id='create' name="create">
                <button id='back'> Back </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
