<?php
session_start();
include '../../pdo_connect.php';

$sql = "SELECT lecture_notes.*, teachers.firstname AS firstname, subjects.name AS sub, teachers.lastname AS lastname FROM `lecture_notes` LEFT JOIN teachers ON lecture_notes.uploader_id = teachers.id LEFT JOIN subjects ON subjects.id = lecture_notes.subject_id";

if (isset($_GET['selected_subject'])) {
    $subject_id = $_GET['selected_subject'];
    if ($subject_id != "all") {
      $sql .= " WHERE lecture_notes.subject_id = " . $subject_id;
    }
}
$notes = $conn->query($sql)->fetchAll();

$sql = "SELECT * FROM `subjects`";
$subjects = $conn->query($sql)->fetchAll();
?>


<!DOCTYPE html>
<html lang="en" style="background:url(../../img/tech.jpg);
background-attachment: fixed; background-size: cover;
">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Lecture Notes</title>

  <style>
    table a {
      color: white;
    }

    table a:hover {
      color: black;
      text-decoration: none;
    }
  </style>
</head>

<body>

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>

    <!-- main content -->
    <div class="main-content  mb-5 mx-0 px-0 row">

      <!-- feedback -->
      <div class="col-12">
        <div class="container">

          <!-- <div>
            <h3 text-center>Lecture Note</h3>
          </div> -->
          <div class="row mt-3">
            <div class="col-12 mx-auto">
              <h3 class=" text-center text-white ">Lecture Note</h3>
            </div>
          </div>



          <!--  Select Subject -->
          <div class="col-12 text-center" style="padding-top:0px !important">
            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select Subject
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="lecture_notes.php?selected_subject=all">All Subjects</a>
                <?php
                foreach ($subjects as $subject) { ?>
                  <a class="dropdown-item" href="lecture_notes.php?selected_subject=<?php echo $subject['id']; ?>"><?php echo $subject['name']; ?></a>
                <?php } ?>
              </div>
            </div>
          </div>

          <!-- Subject Topics -->

          <div class="col-12 mx-auto my-3">
            <table class="table table-sm">
              <tr class="bg-info text-light">
                <th class="pl-5">#</th>
                <th class="pl-5">Title</th>
                <th class="pl-5">Subject </th>
                <th class="pl-5">Uploade By </th>
                <th>
                  <span class="float-right pr-5">Action</span>
                </th>
              </tr>
              <?php
              $count = 1;
              foreach ($notes as $note) {
                if ($count % 2) {
                  $color = "#B8DBFD";
                } else {
                  $color = "#85C1E9";
                }
                ?>
                <tr style="background: <?php echo $color; ?>">
                  <td class="pl-5"><?php echo $count++; ?> </td>
                  <td class="pl-5"><?php echo $note['title']; ?> </td>
                  <td class="pl-5"><?php echo $note['sub']; ?> </td>
                  <td class="pl-5"><?php echo $note['firstname'] . " " . $note['lastname']; ?> </td>
                  <td style="width:210px">
                    <a href="../../all_file/<?php echo $note['file_name']; ?>" target="__blank" style="text-decoration:none; color:blue" class="float-right pr-5" download>Download</a>  
                    <a href="../../all_file/<?php echo $note['file_name']; ?>" target="__blank" style="text-decoration:none; color:blue" class="float-right pr-5">View</a>
                  </td>
                </tr>
              <?php } ?>

            </table>
          </div>

        </div>




      </div>
    </div>


  </div>

  <!-- footer -->
  <div class="footer bg-dark p-0 m-0">
    <?php include 'partials/footer.php'; ?>
  </div>
  </div>

  <!-- scripts -->
  <?php include 'partials/js.php'; ?>
</body>

</html>