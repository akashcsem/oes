 <!-- add modal -->
 <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Subject</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="subject_create" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <!-- subject name -->
            <div class="form-group">
              <label for="name">Course Name</label>
              <input type="text" required class="form-control" autofocus id="name" name="name" value="<?php echo $name; ?>" placeholder=" Name">
            </div>

            <!-- course code -->
            <div class="form-group">
              <label for="code">Course Code</label>
              <input type="text" required class="form-control" autofocus id="code" name="code" value="<?php echo $code; ?>" placeholder="Course Code">
            </div>

            
            <!-- subject image -->
            <div class="form-group">
              <label for="image">Upload Image</label>
              <input type="file" name="file_name" class="form-control">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" name="create" class="btn btn-sm btn-primary btn-sm">Create</button>
            </div>
        </form>
      </div>
    </div>
  </div>