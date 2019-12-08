<?php
// redirect to teacher login
if (!isset($_SESSION['usertype'])) {
    header('location: ../authentication/login.php');
} else {
    if ($_SESSION['usertype'] != 'student') {
        header('location: ../authentication/login.php');
        header('location: ../authentication/login.php');
    }
}
// echo "<script type='text/javascript'>alert('$username');</script>";
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="col-md-10 mx-auto">
        <!-- Brand -->
        <img src="../../img/app_logo.jpg" alt="" width="100px" height="60%" style="float:left; padding:15px;">
        <a href="http://localhost/OES/pages/student/profile.php" style="color:#FFD96A; text-decoration: none;float:right; padding:15px; font-weight:bold"><?php echo $_SESSION['student_name']; ?></a>
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="lecture_notes.php">Lecture Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="subject.php">Subject</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="exams.php">Exams</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="results.php">Result</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="our_teacher.php">Our Teacher</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about_us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact_us.php">Contact Us</a>
            </li>
            <?php if (isset($_SESSION['username'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="../authentication/logout.php">Logout </a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="../authentication/login.php">Login </a>
                </li>
            <?php } ?>


            <!-- Dropdown -->
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Login
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/php-login-demo/admin/admin_register.php">Admin</a>
                    <a class="dropdown-item" href="../../registration.php">Student</a>
                </div>
            </li> -->
        </ul>
    </div>

</nav>