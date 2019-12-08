<?php
      session_start();
      include '../../pdo_connect.php';

      if (isset($_GET['exam_id'])) {
            $exam_id      = $_GET['exam_id'];
            $subject_name = $_GET['subject_name'];

            $sql          = "SELECT * FROM `exams` WHERE `id` = '$exam_id'";
            $exam         = $conn->query($sql)->fetch();

            $sql          = "SELECT * FROM `short_question` WHERE exam_id = $exam_id";
            $questions    = $conn->query($sql)->fetchAll();
      }
?>


<!DOCTYPE html>
<html lang="en" style="background:url(../../img/tech.jpg);
background-attachment: fixed; background-size: cover;
">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>Short Question Test</title>

  <style>
    .clock {
      color: #17D4FE;
      font-size: 40px;
      font-family: Orbitron;
      letter-spacing: 1px;
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
          <h3 class="font-weight-bold text-center mt-3">SHORT QUESTION TEST -- ON -- "<span style="text-transform:uppercase"><?php echo $subject_name; ?></span>"</h3>
          <!-- <span>Start at: </span> <span>Time left: </span> -->
          <!-- <div id="MyClockDisplay" class="clock text-center mt-0" onload="showTime()"></div> -->
          
          
          
          <div class="row">
            <form class="w-100" action="exam_test/short_question_submit.php" method="POST">
              <div class="col-md-9 mx-auto p-3 bg-light clearfix">
                <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
              <?php foreach ($questions as $key => $question) { ?>
                <div class="my-3">
                  <input type="hidden" name="questions_id[<?php echo $key; ?>]" value="<?php echo $question['id']; ?>">
                  <h5 class="d-block"><?php echo $key+1 . ' ' . $question['question']; ?><span class="float-right"><?php echo $question['mark']; ?></span></h5>
                  <div class="form-group">
                    <input type="hidden" name="marks[<?php echo $key; ?>]" value="<?php echo $question['mark']; ?>">
                    <textarea class="form-control" name="answers[<?php echo $key; ?>]" rows="3"></textarea>
                  </div>
                </div>
                <?php } ?>
                <div>
                  <input type="submit" class="btn btn-sm btn-outline-primary float-right" name="submit_short_question" value="Submit">
                </div>
              </div>
            </form>
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

  <script>
    function showTime() {
      var date = new Date();
      var h = date.getHours(); // 0 - 23
      var m = date.getMinutes(); // 0 - 59
      var s = date.getSeconds(); // 0 - 59
      var session = "AM";

      if (h == 0) {
        h = 12;
      }

      if (h > 12) {
        h = h - 12;
        session = "PM";
      }

      h = (h < 10) ? "0" + h : h;
      m = (m < 10) ? "0" + m : m;
      s = (s < 10) ? "0" + s : s;

      var time = h + ":" + m + ":" + s + " " + session;
      document.getElementById("MyClockDisplay").innerText = time;
      document.getElementById("MyClockDisplay").textContent = time;

      setTimeout(showTime, 1000);

    }

    showTime();
  </script>
</body>

</html>