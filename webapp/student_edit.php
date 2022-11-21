<?php
//Database Connection
include('dbconnection.php');
if (isset($_POST['submit'])) {
  $eid = $_GET['editid'];
  //Getting Post Values
  $RFIDNumber = $_POST['RFIDNumber'];
  $StudentID = $_POST['StudentID'];
  $StudentName = $_POST['StudentName'];
  $NIC = $_POST['NIC'];
  $Address = $_POST['Address'];
  if (empty($_POST['Gender'])) {
    $Gender = "Male";
  }

  $Birthday = $_POST['Birthday'];
  $ContactNumber = $_POST['ContactNumber'];
  $EmailAddress = $_POST['EmailAddress'];
  $Password = $_POST['Password'];
 
  $ParentName = $_POST['ParentName'];
  $ParentContactNumber = $_POST['ParentContactNumber'];
  $ParentEmailAddress = $_POST['ParentEmailAddress'];

  //Query for data updation
/*$query = mysqli_query($con, "update  tblstudents set 
  RFIDNumber = :RFID , 
  StudentID=:StID, 
  StudentName=:StName, 
  NIC= :NIC, Address=:Address, Gender= :Gender, 
  Birthday=:Birthday, ContactNumber=:ContactNumber, 
  EmailAddress=:EmailAddress, Password=:Password, 
  ProfilePicture=:aimage, ParentName=:ParentName, ParentContactNumber=:ParentContactNumber, 
  ParentEmailAddress=:ParentEmailAddress  where ID=:eid");
  $stmt = $this->pdo->prepare($sql);

  $stmt->bindParam(':RFID', $RFIDNumber);
  $stmt->bindParam(':StID', $StudentID);
  $stmt->bindParam(':NIC', $NIC);
  $stmt->bindParam(':Address', $Address);
  $stmt->bindParam(':Gender', $Gender);
  $stmt->bindParam(':Birthday', $Birthday);
  $stmt->bindParam(':ContactNumber', $ContactNumber);
  $stmt->bindParam(':EmailAddress', $EmailAddress);
  $stmt->bindParam(':Password', $Password);
  $stmt->bindParam(':ParentName', $ParentName);
  $stmt->bindParam(':EmailAddress', $EmailAddress);
  $stmt->bindParam(':ParentContactNumber', $ParentContactNumber);
  $stmt->bindParam(':ParentEmailAddress', $ParentEmailAddress);
  $stmt->bindParam(':aimage', $aimage, PDO::PARAM_STR);
  $res = $stmt->execute();
  if ($res) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='student_view.php'; </script>";
  } else {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
  }
*/

  $sqls="update  tblstudents set RFIDNumber = :RFID , 
  StudentID=:StID, StudentName=:StName, NIC= :NIC, Address=:Address, Gender= :Gender, 
  Birthday=:Birthday, ContactNumber=:ContactNumber, EmailAddress=:EmailAddress, Password=:Password, 
  ProfilePicture=:aimage, ParentName=:ParentName, ParentContactNumber=:ParentContactNumber, 
  ParentEmailAddress=:ParentEmailAddress  where ID=:eid";
	
  
  $aimage  = $_FILES['imagename']['name'];
  move_uploaded_file($_FILES["imagename"]["tmp_name"], "media/" . $_FILES["imagename"]["name"]);

	$sql="update  tblstudents set RFIDNumber = :RFID , 
  StudentID=:StID, StudentName=:StName, NIC= :NIC, Address=:Address, Gender= :Gender, 
  Birthday=:Birthday, ContactNumber=:ContactNumber, EmailAddress=:EmailAddress, 
  Password=:Password, 
  ProfilePicture=:aimage, ParentName=:ParentName,
  ParentContactNumber=:ParentContactNumber, 
  ParentEmailAddress=:ParentEmailAddress  where ID=:eid";
	$query = $dbh->prepare($sql);  
	$query->bindParam(':RFID', $RFIDNumber,PDO::PARAM_STR);
  $query->bindParam(':StID', $StudentID,PDO::PARAM_STR);
  $query->bindParam(':StName', $StudentName,PDO::PARAM_STR);
  $query->bindParam(':NIC', $NIC,PDO::PARAM_STR);
  $query->bindParam(':Address', $Address,PDO::PARAM_STR);
  $query->bindParam(':Gender', $Gender,PDO::PARAM_STR);
  $query->bindParam(':Birthday', $Birthday,PDO::PARAM_STR);
  $query->bindParam(':ContactNumber', $ContactNumber,PDO::PARAM_STR);
  $query->bindParam(':EmailAddress', $EmailAddress,PDO::PARAM_STR);
  $query->bindParam(':Password', $Password,PDO::PARAM_STR);
  $query->bindParam(':ParentName', $ParentName,PDO::PARAM_STR);
  $query->bindParam(':ParentContactNumber', $ParentContactNumber,PDO::PARAM_STR);
  $query->bindParam(':ParentEmailAddress', $ParentEmailAddress,PDO::PARAM_STR);
  $query->bindParam(':aimage', $aimage, PDO::PARAM_STR,PDO::PARAM_STR);
	$query->bindParam(':eid',$eid,PDO::PARAM_STR,PDO::PARAM_STR);
	$query->execute();
  if ($query->execute()) {
    echo "<script>alert('You have successfully Updated the data');</script>";
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

      <?php
      $eid = $_GET['editid'];
      $ret = mysqli_query($con, "select * from tblstudents where ID='$eid'");
      while ($row = mysqli_fetch_array($ret)) {
      ?>

        <fieldset>
          <legend>Student Details</legend>
          <label for="rfid">RFID Number:</label>
          <input type="text" id="rfid" value="<?php echo $row['RFIDNumber']; ?>" name="RFIDNumber"><br>
          <label for="sID">Student ID:</label>
          <input type="text" value="<?php echo $row['StudentID']; ?>" id="sID" name="StudentID"><br>
          <label for="studentName">Student Name:</label>
          <input type="text" value="<?php echo $row['StudentName']; ?>" id="sName" name="StudentName"><br>
          <label for="nic">NIC:</label>
          <input type="text" value="<?php echo $row['NIC']; ?>" id="nic" name="NIC"><br>
          <label for="address">Address:</label>
          <input type="text" value="<?php echo $row['Address']; ?>" id="Address" name="Address"><br>
          <label for="birthday">Birthday:</label>
          <input type="date" id="birthday" value="<?php echo $row['Birthday']; ?>" name="Birthday"><br>
          <div class="gender"><label for="gender">Gender:</label><br>
            <input type="radio" id="male" name="Gender" value="male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="Gender" value="female">
            <label for="female">Female</label>
          </div>
          <label for="phone">Contact Number:</label>
          <input type="tel" value="<?php echo $row['ContactNumber']; ?>" id="phone" name="ContactNumber" required><br>
          <label for="email">Email Address:</label>
          <input type="email" value="<?php echo $row['EmailAddress']; ?>" id="email" name="EmailAddress"><br>
          <label for="password">Password:</label>
          <input type="password" value="<?php echo $row['Password']; ?>" id="password" name="Password" required><br>
          <label for="pPic">Profile Picture:</label>
          <input type="file" id="ProfilePicture" name="imagename" accept=".png,.jpg" required>
          <img style="width: 100px;background-size:100% 100%;" src="media/<?php echo $row['ProfilePicture'] ?>" name="ProfilePic" />
          <br><br><br><br>
        </fieldset>
        <fieldset>
          <legend>Parent Details</legend>
          <label for="parentName">Parent Name:</label>
          <input type="text" value="<?php echo $row['ParentName']; ?>" id="pName" name="ParentName"><br>
          <label for="pPhone">Parent Contact Number:</label>
          <input type="tel" id="pPhone" value="<?php echo $row['ParentContactNumber']; ?>" name="ParentContactNumber" required><br>
          <label for="email">Parent Email Address:</label>
          <input type="email" id="email" value="<?php echo $row['ParentEmailAddress']; ?>" name="ParentEmailAddress"><br>
        </fieldset>

      <?php
      } ?>

      <br><br><br>
      <input type="submit" value="Submit" name="submit">
    </form>



  </section>










  <!-- student Registration form section ends -->
  <!-- custom js file -->
  <script src="js/userP.js"></script>

</body>

</html>