
<?php 
// get exam id from get that pass exams page
$exam_id = $_GET['exam_id'];
// get all exam list 
$sql   = "SELECT exams.*, subjects.name as 'subject_name', teachers.firstname as 'firstname', teachers.lastname as 'lastname'  FROM `exams` INNER JOIN subjects ON exams.subject_id=subjects.id INNER JOIN teachers ON exams.teacher_id=teachers.id WHERE exams.id = $exam_id ORDER BY total_participant DESC, `id` DESC LIMIT 50";
$exam = $conn->query($sql)->fetch();

?>