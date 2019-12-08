<?php
session_start();

include '../../pdo_connect.php';
$usernameErr = $passwordErr = "";
$username = $password = "";
$validation = true;

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $validation = false;
        $usernameErr = "Please Fillup Username";
    }
    if (empty($password)) {
        $validation = false;
        $passwordErr = "Please Fillup Password";
    }

    if ($validation) {
        // echo "<script type='text/javascript'>alert('validation success');</script>";
        $password = md5($password);
        $sql = "SELECT username, password FROM students WHERE username=? AND password=? ";

        try {
            $query = $conn->prepare($sql);
            $query->execute(array($username, $password));
            if ($query->rowCount() > 0) {
                $query2 = $conn->prepare('SELECT * FROM students WHERE username=:username');
                $query2->bindParam(':username', $username);
                $query2->execute();
                $result = $query2->fetch(PDO::FETCH_ASSOC);

                // $str = $username . " " . $result['id'];
                session_destroy();
                session_start();
                $_SESSION['ssn_student_id'] = $result['id'];
                $_SESSION['usertype'] = "student";
                $_SESSION['username'] = $username;
                $_SESSION['student_name'] = $result['firstname'] . " " . $result['lastname'];

                header('location: ../student/home.php');
            } else {
                $usernameErr = "Username/Password is wrong";
            }
        } catch (PDOException $e) {
            echo "<script type='text/javascript'>alert('$e');</script>";
        }
    }
}
