<?php
session_start();
include '../../pdo_connect.php';

$sql = "SELECT * FROM `subjects`";
$subjects = $conn->query($sql)->fetchAll();
?>



<!DOCTYPE html>
<html lang="en" style="background:url(../../img/tech.jpg);
background-attachment: fixed; background-size: cover;
">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Subject</title>
</head>

<body>

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
            <?php
            foreach ($subjects as $subject) { ?>
              <div class="col-md-2 my-3">
                <div class="card">
                  <a title="Click to show dwtail" href="select_exam.php?subject_id=<?php echo $subject['id']; ?>&subject_name=<?php echo $subject['name']; ?>">
                   <img src="../../img/subjects/<?php echo $subject['image']; ?>" class="card-img-top" alt="javascript image" height="160px">
                  </a>
                  <div class="card-body p-0">
                    <h5 class="card-title text-center mb-0"><a href="select_exam.php?subject_id=<?php echo $subject['id']; ?>&subject_name=<?php echo $subject['name']; ?>" class="text-dark"><?php echo $subject['name']; ?></a></h5>
                  </div>
                </div>
              </div>
            <?php } ?>



          </div>


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