<?php 

include '../../../pdo_connect.php';
//  PUBLISH EXAM
if (isset($_GET['exam_id'])) {
      $id        = $_GET['exam_id'];
      $sql       = "UPDATE `exams` SET `status` = '1' WHERE `exams`.`id` = $id";

      try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo "<script>alert('Exam deleted successfull');</script>";
            header("Location: ../exams.php");
      } catch (Exception $ex) {
            echo "<script>alert('Database error, please check');</script>";
            header("Location: ../exams.php");
      }
}

?>