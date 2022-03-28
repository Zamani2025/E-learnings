<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-learning</title>
    <link rel="stylesheet" href="./public/style.css">
</head>
<body>
    <div class="navbar">
        <ul class="nav-items">
            <li><a href="">Tutorials</a></li>
            <li><a href="./questions">Questions</a></li>
            <?php 
                if(isset($_SESSION["admin"])){
            ?>
                <li><a href="./admin-page">Dashboard</a></li>
            <?php    }
            else {
            ?>  
                <li><a href="./login">Sign In</a></li>
             <?php   }
            ?>
        </ul>
    </div>
    <div class="section">
        <div class="carousel">
            <div class="header">
                Welcome to E-learning Site
            </div>
        </div>
    </div>
</body>
</html>