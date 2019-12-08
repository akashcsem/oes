<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en" style="background:url(../../img/tech.jpg);
background-attachment: fixed; background-size: cover;
">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>About Us</title>
  <style>
    .ourteam h1 {
      font-size: 50px;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <div class="page-content">
    <!-- MENU / NAVBAR START -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>



    <!-- About us -->

    <section class="ourteam">
      <div class="container text-center">
        <h1 class="text-light">OUR WORKING TEAM</h1>
        <P>Here you can see our details.</P>
        <div class="row mt-5">
          <div class="col-lg-4 col-md-4 col-sm-10 col-12 d-block m-auto">
            <figure class="figure">
              <img src="../../img/team/jahanara.jpg" alt="" class="figure-img img-fluid rounded-circle" height="250px" width="250px">
              <figcaption>
                <h4>Jahanara Fardoush</h4>
                <p class="figure-caption">web design and developer</p>
              </figcaption>
            </figure>


          </div>
          <div class="col-lg-4 col-md-4 col-sm-10 col-12 d-block m-auto">
            <figure class="figure">
              <img src="../../img/team/jahanara.jpg" alt="" class="figure-img img-fluid rounded-circle" height="250px" width="250px">
              <figcaption>
                <h4>Jahanara Fardoush</h4>
                <p class="figure-caption">web design and developer</p>
              </figcaption>
            </figure>

          </div>
          <div class="col-lg-4 col-md-4 col-sm-10 col-12 d-block m-auto">
            <figure class="figure">
              <img src="../../img/team/jahanara.jpg" alt="" class="figure-img img-fluid rounded-circle" height="250px" width="250px">
              <figcaption>
                <h4>Jahanara Fardoush</h4>
                <p class="figure-caption">web design and developer</p>
              </figcaption>
            </figure>

          </div>
        </div>
      </div>

    </section>

    <div class="footer bg-dark p-0 m-0">
      <?php include 'partials/footer.php'; ?>
    </div>





  </div>

  <!-- scripts -->
  <?php include 'partials/js.php'; ?>
</body>

</html>