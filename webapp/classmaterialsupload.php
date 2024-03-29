<?php
session_start();
//Database Connection
include('dbconnection.php');

$rfidno = "";
$StudentID = "";
$NIC = "";
$StudentName = "";
$title = "Class Materials Upload ";

$message = '';
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
    echo "<script>alert('Data dddd');</script>";


    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {

        // get details of the uploaded file
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));


        // sanitize file-name
        $random = (time() + rand(1, 1000));
        $newFileName = $random . $fileName;

        echo "<script>alert('Data vvv - $newFileName');</script>";

        // check if file has one of the following extensions
        $allowedfileExtensions = array('pdf', 'mp4');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            // directory in which the uploaded file will be moved
            $uploadFileDir = './admin/modules/lesson/files/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {



                $courseId = 0;
                $coursename = $_POST['courseId'];
                $title = $_POST['title'];
                $category = $_POST['category'];
                $filelocatoin = "files/" . $newFileName;

                echo "<script>alert('Data vvv - $filelocatoin');</script>";

                $sql = "INSERT INTO tbllesson(LessonID,LessonChapter,LessonTitle,FileLocation,Category) VALUES(?,?,?,?,?)";
                $statement = $con->prepare($sql);
                $statement->bind_param('sssss', $courseId,$coursename, $title,$filelocatoin, $category);

                $current_id = $statement->execute() or die("<b>Error:</b> Problem on Insert<br/>" . mysqli_connect_error());


                if ($current_id) {
                    echo "<script>alert('You have successfully inserted the data');</script>";
                    echo "<script type='text/javascript'> document.location ='classmaterials.php'; </script>";
                } else {
                    echo "<script>alert('Something Went Wrong. Please try again');</script>";
                }

                echo "<script>alert('$coursename');</script>";


            } else {
                $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                echo "<script>alert('$message');</script>";
            }
        } else {
            $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            echo "<script>alert('$message');</script>";
        }
    } else {
        $message = 'There is some error in the file upload. Please check the following error.<br>';
        $message .= 'Error:' . $_FILES['uploadedFile']['error'];
        echo "<script>alert('$message');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- css style sheet -->
    <link rel="stylesheet" href="css/pUser.css"/>
    <link rel="stylesheet" href="css/sReg.css"/>
    <link rel="stylesheet" href="css/view.css"/>
    <!-- font awesome file link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"/>
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <title>Admin Portal</title>
</head>
<style>
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 4px 2px;
        cursor: pointer;
    }

    .button1 {
        font-size: 10px;
    }

    .button2 {
        font-size: 12px;
    }

    .button3 {
        font-size: 16px;
    }

    .button4 {
        font-size: 20px;
    }

    .button5 {
        font-size: 24px;
    }
