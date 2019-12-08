<?php
session_start();
    include '../../pdo_connect.php';
    $sql = "SELECT * FROM `subjects` ";
    $subjects = $conn->query($sql)->fetchAll();

    
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Create New Exam</title>
</head>
  <body style="background:#045B62 !important">

  <!-- navbar -->
  <div class="main">
    <?php include 'partials/navbar.php'; ?>
  
    <div class="row">
      <div class="col-10 mx-auto py-4">
        <form action="new_exam/create_new_exam.php" method="post" class="w-100 p-3" style="background:#062E49; color:aliceblue">


          <div class="row">
            <div class="form-group col-md-6">
              <label for="">Subject:</label>
              <select name="subject_id" class="form-control">
                <option value="">select</option>
                <?php foreach ($subjects as $subject) { ?>
                  <option value="<?php echo $subject['id']; ?>"><?php echo $subject['name']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="">Exam Type:</label>
              <select name="exam_type" class="form-control">
                <option value="MCQ">MCQ</option>
                <option value="Short Question">Short Question</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="">Exam Title:</label>
              <input type="text" required name="title" autocomplte="off" class="form-control">
            </div>


            <div class="form-group col-md-6">
              <label for="">Total Question:</label>
              <input type="number" required name="total_qns" autocomplte="off" class="form-control">
            </div>

            <div class="form-group col-md-6">
              <label for="">Duration Hour:</label>
              <input type="number" name="hour" autocomplte="off" class="form-control">
            </div>

            <div class="form-group col-md-6">
              <label for="">Duration Mimute:</label>
              <input type="number" name="minute" autocomplte="off" class="form-control">
            </div>
          </div>

          <button type="submit" name="create_new_exam" class="btn btn-primary">Create</button>
        </form>
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