<?php 

      session_start();
      // stablish connection
      include '../../../pdo_connect.php';

      if (isset($_POST['submit_mcq'])) {
            
            $exam_id      = $_POST['exam_id'];
            $student_id   = $_SESSION['ssn_student_id'];

            // fetch all mcq question
            $mcq_questions_query = "SELECT * FROM `mcq_question` WHERE exam_id = $exam_id";
            $questions           = $conn->query($mcq_questions_query)->fetchAll();

            $total_correct   = 0;
            $total_wrong     = 0;
            $unchecked       = 0;
            $total_submit    = 0;
            $total_unsubmit  = 0;
            $total_questions = count($questions);

            

            foreach ($_POST['ans'] as $key => $answer) {
                  $question_id      = $questions[$key]['id'];
                  $questions_answer = $questions[$key]['answer'];

                  if ($answer == "not_set") {
                        $total_unsubmit++;
                  } else {
                        $total_submit++;
                        if ($answer == $questions_answer) {
                              $total_correct++;
                              
                        } else {
                              $total_wrong++;
                        }
                  }
                  // insert current question exam status
                  $mcq_exam_details_query = "INSERT INTO `mcq_exam_details` (`student_id`, `exam_id`, `question_id`, `questions_answer`, `student_answer`) VALUES ('$student_id', '$exam_id', '$question_id', '$questions_answer', '$answer')";

                  $stmt_mcq_exam_details_query = $conn->prepare($mcq_exam_details_query);
                  $stmt_mcq_exam_details_query->execute();
            }

            $performance = ($total_correct * 100) / $total_questions;

            // insert students score
            $exam_details_query = "INSERT INTO `exam_details` (`exam_id`, `student_id`, `total_question`, `total_submit`, `total_unsubmit`, `total_correct`, `total_wrong`, `performance`) VALUES ('$exam_id', '$student_id', '$total_questions', '$total_submit',  '$total_unsubmit', '$total_correct', '$total_wrong', '$performance')";


                  
            try {
                  $stmt_exam_details_query = $conn->prepare($exam_details_query);
                  $stmt_exam_details_query->execute();


                  // get subject_id from exam table
                  $sql = "SELECT * FROM exams WHERE id = $exam_id";
                  $subject = $conn->query($sql)->fetch();
                  $subject_id = $subject['subject_id'];

                  // update result
                  $date = date("Y-m-d");
                  // $update_result_query = "INSERT INTO `results` (`exam_id`, `student_id`, `subject_id`, `achieve_mark`, `test_date`) VALUES ('$exam_id', '$student_id', '$subject_id', '$total_correct', '$date')";
                  $update_result_query = "INSERT INTO `results` (`exam_id`, `student_id`, `subject_id`, `achieve_mark`, `test_date`) VALUES ('$exam_id', '$student_id', '$subject_id', '$total_correct', '$date')";
                  $stmt = $conn->prepare($update_result_query);
                  $stmt->execute();


                  // update total participant
                  $update_result_query = "UPDATE `exams` SET `total_participant` = `total_participant` + '1' WHERE `exams`.`id` = $exam_id";
                  $stmt = $conn->prepare($update_result_query);
                  $stmt->execute();

                  // redirect to exam preview page
                  header("Location: ../mcq_exam_detail_view.php?exam_id=$exam_id&&student_id=$student_id");
            } catch(Exception $ex) {
                  header("Location: ../mcq_test.php");
            }
            
            
      }

?>

