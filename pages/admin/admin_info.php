<?php
session_start();

// if (!isset($_SESSION['username'])) {
//   $_SESSION['msg'] = "You must log in first";
//   header('location: login.php');
// }
// if (isset($_GET['logout'])) {
//   session_destroy();
//   unset($_SESSION['username']);
//   header("location: login.php");
// } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Student onfo</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="../css/stu_info.css">
  <link rel="stylesheet" href="../css/admin_fileup.css">

  <style>
    input[type="file"] {
      display: none;
    }

    i {
      height: 3.7rem;
    }

    .custom-file-upload {
      float: left;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-image: linear-gradient(to right, #43A7E0, #0C13AF);
      color: white;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;

    }
  </style>
</head>

<body style="background: url(../img/tech.jpg);
background-attachment: fixed; background-size: cover;
">

  <!-- MENU / NAVBAR START -->

  <div class="main">
    <?php include 'partials/navbar.php'; ?>
  </div>

  <?php
  // session_start();

  // if (!isset($_SESSION['username'])) {
  //   $_SESSION['msg'] = "You must log in first";
  //   header('location: login.php');
  // }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
  ?>

  <!-- TEACHER PROFILE START -->

  <pre>Profile</pre>
  <div class="info">
    <!-- <img src="img/saju_sir.jpg" alt="image" height="350px" width="300px" style="float: right; padding: 20px; margin: 20px" > -->

    <!--
    <p> Name : Jahanara </p>
    <p> Student ID : 2161081040 </p>
    <p> Email : Jahanara@gmail.com </p>
    <p> Phone : 01589658 </p>
    <p> Batch : 38th </p>   lo-->

    <?php
    $q = $_GET['username'];

    $db = mysqli_connect('localhost', 'root', '', 'person');
    // $username = '40';
    $query = "SELECT * FROM admin where username='$q'";
    // $query = "SELECT * FROM users";

    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);




    // print_r($row); ai bar koro 
    // print_r($results);

    echo
      "<img style='float:right; padding:20px;' src='images/" . $row['image'] . "' height='20%' width='20%'>" .
        "<p>  Name : " . $row['firstname'] . " " . $row['lastname'] . " </p>
" .

        "<p> Email : " . $row['email'] . " </p>
    <p> Phone : " . $row['phone'] . " </p>
    <p> Department : " . $row['dept'] . " </p>
    <p> Desigination : " . $row['desi'] . " </p>";
    ?>

  </div>
  <br><br><br>

  <!-- END TEACHER PROFILE -->


  <!-- FILE UPLOARD START -->

  <div class="files">

    <form action="">
      <div style="float:left;">
        <table>
          <tr>
            <h3>PDF File Upload : </h3>
          </tr>
          <tr>

            <label for="file-upload" class="custom-file-upload">
              <i class="fas fa-download"></i> File Upload
            </label>
            <input id="file-upload" type="file" name="file" />

            <input style=" margin-left: 20px;background-color:#019EFD ; color:white;" type="submit" name="submit" value="Update">
          </tr>
          <br> <br>
          <tr>

            <h3>Result : </h3>
          </tr>
          <tr>

            <!-- <a href="result.html">Result</a> -->
            <button><a href="result.html">View</a>
            </button>
            <button style="background-color:#DC0F82"><a href="result.html">Update</a>
            </button>
          </tr>

          <br> <br> <br> <br>
          <tr>

            <h3>Question Paper : </h3>
          </tr>

          </tr>
          <tr>

            <button><a href="js_mcq.html">MCQ</a>
            </button>
            <button style="background-color:#DC0F82"><a href="js_sq.html">Short Question</a>
            </button>
          </tr>

      </div>


      </table>
    </form>

  </div>







  </div>

  <br> <br><br>






  <!-- END FILE UPLOARD  -->












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