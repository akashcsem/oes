<?php


include '../../../pdo_connect.php';

//  create question

if (isset($_POST['update_mcq_question'])) {

    // get data from create question page
    $exam_id = $_POST['exam_id'];
    $id      = $_POST['id'];

    $question = $_POST['question'];
    $answer   = $_POST['mcq_answer'];
    $option_1 = $_POST['option_1'];
    $option_2 = $_POST['option_2'];
    $option_3 = $_POST['option_3'];
    $option_4 = $_POST['option_4'];


    if (empty($question) || empty($answer) || empty($option_1) || empty($option_2) || empty($option_3) || empty($option_4)) {
        
          // set flash message
          $_SESSION['message'] = "Fillup all field";
          $_SESSION['type']    = "warning";
          $_SESSION['title']   = "Warning";
          header("Location: ../view_questions.php?exam_id=$exam_id");
    } else {

        $sql = "UPDATE `mcq_question` SET `question` = '$question', `answer` = '$answer', `option_1` = '$option_1', `option_2` = '$option_2', `option_3` = '$option_3', `option_4` = '$option_4' WHERE `id` = $id";

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
            header("Location: ../view_questions.php?exam_id=$exam_id");
        }

    }
    
    
}


?>



