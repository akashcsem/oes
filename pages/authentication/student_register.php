<?php
include 'create_register.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Register</title>
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="../../css/student_register.css"> -->

    <style>
        #bg {
            position: fixed;
            top: 0;
            left: 0;

            min-width: 100%;
            min-height: 100%;
            z-index: -111111;
        }


        /* body {
            background: url(../../img/reg.jpg);
            background-attachment: fixed;
            background-size: cover;
        } */

        .signup {
            border-radius: 5px;
            height: 100% !important;
            background: rgba(44, 62, 80, 0.7);
        }

        input[type="file"] {
            display: none;
        }

        .custom_file_upload {
            border: 1px solid #fff;
            border-radius: 5px;
            background-color: #00AFF0;
            display: inline-block;
            padding: 6px 22px 5px 20px;
            cursor: pointer;
            color: white;
            background-image: linear-gradient(to right, #43A7E0, #0C13AF);
        }
    </style>
</head>

<body>
    <img src="../../img/reg.jpg" id="bg" alt="">

    <!-- REGISTATION -->
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto signup mt-5 py-4">
                <form class="w-100 mx-0 px-0" action="" method="post">
                    <h2 styles="color:#fff" class="mb-4 text-center">Register Here</h2>
                    <div class="row">
                        <div class="form-group col-md-6 mx-0">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $firstname; ?>">
                            <small class="text-danger"><?php echo $firstnameErr; ?></small>
                        </div>

                        <div class="form-group col-md-6">
                            <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $lastname; ?>">
                            <small class="text-danger"><?php echo $lastnameErr; ?></small>

                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="username" autocomplete="off" class="form-control" value="<?php echo $username; ?>" placeholder="Username">
                            <small class="text-danger"><?php echo $usernameErr; ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="student_id" class="form-control" placeholder="Student ID" value="<?php echo $student_id; ?>">
                            <small class="text-danger"><?php echo $student_idErr; ?></small>

                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo $email; ?>">
                            <small class="text-danger"><?php echo $emailErr; ?></small>

                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" value="<?php echo $mobile; ?>">
                            <small class="text-danger"><?php echo $mobileErr; ?></small>

                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="department" class="form-control" placeholder="Department" value="<?php echo $department; ?>">
                            <small class="text-danger"><?php echo $departmentErr; ?></small>

                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="batch" class="form-control" placeholder="Batch" value="<?php echo $batch; ?>">
                            <small class="text-danger"><?php echo $batchErr; ?></small>

                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <small class="text-danger"><?php echo $passwordErr; ?></small>

                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" name="confirm_password" class="form-control" placeholder="Conform Password">
                            <small class="text-danger"><?php echo $passwordMatch; ?></small>

                        </div>
                        <!-- <div class="form-group col-md-6">
                            <label for="file-upload" class="custom_file_upload w-100">
                                <i class="fas fa-download"></i> Image Upload
                            </label>
                            <input id="file-upload" class="form-control" type="file" name="image" />
                        </div> -->
                        <div class="form-group col-md-6">
                            <span class="text-light">Already have a account?</span>
                            <a href="login.php">Sign In</a>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" value="Register" class="btn btn-primary btn-block" name="student_register">
                        </div>
                    </div>



                    <!-- <div class="col-md-12" id="msg">
                    Already have a account?
                    <a href="admin_login.php">Sign In</a>
                </div> -->
                </form>

            </div>
        </div>
    </div>
</body>

</html>