<?php 
session_start();

$ssn_student_id = $_SESSION['ssn_student_id'];
include '../../../pdo_connect.php';

if (isset($_POST['update_profile'])) {
      $ssn_student_id  = $_SESSION['ssn_student_id'];
      $firstname       = $_POST['firstname'];
      $lastname        = $_POST['lastname'];
      $username        = $_POST['username'];
      $student_id      = $_POST['student_id'];
      $email           = $_POST['email'];
      $mobile          = $_POST['mobile'];
      $department      = $_POST['department'];
      $batch           = $_POST['batch'];


      $sql = "UPDATE `students` SET `firstname` = '$firstname', `lastname` = '$lastname', `username` = '$username', `student_id` = '$student_id', `mobile` = '$mobile', `department` = '$department', `batch` = '$batch' WHERE `students`.`id` = '$ssn_student_id'";
      echo $ssn_student_id;

      try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo "<script type='text/javascript'>alert('Student Profile updated successfull');</script>";
            header("Location: ../profile.php");
      } catch (Exception $e) {
            echo "<script type='text/javascript'>alert('Database error, please check');</script>";
      }
}