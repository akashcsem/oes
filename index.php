<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title> Welcome </title>
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  <style>
      body {
      background: url(img/welcome.gif) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      }

  </style>
</head>

<body>


      <h1 class="text-center pt-4 text-light mt-5" style="font-weight:2000px">Welcome To Exam Portal</h1>
      <div class="row">
            <div class="col-sm-6 mx-auto text-right">
                  <a title="Click to Login" href="pages/authentication/admin_login.php"><img src="img/teacher_login.png" alt="Teacher Login"></a>
            </div>
            <div class="col-sm-6 mx-auto text-left">
                  <a title="Click to Login" href="pages/authentication/login.php"><img src="img/student_login.png" alt="Student Login"></a>
            </div>
      </div>
</body>

</html>