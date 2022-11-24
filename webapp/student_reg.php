<?php
//Databse Connection file
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('dbconnection.php');

$ret = mysqli_query($con, "select max(id) from tblstudents");
$row = mysqli_fetch_row($ret);
$val = (int)$row[0] + 1;
$value = str_pad($val, 10, '0', STR_PAD_LEFT);
echo $value;
//return $value;

$StudentID = $value;

$n=10;
function randomNumber($n) {
 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $randomString = '';
 for ($i = 0; $i < $n; $i++) {
  $index = rand(0, strlen($characters) - 1);
  $randomString .= $characters[$index];
 }
 return strtoupper($randomString);
}
$RFIDNumber = randomNumber($n);


if (isset($_POST['submit'])) {
  //getting the post values
  $RFIDNumber = $_POST['RFIDNumber'];
  $StudentID = $_POST['StudentID'];
  $StudentName = $_POST['StudentName'];
  $NIC = $_POST['NIC'];
  $Address = $_POST['Address'];
  $Gender = "test";  //$_POST['Gender'];
  $Birthday = $_POST['Birthday'];
  $ContactNumber = $_POST['ContactNumber'];
  $EmailAddress = $_POST['EmailAddress'];
  $Password = $_POST['Password'];
  $imgData = $_FILES['ProfilePicture']['name'];
  $ParentName = $_POST['ParentName'];
  $ParentContactNumber = $_POST['ParentContactNumber'];
  $ParentEmailAddress = $_POST['ParentEmailAddress'];
  //$CreationDate = $_POST['CreationDate'];

  // Query for data insertion
  $sql = "INSERT INTO tblstudents(RFIDNumber,StudentID,StudentName,NIC,Address,Gender,Birthday,ContactNumber,EmailAddress,Password,ProfilePicture,ParentName,ParentContactNumber,ParentEmailAddress) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  $statement = $con->prepare($sql);
  $statement->bind_param('ssssssssssssss', $RFIDNumber,$StudentID,$StudentName,$NIC,$Address,$Gender,$Birthday,$ContactNumber,$EmailAddress,$Password,$imgData,$ParentName,$ParentContactNumber,$ParentEmailAddress);

  //$sql = "INSERT INTO tblstudents(RFIDNumber, StudentID,ProfilePicture) value(?,?,?)";
  //$statement = $con->prepare($sql);
  //$statement->bind_param('sss', $RFIDNumber,$StudentID,$imgData);

  $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());


  if ($current_id) {
    move_uploaded_file($_FILES["ProfilePicture"]["tmp_name"],"media/".$_FILES["ProfilePicture"]["name"]);
    echo "<script>alert('You have successfully inserted the data');</script>";
    echo "<script type='text/javascript'> document.location ='student_view.php'; </script>";
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
  <link rel="stylesheet" href="css/sReg.css" />
  <!-- font awesome file link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Admin Portal</title>
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
  <!-- Student Registration form section starts -->
  <section class="student-reg">
    <h1>Student Registration</h1>

    <form action="" method="post" enctype="multipart/form-data" name="studentReg" class="student-regF">

      <fieldset>
        <legend>Student Details</legend>
        <label for="rfid">RFID Number:</label>
        <input type="text" id="rfid" name="RFIDNumber" value="<?php echo $RFIDNumber; ?>"><br>
        <label for="sID">Student ID:</label>
        <input type="text" id="sID" name="StudentID" value="<?php echo $StudentID; ?>"><br>
        <label for="studentName">Student Name:</label>
        <input type="text" id="sName" name="StudentName"><br>
        <label for="nic">NIC:</label>
        <input type="text" id="nic" name="NIC"><br>
        <label for="address">Address:</label>
        <input type="text" id="Address" name="Address"><br>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="Birthday"><br>
        <div class="gender"><label for="gender">Gender:</label><br>
          <input type="radio" id="male" name="Gender" value="male">
          <label for="male">Male</label>
          <input type="radio" id="female" name="Gender" value="female">
          <label for="female">Female</label>
        </div>
        <label for="phone">Contact Number:</label>
        <input type="tel" id="phone" name="ContactNumber" required><br>
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="EmailAddress"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="Password" required><br>
        <label for="pPic">Profile Picture:</label>
        <input type="file" id="pPic" name="ProfilePicture" accept=".png,.gif,.jpg" required>
        <br><br><br><br>
      </fieldset>
      <fieldset>
        <legend>Parent Details</legend>
        <label for="parentName">Parent Name:</label>
        <input type="text" id="pName" name="ParentName"><br>
        <label for="pPhone">Parent Contact Number:</label>
        <input type="tel" id="pPhone" name="ParentContactNumber" required><br>
        <label for="email">Parent Email Address:</label>
        <input type="email" id="email" name="ParentEmailAddress"><br>


      </fieldset>


      <br><br><br>
      <input type="submit" value="Submit" name="submit">
    </form>



  </section>










  <!-- student Registration form section ends -->
  <!-- custom js file -->
  <script src="js/userP.js"></script>

</body>

</html>