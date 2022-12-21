<?php
//Database Connection
include('dbconnection.php');
if (isset($_POST['submit'])) {
  $eid = $_GET['editid'];
  //Getting Post Values
    $clzTime = $_POST['clzTime'];
    $classID = $_POST['classID'];
    $courseId = $_POST['courseId'];
    $className = $_POST['className'];

    $clzStatus = $_POST['clzStatus'];


  $sql="update tblclass set courseId= :cId, classID= :classID, 
  className= :className, clzTime= :clzTime, clzStatus= :clzStatus where ID= :eid";
  $query = $dbh->prepare($sql);  
	$query->bindParam(':cId', $courseId,PDO::PARAM_STR);
  $query->bindParam(':classID', $classID,PDO::PARAM_STR);
  $query->bindParam(':className', $className,PDO::PARAM_STR);
  $query->bindParam(':clzTime', $clzTime,PDO::PARAM_STR);
  $query->bindParam(':clzStatus', $clzStatus,PDO::PARAM_STR);
  $query->bindParam(':eid', $eid,PDO::PARAM_STR,PDO::PARAM_STR);
  $query->execute();
  if ($query->execute()) {
    echo "<script>alert('You have successfully Updated the data');</script>";
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
          <li class="link-name"><a href="notification.html">Notification</a></li>
          <li><a href="notification.html">Add Notification</a></li>
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
            <?php
            $eid = $_GET['editid'];
            $ret = mysqli_query($con, "select * from tblclass where ID='$eid'");
            while ($row = mysqli_fetch_array($ret)) {
            ?>

      <label for="courseId">Course ID:</label>
                <?php $valcourseId = $row['courseId']; ?>"
                <?php
                if ($r_set = $con->query("SELECT * from tblcourse")) {

                    echo "<select id=courseId name=courseId>";
                    while ($rowx = $r_set->fetch_assoc()) {
                        echo "<option value=$rowx[ID]  ($rowx[courseName]=$valcourseId) ? ('selected') : (''); >$rowx[courseName]</option>";
                    }
                    echo "</select>";
                } else {
                    echo $con->error;
                }
                ?>
        <br>
      <label for="classID">Class ID:</label>
      <input type="text" id="classID" name="classID" value="<?php echo $row['classID']; ?>"><br>
      <label for="className">Class Name:</label>
      <input type="text" id="className" name="className" value="<?php echo $row['className']; ?>"><br>
      <label for="clzStatus">Date and Time:</label>
      <input type="datetime-local" name="clzTime" id="clzTime" value="<?php echo $row['clzTime']; ?>"><br>
      <label for="clzStatus">Status:</label>
      <select id="clzStatus" name="clzStatus" value="<?php echo $row['clzStatus']; ?>">
        <option value="held">Held</option>
        <option value="cancel">Cancel</option>
      </select><br>

      <br>

            <?php } ?>

        <br>
        <input id="addCrse" type="submit" value="Update Class" name="submit">

  </section>
  <!-- Add class section ends -->




  <!-- custom js file -->
  <script src="js/userP.js"></script>


</body>

</html>