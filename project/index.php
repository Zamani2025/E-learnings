<?php

$tut_id = isset($_GET['tutorial-id']) ? $_GET['tutorial-id'] : "";
$id = isset($_GET['id']) ? $_GET['id'] : "";

$request = $_SERVER['REQUEST_URI'];
$path = "/project";
switch ($request) {
        // GET REQUESTS
        // Home index routes
    case  $path . '/':
        require __DIR__ . '/home/index.php';
        break;
    case '':
        require __DIR__ . '/home/index.php';
        break;


    case  $path . "/questions":
        require __DIR__ .  '/home/questions.php';
        break;

    case  $path . "/tutorials":
        require __DIR__ .  '/home/tutorials.php';
        break;
    
    case  $path . "/login":
        require __DIR__ .  '/admin/adminlogin.php';
        break;




        //    admin routes
    case  $path . "/admin-page":
        require __DIR__ .  '/admin/admin.php';
        break;
    case  $path . "/admin/all-questions":
        require __DIR__ .  '/admin/questionslist.php';
        break;
    case  $path . "/admin/all-tutorials":
        require __DIR__ .  '/admin/tutorialslist.php';
        break;
    case  $path . "/admin/all-admins":
        require __DIR__ .  '/admin/adminlist.php';
        break;
    
    case  $path . "/admin/edit-question?id=" . $id:
        require __DIR__ .  '/admin/editQuestions.php';
        break;
    
        case  $path . "/admin/get-qst-ans":

            require __DIR__ .  '/views/admin/get-qst-ans.php';
            break;
    



        // POST REQUESTS-ADMIN
    case  $path . "/admin/add-question":
        require __DIR__ .  '/main/questions.php';
        break;
    case  $path . "/admin/add-answers":
        // static css assets aint working here 
        require __DIR__ .  '/main/answers.php';
        break;
    case  $path . "/admin/add-tutorials":

        require __DIR__ .  '/main/tutorials.php';
        break;

    case  $path . "/logout":

        require __DIR__ .  '/admin/adminlogout.php';
        break;
        


    case  $path . "/admin/delete-questions?id=" . $id:

        require __DIR__ .  '/admin/deleteQuestion.php';
        break;

        case  $path . "/admin/update-questions":

            require __DIR__ .  '/main/editQuestion.php';
            break;
    


        // POST REQUESTS-GENERAL

    case  $path . "/validate-answers":
        require __DIR__ .  '/api/main/validate-answers.php';
        break;

        // 404 route
    default:
        http_response_code(404);
        require __DIR__ . '/404.php';
        break;
}