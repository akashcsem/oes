<?php
    session_start();
    include 'create_contact.php';
?>

<!DOCTYPE html>
<html>

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Contact Us</title>

  <style>
    .contact-box {
      background: white;
      padding: 20px;
    }

    .contact-form {
      border: none;
    }


    .contact-form .form-control {
      border: none;
      border-bottom: 1px solid black;
    }
  </style>
</head>

<body>

  <div class="page-content">
    <!-- MENU / NAVBAR START -->
    <div class="row">
      <?php include 'partials/navbar.php'; ?>
    </div>


    <div class="row clearfix mb-5">
      <div class="clearfix container mb-5">
        <h1 class="text-center text-light my-4">Contact Us</h1>
        <div class="row">
          <div class="col-md-6">
            <div id="googlemap" style="width:100%; height:350px;">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14594.20827548855!2d90.4027162!3d23.8700347!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd7744072ad2d345e!2sUttara%20University!5e0!3m2!1sen!2sbd!4v1568396240128!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

            </div>
          </div>

          <div class="col-md-5 ml-auto contact-box">
            <form class="contact-form w-100 mx-0 px-0" method="post" action="">
              <div class="form-group">
                <label for="form-name">Name</label>
                <input type="name" class="form-control" id="form-name" placeholder="Name" name="name" required>
              </div>
              
              <div class="form-group" hidden>
                  <label class="mb-0 pb-0">Your Batch</label>
                  <input type="text" class="form-control form-control-sm" name="batch" placeholder="Your Batch">
                </div>

              <div class="form-group">
                <label for="form-email">E-mail </label>
                <input type="email" class="form-control" id="form-email" placeholder="Email Address" name="email" required>
              </div>
              <div class="form-group">
                <label for="form-subject">Mobile</label>
                <input type="number" class="form-control" id="form-subject" placeholder="Mobile" name="mobile" required>
              </div>
              <div class="form-group">
                <label for="form-message">Message</label>
                <textarea class="form-control" id="form-message" placeholder="Message" name="message" required></textarea>
              </div>
              <button class="btn btn-secondary bg-primary" onclick="confirm('Are you sure to send this message')" type="submit" name="submit">Contact Us</button>
            </form>
          </div>
        </div>
      </div>



    </div>



    <div class="footer mt-5 bg-dark p-0 m-0">
      <?php include 'partials/footer.php'; ?>
    </div>

  </div>

  <!-- scripts -->
  <?php include 'partials/js.php'; ?>
</body>

</html>