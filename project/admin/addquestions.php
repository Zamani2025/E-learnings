<?php 
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    
    <div class="navbar">
        <ul class="nav-items">
            <li><a href=""><?php echo $_SESSION['admin'] ?></a></li>
            <li><a href="adminlogout.php">logout</a></li>
        </ul>
    </div>
    <div class="containers">
        <div class="form">
            <form action="" method="post">
                <label for="question">Question</label>
                <textarea name="question" id="" cols="30" rows="10"></textarea>
                <label for="answer">Answer</label>
                <input type="text" name="answer" id="">
                <input type="submit" name="add" value="Submit" id="">
            </form>
        </div>
    </div>
</body>
</html>