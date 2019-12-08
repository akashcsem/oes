<?php
session_start();
include '../../pdo_connect.php';

if (isset($_GET['teacher_id'])) {
    $teacher_id = $_GET['teacher_id'];

    $sql = "SELECT lecture_notes.*, subjects.name AS sub, teachers.firstname AS firstname, teachers.lastname AS lastname FROM `lecture_notes` LEFT JOIN teachers ON lecture_notes.uploader_id = teachers.id LEFT JOIN subjects ON subjects.id = lecture_notes.subject_id WHERE lecture_notes.uploader_id = $teacher_id";
    $notes = $conn->query($sql)->fetchAll();
}

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
                    <div class="row my-3">
                        <div class="col-12 mx-auto p-3">
                            <h3 class=" text-center text-white ">Lecture Note</h3>
                        </div>
                    </div>



                    <!--  Select Subject -->
                    <!-- <div class="col-12 text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Subject
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">C</a>
                                <a class="dropdown-item" href="#">C++</a>
                                <a class="dropdown-item" href="#">Jva</a>
                                <a class="dropdown-item" href="#">Javascript</a>
                                <a class="dropdown-item" href="#">Php</a>
                            </div>
                        </div>
                    </div> -->

                    <!-- Subject Topics -->

                    <div class="col-10 mx-auto my-5">
                        <table class="table table-sm bg-info text-light">
                            <tr>
                                <th class="pl-5">Title</th>
                                <th class="pl-5">Subject </th>
                                <th class="pl-5">Uploade By </th>
                                <th>
                                    <span class="float-right pr-5">Action</span>
                                </th>
                            </tr>
                            <?php
                            $count = 1;
                            foreach ($notes as $note) { ?>
                                <tr>
                                    <td class="pl-5"><?php echo $note['title']; ?> </td>
                                    <td class="pl-5"><?php echo $note['sub']; ?> </td>
                                    <td class="pl-5"><?php echo $note['firstname'] . " " . $note['lastname']; ?> </td>
                                    <td><a href="../../all_file/<?php echo $note['file_name']; ?>" target="__blank" class="float-right pr-5" download>Download</a></td>
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