<?php session_start(); ?>

<?php include 'create_contact.php'; ?>
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

      <!-- feedback -->
      <div class="col-12">
        <div class="container py-4 clearfix">

          <h1 class="text-center">FeedBack</h1>
          <form class="w-100" action="" method="post">

            <div class="row clearfix">
              <div class="col-md-4 ml-auto clearfix">
                <!-- <p>Your Name</p> -->

                <div class="form-group mb-0">
                  <label class="mb-0 pb-0">Your Name</label>
                  <input type="text" required class="form-control form-control-sm" name="name" placeholder="Your name">
                </div>

                <div class="form-group">
                  <label class="mb-0 pb-0">Your Batch</label>
                  <input type="text" class="form-control form-control-sm" name="batch" placeholder="Your Batch">
                </div>

                <div class="form-group">
                  <label class="mb-0 pb-0">Email</label>
                  <input type="text" class="form-control form-control-sm" name="email"  placeholder="Your email">
                </div>

                <div class="form-group my-2">
                  <label class="my-0 pb-0">Mobile</label>
                  <input type="text" class="form-control form-control-sm" name="mobile" placeholder="Mobile Number">
                </div>
              </div>


              <div class="col-md-4 mr-auto">
                <div class="form-group">
                  <label class="mb-0 pb-0">Comment</label>
                  <textarea class="form-control form-control-sm" name="message" placeholder="Type your comment..." rows="7"></textarea>
                </div>

                <input type="submit" onclick="confirm('Are you sure to send your message?')" name="submit" value="Submit" class="btn btn-sm btn-block btn-outline-success">
              </div>

            </div>
          </form>


        </div>
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