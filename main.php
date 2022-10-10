

<?php
  include('header.php');
  include('navbar.php');
  require("api.php");
?>

<script>
  var $answers = [];
  var $questions = [];
</script>



  <!-- stylesheet -->
  <style><?php include('./css/styles.css'); ?></style>
  <!-- background image -->
  <img src="https://picsum.photos/700/435" />

  <!-- post data to sever -->
  <!-- <script type="text/javascript"> 
  function checkfunction(obj){
    $.post("your_url.php",$(obj).serialize(),function(data){
    alert("success");
    });
    return false;
    }
  </script> -->

  <!-- control transition from beginning screen to question 1-->
  <script>
  $(document).ready(function(){
    $('#begin-button').click(function(event){  
      event.preventDefault()
      $('form[name="game-form"]').show();
      $('div#question-container').show()
      $('button#begin-button').hide();
      $('h3[name="greet-title"]').hide();
   });
  });
  </script>

    <!-- control transition from question 1 - 10 -->
    <script>
  $(document).ready(function(){
    $('#reset-btn').click(function(event){
      event.preventDefault()
      alert('this is the reset button')
   });
  });
  </script>

<script>
  $(document).ready(function(){
    $('#false-btn').click(function(event){
      event.preventDefault()
      alert('this is the false button')
   });
  });
  </script>

<script>
  $(document).ready(function(){
    $('#true-btn').click(function(event){
      event.preventDefault()
      alert('this is the true button')
   });
  });
  </script>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<!-- main container component  -->
<div class='card'>
  <h3 name='greet-title' > Welcome to Terrasu, a PHP Geography Quiz Game </h3>
  <h3 name='greet-title'> Please press begin to start </h3>

<!-- handle api data -->
  <div style="display:none" id='question-container'>
  <p>Question 1</p>
  <p>Score 0</p>

  <script>
    var answerData = <?PHP
        echo json_encode($answers);
      ?>

    var questionData = <?PHP
        echo json_encode($questions);
        ?>

    // questionData = jQuery.map( questionData, function( item, i ) {
    //   return ('<p>' + item + ' True or False? </p>');
    // });
      // questionData = jQuery.map( questionData, function( item, i ) {
      //   $("ol").append(`<li>${item}</li>`);

      document.getElementById('question-container').innerHTML = questionData.map(item => 
    `<div>
      <div class='question-header'>${item}</div>
    </div>`
).join('')


</script>
    <!-- scoreboard -->
  </div>  

  <!-- form for user guess -->
  <form style="display:none" name='game-form' onsubmit="return checkfunction(this)" method="post">
    <div>
      <input id='true-btn' type="submit" name="true"
                  value="true" onclick="return checkfunction(this)"/>
            
    <input id='false-btn' type="submit" name="false"
                  value="false" onclick="return checkfunction(this)"/>

      <input id='reset-btn' type="submit" name="reset" value="Reset" onclick="return checkfunction(this)"/>
  </div>
  </form>
  </div>

<button
    id='begin-button'
    name="begin"
    value="begin"
 >Click me</button>

<?php
$header = include('footer.php');  
?>