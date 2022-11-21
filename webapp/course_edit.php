<?php
//Database Connection
include('dbconnection.php');
if (isset($_POST['submit'])) {
  $eid = $_GET['editid'];
  //Getting Post Values
  $courseId = $_POST['courseId'];
  $courseName = $_POST['courseName'];
  $LectureId = $_POST['LectureId'];
  $cDay = $_POST['cDay'];
  $ctimeS = $_POST['ctimeS'];
  $ctimeE = $_POST['ctimeE'];
  $imgData = $_FILES['coursePic']['name'];

  move_uploaded_file($_FILES["coursePic"]["tmp_name"],"media/".$_FILES["coursePic"]["name"]);

 
  $sql="update tblcourse set courseId= :cId, courseName= :courseName, 
  LectureId= :LectureId, cDay= :cDay, ctimeS= :ctimeS, ctimeE= :ctimeE, 
  coursePic=:aimage where ID= :eid";
  $query = $dbh->prepare($sql);  
	$query->bindParam(':cId', $courseId,PDO::PARAM_STR);
  $query->bindParam(':courseName', $courseName,PDO::PARAM_STR);
  $query->bindParam(':LectureId', $LectureId,PDO::PARAM_STR);
  $query->bindParam(':cDay', $cDay,PDO::PARAM_STR);
  $query->bindParam(':ctimeS', $ctimeS,PDO::PARAM_STR);
  $query->bindParam(':ctimeE', $ctimeE,PDO::PARAM_STR);
  $query->bindParam(':aimage', $imgData,PDO::PARAM_STR,PDO::PARAM_STR);
  $query->bindParam(':eid', $eid,PDO::PARAM_STR,PDO::PARAM_STR);
  $query->execute();
  if ($query->execute()) {
    echo "<script>alert('You have successfully Updated the data');</script>";
    echo "<script type='text/javascript'> document.location ='course_view.php'; </script>";
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
  <link rel="stylesheet" href="css/addCourse.css">
  <!-- font awesome file link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Add Course</title>
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
  <!-- Add Course section starts -->

  <section class="addCourse">
    <h1 class="headerAS">Edit Course</h1>
    <form action="" method="post" enctype="multipart/form-data" name="addCourseF" class="addCourseF">
      <?php
      $eid = $_GET['editid'];
      $ret = mysqli_query($con, "select * from tblcourse where ID='$eid'");
      while ($row = mysqli_fetch_array($ret)) {
      ?>


        <label for="courseId">Course ID:</label>
        <input type="text" id="courseId" name="courseId" value="<?php echo $row['courseId']; ?>"><br>
        <label for="courseName">Course Name:</label>
        <input type="text" id="courseName" name="courseName" value="<?php echo $row['courseName']; ?>"><br>
        <label for="LectureId">Lecture ID:</label>
        <select id="LectureId" name="LectureId" value="<?php echo $row['LectureId']; ?>">
          <option value="lect0001">Lect0001</option>
          <option value="Tuesday">Tuesday</option>
          <option value="Wednesday">Wednesday</option>
          <option value="Thursday">Thursday</option>
          <option value="Friday">Friday</option>
          <option value="Saturday">Saturday</option>
          <option value="Sunday">Sunday</option>
        </select><br>
        <label for="cDay">Day:</label>
        <select id="cDay" name="cDay" value="<?php echo $row['cDay']; ?>">
          <option value="Monday">Monday</option>
          <option value="Tuesday">Tuesday</option>
          <option value="Wednesday">Wednesday</option>
          <option value="Thursday">Thursday</option>
          <option value="Friday">Friday</option>
          <option value="Saturday">Saturday</option>
          <option value="Sunday">Sunday</option>
        </select><br>
        <label for="ctimeS">Time:</label>
        <input type="time" id="ctimeS" name="ctimeS" value="<?php echo $row['ctimeS']; ?>">
        <label for="ctimeS">To</label>
        <input type="time" id="ctimeE" name="ctimeE" value="<?php echo $row['ctimeE']; ?>">
        <br>
        <label for="coursePic">Course Feature Picture:</label>
        <input type="file" id="coursePic" name="coursePic" required>
        <img style="width: 100px;background-size:100% 100%;" src="media/<?php echo $row['coursePic'] ?>" name="Pic" />
      <?php } ?>

      <br>
      <input id="addCrse" type="submit" value="Update Course" name="submit">

    </form>

  </section>
  <!-- video tutorials section ends -->




  <!-- custom js file -->
  <script src="js/userP.js"></script>


</body>

</html>