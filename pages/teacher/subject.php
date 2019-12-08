<?php
    session_start();
    include '../../pdo_connect.php';
    include('subject/create.php');

    if (isset($_GET['message'])) {
      if ($_GET['message'] == 'success') {
        echo "<script>alert('Subject Created Successfull')</script>";
      }
      
    }

    $code = "";
    $sql      = "SELECT subjects.*, teachers.firstname AS firstname, teachers.lastname AS lastname FROM `subjects` INNER JOIN teachers ON subjects.created_by = teachers.id;";
    $subjects = $conn->query($sql)->fetchAll();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Subject</title>
</head>

<body style="background:white">

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>


    <!-- display success message -->
    <?php if ($message != "") { ?>
      <div class="row">
        <div class="container">
          <h3 class="text-center text-success"> <?php echo $message; ?> </h3>
        </div>
      </div>
    <?php } ?>




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
                    <h4 class="float-left pb-1 px-2" style="color: black !important">
                      Manage Subjects
                    </h4>

                    <a href="#" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#addModal">
                      Add New
                    </a>
                  </div>



                  <table class="table table-hover table-light table-striped table-bordered">
                    <tr class="bg-info text-light">
                      <th>#</th>
                      <th>Course Name</th>
                      <th>Course Code</th>
                      <th>Created By</th>
                      <th>Image</th>
                      <th>Notes</th>
                      <th>Action</th>
                    </tr>

                    <?php
                    $count = 1;
                    foreach ($subjects as $subject) { ?>
                      <tr>
                        <td><?php echo $count++; ?></td>
                        <td>
                          <?php echo $subject['name']; ?>
                        </td>
                        <td>
                          <?php echo $subject['code']; ?>
                        </td>
                        <td><?php echo $subject['firstname'] . ' ' . $subject['lastname']; ?></td>
                        <td>
                          <?php if(isset($subject['image'])) { ?>
                            <a href="<?php echo $subject['image']; ?>" target="__blank"><img height="60px" width="60px" src="<?php echo $subject['image']; ?>" alt=""></a>
                          <?php } else { ?>
                            <img src="" alt="">
                          <?php } ?>
                        </td>
                        <td>
                          <a href="lecture_notes.php?subject_id=<?php echo $subject['id']; ?>">View</a>
                        </td>

                        <!-- action -->
                        <td class="text-center" style="text-align:center;">
                            <div class="text-center">
                              <a href="subject_edit.php?subject_id=<?php echo $subject['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                              <a name="delete" href="subject/delete.php?id=<?php echo $subject['id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </td>
                      </tr>

                      <?php } if (count($subjects) < 1) { ?>
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