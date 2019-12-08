<?php 

      session_start();
      include '../../../pdo_connect.php';

      if (isset($_POST['submit_short_question'])) {
            
            $exam_id      = $_POST['exam_id'];
            $student_id   = $_SESSION['ssn_student_id'];  


            $exam_query   = "SELECT * FROM `exams` WHERE id = $exam_id";
            $exam         = $conn->query($exam_query)->fetch();

            $teacher_id   = $exam['teacher_id'];
            
            

            $total_question = count($_POST['answers']);
            $total_submit   = 0;
            $total_unsubmit = 0;
            $total_mark     = 0;

            

            try {
                  // put every answer to short_exam_details table
                  $marks        = $_POST['marks'];
                  $questions_id = $_POST['questions_id'];
                  foreach ($_POST['answers'] as $key => $answer) {
      
                        $mark        = $marks[$key];
                        $question_id = $questions_id[$key];

                        $short_exam_query = "INSERT INTO `short_exam_details` (`student_id`, `exam_id`, `question_id`, `answer`, `question_mark`) VALUES ('$student_id', '$exam_id', '$question_id', '$answer', '$mark')";
      
                        $stmt_short_exam_query = $conn->prepare($short_exam_query);
                        $stmt_short_exam_query->execute();
      
                        $total_mark += $mark;
                        if ($answer == '') {
                              $total_unsubmit++;
                        } else {
                              $total_submit++;
                        }
                  }


                  // calculate exam detail and put data to exam details table
                  $exam_details_query = "INSERT INTO `exam_details` (`exam_id`, `teacher_id`, `student_id`, `total_question`, `total_submit`, `total_unsubmit`, `total_correct`, `total_wrong`, `total_mark`) VALUES ('$exam_id', '$teacher_id', '$student_id', '$total_question', '$total_submit', '$total_unsubmit', NULL, NULL, '$total_mark')";

                  $stmt_exam_details_query = $conn->prepare($exam_details_query);
                  $stmt_exam_details_query->execute();

                  
                  // increment total participant into exams table
                  $update_total_participant_query = "UPDATE `exams` SET `total_participant` = `total_participant` + '1' WHERE `exams`.`id` = $exam_id";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();

                  
                  // update total participant
                  $update_result_query = "UPDATE `exams` SET `total_participant` = `total_participant` + '1' WHERE `exams`.`id` = $exam_id";
                  $stmt = $conn->prepare($update_result_query);
                  $stmt->execute();

                  header("Location: ../short_exam_detail_view.php?exam_id=$exam_id&&student_id=$student_id&&is_checked=0");
            } catch(Exception $ex) {
                  header("Location: ../mcq_test.php");
            }
            
            
      }

?>

