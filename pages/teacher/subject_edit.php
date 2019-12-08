<?php
    include '../../pdo_connect.php';
    session_start();
    $subject_id = $_GET['subject_id'];
    // get all exam list 
    $sql     = "SELECT * FROM subjects WHERE subjects.id = $subject_id";
    $subject = $conn->query($sql)->fetch();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Edit Subject</title>
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
                <div>
                  <div class="header">
                    <h4 class="float-left pb-1 px-2" style="color: black !important">
                      Edit Subject
                    </h4>

                  </div>

                  <form action="subject/update.php" method="post" class="w-100" enctype="multipart/form-data">
                      <!-- id as hidden -->
                      <input type="hidden" class="form-control" name="id" value="<?php echo $subject['id']; ?>">

                      <!-- subject name -->
                      <div class="form-group">
                        <label for="name">Course Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $subject['name']; ?>" placeholder="Crouse Name">
                      </div>

                      <!-- subject name -->
                      <div class="form-group">
                        <label for="code">Course Code</label>
                        <input type="text" class="form-control" name="code" value="<?php echo $subject['code']; ?>" placeholder="Course Code">
                      </div>

                      
                      <input  type="hidden" name="old_image" value="<?php echo $subject['image']; ?>">
                      <!-- subject image -->
                      <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" name="file_name" class="form-control">
                      </div>

                      <!-- submit button -->
                      <div class="form-group">
                        <button type="submit" name="update" class="btn btn-sm btn-primary btn-sm">Update</button>
                      </div>
                  </form>



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

  


  <!-- scripts -->
  <?php include 'partials/js.php'; ?>
</body>

</html>