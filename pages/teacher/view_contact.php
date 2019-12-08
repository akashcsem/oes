<?php
    session_start();
    include '../../pdo_connect.php';
    
    $sql      = "SELECT * FROM `contactus` WHERE `status` = 0 ORDER BY `created_at` ASC LIMIT 10";
    $messages = $conn->query($sql)->fetchAll();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Contact List</title>
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
                      List of received contacts
                    </h4>

                  </div>



                  <table class="table table-hover table-light table-striped table-bordered">
                    <tr class="bg-info text-light">
                      <th>#</th>
                      <th>From</th>
                      <th>Receive at</th>
                      <th>Action</th>
                    </tr>

                    <?php
                    foreach ($messages as $key => $message) { ?>
                      <tr>
                        <td><?php echo $key+1; ?></td>
                        <td>
                          <?php echo $message['name']; ?>
                        </td>
                        <td>
                          <?php echo $message['created_at']; ?>
                        </td>
                        <td>
                          <a href="message_detail.php?message_id=<?php echo $message['id']; ?>">Show Detail</a>
                        </td>
                      </tr>

                      <?php } if (count($messages) < 1) { ?>
                      <tr>
                        <td colspan="6"><h3 class="text-center">No latest messages</h3></td>
                      </tr>
                      <?php } ?>


                  </table>
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