<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "elearning";

    $conn = new mysqli($servername, $username, $password, $dbname) or die("Connection Failed" . $conn->error);



?>