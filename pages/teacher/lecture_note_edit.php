<?php
    include '../../pdo_connect.php';
    session_start();
    
    // get all subject list for option select
    $sql      = "SELECT * FROM `subjects`";
    $subjects = $conn->query($sql)->fetchAll();

    // get editable lecture note 
    $note_id       = $_GET['lecture_note_id'];
    $sql           = "SELECT * FROM `lecture_notes` WHERE `lecture_notes`.id = $note_id";
    $lecture_note  = $conn->query($sql)->fetch();

?>

<!DOCTYPE html>
<!-- <html lang="en" style="background:url(../../img/tech.jpg);
background-attachment: fixed; background-size: cover;
"> -->
<html>

<head>

  <?php include 'partials/styles.php'; ?>
  <title>Edit Lecture Note</title>
</head>

<body>

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>


    <!-- main content -->
    <div class="main-content  mb-5 mx-0 px-0 row">

      <div class="col-md-9 mx-auto">
        <div class="container py-4">

          <!-- form for upload file, with post method -->
          <form action="lecture_note/update.php" method="post" enctype="multipart/form-data" style="width:100%; background:white; padding:15px">

              <!-- id as hidden -->
              <input type="hidden" class="form-control" name="id" value="<?php echo $lecture_note['id']; ?>">

              <!-- field for file title -->
              <div class="form-group">
                <label for="title">Lecture Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $lecture_note['title']; ?>" placeholder="Lecture Title">
              </div>

              <!-- select option for subject -->
              <div class="form-group">
                <label for="">Subject</label>
                <select class="form-control" name="subject_id">
                  <?php foreach ($subjects as $subject) { ?>
                    <option <?php if($subject['id'] == $lecture_note['subject_id']) { echo 'selected'; } ?> value="<?php echo $subject['id']; ?>" ><?php echo $subject['name']; ?></option>
                  <?php } ?>
                </select>
              </div>

              <input type="hidden" name="old_file" value="<?php echo $lecture_note['file_name']; ?>">
              <!-- field for file -->
              <div class="form-group">
                <label for="note">Upload Notes</label>
                <input type="file" name="file_name" class="form-control">
              </div>

              <button type="submit" name="update_lecture_note" class="btn btn-primary btn-sm">Update Lecture Note</button>
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