<?php include('admin_lecture_note.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lecture Note</title>
  <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../css/admin.css">
</head>

<body>

  <div class="page-content">
    <!-- navbar -->
    <div class="main">
      <?php include 'partials/navbar.php'; ?>
    </div>


    <!-- display success message -->
    <?php if ($insert_success != "") { ?>
      <div class="row">
        <div class="container">
          <h3 class="text-center text-success"> <?php echo $insert_success; ?> </h3>
        </div>
      </div>
    <?php
    }
    ?>

    <!-- main content -->
    <div class="main-content mb-5 mx-0 px-0 row">

      <!-- feedback -->
      <div class="col-12">
        <div class="container py-4 clearfix">

          <div class="text-center">
            <div class="header">
              <h4 class="text-dark float-left bg-info pb-1 px-2" style="color: white !important">
                Lecture Notes
              </h4>

              <a href="#" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#addModal">
                Add New
              </a>
            </div>
            <table class="table table-hover table-striped table-bordered">
              <tr class="bg-info text-white">
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th>Added By</th>
                <th>Action</th>
              </tr>

              <tr class="bg- text-dark">
                <td>1</td>
                <td>Array</td>
                <td>15-09-19</td>
                <td>A.H.M Saifullah Sadi</td>
                <td>
                  <a href="#"><i class="fa fa-file" style="font-size:18px;color:rgb(43, 87, 83)"></i></a>
                  <a href="#"><i class="fa fa-eye-slash mx-1" style="font-size:25px;color:green"></i></a>
                  <a href="#"><i class="fa fa-trash" style="font-size:25px;color:red"></i></a>
                </td>
              </tr>
              <tr class="bg- text-dark">
                <td>2</td>
                <td>String</td>
                <td>No Update</td>
                <td>pending</td>
                <td>
                  <a href="#"><i class="fa fa-file" style="font-size:18px;color:rgb(43, 87, 83)"></i></a>
                  <a href="#"><i class="fa fa-eye-slash mx-1" style="font-size:25px;color:green"></i></a>
                  <a href="#"><i class="fa fa-trash" style="font-size:25px;color:red"></i></a>
                </td>
              </tr>
              <tr class="bg- text-dark">
                <td>3</td>
                <td>String</td>
                <td>No Update</td>
                <td>pending</td>
                <td>
                  <a href="#"><i class="fa fa-file" style="font-size:18px;color:rgb(43, 87, 83)"></i></a>
                  <a href="#"><i class="fa fa-eye-slash mx-1" style="font-size:25px;color:green"></i></a>
                  <a href="#"><i class="fa fa-trash" style="font-size:25px;color:red"></i></a>
                </td>
              </tr>
              <tr class="bg- text-dark">
                <td>4</td>
                <td>String</td>
                <td>No Update</td>
                <td>pending</td>
                <td>
                  <a href="#"><i class="fa fa-file" style="font-size:18px;color:rgb(43, 87, 83)"></i></a>
                  <a href="#"><i class="fa fa-eye-slash mx-1" style="font-size:25px;color:green"></i></a>
                  <a href="#"><i class="fa fa-trash" style="font-size:25px;color:red"></i></a>
                </td>
              </tr>
              <tr class="bg- text-dark">
                <td>5</td>
                <td>String</td>
                <td>No Update</td>
                <td>pending</td>
                <td>
                  <a href="#"><i class="fa fa-file" style="font-size:18px;color:rgb(43, 87, 83)"></i></a>
                  <a href="#"><i class="fa fa-eye-slash mx-1" style="font-size:25px;color:green"></i></a>
                  <a href="#"><i class="fa fa-trash" style="font-size:25px;color:red"></i></a>
                </td>
              </tr>
            </table>
          </div>


        </div>
      </div>


    </div>

    <!-- footer -->
    <div class="footer bg-dark p-0 m-0">
      <?php include '../teacher/partials/footer.php'; ?>
    </div>
  </div>

  <!-- add modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Lecture Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" placeholder="Lecture Title">
            </div>
            <div class="form-group">
              <label for="file">Upload File</label>
              <input type="file" class="form-control" id="file">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- scripts -->
  <?php include '../teacher/partials/js.php'; ?>
</body>

</html>