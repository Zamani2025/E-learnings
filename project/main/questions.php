<?php 
    include("./include/config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save"])) {

        $questions = $_POST["questions"];
        $tutorials = $_POST["tutorials"];

        if(empty($questions)) {
            die("Question field is required");
        }
        if(empty($tutorials)) {
            die("Tutorial field is required");
        }

        if($stmt = $conn->prepare("SELECT id, tut_title FROM questions WHERE question = ?")){
            $stmt->bind_param("s", $questions);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows > 0){
                exit("$questions Exists. Please try again");
            }else {
                if($stmt = $conn->prepare("INSERT INTO questions(question, tut_title) VALUES(?,?)")){
                    $stmt->bind_param("ss", $questions, $tutorials);
                    $stmt->execute();
                    $stmt->store_result();

                    $_SESSION["successMessage"] = "$questions Successfully Created";

                    header("Location: ../admin-page");

                }
            }
        }
    }


?>