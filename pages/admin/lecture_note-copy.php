<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>About Us</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body style="background:url(../img/tech.jpg); background-attachment: fixed; background-size: cover; ">

  <div class=" main">
    <?php include 'partials/navbar.php'; ?>
  </div>

  <div class="container">
    <br />
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center">
          <!-- <div class="header  bg-warning" style="background-color: blue !important"> -->

          <!-- <div class="header !important " style="background-color: blue"> -->
          <div class="header">
            <h4 class="text-dark float-left bg-info pb-1 px-2" style="color: white !important">
              Lecture Notes
            </h4>

            <a href="#" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#addModal">
              Add New
            </a>
          </div>
          <!-- <h1 class="text-dark text-left">Lecture Notes</h1>

            <button class="text-white bg-success float-right m-5 p-2 rounded border-success">Add New</button> -->

          <br />
          <table class="table table-hover table-striped table-bordered">
            <tr class="bg-info text-white">
              <th>#</th>
              <th>Title</th>

              <th>Date</th>

              <th>Added By</th>

              <th>Action</th>
            </tr>

            <tr class="bg- text-dark">
              <th>1</th>
              <th>Name</th>

              <th>Address</th>

              <th>Salary</th>

              <th>
                <a href="#"><i class="fa fa-file" style="font-size:18px;color:rgb(43, 87, 83)"></i></a>
                <a href="#"><i class="fa fa-eye-slash mx-1" style="font-size:25px;color:green"></i></a>
                <a href="#"><i class="fa fa-trash" style="font-size:25px;color:red"></i></a>
              </th>
            </tr>
            <tr class="bg- text-dark">
              <th>2</th>
              <th>Name</th>

              <th>Address</th>

              <th>Salary</th>

              <th>
                <a href="#"><i class="fa fa-file" style="font-size:18px;color:rgb(43, 87, 83)"></i></a>
                <a href="#"><i class="fa fa-eye-slash mx-1" style="font-size:25px;color:green"></i></a>
                <a href="#"><i class="fa fa-trash" style="font-size:25px;color:red"></i></a>
              </th>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- add modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Lecture Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="email" class="form-control" id="title" placeholder="Lecture Title">
            </div>
            <div class="form-group">
              <label for="file">Upload File</label>
              <input type="file" class="form-control-file" id="file">
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

  <!-- all javascript files -->

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>