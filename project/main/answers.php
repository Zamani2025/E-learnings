<?php 
    include("./include/config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save"])) {

        $questions = $_POST["questions"];
        $answer = $_POST["answer"];
        $iscorrect = $_POST["iscorrect"];

        if(empty($questions)) {
            die("Question field is required");
        }
        if(empty($iscorrect)) {
            die("IsCorrect field is required");
        }
        if(empty($answer)) {
            die("Answer field is required");
        }

        if($stmt = $conn->prepare("SELECT id, questions FROM answers WHERE answer = ?")){
            $stmt->bind_param("s", $answer);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows > 0){
                exit("$answer Exists. Please try again");
            }else {
                if($stmt = $conn->prepare("INSERT INTO answers(answer,iscorrect, questions) VALUES(?,?, ?)")){
                    $stmt->bind_param("sss", $answer, $iscorrect, $questions);
                    $stmt->execute();
                    $stmt->store_result();

                    $_SESSION["successMessage"] = "$questions Successfully Created";

                    header("Location: ../admin-page");

                }
            }
        }
    }


?>