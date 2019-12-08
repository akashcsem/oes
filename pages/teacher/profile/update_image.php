<?php
    session_start();
    $userid = $_SESSION['userid'];
    include '../../../pdo_connect.php';


    if (isset($_POST['update_profile_picture'])) {
        $old_image = $_POST['old_image'];
        $image = basename($_FILES['image']['name']);
        
        if ($image != NULL) {
            // delete old image
            if ($old_image != 'default.png') {
                  unlink('../'.$old_image);
            }

            // image upload process
            $target_dir = "../../img/teachers/";
            $target_file = $target_dir . time() .basename($_FILES["image"]["name"]);

            if (move_uploaded_file($_FILES["image"]["tmp_name"], '../'.$target_file)) {
                  $sql  = "UPDATE `teachers` SET `image` = '$target_file' WHERE `teachers`.`id` = $userid";
                  try {
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        echo "<script>alert('Profile Picture updated Successfull')</script>";
                  } catch (PDOException $e) {
                        echo "<script>alert('Some Error')</script>";
                  }
            } 
        }

        
        header("Location: ../profile.php");
    }

?>