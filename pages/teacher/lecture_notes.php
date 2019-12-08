<?php
    session_start();
    $subject_id = 0;
    if (isset($_GET["subject_id"])) {
      $subject_id = $_GET["subject_id"];
    }

    include('lecture_note/create.php');
?>

<!DOCTYPE html>
<!-- <html lang="en" style="background:url(../../img/tech.jpg);
background-attachment: fixed; background-size: cover;
"> -->
<html>

<head>

  <?php include 'partials/styles.php'; ?>
  <title>Lecture Notes</title>
</head>

<body>

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>

    <!-- display success message -->
    <?php if ($insert_success != "") { ?>
      <div class="row">
        <div class="container">
          <h3 class="text-center text-success"> <?php echo $insert_success; ?> </h3>
        </div>
      </div>
    <?php } ?>

    <!-- main content -->
    <div class="main-content  mb-5 mx-0 px-0 row">

      <div class="col-md-9 mx-auto">
        <div class="container py-4">

          <!-- subject box -->
          <div class="row">
            <div class="container">
              <div class="col-lg-12">
                <div class="text-center">
                  <div class="header">
                  <h4 class="float-left pb-1 px-2" style="color: black !important">
                      Manage Lecture Note
                    </h4>

                    <a href="#" class="btn btn-success btn-sm float-right mb-2" data-toggle="modal" data-target="#addModal">
                      Add New
                    </a>
                  </div>

                  <table class="table table-hover table-light table-striped table-bordered">
                    <tr class="bg-info text-light">
                      <th>#</th>
                      <th>Note Title</th>
                      <th>Subject</th>
                      <th>File</th>
                      <th>View</th>
                      <th>Action</th>
                    </tr>

                    <?php
                    $count = 1;
                    foreach ($notes as $note) { ?>
                      <tr>
                        <td><?php echo $count++; ?></td>
                        <td class="text-capitalize">
                          <?php echo $note['title']; ?>
                        </td>
                        <td>
                          <?php echo $note['subject']; ?>
                        </td>
                        <td>
                          <a href="../../all_file/<?php echo $note['file_name']; ?>" download>Download</a>
                        </td>
                        <td>
                          <a href="../../all_file/<?php echo $note['file_name']; ?>" target="__blank">View</a>
                        </td>
                        <td class="text-center">
                          <a href="lecture_note_edit.php?lecture_note_id=<?php echo $note['id']; ?>"  class="btn btn-primary btn-sm">Edit</a>

                          <a href="lecture_note/delete.php?delete_note_id=<?php echo $note['id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                    <?php } if (count($notes) < 1) { ?>
                      <tr>
                        <td colspan="6"><h3 class="text-center">No lecture notes</h3></td>
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

  <!-- lecture note add modal -->
  <?php include 'lecture_note/add_modal.php'; ?>

  <!-- scripts -->
  <?php include 'partials/js.php'; ?>

</body>

</html>