

<?php
    include '../../../pdo_connect.php';
    
    if (isset($_POST['update'])) {
        $id   = $_POST['id'];
        $name = $_POST['name'];
        $code = $_POST['code'];
        $sql  = "UPDATE `subjects` SET `name` = '$name', `code` = '$code' WHERE `subjects`.`id` = $id";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $old_image = $_POST['old_image'];
            $file_name = basename($_FILES['file_name']['name']);
            
            if ($file_name != NULL) {
                if ($old_image != 'default.png') {
                    unlink('../'.$old_image);
                }
                // image upload process
                $target_dir = "../../img/subjects/";
                $target_file = $target_dir . time() .basename($_FILES['file_name']["name"]);
    
                // insert data if image is uploaded
                if (move_uploaded_file($_FILES["file_name"]["tmp_name"], '../'.$target_file)) {
                    $sql  = "UPDATE `subjects` SET `image` = '$target_file' WHERE `subjects`.`id` = $id";
                    
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                } 
            }
            
            header("Location: ../subject.php");
        } catch (PDOException $e) {
            echo 
            '<div class="row">
                <div class="container">
                    <h3 class="text-center text-danger"> Some error</h3>
                </div>
            </div>';
            header("Location: ../subject.php");
        }
    }

?>