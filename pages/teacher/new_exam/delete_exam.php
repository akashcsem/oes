<?php 

//  delete exam and delete questions form short question or mcq table
if (isset($_GET['exam_id_delete'])) {
      $id        = $_GET['exam_id_delete'];
      $type      = $_GET['type'];
    
      $sql       = "DELETE FROM `exams` WHERE `exams`.`id` = $id";
      $sql_mcq   = "DELETE FROM `mcq_question` WHERE `mcq_question`.`exam_id` = $id";
      $sql_short = "DELETE FROM `short_question` WHERE `short_question`.`exam_id` = $id";
    
      try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            if ($type == 'MCQ') {
                  $stmt = $conn->prepare($sql_mcq);
            } else {
                  $stmt = $conn->prepare($sql_mcq);
            }
            $stmt->execute();
            
            echo "<script>alert('Exam deleted successfull');</script>";
      } catch (Exception $ex) {
            echo "<script>alert('Database error, please check');</script>";
      }
}

?>