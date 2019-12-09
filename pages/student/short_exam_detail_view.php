<?php
      session_start();
      include '../../pdo_connect.php';

      if (isset($_GET['exam_id'])) {
            $exam_id      = $_GET['exam_id'];
            $student_id   = $_GET['student_id'];


            $sql   = "SELECT exams.*, COUNT(exam_details.exam_id) AS 'participants', subjects.name as 'subject_name', subjects.code as 'course_code', teachers.firstname as 'firstname', teachers.lastname as 'lastname' FROM `exams` INNER JOIN exam_details ON exam_details.exam_id = `exams`.`id` INNER JOIN subjects ON exams.subject_id=subjects.id INNER JOIN teachers ON exams.teacher_id=teachers.id WHERE `exams`.`id` = '$exam_id'";
            $exam = $conn->query($sql)->fetch();

            $sql          = "SELECT *, POSITION(student_id IN performance) as 'possition' FROM `exam_details` WHERE `exam_id` = '$exam_id' AND `student_id` = '$student_id';";
            $exam_detail  = $conn->query($sql)->fetch();

            $sql          = "SELECT COUNT(*) as rank FROM `exam_details` WHERE `performance` > (SELECT COUNT(*) FROM `exam_details` WHERE `exam_id`=5 AND `student_id`=1) AND exam_id = 5";
            $get_rank     = $conn->query($sql)->fetch();

            $sql          = "SELECT * FROM `short_question` WHERE exam_id = $exam_id";
            $questions    = $conn->query($sql)->fetchAll();

            $sql              = "SELECT * FROM `short_exam_details` WHERE exam_id = $exam_id AND student_id = $student_id";
            $short_exam_detail  = $conn->query($sql)->fetchAll();


      }
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Short Question Result</title>

</head>

<body style="background:white">

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>

    <!-- main content -->
    <div class="main-content  mb-5 mx-0 px-0">

      <!-- exam preview -->
      <div class="container">
            <div class="row py-3 bg-light">
                  <div class="col-md-6 mx-auto">
                        <h5>Exam Date: <?php echo date_format(date_create($exam_detail['exam_date']),"Y-m-d ") . 'at ' . date_format(date_create($exam_detail['exam_date']),"H:i a"); ?></h5>
                        <h5>Eexam Title: <?php echo $exam['title']; ?></h5>
                        <h5>Course : <?php echo $exam['subject_name']; ?></h5>
                        <h5>Course Code: <?php echo $exam['course_code']; ?></h5>
                        <h5>Total Participants: <?php echo $exam['participants']; ?></h5>
                  </div>

                  <div class="col-md-6 mx-auto">
                        <h5>Total Question : <?php echo $exam['created_qns']; ?></h5>
                        <h5>Total Mark: <?php echo $exam_detail['total_mark']; ?></h5>
                        <h5>Total Answered: <?php echo $exam_detail['total_submit']; ?></h5>
                        <h5>Total Skiped: <?php echo $exam_detail['total_unsubmit']; ?></h5>
                        <?php if($exam_detail['is_checked'] == 0) { ?>
                        <h5>Status: Unchecked </h5>
                        <?php } else { $rank = $get_rank['rank']; echo '<h5>Your Rank:' . $rank .' %</h5>'; } ?>
                  </div>
            
            </div>

            <div class="row">
              <div class="col-12 mx-auto p-3 pl-5 bg-light clearfix">
                <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
                <?php foreach ($questions as $key => $question) { ?>
                    <div class="my-3">
                        
                        <table>
                              <tr>
                                    <td>
                                          <h5 class="d-block"><?php echo $key+1 . '. ' . htmlspecialchars($question['question']); ?></h5>
                                    </td>
                              </tr>
                              <tr>
                              <td>
                                    <p class="d-block ml-4"><?php echo $short_exam_detail[$key]['answer']; ?></p>
                              </td>
                              </tr>
                        </table>
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