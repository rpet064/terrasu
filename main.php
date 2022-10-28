<!-- file imports -->
<?php
  include('header.php');
  include('navbar.php');
  require('api.php')
?>

<!-- global variables-->
<script>
  var answers = [];
  var questions = [];
  var answerData = "";
  var questionData = "";
  var scoreCounter = 0;
  var questionCounter = 0;

  // functions for game state 

  function updateScore(){
    document.getElementById("question-counter").innerHTML = `Question: ${questionCounter+1}`;
    document.getElementById("score-counter").innerHTML = `Score: ${scoreCounter}`;
  }

  function endGame(){
    // hide game elements & show end game elements
    $('div[id="btn-container"]').hide();  
    $('div#question-container').hide();
    $('div#scoreboard').hide();
    $(`div#${questionCounter}`).hide();
    $('div#endgame-container').show();
    alert('Game is finished. Your score is ' + scoreCounter);
  }
</script>

<!-- functions for greeting screen to game state transition -->
<script>
    // hide greeting screen elements
    function hideElements(){
      $('button#begin-btn').hide();
      $('h3[name="greet-title"]').hide();
    }
    // show game elements
    function showElements(){
      $('div[id="btn-container"]').show();  
      $('div#question-container').show();
      $('div#scoreboard').show();
      $(`div#${questionCounter}`).show();
      $("#class-div").attr("class", "game-card");
    }
</script>
  
<!-- stylesheet & background image -->
  <style><?php include('./css/styles.css'); ?></style>
  <img src="https://picsum.photos/700/435" />

  <!-- submit-btn control begin screen to game transition -->
  <script>
  $(document).ready(function(){
    $('.begin-btn').click(function(event){
      event.preventDefault()
      hideElements();
      showElements();
   });
  });

  </script>

  <!-- control game reset -->
  <script>
  $(document).ready(function(){
    $('#reset-btn').click(function(event){
      window.location.reload();
   });
  });
  </script>

  <!-- control user false answer guess -->
<script>
  $(document).ready(function(){
    $('#false-btn').click(function(event){
      event.preventDefault()
        // change question
      $(`div#${questionCounter}`).hide();
      $(`div#${questionCounter}`).show();
      // check if user answer matches correct answer
      if (answerData[questionCounter] == "False"){
          alert('you got it right');
          scoreCounter++;
        } else{
          alert('Sorry it was true');
        }
        if (questionCounter == 9){
          endGame();
      } else {
        questionCounter++;
        updateScore();
      }
   });
  });
  </script>

  <!-- control true answer guess -->
<script>
  $(document).ready(function(){
    $('#true-btn').click(function(event){
      event.preventDefault()
      // change question
      $(`div#${questionCounter}`).hide();
      $(`div#${questionCounter+1}`).show();
      // check if user answer matches correct answer
        if (answerData[questionCounter] == "True"){
          alert('you got it right');
          scoreCounter++;
        } else{
          alert('Sorry it was false');
        }
        // check if last question
        if (questionCounter == 1){
          endGame();
      } else{
        questionCounter++;
        updateScore();
      }
   });
  });
  </script>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<!-- main container component  -->
<div id="class-div" class='card'>
  <h3 name='greet-title' > Welcome to Terrasu, a PHP Geography Quiz Game </h3>
  <h3 name='greet-title' class="grey-title"> Please press begin to start </h3>
        <button
          type="submit"
          id='begin-btn'
          class='begin-btn'
          name="begin-btn"
          />
          Begin
        </button>
    </div>
  <!-- scoreboard -->
  <div style="display:none" id="scoreboard" class='container'>
    <h5 id="question-counter">Question 1</h5> 
    <h5 id="score-counter">Your score is 0</h5> 
  </div>

  <!-- question container -->
  <div style="display:none" id='question-container' class='container'>
    <script>
        var answerData = <?PHP
          echo json_encode($answers);
          ?>;
        // import question api data from php sever echo into js variable
        var questionData = <?PHP
            echo json_encode($questions);
            ?>;
        const questionArray = document.getElementById('question-container').innerHTML = questionData.map(
        (item, index) => 
        `<div style="display:none" id=${index} class='question'>${item} True or False?</div>`
              ).join('')
    </script>
  </div>    
  <!-- form for users to share answers, reset game & post data when game is finished -->
    <div class='container' id='btn-container' style="display:none" name='btn-div'>
      <button id='true-btn' type="submit" name="true"
                  value="true"> True </button>
            
    <button id='false-btn' type="submit" name="false"
                  value="false"> False </button>
    
      <button id='reset-btn' type="submit" name="reset" 
      value="Reset"> Reset </button>
    </div>
  </div>
  </div>
  <!-- button to play again -->
  <div class='container' id="endgame-container" style="display:none">
    <h3> Thanks for playing! Play Again? </h3>
    <div>
      <button class='endgame-header' id='leaderboard' type="submit" name="play-again" 
      value="play-again" > leaderboard </button>
    </div>
    <div>
      <button id='play-again' type="submit" name="play-again" 
      value="play-again" > Again </button>
    </div>
  </div>

<?php
$header = include('footer.php');
?>