<?php 
    session_start();

    if($_SESSION['admin']){
        unset($_SESSION['admin']);
        
        $_SESSION["logout"] = "Log out successfully";

        header("Location: ./login");
    }


?>