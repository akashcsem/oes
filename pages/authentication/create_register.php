<?php

include '../../pdo_connect.php';

$firstname = $lastname = $username = $student_id = $email = $mobile = $department = $batch = "";
$firstnameErr = $lastnameErr = $usernameErr = $student_idErr = $emailErr = $mobileErr = $departmentErr = $batchErr = $passwordErr = $passwordMatch = "";

$validation = true;

if (isset($_POST['student_register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $department = $_POST['department'];
    $batch = $_POST['batch'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation
    if (empty($firstname)) {
        $validation = false;
        $firstnameErr = "Firstname is required";
    }
    if (empty($lastname)) {
        $validation = false;
        $lastnameErr = "Lastname is required";
    }
    if (empty($username)) {
        $validation = false;
        $usernameErr = "Username is required";
    }
    if (empty($student_id)) {
        $validation = false;
        $student_idErr = "Student ID is required";
    }
    if (empty($email)) {
        $validation = false;
        $emailErr = "Email is required";
    }
    if (empty($mobile)) {
        $validation = false;
        $mobileErr = "Mobile is required";
    }
    if (empty($department)) {
        $validation = false;
        $departmentErr = "Department is required";
    }
    if (empty($batch)) {
        $validation = false;
        $batchErr = "Batch is required";
    }
    if (empty($password)) {
        $validation = false;
        $passwordErr = "Password is required";
    }
    if ($password != $confirm_password) {
        $validation = false;
        $passwordMatch = "The two passwords do not match";
    }



    // password encrypt
    $password = md5($password);

    // insert data
    $sql = "INSERT INTO `students` (`firstname`,`lastname`, `username`, `student_id`,`email`,`mobile`,`department`, `batch`,`password` ) VALUES ('$firstname', '$lastname','$username','$student_id','$email','$mobile','$department', '$batch','$password')";



    if ($validation) {
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $sql    = "SELECT * FROM students ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql)->fetch();

            session_start();
            $_SESSION['ssn_student_id'] = $result['id'];
            $_SESSION['usertype'] = "student";
            $_SESSION['username'] = $username;
            $_SESSION['student_name'] = $result['firstname'] . " " . $result['lastname'];

            header('location: ../student/home.php');
            echo '<div class="row">
                <div class="container">
                    <h3 class="text-center text-success"> Student inserted successfull</h3>
                </div>
            </div>';
            // $firstname . " " . $lastname . " successfully inserted.";
        } catch (PDOException $e) {
            echo '<div class="row">
                <div class="container">
                    <h3 class="text-center text-danger"> Some error</h3>
                </div>
            </div>';
        }
    }
}
