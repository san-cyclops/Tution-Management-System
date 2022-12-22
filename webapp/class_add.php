<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//Database Connection
include('dbconnection.php');

$ret = mysqli_query($con, "select max(id) from tblclass");
$row = mysqli_fetch_row($ret);
$val = (int)$row[0] + 1;
$value = str_pad($val, 8, '0', STR_PAD_LEFT);
// echo $value;
//return $value;

$classID = "CL".$value;


if (isset($_POST['submit'])) {
    //Getting Post Values
    $courseId = $_POST['courseId'];
    $className = $_POST['className'];
    $clzTime = $_POST['clzTime'];
    $clzStatus = $_POST['clzStatus'];



    $sql = "INSERT INTO tblclass(courseId,classID,className,clzTime,clzStatus) VALUES(?,?,?,?,?)";
    $statement = $con->prepare($sql);
    $statement->bind_param('sssss', $courseId,$classID, $className,$clzTime, $clzStatus);

    $current_id = $statement->execute() or die("<b>Error:</b> Problem on Insert<br/>" . mysqli_connect_error());


    if ($current_id) {
        echo "<script>alert('You have successfully inserted the data');</script>";
        echo "<script type='text/javascript'> document.location ='class_view.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- css style sheet -->
  <link rel="stylesheet" href="css/pUser.css" />
  <link rel="stylesheet" href="css\class.css">
  <!-- font awesome file link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>CreateClass</title>
</head>

<body>
  <div class="sidebar close">
    <div class="logo-details">
      <a href="userP-Home.html" class="logo"><img src="img/logo.png" alt="logo" /></a>
      <span class="logo_name">LeArN</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="">
          <i class="bx bxs-grid"></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a href="" class="link_name">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="">
            <i class="bx bxs-user-detail"></i>
            <span class="link_name">Student</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li class="link-name"><a href="#">Student</a></li>
          <li><a href="student_reg.html">Student Regitration</a></li>
          <li><a href="studentEnrlmnt.html">Student Enrollment</a></li>
          <li><a href="studentUpDlt.html">Student Update/Delete</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="">
            <i class="bx bx-laptop"></i>
            <span class="link_name">Course</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li class="link-name"><a href="#">Course</a></li>
          <li><a href="addCourse.html">Add Course</a></li>
          <li><a href="upDltCourse.html">Update/Delete Course</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="class.html">
            <i class="bx bxs-school"></i>
            <span class="link_name">Class</span>
          </a>

        </div>
        <ul class="sub-menu blank">
          <li class="link-name"><a href="class.html">Class</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="">
            <i class="bx bx-bell"></i>
            <span class="link_name">Notification</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li class="link-name"><a href="notification.php">Notification</a></li>
          <li><a href="notification.php">Add Notification</a></li>
          <li><a href="upNotification.html">Update Notification</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="">
            <i class="bx bx-bell"></i>
            <span class="link_name">Tutor</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li class="link-name"><a href="#">Tutor</a></li>
          <li><a href="lectureReg.html">Add Tutor</a></li>
          <li><a href="lectureUpDlt.html">Update/ Delete Tutor</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="">
            <i class="bx bx-file-blank"></i>
            <span class="link_name">Files</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li class="link-name"><a href="#">Files</a></li>
          <li><a href="addFiles.html">Upload Files</a></li>
          <li><a href="upDltFiles.html">Update/Delete Files </a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="">
            <i class="bx bxs-user"></i>
            <span class="link_name">Staff</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li class="link-name"><a href="#">Staff Regitration</a></li>
          <li><a href="staffReg.html">Staff Regitration</a></li>
          <li><a href="staffUpDlt.html">Update/Delete Staff</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="attendance.html">
            <i class="bx bx-calendar-check"></i>
            <span class="link_name">Attendance</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li class="link-name "><a href="attendance.html">Attendance</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="Payment.html">
            <i class="bx bx-money"></i>
            <span class="link_name">Payment</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a href="Payment.html" class="link_name">Payment</a></li>
        </ul>
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
  <!-- Add class section starts -->

  <section class="createClass">
    <h1 class="headerAclz">Create Class</h1>
    <form action="" method="post" enctype="multipart/form-data" name="createClassF" class="createClassF">
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


      <br>
      <label for="classID">Class ID:</label>
      <input type="text" id="courseId" name="courseId" value="<?php echo $classID; ?>"><br>
      <label for="className">Class Name:</label>
      <input type="text" id="className" name="className"><br>
      <label for="clzTime">Date and Time:</label>
      <input type="datetime-local" name="clzTime" id="clzTime"><br>
      <label for="clzStatus">Status:</label>
      <select id="clzStatus" name="clzStatus">
        <option value="held">Held</option>
        <option value="cancel">Cancel</option>
      </select><br>

      <br>

        <input type="submit" id="addCrse" value="Add Class" name="submit">



    </form>

  </section>
  <!-- Add class section ends -->




  <!-- custom js file -->
  <script src="js/userP.js"></script>


</body>

</html>