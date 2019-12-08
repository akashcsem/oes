<?php

include 'create_login.php'
?>
<html>

<head>
  <title> Student Login </title>
  <link rel="stylesheet" type="text/css" href="../../css/user_login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <div class="login-box">
    <img src="../../img/login/avatar.png" class="avatar">
    <h1>Login Here</h1>
    <form action="" method="post">
      <p class=""> <i class="fa fa-user pl-5"></i>
        Username</p>


      <input type="text" name="username" autocomplete="false" autofocus="false" placeholder="Enter Username">
      <p> <i class="fa fa-key pl-6 "></i> Password</p>
      <input type="password" name="password" placeholder="Enter Password">
      <input class="bg-info" type="submit" name="login" value="Login">

      <p><small style="color: red !important"><?php echo $usernameErr; ?></small></p>

      <!-- <p><a href="#" class="float-right mt-3">Forget Password</a></p> -->
      <p style="margin-top: 20px; font-size: 12px">Don't have any account? <a href="student_register.php" style="color: yellow"> Register</a> </p>
    </form>
  </div>
</body>

</html>