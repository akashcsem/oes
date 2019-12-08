<?php


// connect to the database
include '../../pdo_connect.php';

$title = "";
$file_name = "";
$insert_success = "";

if (isset($_POST['add_note'])) { // if save button on the form is clicked
    // name of the uploaded file

    $title = $_POST['title'];
    $file_name = basename($_FILES['file_name']['name']);

    if ($title == "" || $title == Null) {
        echo "Title can not be empty";
    } else if ($file_name == NULL) {
        echo "You don't upload any file";
    } else {

        // file upload process
        $target_dir = "../../all_file/";
        $target_file = $target_dir . basename($_FILES["file_name"]["name"]);

        if (move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_file)) {
            // insert data if file is uploaded
            $sql = "INSERT INTO `lecture_notes` 
            (`title`, `subject_id`, `uploader_id`, `file_name`) 
            VALUES 
            ('$title', '1', '1', '$file_name')";

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                if ($stmt->rowCount()) {
                    $insert_success = "";

                    $title = "";
                }
            } catch (PDOException $e) {
                echo '<div class="row">
                <div class="container">
                    <h3 class="text-center text-danger"> Some error</h3>
                </div>
            </div>';
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// get data from database
$sql = "SELECT * FROM `lecture_notes` ORDER BY title ASC";
$lectureNotes = $conn->prepare($sql);
$lectureNotes->execute();
$notes = $lectureNotes->fetchAll();
