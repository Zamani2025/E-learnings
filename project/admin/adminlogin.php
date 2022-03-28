<?php 
    
    session_start();

    include("./include/config.php");

    $usernameError = $passwordError = $incorrect =  "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["login"]){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $_SESSION['admin'] = $username;
        $_SESSION['message'] = "You have successfully logged in as $username";

        if(empty($username)){
            $usernameError = "Username field is required";
        }else {
            if(preg_match("/[^A-Za-z-']/", $username)){
                $usernameError = "Invalid Name. Name must be characters";
            }
        }
        if(empty($password)){
            $passwordError = "Password field is required";
        }

        if($stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?")){
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows == 1){

                header("Location: ./admin-page");

                exit();
            }else {
                $incorrect = "Incorrect Name or Password";
            }
        }


    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In</title>
    <link rel="stylesheet" href="public/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  
</head>
<body>
    
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="" method="POST">
                            <div class="form-group">
                                <div style="color: red; font-family: Arial, Helvetica, sans-serif;"><?php echo $usernameError; ?></div>
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div style="color: red;"><?php echo $passwordError ?></div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input name="password" type="password" class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <input type="submit" value="Login" class="btn btn-outline-primary" name="login">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
</body>
</html>