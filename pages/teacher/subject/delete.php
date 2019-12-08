
<?php 
        include '../../../pdo_connect.php';
      
        if (isset($_GET['id'])) {
                try {

                        $subject_id    = $_GET['id'];
                        $query = $conn->query("SELECT subjects FROM `subjects` WHERE `id` = $subject_id");
                        
                        $sql      = "SELECT * FROM `subjects` WHERE `id` = $subject_id";
                        $subjects = $conn->query($sql)->fetchAll();
                        $subject_image = $subjects[0]['image'];
                        if ($subject_image != 'default.png') {
                                unlink('../'.$subject_image);
                        }
                        $sql = "DELETE FROM `subjects` WHERE `id` = $subject_id";
                        $conn->query($sql)->execute();
                        header("Location: ../subject.php");
                        
                } catch (PDOException $ex) {
                        header("Location: ../subject.php");
                }
        }

        
?>
