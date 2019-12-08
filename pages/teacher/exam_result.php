<?php
    session_start();
    include '../../pdo_connect.php';

    if (isset($_GET['exam_id'])) { 
      $exam_id = $_GET['exam_id'];

      $sql  = "SELECT * FROM exams WHERE id = $exam_id";
      $exam   = $conn->query($sql)->fetch();

      $sql = "SELECT results.*, students.firstname, students.lastname, subjects.name, subjects.code FROM `results` INNER JOIN students ON results.student_id = students.id INNER JOIN subjects ON results.subject_id = subjects.id WHERE results.exam_id = $exam_id ORDER BY results.achieve_mark DESC, results.test_date ASC";
      $results   = $conn->query($sql)->fetchAll();
    }
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
                      Exam on: <?php echo $exam['title']; ?>
                    </h4>
                  </div>



                  <table class="table table-hover table-light table-striped table-bordered">
                    <tr class="bg-info text-light">
                      <th>#</th>
                      <th>Student Name</th>
                      <th>Course Name</th>
                      <th>Course Code</th>
                      <th class="text-center">Mark</th>
                    </tr>
                    
                    <?php
                    foreach ($results as $key => $result) { ?>
                      <tr>
                        <td><?php echo $key+2; ?></td>
                        <td>
                          <?php echo $result['firstname'] . ' ' . $result['lastname']; ?>
                        </td>
                        <td>
                          <?php echo $result['name']; ?>
                        </td>
                        <td>
                          <?php echo $result['code']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $result['achieve_mark']; ?>
                        </td>

                      </tr>

                      <?php } if (count($results) < 1) { ?>
                      <tr>
                        <td colspan="6"><h3 class="text-center">No result found</h3></td>
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