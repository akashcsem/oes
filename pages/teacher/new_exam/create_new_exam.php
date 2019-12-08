

<?php

session_start();
include '../../../pdo_connect.php';


/**
 * 
 * create exam sav data to 'exams' table
 */  


if (isset($_POST['create_new_exam'])) {

  // get data form exams form and get teacher_id from session, that is logged in teacher
  $title          = $_POST['title'];
  $subject_id     = $_POST['subject_id'];
  $teacher_id     = $_SESSION['userid'];
  $exam_type      = $_POST['exam_type'];
  $hour           = $_POST['hour'];
  $minute         = $_POST['minute'];
  $total_qns      = $_POST['total_qns'];

  if (empty($subject_id) ) {
    echo "<script>alert('Please select subject');</script>";
  } else {

   $sql = "INSERT INTO `exams` (`title`, `subject_id`, `teacher_id`, `exam_type`, `hour`, `minute`, `total_qns`) VALUES ('$title', '$subject_id', '$teacher_id', '$exam_type', '$hour', '$minute', '$total_qns')";

    try {
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      echo "<script>alert('Exam created successfull');</script>";
      header("Location: ../exams.php");
    } catch(Exception $ex) {
        echo "<script>alert('Something Error');</script>";
    }
    
  }
  
}


?>



