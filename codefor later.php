<!-- var quizData = document.getElementById('dropdown').innerHTML = quizDataOptions.map(
          item => 
        `<option value=${item['category']}>${item['categoryName']}</option>`
            ).join('') -->


            <!-- <input
          type="submit"
          id='lucky-btn'
          class='begin-btn'
          value="Feeling Lucky"
          name="submit-btn"
          /> -->

          <!-- <script>


              import answer api data from php sever echo into js variable
    while (answerData === "" && questionData === ""){
      var answerData = <?PHP
          echo json_encode($answers);
          ?>;
        // import question api data from php sever echo into js variable
        var questionData = <?PHP
            echo json_encode($questions);
            ?>;
        if (answerData !== "" && questionData !== ""){
          const questionArray = document.getElementById('question-container').innerHTML = questionData.map(
        (item, index) => 
        `<div style="display:none" id=${index} class='question'>${item} True or False?</div>`
              ).join('')
        }
      }
      map all question data into seperate divs

        <!-- post data to sever -->
  // <!-- <script type="text/javascript"> 
  // function checkfunction(obj){
  //   $.post("your_url.php",$(obj).serialize(),function(data){
  //   alert("success");
  //   });
  //   return false;
  //   }

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