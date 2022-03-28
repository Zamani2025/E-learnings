$(document).ready(function(){
    // Quiz JS
    // Global Default
    jconfirm.defaults = {
      boxWidth: '30%',
      useBootstrap: false,
    };
  
    var score = 0;
  
    $('#question-two').hide();
    $('#question-three').hide();
    $('#question-four').hide();
    $('#question-five').hide();
    $('#quiz-result').hide();
  
    $('.correct-q1').click(function(){
      score++
      console.log(score);
      $.confirm({
          title: 'Correct answer!',
          content: 'Insert Fact Here',
          type: 'green',
          typeAnimated: true,
          buttons: {
              tryAgain: {
                  text: 'Next Question',
                  btnClass: 'btn-green',
                  action: function(){
                    $('#question-two').show();
                    $('#question-one').hide();
                    
                  }
              },
          }
      });
    });
  
    $('.correct-q2').click(function(){
      score++
        console.log(score);
      $.confirm({
          title: 'Correct answer!',
          content: 'Insert Fact Here',
          type: 'green',
          typeAnimated: true,
          buttons: {
              tryAgain: {
                  text: 'Next Question',
                  btnClass: 'btn-green',
                  action: function(){
                    $('#question-three').show();
                    $('#question-two').hide();
                  }
              },
          }
      });
    });
  
    $('.correct-q3').click(function(){
      score++
        console.log(score);
      $.confirm({
          title: 'Correct answer!',
          content: 'Insert Fact Here',
          type: 'green',
          typeAnimated: true,
          buttons: {
              tryAgain: {
                  text: 'Next Question',
                  btnClass: 'btn-green',
                  action: function(){
                    $('#question-four').show();
                    $('#question-three').hide();
                  }
              },
          }
      });
    });
  
    $('.correct-q4').click(function(){
      score++
        console.log(score);
      $.confirm({
          title: 'Correct answer!',
          content: 'Insert Fact Here',
          type: 'green',
          typeAnimated: true,
          buttons: {
              tryAgain: {
                  text: 'Next Question',
                  btnClass: 'btn-green',
                  action: function(){
                    $('#question-five').show();
                    $('#question-four').hide();
                  }
              },
          }
      });
    });
  
    $('.correct-q5').click(function(){
      score++
        console.log(score);
      $.confirm({
          title: 'Correct answer!',
          content: 'Insert Fact Here',
          type: 'green',
          typeAnimated: true,
          buttons: {
              tryAgain: {
                  text: 'Next Question',
                  btnClass: 'btn-green',
                  action: function(){
                    $('#question-five').hide();
                    $('#quiz-result').show();
                    $('#score').text(score);
                  }
              },
          }
      });
    });
    //window.location.href = "index.html";
  
  
  
  
    $('.wrong-q1').click(function(){
      $.confirm({
          title: 'WRONG!',
          content: "This isn't the answer, choose another!",
          type: 'red',
          typeAnimated: true,
          buttons: {
              tryAgain: {
                  text: 'Try Again',
                  btnClass: 'btn-red',
              },
          }
      });
    });
  
    // End Quiz JS
  
  });
  