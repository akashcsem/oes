

<?php

session_start();
$user = $_SESSION['usertype'];
session_destroy();


// $username = $_SESSION['username'] . " session username";
// echo "<script type='text/javascript'>alert('$username');</script>";
// if ($user == teacher)
//     header('location: ../authentication/admin_login.php');
// else
//     header('location: ../authentication/login.php');

header('location: ../../index.php');
?>