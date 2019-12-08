

<?php
//     include '../../../pdo_connect.php';
    
    if (isset($_POST['update_exam'])) {
            // get data form exam edit form
            $id               = $_POST['id'];
            $title            = $_POST['title'];
            $subject_id       = $_POST['subject_id'];
            $exam_type        = $_POST['exam_type'];
            $total_qns        = $_POST['total_qns'];
            $hour             = $_POST['hour'];
            $minute           = $_POST['minute'];
        
            // update query
            $sql  = "UPDATE `exams` SET `title` = '$title', `subject_id` = '$subject_id', `exam_type` = '$exam_type', `total_qns` = '$total_qns', `hour` = '$hour', `minute` = '$minute'  WHERE `exams`.`id` = $id";

            // execute query
            try {
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  echo "<script>alert('Exam updated Successfull')</script>";
            } catch (PDOException $e) {
                  echo 
                  '<div class="row">
                  <div class="container">
                        <h3 class="text-center text-danger"> Some error</h3>
                  </div>
                  </div>';
                  echo "<script>alert('Some error, please check')</script>";
            }
    }

?>