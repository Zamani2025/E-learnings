<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
  <title>Admin Dashboard</title>

</head>

<body>
  <!-- START HERE -->

<!--Nav abr starts here-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <a href="/project/" class="navbar-brand p-1"><i class="fa fa-home"></i></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link px-3 active">Dashboard</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="dropdown">
                        <i class="fas fa-user"></i> Welcome 
                        <?php 
                            echo $_SESSION["admin"];
                        ?>
                    </a>
                   
                </li>
                <li class="nav-item">
                    <a href="./logout" class="nav-link">
                        <i class="fas fa-user-times"></i> Logout
                    </a>
                </li>
            </ul>

        </div>
    </div>  
</nav>

<!--header section-->
<header class="headersection bg-primary text-white py-2">
    <div class="container">
        <h1 style="font-family: 'Permanent Marker', cursive;">
            <i class="fas fa-cog "></i> Dashboard  
        </h1>
    </div>
</header>

<!--main section here-->

<!--add action section-->
<section class="addsection bg-light py-3">
    <div class="container text-white ">
                        <?php 
                            if(isset($_SESSION["successMessage"])){
                                ?>
                                <div class="alert alert-success">
                                    <?php echo $_SESSION["successMessage"]; ?>
                                </div>
                            <?php
                            }
                        ?>
                        
        <div class="row">
            <div class="col-md-3 mb-2"> 
                <a class="btn btn-primary btn-block p-2" data-toggle="modal" data-target="#addpost">
                    <i class="fas fa-plus"></i>  Add Tutorials
                </a>
            </div>
            <div class="col-md-3 mb-2"> 
                <a class="btn btn-success btn-block p-2" data-toggle="modal" data-target="#addcategory">
                    <i class="fas fa-plus"></i>  Add Question
                </a>
            </div>
            <div class="col-md-3 mb-2"> 
                <a class="btn btn-warning btn-block p-2" data-toggle="modal" data-target="#adduser">
                    <i class="fas fa-plus"></i>  Add Answers
                </a>
            </div>
        </div>
    </div>
</section>

<!--modal section of each add action-->

<!--Add post modal-->
<div class="modal fade" id="addpost">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white ">
                <h4 claas="modal-title">Add Tutorials</h4>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="./admin/add-tutorials" method="POST">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" class="form-control form-control-lg"> 
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea id="body" type="text" name="bodys" class="form-control form-control-lg"></textarea> 
                    </div>
                    <div class="modal-footer text-white">
                        <input type="submit" name="save" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Add category modal-->
<div class="modal fade" id="addcategory">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white ">
                <h4 claas="modal-title">Add Questions</h4>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="./admin/add-question" method="POST">
                    <div class="form-group">
                        <label for="category">Questions</label>
                        <input id="category" required name="questions" type="text" class="form-control form-control-lg"> 
                    </div>
                    <div class="form-group">
                        <label for="category">Tutorials</label>
                        <select class="form-control" name="tutorials">
                            <?php
                                include("./include/config.php");
                                $sql = "SELECT * FROM tutorials";

                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    
                            ?>
                                <option value="<?php echo $row["tut_title"] ?>"><?php echo $row["tut_title"] ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer text-white">
                        <input type="submit" name="save" value="Save" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Add user modal-->
<div class="modal fade" id="adduser">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white ">
                <h4 claas="modal-title">Add Answers</h4>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="./admin/add-answers" method="POST">
                    <div class="form-group">
                        <label for="name">Anwers</label>
                        <input id="name" required name="answer" type="text" class="form-control form-control-lg"> 
                    </div> 
                    <div class="form-group">
                        <label for="category">Questions</label>
                        <select class="form-control" name="questions">
                            <?php
                                include("./include/config.php");
                                $sql = "SELECT * FROM questions";

                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    
                            ?>
                                <option value="<?php echo $row["question"] ?>"><?php echo $row["question"] ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Correct Answer</label>
                        <input id="name" required name="iscorrect" type="text" class="form-control form-control-lg"> 
                    </div> 
                    <div class="modal-footer text-white">
                        <input type="submit" name="save" value="Save" class="btn btn-warning">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---posts-->
<section class="posts ">
    <div class="container my-4">
        <div class="row">
            <div class="col-md-9 d-none d-md-block">
                <div class="card">
                    <div class="card-header">
                        <h3>All Questions</h3>
                    </div>
                    <table class="table table-striped">
                        <thead class="bg-dark text-white">
                            <td>ID</td>
                            <td>Title</td>
                            <td>Tutorials</td>
                            <td></td>
                            <td></td>
                        </thead>
                        <tbody>
                            <tr>
                                
                            <?php
                                include("./include/config.php");
                                $sql = "SELECT * FROM questions";

                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    
                            ?>
                                <tr>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["question"] ?></td>
                                    <td><?php echo $row["tut_title"] ?></td>
                                    <td><a href="./admin/edit-question?id=<?php echo $row["id"]?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a></td>
                                    <td><a href="./admin/delete-questions?id=<?php echo $row["id"]?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                            <?php }
                            ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-primary text-center text-white">
                    <div class="card-body">
                        <h2 style="font-family: 'Permanent Marker', cursive;">Questions</h2>
                        <h3 class="display-4"><i class="fas fa-pencil-alt "></i> 
                        <?php 
                                include("./include/config.php");

                                $sql = "SELECT * FROM questions";

                                $result = $conn->query($sql);

                                echo $result->num_rows;
                            ?>
                        </h3>
                        <a href="./admin/all-questions" class="btn btn-outline-light mt-1">View</a>

                    </div>
                </div>
                <div class="card bg-success text-center text-white my-2">
                    <div class="card-body">
                        <h2 style="font-family: 'Permanent Marker', cursive;">Tutorials</h2>
                        <h3 class="display-4"><i class="fas fa-folder "></i>
                        <?php 
                                include("./include/config.php");

                                $sql = "SELECT * FROM tutorials";

                                $result = $conn->query($sql);

                                echo $result->num_rows;
                            ?>
                        </h3>
                        <a href="./admin/all-tutorials" class="btn btn-outline-light mt-1">View</a>

                    </div>
                </div>
                <div class="card bg-warning text-center text-white">
                    <div class="card-body">
                        <h2 style="font-family: 'Permanent Marker', cursive;">Admin</h2>
                        <h3 class="display-4"><i class="fas fa-users"></i> 
                            <?php 
                                include("./include/config.php");

                                $sql = "SELECT * FROM admin";

                                $result = $conn->query($sql);

                                echo $result->num_rows;
                            ?> 
                        </h3>
                        <a href="./admin/all-admins" class="btn btn-outline-light mt-1">View</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--footer section-->
<footer class="footer bg-dark text-white text-center py-4">
    <p class="lead" style="font-family: 'Permanent Marker', cursive;">E-learning | copyright &copy; <span id="year"></span></p>
</footer>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());
    
    //WYSIWYG editor for textarea
                        CKEDITOR.replace( 'body' );
                
  </script>
</body>

</html>