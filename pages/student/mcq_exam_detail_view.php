<?php
      session_start();
      include '../../pdo_connect.php';

      if (isset($_GET['exam_id'])) {
            $exam_id      = $_GET['exam_id'];
            $student_id   = $_GET['student_id'];

            // $sql          = "SELECT `exams`.*, `subject`.name FROM `exams`  WHERE `id` = '$exam_id'";
            // $exam         = $conn->query($sql)->fetch();
            $sql   = "SELECT exams.*, COUNT(exam_details.exam_id) AS 'participants', subjects.name as 'subject_name', subjects.code as 'course_code', teachers.firstname as 'firstname', teachers.lastname as 'lastname' FROM `exams` INNER JOIN exam_details ON exam_details.exam_id = `exams`.`id` INNER JOIN subjects ON exams.subject_id=subjects.id INNER JOIN teachers ON exams.teacher_id=teachers.id WHERE `exams`.`id` = '$exam_id'";

            $exam = $conn->query($sql)->fetch();

            $sql          = "SELECT *, POSITION(student_id IN performance) as 'possition' FROM `exam_details` WHERE `exam_id` = '$exam_id' AND `student_id` = '$student_id';";
            $exam_detail  = $conn->query($sql)->fetch();

            $sql          = "SELECT COUNT(*) as rank FROM `exam_details` WHERE `performance` > (SELECT COUNT(*) FROM `exam_details` WHERE `exam_id`=5 AND `student_id`=1) AND exam_id = 5";
            $get_rank     = $conn->query($sql)->fetch();

            $sql          = "SELECT * FROM `mcq_question` WHERE exam_id = $exam_id";
            $questions    = $conn->query($sql)->fetchAll();

            $sql              = "SELECT * FROM `mcq_exam_details` WHERE exam_id = $exam_id AND student_id = $student_id";
            $mcq_exam_detail  = $conn->query($sql)->fetchAll();

            $right = '<img src="../../img/correct.png" style="width:25px; height:25px">';
            $wrong = '<img src="../../img/wrong.png" style="width:15px; height:15px">';

      }
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>MCQ Test Result</title>

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
                        <h5>Total Marked: <?php echo $exam_detail['total_submit']; ?></h5>
                        <h5>Total Unarked: <?php echo $exam_detail['total_unsubmit']; ?></h5>
                        <h5>Total Correct: <?php echo $exam_detail['total_correct']; ?></h5>
                        <h5>Total Wrong: <?php echo $exam_detail['total_wrong']; ?></h5>
                        <h5>Your Performance: <?php echo $exam_detail['performance'].'%'; ?></h5>
                        <h5>Your Rank: <?php echo $get_rank['rank']; ?></h5>
                  </div>
            
            </div>

            <div class="row">
              <div class="col-12 mx-auto p-3 pl-5 bg-light clearfix">
                <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
                <?php foreach ($questions as $key => $question) { ?>
                    <div class="my-3">
                        
                        <table>
                              <tr>
                                    <td colspan="3">
                                          <h4 class="d-block"><?php echo $key+1 . '. ' . $question['question']; ?></h4>
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                          <span style="margin-left:20px">
                                                <?php if($mcq_exam_detail[$key]['student_answer'] == 'a' && $mcq_exam_detail[$key]['questions_answer'] == 'a') echo $right; else if($mcq_exam_detail[$key]['student_answer'] != 'not_set' && $mcq_exam_detail[$key]['questions_answer'] != 'a' && $mcq_exam_detail[$key]['student_answer'] == 'a') echo $wrong; ?>
                                          </span>      
                                    </td>
                                    <td> A. </td>
                                    <td class="text-<?php if($question['answer'] == "a") echo "success"; ?>" ><?php echo $question['option_1']; ?></td>
                              </tr>
                              <tr>
                                    <td>
                                          <span style="margin-left:20px">
                                                <?php if($mcq_exam_detail[$key]['student_answer'] == 'b' && $mcq_exam_detail[$key]['questions_answer'] == 'b') echo $right; else if($mcq_exam_detail[$key]['student_answer'] != 'not_set' && $mcq_exam_detail[$key]['questions_answer'] != 'b' && $mcq_exam_detail[$key]['student_answer'] == 'b') echo $wrong; ?>
                                          </span>  
                                    </td>
                                    <td> B. </td>
                                    <td class="text-<?php if($question['answer'] == "b") echo "success"; ?>" ><?php echo $question['option_2']; ?></td>
                              </tr>
                              <tr>
                                    <td>
                                          <span style="margin-left:20px">
                                                <?php if($mcq_exam_detail[$key]['student_answer'] == 'c' && $mcq_exam_detail[$key]['questions_answer'] == 'c') echo $right; else if($mcq_exam_detail[$key]['student_answer'] != 'not_set' && $mcq_exam_detail[$key]['questions_answer'] != 'c' && $mcq_exam_detail[$key]['student_answer'] == 'c') echo $wrong; ?>
                                          </span>  
                                    </td>
                                    <td> C. </td>
                                    <td class="text-<?php if($question['answer'] == "c") echo "success"; ?>" ><?php echo $question['option_3']; ?></td>
                              </tr>
                              <tr>
                                    <td>
                                          <span style="margin-left:20px">
                                                <?php if($mcq_exam_detail[$key]['student_answer'] == 'd' && $mcq_exam_detail[$key]['questions_answer'] == 'd') echo $right; else if($mcq_exam_detail[$key]['student_answer'] != 'not_set' && $mcq_exam_detail[$key]['questions_answer'] != 'd' && $mcq_exam_detail[$key]['student_answer'] == 'd') echo $wrong; ?>
                                          </span>  
                                    </td>
                                    <td> D. </td>
                                    <td class="text-<?php if($question['answer'] == "d") echo "success"; ?>" ><?php echo $question['option_4']; ?></td>
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