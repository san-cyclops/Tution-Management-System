<?php
//Database Connection
include('dbconnection.php');
if (isset($_POST['submit'])) {
  $eid = $_GET['editid'];
  //Getting Post Values
  $tID = $_POST['tID'];
  $tName = $_POST['tName'];
  $address = $_POST['address'];
  $birthday = $_POST['birthday'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $imgData = $_FILES['pPic']['name'];

  move_uploaded_file($_FILES["pPic"]["tmp_name"],"media/".$_FILES["pPic"]["name"]);

 
  $sql="update tbllectures set ID = :ID,
  tID = :tID,
  tName = :tName,
  nic = :nic,
  address = :address,
  birthday = :birthday,
  gender = :gender,
  phone = :phone,
  email = :email,
  password = :password,
  pPic = :imgData where ID= :eid";
  $query = $dbh->prepare($sql);  
	$query->bindParam(':tID', $tID,PDO::PARAM_STR);
  $query->bindParam(':tName', $tName,PDO::PARAM_STR);
  $query->bindParam(':nic', $nic,PDO::PARAM_STR);
  $query->bindParam(':address', $address,PDO::PARAM_STR);
  $query->bindParam(':gender', $gender,PDO::PARAM_STR);
  $query->bindParam(':email', $email,PDO::PARAM_STR);
  $query->bindParam(':password', $password,PDO::PARAM_STR);
  $query->bindParam(':imgData', $imgData,PDO::PARAM_STR,PDO::PARAM_STR);
  $query->bindParam(':eid', $eid,PDO::PARAM_STR,PDO::PARAM_STR);
  $query->execute();
  if ($query->execute()) {
    echo "<script>alert('You have successfully Updated the data');</script>";
    echo "<script type='text/javascript'> document.location ='lecture_view.php'; </script>";
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
  <link rel="stylesheet" href="css/lectureUpDlt.css" />
  <!-- font awesome file link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Tutor Update/Delete</title>
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
  <!-- Tutor Update /Delete form section starts -->
  <section class="tutorUpDlt">
    <h1>Tutor Update / Delete</h1>
    <input type="text" id="tutorSearch" name="tutorSearch" placeholder="Enter Tutor ID">
    <button type="submit"><i class="fa fa-search"></i></button>

    <form action="" method="post" name="tutorUpDlt" class="tutorUpDltF">

      <label for="tID">Tutor ID:</label>
      <input type="text" id="tID" name="tID"><br>
      <label for="tutorName">Tutor Name:</label>
      <input type="text" id="tName" name="tName"><br>
      <label for="nic">NIC:</label>
      <input type="text" id="nic" name="nic"><br>
      <label for="address">Address:</label>
      <input type="text" id="Address" name="Address"><br>
      <label for="birthday">Birthday:</label>
      <input type="date" id="birthday" name="birthday"><br>
      <div class="gender"><label for="gender">Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
      </div>
      <label for="phone">Contact Number:</label>
      <input type="tel" id="phone" name="phone" required><br>
      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email"><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br>
      <label for="pPic">Profile Picture:</label>
      <input type="file" id="pPic" name="pPic">

      <input type="submit" value="submit">
    </form>
    <!-- Tutor Update / Delete form section ends -->
    <!-- custom js file -->
    <script src="js/userP.js"></script>

</body>

</html>