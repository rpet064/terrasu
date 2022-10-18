<!-- file imports -->
<?php
  include('header.php');
  include('navbar.php');
  require("quizOptions.php");
?>

<!-- functions for greeting screen to game state transition -->
<script>
    // hide greeting screen elements
    function hideElements(){
      $('button#begin-button').hide();
      $('h3[name="greet-title"]').hide();
      $('div#select-container').hide();
    }

    // show game elements
    function showElements(){
      $('div[name="game-form"]').show();  
      $('div#question-container').show();
      $('div#scoreboard').show();
      $(`div#${questionCounter}`).show();
      $("#class-div").attr("class", "game-card");
    }
</script>

<script>
  // get data from select option
  function getSelectData(){
    var e = document.getElementById("dropdown");
    if (e != null){
    var value = e.value;
    } 
    return {categoryNo: value}
  }

  async function postData(data){
    var response = await fetch('http://localhost:3000', {
      Method: 'POST',
      Headers: {
        Accept: 'application.json',
        'Content-Type': 'application/json'
      },
      Body: data,
      Cache: 'default',
    }
    )
    await response.text()
    alert(response);
  }

    // // post data to sever
    // $.ajax({
    //  url:'http://localhost:3000',
    //  type:'post',
    //  dataType:'json',
    //  data:{ 
    //      data
    //  }, 
    //  success:function(data) { 
    //   alert(data);
    //   var apiData 
    //   alert(apiData);
    //   }
    // })
</script>

<!-- global variables & functions for game state -->
<script>
  var answers, questions = [];
  var questionCounter, scoreCounter = 0;
  var answerData, questionData = "";

  function updateScore(){
    document.getElementById("question-counter").innerHTML = `Question ${questionCounter+1}`;
    document.getElementById("score-counter").innerHTML = `Your score is ${scoreCounter}`;
  }

  function endGame(){
    $('div[name="game-form"]').hide();
    $('div#question-container').hide();
    alert('Game is finished. Your score is ' + scoreCounter);
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
      var selectedData = getSelectData();
      postData(selectedData);
   });
  });

  // lucky-btn control begin screen to game transition
  $(document).ready(function(){
    $('.lucky-btn').click(function(event){
      event.preventDefault()
      hideElements();
      showElements();
      // json blank so sever knows to insert random number
      var selectedData = {categoryNo: ""}
      postData(selectedData);
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
  <h3 name='greet-title' > Welcome to Terrasu, a PHP Geography Quiz Game </h3>
  <h3 name='greet-title'> Please press begin to start </h3>
  <div id='select-container'>
    <select name="dropdown" id="dropdown" class="classic">
        <!-- map dropbox data onto select-container -->
        <script>
          var quizDataOptions = <?PHP
            echo json_encode($option_data['categories']) ?>;
            var quizData = document.getElementById('dropdown').innerHTML = quizDataOptions.map(
              item => 
            `<option value=${item['category']}>${item['categoryName']}</option>`
                ).join('');
          </script> 
        </select>
      <button
          type="submit"
          id='submit-btn'
          class='begin-btn'
          value="Feeling Lucky"
          name="submit-btn"
          />
          Submit
        </button>
        <button
          type="submit"
          id='lucky-btn'
          class='begin-btn'
          value="Feeling Lucky"
          name="submit-btn"
          />
          I'm Feeling Lucky
        </button>
    </div>
  <!-- scoreboard -->
  <div style="display:none" id="scoreboard">
    <h5 id="question-counter">Question 1</h5> 
    <h5 id="score-counter">Your score is 0</h5> 
  </div>

  <!-- question container -->
  <div style="display:none" id='question-container'>
  <script>
      var answerData = <?PHP
          echo json_encode($answers);
          ?>;
        // import question api data from php sever echo into js variable
        var questionData = <?PHP
            echo json_encode($questions);
            ?>;
          return document.getElementById('question-container').innerHTML = questionData.map(
        (item, index) => 
        `<div style="display:none" id=${index} class='question'>${item} True or False?</div>`
              ).join('')

  </script>
  </div>    

  <!-- form for users to share answers, reset game & post data when game is finished -->
    <div style="display:none" name='game-form'>
      <button id='true-btn' type="submit" name="true"
                  value="true"> True </button>
            
    <button id='false-btn' type="submit" name="false"
                  value="false"> False </button>
    
      <button id='reset-btn' type="submit" name="reset" 
      value="Reset" > Reset </button>
    </div>
  </div>
  </div>
  <!-- button to play again -->
 <!-- <button id='reset-btn' type="submit" name="reset" 
      value="Reset" > Reset </button> -->

<?php
$header = include('footer.php');
?>