</style>
<body>
<div class="sidebar close">
    <div class="logo-details">
        <a href="admin_Home.php" class="logo"><img src="img/logo.png" alt="logo"/></a>
        <span class="logo_name">LeArN</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="admin_Home.php">
                <i class="bx bxs-grid"></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a href="admin_Home.php" class="link_name">Dashboard</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="student_view.php">
                    <i class="bx bxs-user-detail"></i>
                    <span class="link_name">Student</span>
                </a>
            </div>
            <ul class="sub-menu blank">
                <li class="link-name"><a href="student_view.php">Student</a></li>
            </ul>
        </li>
        <li>
            <a href="">
                <i class='bx bx-user-plus'></i>
                <span class="link_name">Enrollment</span>
            </a>
            <ul class="sub-menu blank">
                <li class="link-name"><a href="#">Enrollment</a></li>
            </ul>
        </li>
        <li>
            <a href="course_view.php">
                <i class="bx bx-laptop"></i>
                <span class="link_name">Course</span>
            </a>
            <ul class="sub-menu blank">
                <li class="link-name"><a href="course_view.php">Course</a></li>
            </ul>
        </li>
        <li>
            <a href="class.html">
                <i class="bx bxs-school"></i>
                <span class="link_name">Class</span>
            </a>
            <ul class="sub-menu blank">
                <li class="link-name"><a href="class.html">Class</a></li>
            </ul>
        </li>
        <li>
            <a href="allNotification.html">
                <i class="bx bx-bell"></i>
                <span class="link_name">Notification</span>
            </a>
            <ul class="sub-menu black">
                <li class="link-name">
                    <a href="allNotification.html">Notification</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="lecture_view.php">
                <i class='bx bxs-user-voice'></i></i>
                <span class="link_name">Tutor</span>
            </a>
            <ul class="sub-menu blank">
                <li class="link-name"><a href="allTutor.html">Tutor</a></li>
            </ul>
        </li>
        <li>
            <a href="allFile.html">
                <i class="bx bx-file-blank"></i>
                <span class="link_name">Files</span>
            </a>
            <ul class="sub-menu blank">
                <li class="link-name"><a href="allFile.html">Files</a></li>
            </ul>
        </li>
        <li>
            <a href="allStaff.html">
                <i class="bx bxs-user"></i>
                <span class="link_name">Staff</span>
            </a>
            <ul class="sub-menu blank">
                <li class="link-name"><a href="allStaff.html">Staff</a></li>
            </ul>
        </li>
        <li>
            <a href="attendance.html">
                <i class="bx bx-calendar-check"></i>
                <span class="link_name">Attendance</span>
            </a>
            <ul class="sub-menu blank">
                <li class="link-name"><a href="attendance.html">Attendance</a></li>
            </ul>
        </li>
        <li>
            <a href="Payment.html">
                <i class="bx bx-money"></i>
                <span class="link_name">Payment</span>
            </a>
            <ul class="sub-menu blank">
                <li><a href="Payment.html" class="link_name">Payment</a></li>
            </ul>
        </li>
    </ul>
</div>
<header class="header">
    <div class="toggle">
        <i class="bx bx-menu"></i>
    </div>
    <nav class="navbar">
        <ul>
            <li><a href=""><img src="img/user2.jpg" alt=""></a></li>
            <li><a href=""><i class="bx bx-bell"></i></a></li>
            <li><a href="#"><i class='bx bx-log-out-circle'></i></a></li>
        </ul>
        </div>
    </nav>
</header>
<!-- Student Registration form section starts -->
<section class="student-reg">


    <!--      <h1><?php /*echo $title;*/ ?></h1>
      <div class="col-lg-6">
          <h3>PDF</h3>

          <div class="table-responsive">
              <form method="POST" action="" enctype="multipart/form-data">
                  <div>
                      <span>Upload a File:</span>
                      <input type="file" name="uploadedFile" />
                  </div>

                  <input type="submit" name="uploadBtn" value="Upload" />
              </form>
          </div>
      </div>
-->

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <form class="form-horizontal span6" action="" method="POST" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Update Files</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 row">
                            <label class="col-md-2 control-label" for="LessonChapter">Course:</label>

                            <div class="col-md-10">

                                <?php
                                if ($r_set = $con->query("SELECT * from tblcourse")) {

                                    echo "<select id=courseId name=courseId>";
                                    while ($row = $r_set->fetch_assoc()) {
                                        echo "<option value=$row[courseName]>$row[courseName]</option>";
                                    }
                                    echo "</select>";
                                } else {
                                    echo $con->error;
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 row">
                            <label class="col-md-2 control-label" for=
                            "LessonTitle">Title:</label>

                            <div class="col-md-10">
                                <input type="text" id="title" name="title"><br>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 row">
                            <label class="col-md-2 control-label" for=
                            "Category">File Type:</label>

                            <div class="col-md-10">
                                <select name="category" id="category">
                                    <option value="" disabled selected>Choose option</option>
                                    <option value="Video">Video</option>
                                    <option value="Docs">Docs</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 row">
                            <label class="col-md-2" align="left" for="file">Upload File:</label>

                            <div class="col-md-10">
                                <input type="file" name="uploadedFile" value=""/>
                            </div>


                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 row">
                            <label class="col-md-2 control-label" for=
                            "idno"></label>

                            <div class="col-md-10">
                                <input class="button " type="submit" name="uploadBtn" value="Upload" />
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


</section>


<!-- student Registration form section ends -->
<!-- custom js file -->
<script src="js/userP.js"></script>

<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>