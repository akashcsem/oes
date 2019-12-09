<?php

include '../../pdo_connect.php';

$firstname = $lastname = $username = $email = $mobile = $department = $designation = $password = $confirm_password = $image = "";
$firstnameErr = $usernameErr = $emailErr = $mobileErr = $departmentErr = $passwordErr = $imageErr = "";

$validation = true;

if (isset($_POST['admin_register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $image = $_FILES['image']['name'];

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
    if (empty($password)) {
        $validation = false;
        $passwordErr = "Password is required";
    }
    if ($password != $confirm_password) {
        $validation = false;
        $passwordErr = "Password doesn't match";
    }
    if (empty($image)) {
        $validation = false;
        $imageErr = "Image is required";
    }

    // password encrypt
    $password = md5($password);

    //image uploard : 
    $image = basename($_FILES['image']['name']);



    $target_dir = "../../img/teachers/";
    $target_file = $target_dir . basename($image);

    // amar to ghum pacche khub taile gumate jan sondai kore diyenhmm


    //

    if ($validation) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO `teachers` (
            `firstname`, 
            `lastname`, 
            `username`, 
            `email`, 
            `mobile`, 
            `department`, 
            `designation`, 
            `password`,  
             `image`
            

            ) VALUES (

            '$firstname', 
            '$lastname', 
            '$username', 
            '$email', 
            '$mobile', 
            '$department', 
            '$designation', 
            '$password',
            '$image'
            )";

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount()) {
                    $sql    = "SELECT * FROM teachers ORDER BY id DESC LIMIT 1";
                    $result = $conn->query($sql)->fetch();
                    session_start();
                    $_SESSION['userid'] = $result['id'];
                    $_SESSION['usertype'] = "teacher";
                    $_SESSION['username'] = $username;
                    $_SESSION['teacher_name'] = $result['firstname'] . " " . $result['lastname'];
    
                    header('location: ../teacher/home.php');
                    echo '<div class="row">
                        <div class="container">
                            <h3 class="text-center text-success"> Teacher registerd successfull</h3>
                        </div>
                    </div>';
                }
            } catch (PDOException $e) {
                echo '<div class="row">
                <div class="container">
                    <h3 class="text-center text-danger"> Some error</h3>
                </div>
            </div>';
            }
        }
    }
}
