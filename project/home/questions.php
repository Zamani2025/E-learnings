<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./public/main.css">
  <link href="https://fonts.googleapis.com/css?family=Wendy+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <title>All Questions</title>
</head>
  <body>
    <a href='/project'><button type="button" name="home" id='btn-home'><i class='fa fa-home fa-2x'></i></button></a>
    <img src="./public/img/elearn.jpg" alt='logo' id='logo'><br>
    <h1>Questions</h1>
    <?php 
        include("./include/config.php");

        $sql = "SELECT * FROM questions LIMIT 20";

        $result = $conn->query($sql);

        while($rows = $result->fetch_array()){
    ?>
        <div id="question-one" class="quiz-ans-container">
            <h2>Q<?php echo $rows["id"] ?>. <?php echo $rows["question"] ?></h2>
            <div class="quiz-choice wrong-q1">
                <p>Touch</p>
            </div>
            <div class="quiz-choice .wrong-q1">
                <p>Smell</p>
            </div>
            <div class="quiz-choice correct-q1">
                <p>Sight</p>
            </div>
            <div class="quiz-choice .wrong-q1">
                <p>Sound</p>
            </div>
        </div>   
    <?php    
    }
    ?>
    
<!-- 
    <div id="question-two" class="quiz-ans-container" style="display:none;">
      <h2>Q2. Which of these disease affect the steadiness of your hands?</h2>
      <div class="quiz-choice correct-q2">
        <p>Parkinson’s Disease</p>
      </div>
      <div class="quiz-choice wrong .wrong-q1">
        <p>Mad Cow Disease</p>
      </div>
      <div class="quiz-choice wrong .wrong-q1">
        <p>Chicken Pox</p>
      </div>
      <div class="quiz-choice wrong .wrong-q1">
        <p>Cancer</p>
      </div>
    </div>

    <div id="question-three" class="quiz-ans-container" style="display:none;">
      <h2>Q3. Which of these activities requires hand eye co-ordination?</h2>
      <div class="quiz-choice wrong .wrong-q1">
        <p>Kicking a ball</p>
      </div>
      <div class="quiz-choice correct-q3">
        <p>Threading a needle</p>
      </div>
      <div class="quiz-choice wrong .wrong-q1">
        <p>Running</p>
      </div>
      <div class="quiz-choice wrong .wrong-q1">
        <p>Reading a book</p>
      </div>
    </div>

    <div id="question-four" class="quiz-ans-container" style="display:none;">
      <h2>Q4. Which part of the eye allows you to focus?</h2>
      <div class="quiz-choice wrong .wrong-q1">
        <p>Iris</p>
      </div>
      <div class="quiz-choice wrong .wrong-q1">
      <p>Pupil</p>
      </div>
      <div class="quiz-choice wrong .wrong-q1">
        <p>Cornea</p>
      </div>
      <div class="quiz-choice correct-q4">
        <p>Lens</p>
      </div>
    </div>

    <div id="question-five" class="quiz-ans-container" style="display:none;">
      <h2>Q5. Which nerve sends information from the eye to the brain?</h2>
      <div class="quiz-choice correct-q5">
        <p>Optic</p>
      </div>
      <div class="quiz-choice wrong .wrong-q1">
        <p>Central</p>
      </div>
      <div class="quiz-choice wrong .wrong-q1">
        <p>Spinal</p>
      </div>
      <div class="quiz-choice wrong .wrong-q1">
        <p>Sensory</p>
      </div>
    </div>

    <div id="quiz-result" style="display:none;">
      <p>Result here</p>
      <div class='score-container'>
        Score: <span id="score">0</span>
      </div>
    </div> -->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="./public/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
  </body>
</html>
