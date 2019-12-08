<?php


session_start();
      include '../../pdo_connect.php';


      $sql   = "SELECT exams.*, subjects.name AS subject_name, teachers.firstname AS firstname, teachers.lastname AS lastname FROM `exams` LEFT JOIN subjects ON exams.subject_id = subjects.id LEFT JOIN teachers ON exams.teacher_id = teachers.id";
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
     
?>

<!DOCTYPE html>
<html lang="en" >

      <head>
            <?php include 'partials/styles.php'; ?>
            <title>Exams</title>
      </head>

      <body>

            <div class="page-content">
                  <!-- navbar -->
                  <div class="main">
                        <?php include 'partials/navbar.php'; ?>
                  </div>

                  <!-- main content -->
                  <div class="main-content mb-5 mx-0 px-0 row">
      
                        <div class="col-12 mx-auto my-3">
                              <table class="table table-sm">
                                    <tr class="bg-info text-light">
                                          <th class="pl-5">#</th>
                                          <th class="pl-5">Title</th>
                                          <th class="pl-5">Type</th>
                                          <th class="pl-5">Subject </th>
                                          <th class="pl-5">Create By </th>
                                          <th> <span class="float-right pr-5">Action</span> </th>
                                    </tr>

                                    <?php
                                    $count = 1;
                                    foreach ($exams as $key => $exam) {
                                          if ($count % 2) {
                                                $color = "#B8DBFD";
                                          } else {
                                                $color = "#85C1E9";
                                          }
                                    ?>
                                    
                                    <tr style="background: <?php echo $color; ?>">
                                          <td class="pl-5"><?php echo $count++; ?> </td>
                                          <td class="pl-5"><?php echo $exam['title']; ?> </td>
                                          <td class="pl-5"><?php echo $exam['exam_type']; ?> </td>
                                          <td class="pl-5"><?php echo $exam['subject_name']; ?> </td>
                                          <td class="pl-5"><?php echo $exam['firstname'] . " " . $exam['lastname']; ?> </td>
                                          <td style="width:210px" class="text-center">
                                                <?php 
                                                 if ($is_participate[$key] == 1) {
                                                      if ($exam['exam_type'] == 'MCQ') {
                                                            $url = "mcq_exam_detail_view.php?exam_id=".$exam['id']."&&student_id=".$student_id;
                                                      } else {
                                                            $url = "short_exam_detail_view.php?exam_id=".$exam['id']."&&student_id=".$student_id;
                                                      } ?>
                                                      <a href="<?php echo $url; ?>" target="__blank" style="text-decoration:none; color:blue" class="badge badge-pill badge-light"> View </a>
                                                <?php } else {
                                                      $subject_name = $exam['subject_name'];
                                                      if ($exam['exam_type'] == 'MCQ') {
                                                            $url = "mcq_test.php?exam_id=".$exam['id']."&&subject_name=".$subject_name;
                                                      } else {
                                                            $url = "short_question.php?exam_id=".$exam['id']."&&subject_name=".$subject_name;
                                                      } ?>
                                                      <a href="<?php echo $url; ?>" target="__blank" style="text-decoration:none; color:white" class="badge badge-pill badge-success"> Start </a>
                                                <?php } ?>
                                                
                                          </td>
                                    </tr>
                                    <?php } ?>

                              </table>
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