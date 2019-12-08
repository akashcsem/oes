<?php


include '../../../pdo_connect.php';

//  create question

if (isset($_POST['create_short_question'])) {

    // get data from create question page
    $exam_id             = $_POST['exam_id'];
    $question            = $_POST['question'];
    $mark                = $_POST['mark'];
    $preferable_answer   = $_POST['preferable_answer'];


    if (empty($question) || empty($preferable_answer) || empty($mark)) {
        
          // set flash message
          $_SESSION['message'] = "Fillup all field";
          $_SESSION['type']    = "warning";
          $_SESSION['title']   = "Warning";
          header("Location: ../create_question.php?exam_id=$exam_id");
    } else {

        $sql = "INSERT INTO `short_question` (`exam_id`, `mark`, `question`, `preferable_answer`) VALUES ('$exam_id', '$mark', '$question', '$preferable_answer')";

        try {
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          // increment created qns
          $sql = "UPDATE exams SET created_qns = created_qns + 1 WHERE id = $exam_id";
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          
          // set flash message
          $_SESSION['message'] = "Question created successfull";
          $_SESSION['type']    = "success";
          $_SESSION['title']   = "Success";

          header("Location: ../create_question.php?exam_id=$exam_id");
        } catch(Exception $ex) {
            // set flash message
            $_SESSION['message'] = "Some Error, please check";
            $_SESSION['type']    = "error";
            $_SESSION['title']   = "Error";
            header("Location: ../create_question.php?exam_id=$exam_id");
        }

    }
    
    
}


?>



