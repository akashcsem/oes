<?php

    session_start();

    $ssn_student_id = $_SESSION['ssn_student_id'];
    include '../../pdo_connect.php';
    include 'profile/update_password.php';
    // include 'profile/update_image.php';

    $sql     = "SELECT * FROM `students` WHERE id = $ssn_student_id";
    $student = $conn->query($sql)->fetch();

?>

<!DOCTYPE html>
<html>
<head>

  <?php include 'partials/styles.php'; ?>
  <title>Student Profile</title>

  <style>
    .my-card {
      position: absolute;
      left: 40%;
      top: -20px;
      border-radius: 50%;
    }
    .widget-user-header {
      background-position: center center;
      background-size: cover;
    }
  </style>
</head>

<body>

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>

    <!-- main content -->
    <div class="container-fluid pt-5">
      <div class="row">
        <div class="col-md-11 mx-auto">
          <div class="row">



            <!-- Profile + Change password -->
            <div class="col-md-4">
              <!-- Profile -->
              <div class="row">
                <div class="col-md-12">
                  <!-- Profile Image -->
                  <div class="card card-primary bg-primary card-outline" style="padding-top: 3px">
                    <div class="card-body box-profile bg-light">
                      <div class="text-center">
                          <a href="" data-toggle="modal" data-target="#updateImage">
                          <?php if ($student['image'] == 'default.png') { ?>
                              <img class="profile-user-img img-fluid img-circle" src="../../img/default.png" style="height: 125px; width: 120px; border-radius:50%" alt="Teacher profile picture">
                            
                            <?php }  else { ?>
                          <img class="profile-user-img img-fluid img-circle" src="../../img/students/<?php echo $student['image']; ?>" style="height: 125px; width: 120px; border-radius:50%" alt="User profile picture">
                          <?php } ?>
                        </a>
                      </div>

                      <h5 class="profile-username text-center mt-3"><?php echo $student['firstname'] . " " . $student['lastname']; ?></h5>
                      <p class="card-text text-center" style="margin-top:-10px">Department of <?php echo $student['department']; ?></p>

                      <p class="card-text text-center" style="margin-top:-10px">Batch <?php echo $student['batch']; ?></p>
                      <p class="card-text text-center" style="margin-top:-10px">ID <?php echo $student['student_id']; ?></p>


                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>


                <!-- Update image modal -->
                <div class="modal modal-danger" id="updateImage">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <form action="profile/update_image.php" method="post" enctype="multipart/form-data"> 
                        <!-- Modal Header -->
                        <div class="modal-header text-center">
                          <h4 class="modal-title text-center">Update profile picture?</h4>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body text-right">
                          <div class="form-group">
                            <input type="hidden" name="old_image" value="<?php echo $student['image']; ?>" class="form-control">
                            <input type="file" name="image" class="form-control">
                          </div>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-footer text-right">
                          <button type="submit" name="update_profile_picture" class="btn btn-success mx-2 px-5">Update</button>
                          <button type="button" class="btn btn-danger px-4" data-dismiss="modal">Cancel</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
              <!-- End Profile -->




              <!-- Change password -->
              <div class="row my-5">
                <div class="col-md-12">
                  <form action="" id="update_password" method="post" class="w-100 mx-0 px-0">
                    <div class="card card-success bg-success card-outline" style="padding-top: 3px">
                      <div class="card-body box-profile bg-light">
                        <h4 class="profile-username text-center"><b>Change Password</b></h4>

                        <p class="text-muted text-center">You can change your password from here</p>
                        Old Password
                        <div class="input-group input-group-sm mb-2">
                          <input type="password" name="old_password" class="form-control text-center" autocomplete="off" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        New Password
                        <div class="input-group input-group-sm mb-2">
                          <input type="password" name="new_password" class="form-control text-center" autocomplete="off" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        Confirm Password
                        <div class="input-group input-group-sm mb-2">
                          <input type="password" name="confirm_password" autocomplete="off" class="form-control text-center" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <small class="text-danger" style="display:none">Passowrd Not Match</small>
                        <input type="submit" name="change_password" class="btn btn-success btn-block" value="Update Password">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Change password -->
            </div>
            <!-- End Profile + Change password -->





            <!-- Other's information -->
            <div class="col-md-8">
              <div class="card card-info bg-info card-outline" style="padding-top: 3px">
                <div class="card-header px-2 py-3 bg-light">
                  <h4 class="mx-3 font-weight-bold">Update Profile</h4>
                </div><!-- /.card-header -->

                <div class="card-body pt-2 px-5" style="background: #FFFFFF">
                  <form action="profile/update_info.php" id="update_info" method="post" class="w-100">

                    First Name
                    <div class="input-group mb-3">
                      <input name="firstname" type="text" class="form-control form-control-sm" value="<?php echo $student['firstname']; ?>">
                    </div>
                    Last Name
                    <div class="input-group mb-3">
                      <input name="lastname" type="text" class="form-control form-control-sm" value="<?php echo $student['lastname']; ?>">
                    </div>
                    Username
                    <div class="input-group mb-3">
                      <input name="username" type="text" class="form-control form-control-sm" value="<?php echo $student['username']; ?>">
                    </div>
                    Student ID
                    <div class="input-group mb-3">
                      <input name="student_id" type="text" class="form-control form-control-sm" value="<?php echo $student['student_id']; ?>">
                    </div>
                    Mobile
                    <div class="input-group mb-3">
                      <input type="text" name="mobile" class="form-control form-control-sm" value="<?php echo $student['mobile']; ?>">
                    </div>
                    Email
                    <div class="input-group mb-3">
                      <input type="text" name="email" class="form-control form-control-sm" value="<?php echo $student['email']; ?>">
                    </div>
                    Department
                    <div class="input-group mb-3">
                      <input name="department" style="text-transform: capitalize" type="text" class="form-control form-control-sm" value=" <?php echo $student['department']; ?>">
                    </div>
                    Batch
                    <div class="input-group mb-3">
                      <input name="batch" style="text-transform: capitalize" type="text" class="form-control form-control-sm" value=" <?php echo $student['batch']; ?>">
                    </div>

                    <button type="button" class="btn btn-primary my-0 py-0" data-toggle="modal" data-target="#updateInfo">
                      Update
                    </button>

                    <!-- Update Info modal -->
                    <div class="modal modal-danger" id="updateInfo">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header text-center">
                            <h4 class="modal-title text-center">Do you want to update profile?</h4>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body text-right">
                            <button type="submit" name="update_profile" class="btn btn-success mx-2 px-5">Yes</button>
                            <button type="button" class="btn btn-danger px-4" data-dismiss="modal">Cancel</button>
                          </div>

                        </div>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- End Other's information -->
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

  <script type="text/javascript">
    document.getElementById("update_password").onkeypress = function(e) {
    var key = e.charCode || e.keyCode || 0;     
      if (key == 13) {
        e.preventDefault();
      }
    }
    document.getElementById("update_info").onkeypress = function(e) {
    var key = e.charCode || e.keyCode || 0;     
      if (key == 13) {
        e.preventDefault();
      }
    }
    document.getElementById("update_info").onkeypress = function(e) {
    var key = e.charCode || e.keyCode || 0;     
      if (key == 13) {
        e.preventDefault();
      }
    }
  </script>
</body>

</html>