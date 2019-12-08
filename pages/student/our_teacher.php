<?php
session_start();

include '../../pdo_connect.php';
?>
<!DOCTYPE html>
<html lang="en" style="background:url(../../img/tech.jpg);
background-attachment: fixed; background-size: cover;
">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Faculty List</title>
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
            <div class="col-12 text-center text-light">
              <h1 class="font-weight-bold mb-0 pb-0">Our Teachers</h1>
              <p>We learn, we teach, we innovate </p>
            </div>

            <?php
            // get all teacher list from database
            $sql      = "SELECT * FROM `teachers`";
            $teachers = $conn->query($sql)->fetchAll();

            foreach ($teachers as $teacher) { ?>
              <div class="col-md-3 my-3">
                <div class="card">
                  <?php if ($teacher['image'] == 'default.png') { ?> 
                    <img src="../../img/default.png" class="card-img-top px-2" alt="" height="230">
                  <?php } else { ?>
                  <img src="../../img/teachers/<?php echo $teacher['image']; ?>" class="card-img-top px-2" alt="" height="230">
                  <?php }  ?>
                  <div class="card-body pt-1 text-center mx-0 px-0">
                    <h5 class="card-title "><?php echo $teacher['firstname'] . $teacher['lastname']; ?></h5>
                    <p class="card-text"><?php echo $teacher['designation'] . ' Department of ' . $teacher['department']; ?></p>
                    <a href="teachers_resources.php?teacher_id=<?php echo $teacher['id']; ?>" class="btn btn-outline-success btn-sm w-75 mx-2">Resources</a>
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