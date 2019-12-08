<?php

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
        $sql = "SELECT id, username, password FROM teachers WHERE username=? AND password=? ";

        try {

            $query = $conn->prepare($sql);
            $query->execute(array($username, $password));


            if ($query->rowCount() > 0) {
                $query2 = $conn->prepare('SELECT * FROM teachers WHERE username=:username');
                $query2->bindParam(':username', $username);
                $query2->execute();
                $result = $query2->fetch(PDO::FETCH_ASSOC);

                // $str = $username . " " . $result['id'];
                session_destroy();
                session_start();
                $_SESSION['userid'] = $result['id'];
                $_SESSION['usertype'] = "teacher";
                $_SESSION['username'] = $username;
                $_SESSION['teacher_name'] = $result['firstname'] . " " . $result['lastname'];

                header('location: ../teacher/home.php');
            } else {
                $usernameErr = "Username/Password is wrong";
            }
        } catch (PDOException $e) {
            echo "<script type='text/javascript'>alert('$e');</script>";
        }
    }
}
