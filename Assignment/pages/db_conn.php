<?php
$mysqli = new mysqli('localhost', 'root', 'sa', 'uniTesDB');
//check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$servername = $_SERVER['SERVER_NAME'];
?>