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

    <link rel="stylesheet" href="../css/navbar.css">

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
                            Result
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
                            <th>Student ID</th>

                            <th>Name</th>

                            <th>Batch</th>

                            <th>Department</th>
                            <th>Subject</th>
                            <th>Result</th>
                        </tr>

                        <tr class="bg- text-dark">
                            <th>1</th>
                            <th>2161081040</th>

                            <th>Jahanara Fardoush</th>

                            <th>38</th>
                            <th>CSE</th>
                            <th>Javascript</th>
                            <th>15</th>

                            <th>
                                <a href="#"><i class="fa fa-file" style="font-size:18px;color:rgb(43, 87, 83)"></i></a>
                                <a href="#"><i class="fa fa-eye-slash mx-1" style="font-size:25px;color:green"></i></a>
                                <a href="#"><i class="fa fa-trash" style="font-size:25px;color:red"></i></a>
                            </th>
                        </tr>
                        <tr class="bg- text-dark">
                        <tr class="bg- text-dark">
                            <th>1</th>
                            <th>2161081040</th>

                            <th>Jahanara Fardoush</th>

                            <th>38</th>
                            <th>CSE</th>
                            <th>Javascript</th>
                            <th>15</th>

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
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Student Result</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Student ID </label>
                            <input type="text" class="form-control" id="title" placeholder="Student ID">
                        </div>
                        <!-- <div class="form-group">
                            <label for="file">Name</label>
                            <input type="file" class="form-control" id="file">
                        </div> -->
                        <div class="form-group">
                            <label for="title">Name </label>
                            <input type="text" class="form-control" id="title" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="title">Batch </label>
                            <input type="text" class="form-control" id="title" placeholder="Batch">
                        </div>
                        <div class="form-group">
                            <label for="title">Department </label>
                            <input type="text" class="form-control" id="title" placeholder="Department">
                        </div>
                        <div class="form-group">
                            <label for="title">Subject </label>
                            <input type="text" class="form-control" id="title" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <label for="title">Result </label>
                            <input type="text" class="form-control" id="title" placeholder="Result">
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