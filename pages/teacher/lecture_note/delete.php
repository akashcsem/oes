
<?php 
      include '../../../pdo_connect.php';
      
      if (isset($_GET['delete_note_id'])) {
            try {

                  $note_id    = $_GET['delete_note_id'];
                  
                  $sql          = "SELECT * FROM `lecture_notes` WHERE `id` = $note_id";
                  $lecture_note = $conn->query($sql)->fetch();

                  $file_name    = $lecture_note['file_name'];

                  if ($subject_image != 'default.png') {
                        unlink('../../../all_file/'.$file_name);
                  }

                  $sql = "DELETE FROM `lecture_notes` WHERE `id` = $note_id";
                  $conn->query($sql)->execute();
                  header("Location: ../lecture_notes.php");
                        
            } catch (PDOException $ex) {
                  header("Location: ../lecture_notes.php");
            }
      }
?>
