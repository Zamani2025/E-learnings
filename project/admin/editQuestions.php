<?php 
    include_once "./include/config.php";
    session_start();
    $result = $conn->query("SELECT * FROM questions WHERE id='" . $_GET["id"] . "'");

    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>All Admins</title>
</head>

<body>
  <!-- START HERE -->

<!--Nav abr starts here-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <a href="index.html"style="font-family: 'Permanent Marker', cursive;" class="navbar-brand p-1">E-learning</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="../admin.php" class="nav-link px-3">Dashboard</a>
                </li>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-user"></i> Welcome <?php echo $_SESSION["admin"] ?>
                    </a>  
                </li>
                <li class="nav-item">
                    <a href="./adminlogout.php" class="nav-link">
                        <i class="fas fa-user-times"></i> Logout
                    </a>
                </li>
            </ul>

        </div>
    </div>  
</nav>

<!--header section-->
<header class="headersection bg-warning text-white py-3">
    <div class="container">
        <h1 style="font-family: 'Permanent Marker', cursive;">
            <i class="fas fa-users"></i> Edit Questions
        </h1>
    </div>
</header>

<!---serach Section -->
<section class="search bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 py-4 ml-auto">
                <div class="input-group">
                    <input class="form-control" Placeholder="Search...">
                    <div class="input-group-append">
                        <button class="btn btn-warning">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--posts-->
<section class="postspost py-4">
    <div class="container"> 
        <div class="card p-4">
            <div class="card-header mb-4">
                <h3 style="font-family: 'Permanent Marker', cursive;">Edit Questions</h3>
            </div>
            <form action="../main/editQuestion.php" method="post">
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" value="<?php echo $row["question"]; ?>" name="question" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="tutorials">Tutorials</label>
                        <select class="form-control" name="tutorials">
                            <?php
                                include("./include/config.php");
                                $sql = "SELECT * FROM questions";

                                $result = $conn->query($sql);

                                while ($rows = $result->fetch_assoc()) {
                                    
                            ?>
                                <option value="<?php echo $rows["tut_title"] ;?>"><?php echo $rows["tut_title"]; ?></option>
                            <?php }
                            ?>
                        </select>
                </div>
                <input type="submit" class="btn btn-info" value="Submit" name="edit" id="">
            </form>
    </div>   
        </div>    
    </div>
</section>

<footer class="footer bg-dark text-white text-center py-4">
    <p class="lead" style="font-family: 'Permanent Marker', cursive;">E-learning | copyright &copy; <span id="year"></span></p>
</footer>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

  <script>
    $('#year').text(new Date().getFullYear());
  </script>
</body>

</html>