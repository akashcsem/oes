

<?php
session_start();
include '../../pdo_connect.php';

      if (isset($_GET['exam_id'])) {  
            include('question/get_exam_details.php');
            $exam_id    = $_GET['exam_id'];
            $user_id    = $_SESSION['userid'];
            $teacher_id = $exam['teacher_id'];

            $exam_type  = $exam['exam_type'];
            if ($exam_type == 'MCQ') {
                $sql    = "SELECT * FROM `mcq_question` WHERE `exam_id` = $exam_id";
            } else {
                $sql    = "SELECT * FROM `short_question` WHERE `exam_id` = $exam_id";
            }
            
            $questions  = $conn->query($sql)->fetchAll();
            
?>



<!DOCTYPE html>
<html lang="en">
  <heac>
    <?php include 'partials/styles.php'; ?>
    <title>Set Question</title>
  </head>

<body>

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>

       <!-- main content -->

       <div class="container mt-3 pt-2">
        <!-- exam section -->
        
        <div class="row mx-0 px-5 bg-light py-2" style="border-bottom:7px solid #007ACC">
          <div class="col-md-6">
            <table>
              <tr>
                <td class="text-info">Title</td>
                <td style="width:20px"> : </td>
                <td class="text-info"><?php echo $exam['title']; ?></td>
              </tr>
              <tr>
                <td>Subject</td>
                <td> : </td>
                <td><?php echo $exam['subject_name']; ?></td>
              </tr>
              <tr>
                <td>Exam Type </td>
                <td> : </td>
                <td><?php echo $exam['exam_type']; ?></td>
              </tr>
              <tr>
                <td>Created By </td>
                <td> : </td>
                <td><?php echo $exam['firstname'] . $exam['lastname']; ?></td>
              </tr>
            </table>
          </div>

          <div class="col-md-6">
            <table>
              <tr>
                <td>Duration</td>
                <td> : </td>
                <td><?php echo $exam['hour'] . ' hr - ' . $exam['minute'] . ' min'; ?></td>
              </tr>
              <tr>
              <tr>
                <td>Total Question</td>
                <td style="width:20px"> : </td>
                <td class="font-weight-bold"><?php echo $exam['total_qns']; ?></td>
              </tr>
                <td>Created Question</td>
                <td> : </td>
                <td><?php echo $exam['created_qns']; ?></td>
              </tr>
              <tr>
                <td>Status </td>
                <td> : </td>
                <td class="text-<?php if ($exam['status']) echo 'success'; else echo 'danger'; ?>">
                  <?php if ($exam['status']) echo 'Published'; else echo 'Unpublished'; ?>
                </td>
              </tr>
            </table>
          </div>

          <?php include 'inc/flash_message.php';?>
        
        </div>
      

        <div class="row mx-0 px-0 bg-light py-2">
        <?php if ($exam_type == 'MCQ') { ?>
            <?php foreach ($questions as $key => $question) { ?>
                  <div class="col-12 pl-5">
                        <p style="font-weight:bold"><span><?php echo $key+1 . '. '; ?></span><?php echo htmlspecialchars($question['question']); ?></p>
                        
                        <p style="margin-left:20px; margin-top: -12px"> <span <?php if($question['answer'] == 'a') { echo 'class="p-1 bg-success"'; } ?>>A.</span> <?php echo htmlspecialchars($question['option_1']); ?></p>

                        <p style="margin-left:20px; margin-top: -12px"> <span <?php if($question['answer'] == 'b') { echo 'class="p-1 bg-success"'; } ?>>B.</span> <?php echo htmlspecialchars($question['option_2']); ?></p>

                        <p style="margin-left:20px; margin-top: -12px"> <span <?php if($question['answer'] == 'c') { echo 'class="p-1 bg-success"'; } ?>>C.</span> <?php echo htmlspecialchars($question['option_3']); ?></p>

                        <p style="margin-left:20px; margin-top: -12px"> <span <?php if($question['answer'] == 'd') { echo 'class="p-1 bg-success"'; } ?>>D.</span> <?php echo htmlspecialchars($question['option_4']); ?></p>

                        <p <?php if($user_id != $teacher_id) echo "hidden"; ?>>
                              <span><a class="btn btn-sm btn-outline-info px-3 py-0" href="mcq_question_edit.php?exam_id=<?php echo $exam_id; ?>&&question_id=<?php echo $question['id']; ?>">Edit</a></span>

                              <span><a class="btn btn-sm btn-outline-danger px-3 py-0" href="question/delete_mcq_question.php?exam_id=<?php echo $exam_id; ?>&&question_id_delete=<?php echo $question['id']; ?>">Delete</a></span>
                        </p>
                  </div> 
            <?php } 
            
          } else { 
              foreach ($questions as $key => $question) { ?>
                <div class="col-12 pl-5">
                  <p style="font-weight:bold">
                    <span>
                        <?php echo $key+1 . '. '; ?>
                    </span>
                    <span class="text-primary">
                        <?php echo htmlspecialchars($question['question']); ?> 
                    </span>
                  </p>

                  <p style="margin-left:20px; margin-top: -12px"><b>Preferable Answer:</b> <?php echo htmlspecialchars($question['preferable_answer']); ?></p>
                  <p style="margin-left:20px; margin-top: -12px"><b>Mark:</b> <?php echo $question['mark']; ?></p>

                  <p <?php if($user_id != $teacher_id) echo "hidden"; ?>>
                        <span>
                          <a class="btn btn-sm btn-outline-info px-3 py-0" href="short_question_edit.php?exam_id=<?php echo $exam_id; ?>&&question_id=<?php echo $question['id']; ?>">Edit</a>
                        </span>

                        <span><a class="btn btn-sm btn-outline-danger px-3 py-0" href="question/delete_short_question.php?exam_id=<?php echo $exam_id; ?>&&question_id_delete=<?php echo $question['id']; ?>">Delete</a></span>
                  </p>
                </div> 
            <?php } 
          } ?>
        </div>
        
        


</div>

</body>
</html>



<!-- if exam id not set redirect to exams page -->
<?php } else {
            header('Location: exams.php');
      }
?>