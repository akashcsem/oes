<?php


// connect to the database
include '../../pdo_connect.php';

$title = "";
$file_name = "";
$insert_success = "";

$id = $_SESSION['userid'];

// if save button on the form is clicked
if (isset($_POST['add_note'])) {
    // name of the uploaded file

    $title = $_POST['title'];
    $subject = $_POST['subject'];
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
            ('$title', '$subject', '$id', '$file_name')";

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


// get all lecturenotes from database
$sql = "SELECT lecture_notes.*, subjects.name as subject FROM `lecture_notes` INNER JOIN teachers ON lecture_notes.uploader_id=teachers.id INNER JOIN subjects ON lecture_notes.subject_id=subjects.id WHERE uploader_id = $id ORDER BY lecture_notes.title ASC";

// get all lecturenotes of selected subject
if ($subject_id != 0) {
    $sql = "SELECT lecture_notes.*, subjects.name as subject FROM `lecture_notes` INNER JOIN teachers ON lecture_notes.uploader_id=teachers.id INNER JOIN subjects ON lecture_notes.subject_id=subjects.id WHERE uploader_id = $id and subject_id = $subject_id ORDER BY lecture_notes.title ASC";
}
$notes = $conn->query($sql)->fetchAll();

// get all subject list for option select
$sql = "SELECT * FROM `subjects`";
$subjects = $conn->query($sql)->fetchAll();
