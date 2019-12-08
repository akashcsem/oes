<?php
session_start();
    include '../../pdo_connect.php';
    include 'new_exam/update_exam.php';

    $sql = "SELECT * FROM `subjects` ";
    $subjects = $conn->query($sql)->fetchAll();

    if (isset($_GET['id'])) {
            $id    = $_GET['id'];
            $sql   = "SELECT * FROM `exams` WHERE `exams`.`id` = $id";
            $exam  = $conn->query($sql)->fetchAll();
    } else {
            header("Location: exams.php");
    }
   

    
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Edit Exam</title>
</head>
  <body style="background:#045B62 !important">

  <!-- navbar -->
  <div class="main">
    <?php include 'partials/navbar.php'; ?>
  
    <div class="row">
      <div class="col-10 mx-auto py-4">
        <form action="" method="post" class="w-100 p-3" style="background:#062E49; color:aliceblue">

        <h4 class="text-center" style="border-bottom:5px solid #354355; padding-bottom:10px">Edit Exam</h4>

          <div class="row">


            <div class="form-group col-md-6">
              <label for="">Subject:</label>
              <select name="subject_id" class="form-control">
                <option value="">select</option>
                <?php foreach ($subjects as $subject) { ?>
                  <option value="<?php echo $subject['id']; ?>" <?php if($exam[0]['subject_id'] == $subject['id']) { echo "selected"; } ?>><?php echo $subject['name']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="">Exam Type:</label>
              <select name="exam_type" class="form-control">
                <option <?php if($exam[0]['exam_type'] == "MCQ") { echo "selected"; } ?> value="MCQ">MCQ</option>
                <option <?php if($exam[0]['exam_type'] == "Short Question") { echo "selected"; } ?> value="Short Question">Short Question</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="">Exam Title:</label>
              <input type="text" name="title" value="<?php echo $exam[0]['title']; ?>" autocomplte="off" class="form-control">
            </div>


            <div class="form-group col-md-6">
              <label for="">Total Question:</label>
              <input type="number" value="<?php echo $exam[0]['total_qns']; ?>" name="total_qns" autocomplte="off" class="form-control">
            </div>

            <div class="form-group col-md-6">
              <label for="">Duration Hour:</label>
              <input type="number" value="<?php echo $exam[0]['hour']; ?>" name="hour" autocomplte="off" class="form-control">
            </div>

            <div class="form-group col-md-6">
              <label for="">Duration Mimute:</label>
              <input type="number" value="<?php echo $exam[0]['minute']; ?>" name="minute" autocomplte="off" class="form-control">
            </div>
          </div>
          
          
          <input type="hidden" value="<?php echo $exam[0]['id']; ?>" name="id">
          <div class="text-right">
            <button type="submit" name="update_exam" class="btn btn-sm btn-primary">Update Exam</button>
            <button class="btn btn-sm btn-secondary mr-2"><a style="color:aliceblue; text-decoration:none;" href="exams.php">Cancel</a></button>
          </div>
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