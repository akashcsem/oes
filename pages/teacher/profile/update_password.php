
<?php


// session_start();
// include '../../../pdo_connect.php';

// $userid = $_SESSION['userid'];

function alert ($message) {
      echo "<script type='text/javascript'>alert('$message');</script>";
}
// Update password
if (isset($_POST['change_password'])) {
      $userid             = $_SESSION['userid'];
    
      $old_password       = $_POST['old_password'];
      $new_password       = $_POST['new_password'];
      $confirm_password   = $_POST['confirm_password'];
    
    
      if (empty($new_password) || empty($old_password) || empty($confirm_password)) {
            alert('Fillup all field');
      } else if ($new_password != $confirm_password) {
            alert('Password Does not Match!!');
      } else {
            $sql = "SELECT password FROM `teachers` WHERE `teachers`.`id` = $userid";
            $oldPassword = $conn->query($sql)->fetchAll();
            $getPass = $oldPassword[0]['password'];

            if ($getPass == md5($old_password)) {
                  $newPassword = md5($new_password);
                  $userid      = $_SESSION['userid'];
                  $sql         = "UPDATE `teachers` SET `password` = '$newPassword' WHERE `teachers`.`id` = $userid";
            
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  alert('Password Succefully Changed');
            } else {
                  alert('Old password not match');
            }
      }
}
    