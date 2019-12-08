<?php
session_start();

include '../../pdo_connect.php';

include('question/get_exam_details.php');
$question_id = $_GET['question_id'];
$sql         = "SELECT * FROM `mcq_question` WHERE `id` = $question_id";
$question    = $conn->query($sql)->fetch();

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


        <form style="width:100%" id="question_create" action="question/update_mcq_question.php" method="post">

        <!-- question section -->
        <hr>
          <div class="row bg-light mx-0 py-3">


          <div class="row bg-light mx-0 py-3">
          
            <div class="input-group col-12 mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="question">Question</label>
              </div>
              
              <textarea rows="2" class="form-control" name="question" placeholder="Type a question"><?php echo $question['question']; ?></textarea>
            </div>

            <div class="input-group col-md-6 mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text">Option A</span>
              </div>
              <input type="text" name="option_1" value="<?php echo $question['option_1']; ?>" class="form-control form-control-sm" placeholder="Type option 1 text">
            </div>

            <div class="input-group col-md-6 mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text">Option B</span>
              </div>
              <input type="text" value="<?php echo $question['option_2']; ?>" name="option_2" class="form-control form-control-sm" placeholder="Type option 2 text">
            </div>

            <div class="input-group col-md-6 mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text">Option C</span>
              </div>
              <input type="text" value="<?php echo $question['option_3']; ?>" name="option_3" class="form-control form-control-sm" placeholder="Type option 3 text">
            </div>

            <div class="input-group col-md-6 mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text">Option D</span>
              </div>
              <input type="text" value="<?php echo $question['option_4']; ?>" name="option_4" class="form-control form-control-sm" placeholder="Type option 4 text">
            </div>

            <input type="hidden" name="id" value="<?php echo $question['id']; ?>">
            <input type="hidden" name="exam_id" value="<?php echo $exam['id']; ?>">

            <div class="form-group col-md-6">
              
              <label>Set Answer</label>
              <select name="mcq_answer" class="form-control form-control-sm">
                <option value="a"<?php if ($question['option_1'] == 'a') 'selecte'?>>A</option>
                <option value="b"<?php if ($question['option_2'] == 'b') 'selecte'?>>B</option>
                <option value="c"<?php if ($question['option_3'] == 'c') 'selecte'?>>C</option>
                <option value="d"<?php if ($question['option_4'] == 'd') 'selecte'?>>D</option>
              </select>
            </div>


            <div class="form-group col-md-6">
              <button name="update_mcq_question" type="submit" class="btn btn-success">Update Question</button>
              <button type="button" class="btn btn-primary mr-3"><a href="view_questions.php?exam_id=<?php echo $exam_id; ?>" style="color:aliceblue; text-decoration:none" class="px-3">Back</a></button>
            </div>

        

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