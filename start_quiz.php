<?php include 'database_of_quiz.php'; 
session_start();?>
<?php
//get totall question
$query = "select * from questions";
// get result
$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);
$toatll = $result->num_rows;

?>

<!DOCTYPE htm>

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
                <h2>Test Your PHP Knowladge!</h2>
                <p>This is a mulltiple choices quiz to test your knowladge of PHP</p>
                <ul>
                      <?php unset($_SESSION['score']);
                        ?>
                    <li> <strong>Number of Questions: </strong><?php echo $toatll ; ?></li>
                    <li>  <strong>Type: </strong>Multiple Choice </li>
                    <li>  <strong>Estimated Time: </strong><?php echo $toatll*.5 ; ?> Minutes</li>
                </ul>
                <a href="question_quiz.php?n=1" class="start">Start Quize</a>

            </div>

        </main>

        <footer>
            <div class="container">
                Copyright &copy; 2017, PHP Quizzer
            </div>

        </footer>

    </body>
</html>