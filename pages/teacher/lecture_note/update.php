

<?php
      include '../../../pdo_connect.php';
      if (isset($_POST['update_lecture_note'])) {
      
            $id         = $_POST['id'];
            $title      = $_POST['title'];
            $subject_id = $_POST['subject_id'];

            $sql  = "UPDATE `lecture_notes` SET `title` = '$title', `subject_id` = '$subject_id' WHERE `lecture_notes`.`id` = $id";

            try {
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();

                  $old_file  = $_POST['old_file'];
                  $file_name = basename($_FILES['file_name']['name']);
                  
                  if ($file_name != NULL && $old_file != $file_name && $old_file != null) {
                        unlink('../../../all_file/'.$old_file);
                  }

                  // image upload process
                  $target_dir  = "../../../all_file/";
                  $target_file = basename($_FILES["file_name"]["name"]);

                  if (move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_dir.$target_file)) {
                        $sql  = "UPDATE `lecture_notes` SET `file_name` = '$target_file' WHERE `lecture_notes`.`id` = $id";
                        
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                  }
                  
                  header("Location: ../lecture_notes.php");
            } catch (PDOException $e) {
                  echo 
                  '<div class="row">
                  <div class="container">
                        <h3 class="text-center text-danger"> Some error</h3>
                  </div>
                  </div>';
                  header("Location: ../lecture_notes.php");
            }
      }
?>