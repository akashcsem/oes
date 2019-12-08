<?php
      session_start();
      include '../../pdo_connect.php';

      if (isset($_GET['exam_id'])) {
            $exam_id      = $_GET['exam_id'];
            $subject_name = $_GET['subject_name'];

            $sql          = "SELECT * FROM `exams` WHERE `id` = '$exam_id'";
            $exam         = $conn->query($sql)->fetch();

            $sql          = "SELECT * FROM `mcq_question` WHERE exam_id = $exam_id";
            $questions    = $conn->query($sql)->fetchAll();
      }
?>



<!DOCTYPE html>
<html lang="en" style="background:url(../../img/tech.jpg);
background-attachment: fixed; background-size: cover;
">

<head>
  <?php include 'partials/styles.php'; ?>
  <title>MCQ Test</title>

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
          <h3 class="font-weight-bold text-center mt-3">MCQ TEST -- ON -- "<span style="text-transform:uppercase"><?php echo $subject_name; ?></span>"</h3>
          <h5 style="margin-top: -10px" class="text-center">about</h5>
          <h4 style="margin-top: -10px; color:white" class="text-center"><?php echo $exam['title']; ?></h4>
          <!-- <span>Start at: </span> <span>Time left: </span> -->
          <!-- <div id="MyClockDisplay" class="clock text-center mt-0" onload="showTime()"></div> -->
          <div class="row">
            <form action="exam_test/mcq_test_submit.php" method="POST" style="width:100%;">
              <div class="col-md-9 mx-auto p-3 pl-5 bg-light clearfix">
                <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
                <?php foreach ($questions as $key => $question) { ?>
                    <div class="my-3">
                        <h4 class="d-block"><?php echo $key+1 . ' ' . $question['question']; ?></h4>

                        <input type="hidden" class="input_answer" name="ans[]" value="not_set">

                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input option" name="radio<?php echo $key; ?>" value="a"><?php echo $question['option_1']; ?>
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input option" name="radio<?php echo $key; ?>" value="b"><?php echo $question['option_2']; ?>
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input option" name="radio<?php echo $key; ?>" value="c"><?php echo $question['option_3']; ?>
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input option" name="radio<?php echo $key; ?>" value="d"><?php echo $question['option_4']; ?>
                          </label>
                        </div>
                  </div>
                <?php } ?>

                <div>
                  <input class="btn btn-sm btn-outline-primary float-right" name="submit_mcq" type="submit" value="Submit">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>
  $(document).ready(function(){
    $(".option").click(function(){
      var ans = $(this).val();
      $(this).parent().parent().parent().find('.input_answer').val(ans);
      console.log($(this).parent().parent().parent().find('.input_answer').val());
    });
  });
</script>
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
      // document.getElementById("MyClockDisplay").innerText = time;
      // document.getElementById("MyClockDisplay").textContent = time;

      setTimeout(showTime, 1000);

    }

    showTime();
  </script>
</body>

</html>