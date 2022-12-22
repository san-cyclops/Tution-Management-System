<?php
//Database Connection
include('dbconnection.php');
if (isset($_POST['submit'])) {
  $eid = $_GET['editid'];

  // Getting Database Image Value
  $statment = $dbh->prepare('SELECT * FROM tbllectures WHERE ID=:id ');
  $statment->bindValue(':id', $eid);
  $statment->execute();
  $lecturer = $statment->fetch(PDO::FETCH_ASSOC);
  $imgPath = $lecturer['pPic'];

  //Getting Post Values
  $tID = $_POST['tID'];
  $tName = $_POST['tName'];
  $address = $_POST['Address'];
  $nic = $_POST['nic'];
  $birthday = $_POST['birthday'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $img = $_FILES['pPic'];

  if ($img && $img['tmp_name']) {
    if ($lecturer['pPic']) {
      unlink($lecturer['pPic']);
    }
    $imgPath = 'mediaLE/' . randomString(8) . '/' . $img['name'];
    mkdir(dirname($imagePath));
    move_uploaded_file($image['tmp_name'], $imgPath);
  }

  // move_uploaded_file($_FILES["pPic"]["tmp_name"], $img);

  $sql = "UPDATE tbllectures SET tID = :tID,
  tName = :tName,
  NIC = :nic,
  Address = :address,
  Birthday = :birthday,
  Gender = :gender,
  Phone = :phone,
  Email = :email,
  Password = :password,
  pPic = :imgPath WHERE ID= :eid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':tID', $tID, PDO::PARAM_STR);
  $query->bindParam(':tName', $tName, PDO::PARAM_STR);
  $query->bindParam(':nic', $nic, PDO::PARAM_STR);
  $query->bindParam(':address', $address, PDO::PARAM_STR);
  $query->bindParam(':birthday', $birthday, PDO::PARAM_STR);
  $query->bindParam(':gender', $gender, PDO::PARAM_STR);
  $query->bindParam(':phone', $phone, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->bindParam(':imgPath', $imgPath, PDO::PARAM_STR, PDO::PARAM_STR);
  $query->bindParam(':eid', $eid, PDO::PARAM_STR, PDO::PARAM_STR);
  $query->execute();

  if ($query->execute()) {
    echo "<script>alert('You have successfully Updated the data');</script>";
    echo "<script type='text/javascript'> document.location ='lecture_view.php'; </script>";
  } else {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
  }

    $sql = mysqli_query($con, "delete from tblusers where username=$email");
    #echo "<script>alert('Data deleted');</script>";
    $query=mysqli_query($con, "insert into tblusers(FirstName,LastName, MobileNumber, Email, Address,CreationDate,username,password) 
    value('$tName','', '$phone', '$email', '$address', NOW(),'$tName','$password' )");
    if ($query) {
        echo "<script>alert('You have successfully inserted User data');</script>";
        echo "<script type='text/javascript'> document.location ='student_view.php'; </script>";
    }
    else
    {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
        echo "<script type='text/javascript'> document.location ='student_view.php'; </script>";
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
          <li class="link-name"><a href="allCourses.html">Course</a></li>
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
    <div class="toggle"><i class="bx bx-menu"></i></div>
    <nav class="navbar">
      <ul>
        <li><a href=""><img src="img/user2.jpg" alt=""></a></li>
        <li><a href=""><i class="bx bx-bell"></i></a></li>
        <li><a href="#"><i class='bx bx-log-out-circle'></i></a></li>

      </ul>
      </div>
    </nav>
  </header>
  <!-- Tutor Update form section starts -->
  <section class="tutorUpDlt">
    <h1>Tutor Update</h1>
    <!-- <input type="text" id="tutorSearch" name="tutorSearch" placeholder="Enter Tutor ID">
    <button type="submit"><i class="fa fa-search"></i></button> -->

    <form action="" method="post" name="tutorUpDlt" class="tutorUpDltF" enctype="multipart/form-data">
      <?php
      $eid = $_GET['editid'];
      $rel = mysqli_query($con, "SELECT * FROM tbllectures WHERE ID='$eid'");
      while ($row = mysqli_fetch_array($rel)) :
      ?>

        <label for="tID">Tutor ID:</label>
        <input type="text" id="tID" name="tID" value="<?php echo $row['tID']; ?>"><br>
        <label for="tutorName">Tutor Name:</label>
        <input type="text" id="tName" name="tName" value="<?php echo $row['tName'] ?>"><br>
        <label for="nic">NIC:</label>
        <input type="text" id="nic" name="nic" value="<?php echo $row['NIC'] ?>"><br>
        <label for="address">Address:</label>
        <input type="text" id="Address" name="Address" value="<?php echo $row['Address'] ?>"><br>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" value="<?php echo $row['Birthday'] ?>"><br>
        <div class="gender"><label for="gender">Gender:</label><br>
          <input type="radio" id="male" name="gender" <?php if ($row['Gender'] == "male") echo "checked"; ?> value="male">
          <label for="male">Male</label>
          <input type="radio" id="female" name="gender" <?php if ($row['Gender'] == "female") echo "checked"; ?> value="female">
          <label for="female">Female</label>
        </div>
        <label for="phone">Contact Number:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $row['Phone'] ?>" required><br>
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['Email'] ?>" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $row['Password'] ?>" required><br>
        <label for="pPic">Profile Picture:</label>
        <input type="file" id="pPic" name="pPic">
        <img src="<?php echo $row['pPic'] ?>" style="width: 100px;background-size:100% 100%;">
      <?php endwhile; ?>

      <input type="submit" value="submit" name="submit">
    </form>
    <!-- Tutor Update form section ends -->
    <!-- custom js file -->
    <script src="js/userP.js"></script>

</body>

</html>