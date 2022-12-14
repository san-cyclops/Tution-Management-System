<?php
session_start();
//Databse Connection file
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('dbconnection.php');
require_once ('function.php');

$ret = mysqli_query($con, "select max(id) from tblcourse");
$row = mysqli_fetch_row($ret);
$val = (int)$row[0] + 1;
$value = str_pad($val, 8, '0', STR_PAD_LEFT);

//return $value;

$courseId = "CS".$value;


if (isset($_POST['submit'])) {
  //getting the post values
  $courseId = $_POST['courseId'];
  $courseName = $_POST['courseName'];
  $LectureId = $_POST['LectureId'];
  $cDay = $_POST['cDay'];
  $ctimeS = $_POST['ctimeS'];
  $ctimeE = $_POST['ctimeE'];
  $imgData = $_FILES['coursePic'] ?? null;
  $imgPath ="";

  if ($imgData && $imgData['tmp_name']) {
    $imgPath = 'mediaCS/'.randomString(8).'/'.$imgData['name'];
  }

  // Query for data insertion
  $sql = "INSERT INTO tblcourse(courseId,courseName,LectureId,cDay,ctimeS,ctimeE,coursePic) VALUES(?,?,?,?,?,?,?)";
  $statement = $con->prepare($sql);
  $statement->bind_param('sssssss', $courseId, $courseName, $LectureId, $cDay, $ctimeS, $ctimeE, $imgPath);

  $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());


  if ($current_id) {
    mkdir(dirname($imgPath));
    move_uploaded_file($_FILES["coursePic"]["tmp_name"],$imgPath);
    echo "<script>alert('You have successfully inserted the data');</script>";
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
      <a href="admin_Home.php" class="logo"><img src="img/logo.png" alt="logo" /></a>
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
  <!-- Add Course section starts -->

  <section class="addCourse">
    <h1 class="headerAS">Add Course</h1>
    <form action="" method="post" enctype="multipart/form-data" name="addCourseF" class="addCourseF">
      <label for="courseId">Course ID:</label>
      <input type="text" id="courseId" name="courseId" value="<?php echo $courseId; ?>"><br>
      <label for="courseName">Course Name:</label>
      <input type="text" id="courseName" name="courseName"><br>
      <label for="LectureId">Lecture ID:</label>
      <?php
      if ($r_set = $con->query("SELECT * from tbllectures")) {

        echo "<select id=LectureId name=LectureId>";
        while ($row = $r_set->fetch_assoc()) {
          echo "<option value=$row[tID]>$row[tName]</option>";
        }
        echo "</select>";
      } else {
        echo $con->error;
      }
      ?>
      <label for="cDay">Day:</label>
      <select id="cDay" name="cDay">
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
      </select><br>
      <label for="ctimeS">Time:</label>
      <input type="time" id="ctimeS" name="ctimeS">
      <label for="ctimeS">To</label>
      <input type="time" id="ctimeE" name="ctimeE">
      <br>
      <label for="coursePic">Course Feature Picture:</label>
      <input type="file" id="coursePic" name="coursePic" accept=".png,.gif,.jpg,jpeg" required><br>
      <br>
      <input type="submit" id="addCrse" value="Add Course" name="submit">
    </form>

  </section>
  <!-- video tutorials section ends -->




  <!-- custom js file -->
  <script src="js/userP.js"></script>


</body>

</html>