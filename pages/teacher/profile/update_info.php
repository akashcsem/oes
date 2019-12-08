<?php 
session_start();

$userid = $_SESSION['userid'];
include '../../../pdo_connect.php';

if (isset($_POST['update_profile'])) {
    $userid       = $_SESSION['userid'];
    $firstname    = $_POST['firstname'];
    $lastname     = $_POST['lastname'];
    $username     = $_POST['username'];
    $email        = $_POST['email'];
    $mobile       = $_POST['mobile'];
    $department   = $_POST['department'];

    $sql          = "UPDATE `teachers` SET `firstname` = '$firstname', `lastname` = '$lastname', `username` = '$username', `email` = '$email', `mobile` = '$mobile', `department` = '$department' WHERE `teachers`.`id` = $userid";


    try {
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      echo "<script type='text/javascript'>alert('Profile updated successfull');</script>";
      header("Location: ../profile.php");
    } catch (Exception $e) {
      echo "<script type='text/javascript'>alert('Database error, please check');</script>";
    }
}