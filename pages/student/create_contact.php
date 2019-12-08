<?php

include '../../pdo_connect.php';

if (isset($_POST["submit"])) {

    $name       = $_POST["name"];
    $batch      = $_POST["batch"];
    $email      = $_POST["email"];
    $mobile     = $_POST["mobile"];
    $message    = $_POST["message"];

    $student_id = $_SESSION['ssn_student_id'];

    $sql = "INSERT INTO contactus (`name`,`student_id`,`batch`,`email`, `mobile`, `message`) VALUES ('$name','$student_id','$batch','$email', '$mobile', '$message')";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "<script>alert('Message send successfull');</script>";
      } catch(Exception $ex) {
          echo $x->getMessage();
          echo "<script>alert('Something Error');</script>";
      }
    
   
}
