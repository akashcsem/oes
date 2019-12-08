<?php
    session_start();
    include '../../pdo_connect.php';
    
    $sql      = "SELECT exams.*, subjects.name, subjects.code FROM `exams` INNER JOIN subjects ON exams.subject_id=subjects.id ORDER BY `subject_id`, `total_participant` ASC";
    $exams    = $conn->query($sql)->fetchAll();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Students Result</title>
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
                <div class="">
                  <div class="header">
                    <h4 class="text-center pb-1 px-2" style="color: black !important">
                      Students Result
                    </h4>
                  </div>



                  <table class="table table-hover table-light table-striped table-bordered">
                    <tr class="bg-info text-light">
                      <th>#</th>
                      <th>Exam Title</th>
                      <th>Course Name</th>
                      <th>Course Code</th>
                      <th>Total Participant</th>
                      <th>Action</th>
                    </tr>
                    
                    <tr>
                          <td>1</td>
                        <td colspan="4" class="text-center">All Result</td>
                        <td>
                          <a href="view_all_result.php">View</a>
                        </td>

                      </tr>
                    <?php
                    foreach ($exams as $key => $exam) { ?>
                      <tr>
                        <td><?php echo $key+2; ?></td>
                        <td>
                          <?php echo $exam['title']; ?>
                        </td>
                        <td>
                          <?php echo $exam['name']; ?>
                        </td>
                        <td>
                          <?php echo $exam['code']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $exam['total_participant']; ?>
                        </td>
                        <td>
                          <a href="exam_result.php?exam_id=<?php echo $exam['id']; ?>">View</a>
                        </td>

                      </tr>

                      <?php } if (count($exams) < 1) { ?>
                      <tr>
                        <td colspan="6"><h3 class="text-center">No subject</h3></td>
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

  <!-- add modal -->
  <?php include 'subject/add_modal.php'; ?>


  <!-- scripts -->
  <?php include 'partials/js.php'; ?>
  <script type="text/javascript">
    document.getElementById("subject_create").onkeypress = function(e) {
    var key = e.charCode || e.keyCode || 0;     
      if (key == 13) {
        e.preventDefault();
      }
    }
  </script>
</body>

</html>