 <?php
 include('dbconnection.php');
    $eid = $_GET['value'];
 ?>
<!DOCTYPE html>

<html>
<head>
    <title> Password Reset - Techno Smarter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <?php
            //form for submit
            if (isset($_POST['sub_set'])) {
                extract($_POST);
                if ($password == '') {
                    $error[] = 'Please enter the password.';
                }
                if ($passwordConfirm == '') {
                    $error[] = 'Please confirm the password.';
                }
                if ($password != $passwordConfirm) {
                    $error[] = 'Passwords do not match.';
                }
                if (strlen($password) < 5) { // min
                    $error[] = 'The password is 6 characters long.';
                }
                if (strlen($password) > 50) { // Max
                    $error[] = 'Password: Max length 50 Characters Not allowed';
                }
                $fetchresultok = mysqli_query($con, "SELECT email FROM tblusers WHERE Email='$eid'");
                if ($res = mysqli_fetch_array($fetchresultok)) {
                    $email = $res['email'];
                }
                if (isset($email) != '') {
                    $emailtok = $email;
                } else {
                    $error[] = 'UserName has been expired or something missing ';
                    $hide = 1;
                }
                if (!isset($error)) {
                    #$options = array("cost" => 4);
                    #$password = password_hash($password, PASSWORD_BCRYPT, $options);
                    $resultresetpass = mysqli_query($con, "UPDATE tblusers SET password='$password' WHERE email='$emailtok'");
                    if ($resultresetpass) {
                        $success = "<div class='successmsg'><span style='font-size:100px;'>&#9989;</span> <br> Your password has been updated successfully.. <br> <a href='login.php' style='color:#34ce57;'>Login here... </a> </div>";

                        $hide = 1;
                    }
                }
            }
            ?>
            <div class="login_form">
                <form action="" method="POST">
                    <img src="img/logo.png" alt="Techno Smarter" class="logo img-fluid">
                    <div class="form-group">
                        <label class="label_txt">User Name </label>
                        <input type="text" name="username" class="form-control" value="<?php echo $eid; ?>" required>
                    </div>
                    <div class="form-group">

                        <?php
                        if (isset($error)) {
                            foreach ($error as $error) {
                                echo '<div class="errmsg">' . $error . '</div><br>';
                            }
                        }
                        if (isset($success)) {
                            echo $success;
                        }
                        ?>
                        <?php if (!isset($hide)){ ?>
                        <label class="label_txt">Password </label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="label_txt">Confirm Password </label>
                        <input type="password" name="passwordConfirm" class="form-control" required>
                    </div>
                    <button type="submit" name="sub_set" class="btn btn-primary btn-group-lg form_btn">Reset Password
                    </button>
                    <?php } ?>
                </form>
            </div>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>