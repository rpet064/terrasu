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
</script>

<script>
  function updateScore(){
    document.getElementById("question-counter").innerHTML = `Question: ${questionCounter+1}`;
    document.getElementById("score-counter").innerHTML = `Score: ${scoreCounter}`;
  }
</script>

<script>
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

</script>
<script>
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
<img src="https://picsum.photos/700/400" />

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
  function playAgain(){
    window.location.reload();
  }
</script>

  <script>
    $(document).ready(function(){
    $('#false-btn').click(function(event){
      event.preventDefault()
        // change question
      $(`div#${questionCounter}`).hide();
      $(`div#${questionCounter+1}`).show();
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

  // control true answer guess
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
        if (questionCounter == 9){
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
  <h3 name='greet-title' > Welcome to Terrasu, a PHP Quiz Game </h3>
  <h3 name='greet-title' class="grey-title"> Please press begin to start </h3>
        <button
          type="submit"
          id='begin-btn'
          class='begin-btn'
          name="begin-btn"
          title="begin"
          />
          Begin
        </button>
    </div>
  <!-- scoreboard -->
  <div style="display:none" id="scoreboard" class='container'>
    <h3 id="question-counter">Question 1</h3> 
    <h3 id="score-counter">Score: 0</h3> 
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
              value="true" title="True" onClick="checkAnswer('True')"
                  > True 
                </button>
            
  <button id='false-btn' type="submit" name="false"
            value="false" title="False" onClick="checkAnswer('False')"
                  > False </button>
    <div>
      <button id='reset-btn' type="submit" name="reset" 
                  value="Reset" onClick="playAgain()" title="Reset"
          > Reset </button>
        </div>
    </div>
  </div>
</div>
  <!-- button to play again -->
<div class='container' id="endgame-container" style="display:none">
    <h1> Thanks for playing! </h3>
    <h2 class="grey-title" > Play Again? </h2>
      <button disabled onClick="playAgain()" class='endgame-header' id='leaderboard-btn' 
      type="submit" name="play-again" value="play-again" title="Leaderboard"
      > Leaderboard </button>
      <button id='play-again' onClick="playAgain()" type="submit" name="play-again"
      value="play-again" title="Again?"> Again </button>
</div>

<?php
$header = include('footer.php');
?>