<?php
    session_start();
    include '../../pdo_connect.php';
    
    if (isset($_GET['message_id'])) {
            $id = $_GET['message_id'];

            $sql      = "SELECT * FROM `contactus` WHERE id = $id";
            $message  = $conn->query($sql)->fetch();

            $sql  = "UPDATE `contactus` SET `status` = '1' WHERE `contactus`.`id` = $id";
            $stmt = $conn->prepare($sql)->execute();
    }
   
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Message Details</title>
</head>

<body style="background:white">

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>





    <!-- main content -->
    <div class="main-content  mb-5 mx-0 px-0 row">

      <div class="col-12">
        <div class="container py-4">

          <!-- subject box -->
          <div class="row">
            <div class="container">
              <div class="col-lg-12">
                <div class="text-center">
                  <div class="header">
                        <h4 class="float-center pb-1 px-2" style="color: black !important">
                        From: <?php echo $message['name']; ?>
                        </h4>
                        <h4 class="float-center pb-1 px-2" style="color: black !important">
                        Email: <?php echo $message['email']; ?>
                        </h4>
                        <h4 class="float-center pb-1 px-2" style="color: black !important">
                        Mobile: <?php echo $message['mobile']; ?>
                        </h4>
                        Message:
                        <p><?php echo $message['message']; ?></p>

                  </div>
                </div>
              </div>
            </div>

          </div>


        </div>
      </div>


    </div>

    <!-- footer -->
    <div class="footer bg-dark p-0 m-0">
      <?php include 'partials/footer.php'; ?>
    </div>
  </div>

</body>

</html>