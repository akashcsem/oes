
  <!-- add modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">View Lecture Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- form for upload file, with post method -->
        <form action="" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <!-- field for file title -->
            <div class="form-group">
              <label for="title">Lecture Title</label>
              <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" id="title" placeholder="Lecture Title">
            </div>

            <!-- select option for subject -->
            <div class="form-group">
              <label for="">Subject</label>
              <select class="form-control" name="subject" id="">
                <?php foreach ($subjects as $subject) { ?>
                  <option value="<?php echo $subject['id']; ?>"><?php echo $subject['name']; ?></option>
                <?php } ?>
              </select>
            </div>

            <!-- field for file -->
            <div class="form-group">
              <label for="note">Upload Notes</label>
              <input type="file" name="file_name" <?php echo $file_name; ?> class="form-control" id="note">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <!-- submit button which name add_note -->
              <button type="submit" name="add_note" id="btnSubmit" class="btn btn-primary btn-sm">Add Lecture</button>
            </div>
        </form>
      </div>
    </div>
  </div>