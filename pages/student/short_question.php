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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
          
          
          <!-- display time -->
          <div class="clock text-center mt-0 time-left">
              Time left 
              <span class="exam_hour"><?php echo $exam['hour']; ?></span> h : 
              <span class="exam_minute"><?php echo $exam['minute']; ?></span> m : 
              <span class="exam_second">60</span> s
          </div>
          
          
          
          <div class="row">
            <form class="w-100" action="exam_test/short_question_submit.php" method="POST">
              
                <div class="col-md-9 mx-auto p-3 bg-light clearfix ">
                  <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
                <?php foreach ($questions as $key => $question) { ?>
                  <div class="my-3 exam_panel">
                    <input type="hidden" name="questions_id[<?php echo $key; ?>]" value="<?php echo $question['id']; ?>">
                    <h5 class="d-block"><?php echo $key+1 . ' ' . htmlspecialchars($question['question']); ?><span class="float-right"><?php echo $question['mark']; ?></span></h5>
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
    var x = setInterval(function() {

    $(document).ready(function(){
      var exam_hour = parseInt($(".exam_hour").text());
      var exam_minute = parseInt($(".exam_minute").text());
      var exam_second = parseInt($(".exam_second").text());

      
      if (exam_second == 0) {
        if (exam_minute > 0) {
            exam_second = 60;
              exam_minute--;
          }
      }

      if (exam_minute == 0) {
        if (exam_hour > 0) {
            exam_minute = 60;
              exam_hour--;
          }
      }
      
      
    
      // If the count down is over, write some text 
      if (exam_second <= 0) {
          $(".exam_hour").text("Expired");
          $(".exam_panel").hide();
          $(".exam_hour").hide();
          $(".exam_minute").hide();
          $(".exam_second").hide();
          $(".time-left").empty();
          $(".time-left").text("Time over, please submit");
      } else {
          $(".exam_hour").text(exam_hour);
          $(".exam_minute").text(exam_minute);
          exam_second--;
          $(".exam_second").text(exam_second);
          
      }
    });
  }, 100);
</script>
</body>

</html>