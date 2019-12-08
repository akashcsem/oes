<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" style="background:url(../../img/tech.jpg);
background-attachment: fixed; background-size: cover;
">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Home</title>
</head>

<body>

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>

    <!-- main content -->
    <div class="main-content mb-5 mx-0 px-0 row">
      <!-- slider carousel -->
      <?php include 'inc/slider.php'; ?>

   


      <!-- </div> -->
    </div>


  </div>
  <!-- footer -->
  <div class="footer bg-dark p-0 m-0">
    <?php include 'partials/footer.php'; ?>
  </div>
  </div>

  <!-- scripts -->
  <?php include 'partials/js.php'; ?>
</body>

</html>