<!DOCTYPE html>
<html lang="en" style="background: url(img/tech.jpg);
background-attachment: fixed; background-size: cover;
">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Student onfo</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="../css/stu_info.css">
</head>

<body>


  <!-- MENU / NAVBAR START -->

  <div class=" main">
    <?php include 'partials/navbar.php'; ?>
  </div>

  <!-- MENU / NAVBAR END -->

  <!-- MENU / NAVBAR END -->

  <pre>Profile</pre>
  <div class="info">
    <!-- <p> Name : Jahanara </p>
    <p> Student ID : 2161081040 </p>
    <p> Email : Jahanara@gmail.com </p>
    <p> Phone : 01589658 </p>
    <p> Batch : 38th </p> -->
    <?php
    $q = $_GET['user'];
    // echo $q;
    $db = mysqli_connect('localhost', 'root', '', 'person');
    $query = "SELECT * FROM student_info where username='$q'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    // print_r($row);
    // print_r($results);
    echo "<p> First Name : " . $row['firstname'] . " </p>
" .
      "<p> Last Name: " . $row['lastname'] . " </p>" .

      "<p> Student ID : " . $row['student_id'] . " </p>" .
      "<p> Email : " . $row['email'] . " </p>
    <p> Phone :" . $row['phone_no'] . " </p>
    <p> Batch : " . $row['batch'] . "</p>";
    ?>
  </div>


  <!-- GRID IS START -->
  <div class="grid_container">
    <div class="grid-item">
      <h2>Contact Us</h2>
      <br>
      <p class="">Address : Uttara 6 No Sector</p>
      <p class="">Email : fardoushjahanara@gmail.com</p>
      <p class="">Phone number : +880172945862</p>
    </div>
    <div class="grid-item">
      <a href="feedback.html">
        <h3 class=" "> CHECK REVIEW</h3>
      </a>
    </div>
    <div class="grid-item">
      <h3 class=""><b>STAY IN TOUCH</b></h3>


      <p class="my-4 text-center">
        <a class="fb" href="http://www.facebook.com"><i class="fa fa-facebook" style="font-size:30px;color:white;"></i></a>


        <a class="sky" href="http://www.skype.com"><i class="fa fa-skype" style="font-size:30px;color:white;"></i></a>
        <a class="twitter" href="http://www.twitter.com"><i class="fa fa-twitter" style="font-size:30px;color:white;"></i></a>

        <a class="linkedin" href="http://www.linkedin.com"><i class="fa fa-linkedin" style="font-size:30px;color:white;"></i></a>

        <a class="gmail" href="http://www.gmail.com"><i class="fa fa-google" style="font-size:30px;color:white;"></i></a>


      </p>
    </div>

  </div>

  <!-- <br><br><br><br> -->
  <!-- GRID IS END -->
  <!-- Footer is start  -->
  <div class="main-footer ">
    <div class="footer-copyright  footer">© 2019 Copyright

    </div>
    <!-- FOOTER IS END -->



















    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



</body>

</html>