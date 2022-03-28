<?php 
    include("./include/config.php");
    $_SESSION["deleteMessage"] = $_GET["question"] ." Deleted Successfully";

    $query = "DELETE FROM questions WHERE id='" . $_GET["id"] . "'";

    if(mysqli_query($conn, $query)){

        header("Location: ../admin-page");

        exit();
    }


?>