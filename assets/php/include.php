<?php
error_reporting( E_ALL & ~E_NOTICE);
$mysqli = mysqli_connect("localhost", "yxd3549", "password", "yxd3549");

if ( !$mysqli ){
    echo "connection failed: " . mysqli_connect_error();
    die();
}
?>
