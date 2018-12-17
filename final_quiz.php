<?php session_start() ; // supepr global ?>
<?php
/**
 * Created by PhpStorm.
 * User: Mahbuburrahman
 * Date: 9/9/17
 * Time: 1:52 PM
 */
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
        <h2>You're Done!</h2>
        <p> Congrats! You have completed the test. </p>
        <p> Final Score: <?php echo $_SESSION['score'] ;?> </p>
        <a href="start_quiz.php" class="start">Try Again!</a>



    </div>

</main>

<footer>
    <div class="container">
Copyright &copy; 2017, PHP Quizzer
</div>

</footer>

</body>
</html>
