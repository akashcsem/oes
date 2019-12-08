


<?php 

session_start();
include '../../../pdo_connect.php';

if (isset($_POST['check_submit_short_question'])) {
      
      
      $achieve_marks  = $_POST['achieve_marks']; 
      $marks          = $_POST['marks']; 
      $exam_id        = $_POST['exam_id']; 
      $exam_detail_id = $_POST['exam_detail_id'];
      $student_id     = $_POST['student_id'];

      try {
            $total_achieve_mark = 0;
            foreach ($_POST['exams_id'] as $key => $exam_question_id) {
                  $echieve_mark  = $achieve_marks[$key] . '<br>';
                  $question_mark = $marks[$key] . '<br>';
      
                  $short_exam_query = "UPDATE `short_exam_details` SET `achieve_mark` = '$echieve_mark', `question_mark` = '$question_mark' WHERE `short_exam_details`.`id` = $exam_question_id";
      
                  if ($echieve_mark != '') {
                        $total_achieve_mark += (float)$echieve_mark;
                  } 
                  $stmt = $conn->prepare($short_exam_query);
                  $stmt->execute();
            }
            $exam_detail_id = $_POST['exam_detail_id'];

            // set exam check on exam detail table
            $sql = "UPDATE `exam_details` SET `achieve_mark` = '$total_achieve_mark', `is_checked` = '1' WHERE `exam_details`.`id` = $exam_detail_id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // get subject_id from exam table
            $sql = "SELECT * FROM exams WHERE id = $exam_id";
            $subject = $conn->query($mcq_questions_query)->fetch();
            $subject_id = $subject['id'];

            // update result
            $date = date("Y-m-d");
            $update_result_query = "INSERT INTO `results` (`exam_id`, `student_id`, `subject_id`, `achieve_mark`, `test_date`) VALUES ('$exam_id', '$student_id', '$subject_id', '$total_achieve_mark', $date)";
            $stmt = $conn->prepare($update_result_query);
            $stmt->execute();

            header("Location: ../short_exams.php");
      } catch (Exception $ex) {
            header("Location: ../check_short_question.php?exam_detail_id=$exam_detail_id&&student_id=$student_id");
      }
}

?>

