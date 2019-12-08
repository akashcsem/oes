<?php
session_start();
// include dabatase connection
include '../../pdo_connect.php';
// include file for delete exam
include 'new_exam/delete_exam.php';
// get teacher id by session
$id = $_SESSION['userid'];
$exam_type = "Short Question";
// get all exam list 
$sql   = "SELECT exam_details.*, exams.title AS 'exam_title', students.firstname AS 'firstname', students.lastname AS 'lastname' FROM `exam_details` INNER JOIN students ON exam_details.student_id=students.id INNER JOIN exams ON exam_details.exam_id=exams.id WHERE `exam_details`.`teacher_id` = $id  ORDER BY is_checked";

$exams = $conn->query($sql)->fetchAll();
$subjects_name = Array();
$subjects_code = Array();

foreach ($exams as $key => $exam) {
      $exam_id    = $exam['exam_id'];

      $sql   = "SELECT subjects.name as 'subject_name', subjects.code as 'subject_code' FROM exams INNER JOIN subjects ON exams.subject_id = subjects.id WHERE exams.id = $exam_id LIMIT 1";
      
      $is_exam = $conn->query($sql)->fetch();
      array_push($subjects_name, $is_exam[0]);
      array_push($subjects_code, $is_exam[1]);
      
}
?>






<!DOCTYPE html>
<html lang="en" style="background:url(../../img/tech.jpg);
background-attachment: fixed; background-size: cover;
">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Short Question Exams</title>
</head>

<body>

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>

    <!-- main content -->
    <div class="main-content  mb-5 mx-0 px-0 row">

      <div class="col-md-11 mx-auto my-4">

          <!-- subject box -->
          <div class="row">

              <div class="col-12">
                <table class="table table-hover table-light table-striped table-bordered">
                  <tr class="bg-info text-light">
                    <th>#</th>
                    <th>Date</th>
                    <th>Exam Title</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Student Name</th>
                    <th>Total Question</th>
                    <th>Total Mark</th>
                    <th>Achieve Mark</th>
                    <th class="text-center">Action</th>
                  </tr>

                  <?php 
                  foreach ($exams as $key => $exam) { ?>
                    <tr>
                      <td><?php echo $key+1; ?></td>
                      <td><?php echo $exam['exam_date']; ?></td>
                      <td><?php echo $exam['exam_title']; ?></td>
                      <td><?php echo $subjects_name[$key]; ?></td>
                      <td><?php echo $subjects_code[$key]; ?></td>
                      <td><?php echo $exam['firstname'] . ' ' . $exam['lastname']; ?></td>
                      <td class="text-center"><?php echo $exam['total_question']; ?></td>
                      <td class="text-center"><?php echo $exam['total_mark']; ?></td>
                      <td class="text-center"><?php echo $exam['achieve_mark']; ?></td>
                      
                      <!-- action button -->
                      <td class="text-center">
                              <!-- action button will be appear if the teacher create this exam -->
                              <?php if($exam['is_checked'] == 0) { ?>
                              <a href="check_short_question.php?exam_detail_id=<?php echo $exam['id']; ?>&&student_id=<?php echo $exam['student_id']; ?>" title="Check Short Question Exam"><i class="fa fa-check mx-1" style="font-size:15px;color:blue !important"></i></a>
                              
                              <?php } else  { ?> 
                              
                              <a href="edit_check_short_question.php?exam_detail_id=<?php echo $exam['id']; ?>&&student_id=<?php echo $exam['student_id']; ?>" title="Edit Exam Paper"><i class="fa fa-eye-slash mx-1" style="font-size:15px;color:green !important"></i></a>
                              <?php } ?> 
                      </td>
                    </tr>
                  <?php } if (count($exams) < 1) {?>
                        <tr>
                              <td colspan="9" class="text-center">No exam found</td>
                        </tr>
                  <?php }?>
                </table>
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