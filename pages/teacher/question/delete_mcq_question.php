<?php 

include '../../../pdo_connect.php';
//  delete exam and delete questions form short question or mcq table
if (isset($_GET['question_id_delete'])) {
      $id        = $_GET['question_id_delete'];
      $exam_id   = $_GET['exam_id'];
   
      $sql       = "DELETE FROM `mcq_question` WHERE `mcq_question`.`id` = $id";
    
      try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            // decrement created qns
            $sql = "UPDATE exams SET created_qns = created_qns - 1 WHERE id = $exam_id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo "<script>alert('Question deleted successfull');</script>";
      } catch (Exception $ex) {
            echo "<script>alert('Database error, please check');</script>";
      }
}

header("Location: ../view_questions.php?exam_id=$exam_id");
?>