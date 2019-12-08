<?php
session_start();

include '../../pdo_connect.php';

include('question/get_exam_details.php');

?>






<!DOCTYPE html>
<html lang="en">
  <heac>
    <?php include 'partials/styles.php'; ?>
    <title>Set Question</title>
  </head>

<body>

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>


    <!-- main content -->

      <div class="container mt-3 pt-2">
        <!-- exam section -->
        
        <div class="row mx-0 px-0 bg-light py-2">
          <div class="col-md-6">
            <table>
              <tr>
                <td class="text-info">Title</td>
                <td style="width:20px"> : </td>
                <td class="text-info"><?php echo $exam['title']; ?></td>
              </tr>
              <tr>
                <td>Subject</td>
                <td> : </td>
                <td><?php echo $exam['subject_name']; ?></td>
              </tr>
              <tr>
                <td>Exam Type </td>
                <td> : </td>
                <td><?php echo $exam['exam_type']; ?></td>
              </tr>
              <tr>
                <td>Created By </td>
                <td> : </td>
                <td><?php echo $exam['firstname'] . $exam['lastname']; ?></td>
              </tr>
            </table>
          </div>

          <div class="col-md-6">
            <table>
              <tr>
                <td>Duration</td>
                <td> : </td>
                <td><?php echo $exam['hour'] . ' hr - ' . $exam['minute'] . ' min'; ?></td>
              </tr>
              <tr>
              <tr>
                <td>Total Question</td>
                <td style="width:20px"> : </td>
                <td class="font-weight-bold"><?php echo $exam['total_qns']; ?></td>
              </tr>
                <td>Created Question</td>
                <td> : </td>
                <td><?php echo $exam['created_qns']; ?></td>
              </tr>
              <tr>
                <td>Status </td>
                <td> : </td>
                <td class="text-<?php if ($exam['status']) echo 'success'; else echo 'danger'; ?>">
                  <?php if ($exam['status']) echo 'Published'; else echo 'Unpublished'; ?>
                </td>
              </tr>
            </table>
          </div>

          <?php include 'inc/flash_message.php';?>
        
        </div>


        <form style="width:100%" action="question/<?php if ($exam['exam_type'] == 'MCQ') echo 'create_mcq_question'; else echo 'create_short_question'; ?>.php" method="post">

        <!-- question section -->
        <hr>
        <?php if ($exam['total_qns'] == $exam['created_qns']) { ?>

          <div class="row bg-light mx-0 py-3">

            <div class="col-12 text-center">
              <h5>Dear sir, you already added <?php echo $exam['total_qns'];?> questions, if you want to add more question so please increase total question from <b><a href="exam_edit.php?id=<?php echo $exam['id']; ?>">here</a></b></h5>
              <p><h4>or you can view question list from <b><a href="view_questions.php?exam_id=<?php echo $exam['id']; ?>&&teacher_id=<?php echo $exam['teacher_id']; ?>">here</a></b></h4></p>
            </div>
          </div>
        <?php } else {?>
          <div class="row bg-light mx-0 py-3">
          <input type="hidden" name="exam_id" value="<?php echo $exam['id']; ?>">
          <div class="input-group col-12 mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="question">Question</label>
            </div>
            
            <textarea rows="2" class="form-control" name="question" placeholder="Type a question"></textarea>
          </div>

          <?php if ($exam['exam_type'] == 'MCQ') { 
          
            // <!-- mcq question -->
            include 'question/mcq.php';

           } else { 
            // <!-- short question -->
            include 'question/short.php';
           } ?>
        
        </div>
        <?php } ?>

        </form>
      </div>
           


  </div>
  <!-- scripts -->
  <?php include 'partials/js.php'; ?>
  <script type="text/javascript">
    document.getElementById("question_create").onkeypress = function(e) {
    var key = e.charCode || e.keyCode || 0;     
      if (key == 13) {
        e.preventDefault();
      }
    }
    
  </script>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>

</html>