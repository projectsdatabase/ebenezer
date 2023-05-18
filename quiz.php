
<!DOCTYPE html>
<html>
<head>
    <title>Quiz Application</title>
     <link rel="stylesheet" href="quiz.css">
</head>
<body>

  <div class = "quiz-container"> <h1>Quiz</h1>
  <?php
        // Define the quiz questions and answers
        $quiz = array(
            array(
                'question' => 'What is the capital of France?',
                'options' => array(
                    'A' => 'Paris',
                    'B' => 'London',
                    'C' => 'Madrid',
                    'D' => 'Rome'
                ),
                'correct_answer' => 'A'
            ),

            array(
                'question' => 'What is the capital of Ghana?',
                'options' => array(
                    'A' => 'Paris',
                    'B' => 'Lome',
                    'C' => 'Madrid',
                    'D' => 'Accra'
                ),
                'correct_answer' => 'D'
            ),
            
            array(
                'question' => 'What is the capital of England?',
                'options' => array(
                    'A' => 'Paris',
                    'B' => 'London',
                    'C' => 'Madrid',
                    'D' => 'Rome'
                ),
                'correct_answer' => 'B'
            ),

            array(
                'question' => 'What is the capital of Italy?',
                'options' => array(
                    'A' => 'Paris',
                    'B' => 'London',
                    'C' => 'Madrid',
                    'D' => 'Rome'
                ),
                'correct_answer' => 'D'
            ),

            array(
                'question' => 'What is the capital of Togo?',
                'options' => array(
                    'A' => 'Paris',
                    'B' => 'London',
                    'C' => 'Lome',
                    'D' => 'Rome'
                ),
                'correct_answer' => 'D'
            ),
           
           

           

          

           
        );

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $score = 0;

            // Loop through each question and check the answers
            foreach ($quiz as $key => $question) {
                $user_answer = $_POST['question_' . $key];

                if ($user_answer === $question['correct_answer']) {
                    $score++;
                }
            }
            


            
            
            echo '<div class="score"><h2>Congratulations you completed the quiz</h2>
            <iframe src="https://giphy.com/embed/ka7P8QoXrpm5VX8FrW" width="500" height="280" frameBorder="0" class="giphy-embed"
                 allowFullScreen></iframe><p></a></p>' ;
            echo '<h3>Your score: ' . $score . '/' . count($quiz).'</h3>';

             // Display the list of correct answers
             echo '<h3>Correct Answers:</h3>';
             echo '<ul>';
             foreach ($quiz as $key => $question) {
                 $user_answer = $_POST['question_' . $key];
                 $correct_answer = $question['correct_answer'];
                 $is_correct = $user_answer === $correct_answer;
                 $answer_class = $is_correct ? 'correct-answer' : 'incorrect-answer';
 
                 echo '<li>';
                 echo '<span class="' . $answer_class . '">Question ' . ($key + 1) . ': ' . $correct_answer . '</span>';
                 echo '</li>';
             }
             echo '</ul>';
 
             echo '</div>';
            
        } else {
            // Display the quiz form
            echo '<form method="POST" action="">';

            foreach ($quiz as $key => $question) {
                echo '<h2>' . $question['question'] . '</h2>';

                foreach ($question['options'] as $option_key => $option_value) {
                    echo '<label>';
                    echo '<input type="radio" name="question_' . $key . '" value="' . $option_key . '" required>';
                    echo $option_key . '. ' . $option_value;
                    echo '</label><br>';
                }
            }

            echo '<br><input type="submit" value="Submit">';
            echo '</form>';
        }
    ?>
</div>
    
</body>
</html>








