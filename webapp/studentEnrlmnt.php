<?php
//Databse Connection file
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('dbconnection.php');
require_once('function.php');


if (isset($_POST['submit'])) {
    //Getting Post Values
    $courseId = $_POST['courseId'];
    $RFIDNumber = $_POST['rfid-sID'];



    $sql = "INSERT INTO tblstdenroll(courseId,RFIDNumber) VALUES(?,?)";
    $statement = $con->prepare($sql);
    $statement->bind_param('ss', $courseId, $RFIDNumber);

    $current_id = $statement->execute() or die("<b>Error:</b> Problem on Insert<br/>" . mysqli_connect_error());


    if ($current_id) {
        echo "<script>alert('You have successfully inserted the data');</script>";
        echo "<script type='text/javascript'> document.location ='studentEnrlmnt_view.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- css style sheet -->
    <link rel="stylesheet" href="css/pUser.css"/>
    <link rel="stylesheet" href="css/studentEnrlmnt.css"/>
    <!-- font awesome file link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"/>
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <title>Admin Portal/Student Enrollment</title>
</head>

<body>
<div class="sidebar close">
    <div class="logo-details">
        <a href="userP-Home.html" class="logo"><img src="img/logo.png" alt="logo"/></a>
        <span class="logo_name">LeArN</span>
    </div>

    <ul class="nav-links">
        <li>
            <a href="">
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

        </li>
        <li>
            <div class="icon-link">
                <a href="course_view">
                    <i class="bx bx-laptop"></i>
                    <span class="link_name">Course</span>
                </a>
            </div>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="bx bxs-school"></i>
                    <span class="link_name">Class</span>
                </a>
            </div>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="bx bx-bell"></i>
                    <span class="link_name">Notification</span>
                </a>
            </div>
        </li>
        <li>
            <div class="icon-link">
                <a href="lecture_view.php">
                    <i class="bx bx-bell"></i>
                    <span class="link_name">Tutor</span>
                </a>
            </div>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="bx bx-file-blank"></i>
                    <span class="link_name">Files</span>
                </a>
            </div>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="bx bxs-user"></i>
                    <span class="link_name">Staff</span>
                </a>
            </div>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="bx bx-calendar-check"></i>
                    <span class="link_name">Attendance</span>
                </a>
            </div>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="bx bx-money"></i>
                    <span class="link_name">Payment</span>
                </a>
            </div>
        </li>
    </ul>

</div>
<header class="header">
    <div class="toggle">
        <i class='bx bx-menu'></i>
    </div>

    <nav class="navbar">
        <ul>
            <li><a href=""><img src="../img/user2.jpg" alt=""></a></li>
            <li><a href=""><i class="bx bx-bell"></i></a></li>
            <li><a href="#"><i class='bx bx-log-out-circle'></i></a></li>

        </ul>
        </div>
    </nav>
</header>
<!-- student Enrollment form section starts -->
<div class="stdntEnrlmnt">
    <h1>Studennt Enrolment</h1>
    <form action="" method="post" enctype="multipart/form-data" name="stdntEnrlmntF" class="stdntEnrlmntF">
        <label for="rfid-sID">RFID/Student ID Number:</label>
        <input type="text" id="rfid-sID" name="rfid-sID" placeholder="Enter RFID/Studdent ID Number"><br><br>
        <label for="courseId">Course ID:</label>
        <?php
        if ($r_set = $con->query("SELECT * from tblcourse")) {

            echo "<select id=courseId name=courseId>";
            while ($row = $r_set->fetch_assoc()) {
                echo "<option value=$row[ID]>$row[courseName]</option>";
            }
            echo "</select>";
        } else {
            echo $con->error;
        }
        ?>
        <div class="enrlUnerlBtn">
            <input type="submit" id="Enroll" value="Enroll" name="submit">
        </div>
    </form>
</div>
<!-- student Enrollment form section ends -->
<!-- custom jquery file link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- custom js file -->
<script src="js/userP.js"></script>


</body>

</html>