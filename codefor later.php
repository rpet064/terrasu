var quizData = document.getElementById('dropdown').innerHTML = quizDataOptions.map(
          item => 
        `<option value=${item['category']}>${item['categoryName']}</option>`
            ).join('')