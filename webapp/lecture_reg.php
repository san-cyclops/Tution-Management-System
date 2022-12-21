<?php
//Databse Connection file
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('dbconnection.php');
include('function.php');

$ret = mysqli_query($con, "select max(id) from tbllectures");
$row = mysqli_fetch_row($ret);
$val = (int)$row[0] + 1;
$value = str_pad($val, 8, '0', STR_PAD_LEFT);

//return $value;

$tID = "LE" . $value;

if (isset($_POST['submit'])) {
  //getting the post values
  $tID = $_POST['tID'];
  $tName = $_POST['tName'];
  $nic = $_POST['nic'];
  $address = $_POST['address'];
  $birthday = $_POST['birthday'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $img = $_FILES['pPic'] ?? null;
  $phone1 = '+94'.$phone;
  $imagePath = '';
  if ($img && $img['tmp_name']) {
    $imagePath = 'mediaLE/' . randomString(8) . '/' . $img['name'];
  }

  // Query for data insertion
  $sql = "INSERT INTO tbllectures(tID,tName,NIC,Address,Birthday,
  Gender,Phone,Email,password,pPic) VALUES(?,?,?,?,?,?,?,?,?,?)";
  $statement = $con->prepare($sql);
  $statement->bind_param('ssssssssss', $tID, $tName, $nic, $address, $birthday, $gender, $phone1, $email, $password, $imagePath);

  $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());


  if ($current_id) {
    mkdir(dirname($imagePath));
    move_uploaded_file($_FILES["pPic"]["tmp_name"], $imagePath);
    echo "<script>alert('You have successfully inserted the data');</script>";
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
  <link rel="stylesheet" href="css\lectureReg.css" />
  <!-- font awesome file link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Tutor Registration</title>
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
  <!-- Tutor Registration form section starts -->
  <section class="tutor-reg">
    <h1>Tutor Registration</h1>

    <form action="lecture_reg.php" method="post" enctype="multipart/form-data" name="tutorReg" class="tutor-regF">

      <label for="tID">Tutor ID:</label>
      <input type="text" id="tID" name="tID" value="<?php echo $tID; ?>"><br>
      <label for="tutorName">Tutor Name:</label>
      <input type="text" id="tName" name="tName"><br>
      <label for="nic">NIC:</label>
      <input type="text" id="nic" name="nic" minlength="10" maxlength="12"><br>
      <label for="address">Address:</label>
      <input type="text" id="Address" name="address"><br>
      <label for="birthday">Birthday:</label>
      <input type="date" id="birthday" name="birthday"><br>
      <div class="gender"><label for="gender">Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
      </div>
      <label for="phone">Contact Number:</label>
      <input type="tel" id="phone" name="phone" pattern="\d{3}[\-]\d{3}[\-]\d{4}" required><br>
      <div>
        <p class="cnumber_Message">Phone Number fill with 10 digits and pattern(Ex:071-123-1234)</p>
      </div>
      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email"><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br>
      <label for="pPic">Profile Picture:</label>
      <input type="file" id="pPic" name="pPic" accept=".png,.gif,.jpg,jpeg">

      <input type="submit" id="addCrse" value="Submit" name="submit">
    </form>
    <!-- Tutor Registration form section ends -->
    <!-- custom js file -->
    <script src="js/userP.js"></script>

</body>

</html>