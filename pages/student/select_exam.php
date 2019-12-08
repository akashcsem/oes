<?php
session_start();
include '../../pdo_connect.php';

if (isset($_GET['subject_id'])) {
  $subject_id = $_GET['subject_id'];
  $subject_name = $_GET['subject_name'];
  $sql = "SELECT * FROM `exams` WHERE subject_id = $subject_id";

  $exams = $conn->query($sql)->fetchAll();

  $is_participate = Array();
    foreach ($exams as $key => $exam) {
          $exam_id    = $exam['id'];
          $student_id = $_SESSION['ssn_student_id'];
          $sql   = "SELECT student_id FROM `exam_details` WHERE exam_id = $exam_id AND student_id = $student_id";
          
          $is_exam_taken = $conn->query($sql)->fetch();
          if ($is_exam_taken['student_id']) {
                array_push($is_participate, 1);
          } else {
                array_push($is_participate, 0);
          }
    }
}
?>


<!DOCTYPE html>
<html lang="en" style="background:url(../../img/tech.jpg);
background-attachment: fixed; background-size: cover;
">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Select Exam</title>
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
        <div class="container">

          <div class="text-center mt-3">
            <h3 class="text-light text-center">
              <?php if (isset($_GET['subject_id'])) {
                echo $_GET['subject_name'];
              } else {
                echo 'No Subject Selected';
              } ?>
            </h3>
          </div>

          <div class="row">
            <div class="col-md-12 mx-auto">
              <table class="table table-light">
                <tr class="bg-dark text-light">
                  <th>#</th>
                  <th>Subject</th>
                  <th>Topic</th>
                  <th>Exam Type</th>
                  <th>Exam Title</th>
                  <th class="text-center">Total Question</th>
                  <th>Duration</th>
                  <th>Take Exam</th>
                </tr>

                <?php foreach ($exams as $key => $exam) {
                  $minute = $exam['minute'];
                  $hour = $exam['hour'];
                  if (empty($hour)) {
                    $duration = "00";
                  } else if ($hour < 10) {
                    $duration = "0" . $hour;
                  } else {
                    $duration = $hour;
                  }
                  if (empty($minute)) {
                    $duration .= " : 00";
                  } else if ($minute < 10) {
                    $duration .= " : 0" . $minute;
                  } else {
                    $duration .= " : " . $minute;
                  }
                  $duration .= " : 00";
                  ?>
                  <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $exam['title']; ?></td>
                    <td><?php echo $subject_name; ?></td>
                    <td><?php echo $exam['exam_type']; ?></td>
                    <td><?php echo $exam['title']; ?></td>
                    <td class="text-center"><?php echo $exam['total_qns']; ?></td>
                    <td><?php echo $duration; ?></td>
                    <td class="text-center">
                    <?php 
                    if ($is_participate[$key] == 1) {
                      if ($exam['exam_type'] == 'MCQ') { ?>
                        <a href="mcq_exam_detail_view.php?exam_id=<?php echo $exam['id']; ?> &&student_id=<?php echo $student_id; ?>" class="badge badge-pill badge-info">View</a>
                        <?php } else { ?>
                        <a href="short_exam_detail_view.php?exam_id=<?php echo $exam['id']; ?> &&student_id=<?php echo $student_id; ?>" class="badge badge-pill badge-info">View</a>
                        <?php } } else { 
                          if ($exam['exam_type'] == 'MCQ') { ?>
                        <a href="mcq_test.php?exam_id=<?php echo $exam['id']; ?>&&subject_name=<?php echo $subject_name; ?>" class="badge badge-pill badge-info">Start</a>
                        <?php } else { ?>
                        <a href="short_question.php?exam_id=<?php echo $exam['id']; ?>&&subject_name=<?php echo $subject_name; ?>" class="badge badge-pill badge-info">Start</a>
                      <?php } }?>
                    </td>
                  </tr>
                <?php } ?>

              </table>
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

  <!-- scripts -->
  <?php include 'partials/js.php'; ?>
</body>

</html>