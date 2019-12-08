

<?php
session_start();
include '../../pdo_connect.php';

      if (isset($_GET['exam_detail_id'])) {  

            $exam_detail_id = $_GET['exam_detail_id'];
            $student_id     = $_GET['student_id'];
            // get all exam list 
            $sql   = "SELECT exams.* FROM exam_details INNER JOIN exams ON exams.id=exam_details.exam_id WHERE exam_details.id = $exam_detail_id";
            $selected_exam = $conn->query($sql)->fetch();

            $exam_id = $selected_exam['id'];
             $sql   = "SELECT exams.*, exam_details.total_mark, exam_details.total_submit, subjects.name as 'subject_name', teachers.firstname as 'firstname', teachers.lastname as 'lastname'  FROM `exams` INNER JOIN subjects ON exams.subject_id=subjects.id INNER JOIN teachers ON exams.teacher_id=teachers.id INNER JOIN exam_details ON exams.id=exam_details.exam_id WHERE exams.id = $exam_id ORDER BY total_participant DESC, `id` DESC";
             
             $exam_details = $conn->query($sql)->fetch();
   
             $sql    = "SELECT * FROM students WHERE id = $student_id";
            $student = $conn->query($sql)->fetch();

            
            $sql              = "SELECT short_exam_details.*, short_question.question, short_question.preferable_answer, short_question.mark FROM `short_exam_details` INNER JOIN short_question ON short_question.id = short_exam_details.question_id WHERE short_exam_details.exam_id = $exam_id AND student_id = $student_id";
            $short_exam_detail  = $conn->query($sql)->fetchAll();

?>



<!DOCTYPE html>
<html lang="en">
  <heac>
    <?php include 'partials/styles.php'; ?>
    <title>Edit Short Exam Check</title>
  </head>

<body>

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>

       <!-- main content -->

       <div class="container pt-2">
        <!-- exam section -->
        <h2 style="width:100%" class="text-center text-light bg-secondary">Edit Short Exam Check</h2>
        <div class="row mx-0 px-5 bg-light py-2" style="border-bottom:7px solid #007ACC">
                  
          <div class="col-md-6">
            <table>
              <tr>
                <td class="text-info">Title</td>
                <td style="width:20px"> : </td>
                <td class="text-info"><?php echo $exam_details['title']; ?></td>
              </tr>
              <tr>
                <td>Subject</td>
                <td> : </td>
                <td><?php echo $exam_details['subject_name']; ?></td>
              </tr>
              <tr>
                <td>Participant </td>
                <td> : </td>
                <td><?php echo $student['firstname'] . ' ' . $student['lastname']; ?></td>
              </tr>
            </table>
          </div>

          <div class="col-md-6">
            <table>
              <tr>
              <tr>
                <td>Total Question</td>
                <td style="width:20px"> : </td>
                <td class="font-weight-bold"><?php echo $exam_details['total_qns']; ?></td>
              </tr>
              <tr>
                <td>Total Mark</td>
                <td style="width:20px"> : </td>
                <td class="font-weight-bold"><?php echo $exam_details['total_mark']; ?></td>
              </tr>
              <tr>
                <td>Total Answered</td>
                <td style="width:20px"> : </td>
                <td class="font-weight-bold"><?php echo $exam_details['total_submit']; ?></td>
              </tr>
              
            </table>
          </div>

          <?php include 'inc/flash_message.php';?>
        
        </div>
      

        <div class="row mx-0 px-0 py-2">
        <form class="w-100" action="question/update_check_short_question_submit.php" method="POST">
            
            <!-- hidden fields -->
            <input type="hidden" name="exam_detail_id" value="<?php echo $exam_detail_id; ?>">
            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
            <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">

            <?php foreach ($short_exam_detail as $key => $question) { ?>
                <div class="col-12 pl-5">
                  <p style="font-weight:bold">
                    <span>
                        <?php echo $key+1 . '. '; ?>
                    </span>
                    <span class="text-primary">
                        <?php echo $question['question']; ?>
                    </span>
                  </p>

                  <input type="hidden" name="marks[<?php echo $key; ?>]" value="<?php echo $question['mark']; ?>">
                  <input type="hidden" name="exams_id[<?php echo $key; ?>]" value="<?php echo $question['id']; ?>">

                  <p style="margin-left:20px; margin-top: -12px; color:darkgrey">
                        <b>Preferable Answer:</b> <?php echo $question['preferable_answer']; ?>
                  </p>
                  
                  <p class="text-success" style="margin-left:20px; margin-top: -12px">
                        <b>Students Answer:</b> <?php echo $question['answer']; ?>
                  </p>
                  
                  <p style="margin-left:20px; margin-top: -12px">
                        <b>Mark:</b> <?php echo $question['mark']; ?>

                        <input style="font-size:12px; border:1px solid black" placeholder="Give mark" max="<?php echo $question['mark']; ?>" type="number" name="achieve_marks[<?php echo $key; ?>]" value="<?php echo $question['achieve_mark']; ?>">
                  </p>

                </div> 
            <?php } ?>
            
            <div>
                  <input type="submit" class="btn btn-sm btn-outline-primary float-left" name="check_submit_short_question" value="Update">
            </div>
      </form>
        </div>
        
        


</div>

</body>
</html>



<!-- if exam id not set redirect to exams page -->
      <?php } else {
            header('Location: exams.php');
      }
?>