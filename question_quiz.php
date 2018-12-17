<?php include 'database_of_quiz.php'; ?>
<?php session_start() ; // supepr global ?>
<?php

$q_number = (int) $_GET['n'];

// get the totall
$query = "select * from `questions` ";
$result =$mysqli->query($query) or die ($mysqli->error.__LINE__);
$totall = $result->num_rows;

// get question

$query = "select * from questions where question_number = $q_number";

// get the result
$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

$question = $result->fetch_assoc();

// get choice

$query = "select * from choices where question_number = $q_number";

// get the result
$choices = $mysqli->query($query) or die ($mysqli->error.__LINE__);




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
        <div class="corrent"> Question <?php echo $question['question_number']; ?> of <?php echo $totall; ?></div>
        <p class="question" >
            <?php echo $question['text'] ;?>

        </p>
        <form method="post" action="process_quiz.php">
            <ul class="choices">
                <?php while($row = $choices->fetch_assoc()): ?>

                    <li>
                    <input name="choice" type="radio" value=<?php echo $row['id']; ?>><?php echo $row['text'];?>
                    </li>

                <?php endwhile; ?>

            </ul>

            <input type="hidden" name="number" value="<?php echo $q_number; ?>" />
            <input type="submit" value="Submit" />

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
