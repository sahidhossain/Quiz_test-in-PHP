<?php include 'database_of_quiz.php'; ?>
<?php session_start() ; // supepr global ?>
<?php
/**
 * Created by PhpStorm.
 * User: Mahbuburrahman
 * Date: 9/9/17
 * Time: 1:52 PM
 */
if( !isset($_SESSION['score']) ) {
    $_SESSION['score'] = 0;
}

if($_POST ) {
                // echo $_POST['choice'];
                //    exit();
    $num = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $num + 1;

    // get the number of totall qurestion

    $query = "select * from questions ";
    $result =$mysqli->query($query) or die ($mysqli->error.__LINE__);
    $totall = $result->num_rows;

    //print_r($_POST);// print all post array

    // get correct choice

    $query = "select * from choices where question_number = '$num' and is_correct = 1 ";

    // get the result

    $result =$mysqli->query($query) or die ($mysqli->error.__LINE__);

    //get the row

    $row = $result->fetch_assoc();

    // set correct choice

    $correct_choice = $row['id'];


    // echo $selected_choice;
    // echo $correct_choice;
    // exit();
    //compare

    if($correct_choice == $selected_choice) {
        //Answe is correctt
        echo "Answer is Corect";
        $_SESSION['score']++;
    }



// debug
//    echo "Answer is Wrong".$correct_choice." ".$selected_choice;
//    die();
    // check there any more question


    if ( $num == $totall) {
        header("Location: final_quiz.php");
        exit();
    } else {
        header("Location: question_quiz.php?n=".$next);
        exit();
    }


}

?>