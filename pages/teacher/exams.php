<?php
session_start();
// include dabatase connection
include '../../pdo_connect.php';
// include file for delete exam
include 'new_exam/delete_exam.php';
// get teacher id by session
$id = $_SESSION['userid'];

// get all exam list 
$sql   = "SELECT exams.*, subjects.name as 'subject_name', teachers.firstname as 'firstname', teachers.lastname as 'lastname'  FROM `exams` INNER JOIN subjects ON exams.subject_id=subjects.id INNER JOIN teachers ON exams.teacher_id=teachers.id ORDER BY total_participant DESC, `id` DESC LIMIT 50";
$exams = $conn->query($sql)->fetchAll();

?>






<!DOCTYPE html>
<html lang="en" style="background:url(../../img/tech.jpg);
background-attachment: fixed; background-size: cover;
">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Create Exam Paper</title>
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
                <a href="new_exam.php" class="btn btn-sm btn-primary mb-2">Create New Exam</a>
                <table class="table table-hover table-light table-striped table-bordered">
                  <tr class="bg-info text-light">
                    <th>#</th>
                    <th>Exam Title</th>
                    <th>Subject</th>
                    <th class="text-center">Created By</th>
                    <th>Exam Type</th>
                    <th>Duration</th>
                    <th title="Total Question">Question</th>
                    <th title="Total Participant">Participant</th>
                    <th class="text-center">Action</th>
                  </tr>

                  <?php 
                  foreach ($exams as $key => $exam) { ?>
                    <tr>
                      <td><?php echo $key+1; ?></td>
                      <td><?php echo $exam['title']; ?></td>
                      <td><?php echo $exam['subject_name']; ?></td>
                      <td><?php echo $exam['firstname'] . ' ' . $exam['lastname']; ?></td>
                      <?php if($exam['exam_type'] == "MCQ" ) { $badge = "badge badge-success"; } else { $badge = "badge badge-warning"; } ?>
                      <td class="text-center"><span class="<?php echo $badge; ?>"><?php echo $exam['exam_type']; ?></span></td>
                      <td><?php echo $exam['hour'] . ' hr -' . $exam['minute'] . ' min'; ?></td>
                      <td class="text-center"><span class="badge badge-primary"><?php echo $exam['total_qns']; ?></span></td>
                      <td class="text-center"><span class="badge badge-dark"><?php echo $exam['total_participant']; ?></span></td>
                      
                      <!-- action button -->
                      <td style="width:170px">
                        <!-- action button will be appear if the teacher create this exam -->
                        <a href="view_questions.php?exam_id=<?php echo $exam['id']; ?>&&teacher_id=<?php echo $exam['teacher_id']; ?>" title="View All Question"><i class="fa fa-file-o mx-1" style="font-size:15px;color:blue !important"></i></a>

                        <?php if ($exam['teacher_id'] == $_SESSION['userid']) {?>
                            <?php if ($exam['status'] == 0) { ?>
                              <a href="new_exam/exam_publish.php?exam_id=<?php echo $exam['id']; ?>" title="Publish"><i class="fa fa-check mx-1" style="font-size:15px;color:#17A2B8 !important"></i></a>
                            <?php } ?>

                            
                            <a href="create_question.php?exam_id=<?php echo $exam['id']; ?>" title="Create New Question"><i class="fa fa-plus mx-1" style="font-size:15px;color:green !important"></i></a>

                            <a href="exam_edit.php?id=<?php echo $exam['id']; ?>" title="Edit Exam"><i class="fa fa-eye-slash mx-1" style="font-size:15px;color:green !important"></i></a>

                            <!-- delete button -->
                            <a title="Delete Exam" href="?exam_id_delete=<?php echo $exam['id']; ?>&type=<?php echo $exam['exam_type']; ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash" style="font-size:15px;color:red !important"></i></a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php } ?>


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