<?php 
    include("./include/config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save"])) {

        $title = $_POST["title"];
        $body = $_POST["bodys"];

        if(empty($title)) {
            die("Title field is required");
        }
        if(empty($body)) {
            die("Body field is required");
        }

        if($stmt = $conn->prepare("SELECT tut_id, tut_body FROM tutorials WHERE tut_title = ?")){
            $stmt->bind_param("s", $title);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows > 0){

            }else {
                if($stmt = $conn->prepare("INSERT INTO tutorials(tut_title, tut_body) VALUES(?,?)")){
                    $stmt->bind_param("ss", $title, $body);
                    $stmt->execute();
                    $stmt->store_result();

                    $_SESSION["successMessage"] = "$title Successfully Created";

                    header("Location: ../admin-page");

                }
            }
        }
    }


?>