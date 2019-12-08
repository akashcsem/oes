<?php
    $name        = "";
    $message     = "";
    $created_by  = $_SESSION['userid'];

    if (isset($_POST['create'])) {
        $name      = $_POST['name'];
        $code      = $_POST['code'];
        $file_name = basename($_FILES['file_name']['name']);

        if ($file_name == NULL) {
            $sql  = "INSERT INTO `subjects` (`name`, `code`, `created_by`) VALUES ('$name', '$code', '$created_by')";
        } else {
            // image upload process
            $target_dir = "../../img/subjects/";
            $target_file = $target_dir . time() .basename($_FILES["file_name"]["name"]);

            // insert data if image is uploaded
            if (move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO `subjects` (`name`, `code`, `created_by`, `image`) VALUES ('$name', '$code', '$created_by', '$target_file')";
            } 
        }

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            header('Location: subject.php?message=success');
        } catch (PDOException $e) {
            echo "<script>alert('Some Error')</script>";
        }
    }

?>