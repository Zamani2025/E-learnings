<?php 
    include_once "../include/config.php";

    
    if(isset($_POST["edit"])){
        $questions = $_POST["question"];
        $tut_title = $_POST["tutorials"];
        if($conn->query("UPDATE questions SET questions = $questions, tut_title = $tut_title,WHERE id = '" . $_GET["id"] . "'")){
            header("Location: ../admin-page");
        }
    }
?>