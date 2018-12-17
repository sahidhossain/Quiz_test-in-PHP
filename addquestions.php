<?php include 'database.php'; ?>
<?php session_start() ; // supepr global ?>
<?php
/**
 * Created by PhpStorm.
 * User: Mahbuburrahman
 * Date: 9/9/17
 * Time: 1:53 PM
 */

if($_POST) {

    //get the GET variable
    $question_number = $_POST['question_number'];
    $question_text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];

 //   echo $question_number.' '.$correct_choice.$question_text;   die();

    // create an choices array
    $choices = array(); // initialize array
    $choices[1] = $_POST['choice1'];
    $choices[2] = $_POST['choice2'];
    $choices[3] = $_POST['choice3'];
    $choices[4] = $_POST['choice4'];
    $choices[5] = $_POST['choice5'];

    //question query
    $query = "insert into questions (question_number ,text ) values ('$question_number' , '$question_text')";

    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

    if($insert_row) {
        foreach ($choices as $choice => $value) {
            $is_correct = 0;
            if($value != ''){
                if($correct_choice == $choice){
                    $is_correct = 1;
                }
                // choice query
               // echo $is_correct.' '.$choice.' '.$correct_choice ; die();
                $query = "insert into choices (question_number ,is_correct , text ) values ('$question_number' , '$is_correct' , '$value')";

                $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                if($insert_row) {
                    continue;
                } else {
                    die('Error : ('.$mysqli->error);
                }


            }
        }
        $msg = 'Question has been added.';

    }
}

// get the number of totall qurestion

$query = "select * from questions ";
$result =$mysqli->query($query) or die ($mysqli->error.__LINE__);
$totall = $result->num_rows + 1;
//echo $totall ; die();

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>PHP Quizzer</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <div class="container">
        <h1>PHP Quizzer</h1>
    </div>
</header>
<main>

    <div class="container">
        <div class="corrent"> Question 1 of 5</div>
        <h2>Add A Question? </h2>
        <?php
            if(isset($msg)){
                echo '<p> '.$msg.'</p>';
            }
        ?>
        <form method="post" action="add.php">
            <p>
                <label>Question Number:  </label>
                <input name="question_number" type="number" value="<?php echo $totall ; ?>"/>
            </p>
            <p>
                <label>Question Text: </label>
                <input name="question_text" type="text"/>
            </p>
            <p>
                <label>Choice #1: </label>
                <input name="choice1" type="text"/>
            </p>
            <p>
                <label>Choice #2: </label>
                <input name="choice2" type="text"/>
            </p>
            <p>
                <label>Choice #3: </label>
                <input name="choice3" type="text"/>
            </p>
            <p>
                <label>Choice #4: </label>
                <input name="choice4" type="text"/>
            </p>
            <p>
                <label>Choice #5: </label>
                <input name="choice5" type="text"/>
            </p>
            <p>
                <label>Correct Choice Number: </label>
                <input name="correct_choice" type="number"/>
            </p>

            <input type="submit" value="Submit">

        </form>

    </div>

</main>

<footer>
    <div class="container">
        Copyright &copy; 2017, PHP Quizzer
    </div>

</footer>

</body>
</html>

