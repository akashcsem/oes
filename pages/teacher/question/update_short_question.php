<?php


include '../../../pdo_connect.php';

//  create question

if (isset($_POST['update_short_question'])) {

    // get data from create question page
    $exam_id           = $_POST['exam_id'];
    $id                = $_POST['id'];

    $mark              = $_POST['mark'];
    $question          = $_POST['question'];
    $preferable_answer = $_POST['preferable_answer'];

    echo $exam_id;

    if (empty($question) || empty($mark)) {
        
          // set flash message
          $_SESSION['message'] = "Fillup all field";
          $_SESSION['type']    = "warning";
          $_SESSION['title']   = "Warning";
          header("Location: ../view_questions.php?exam_id=$exam_id");
    } else {

        $sql = "UPDATE `short_question` SET `question` = '$question', `preferable_answer` = '$preferable_answer', `mark` = '$mark' WHERE `id` = $id";

        try {
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          // set flash message
          $_SESSION['message'] = "Question created successfull";
          $_SESSION['type']    = "success";
          $_SESSION['title']   = "Success";

          header("Location: ../view_questions.php?exam_id=$exam_id");
        } catch(Exception $ex) {
            // set flash message
            $_SESSION['message'] = "Some Error, please check";
            $_SESSION['type']    = "error";
            $_SESSION['title']   = "Error";
            echo "error";
            header("Location: ../view_questions.php?exam_id=$exam_id");
        }

    } 
}
?>



